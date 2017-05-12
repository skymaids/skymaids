<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Modules\Base\Http\Controllers\BaseController;
use Carbon\Carbon;

class CalendarController extends BaseController
{
    /* How many ToDos are in this ical? */
    public $todo_count = 0;

    /* How many events are in this ical? */
    public $event_count = 0;

    /* The parsed calendar */
    public $cal;

    /* Which keyword has been added to cal at last? */
    private $_lastKeyWord;

    private $tokenPhone = 'b6c87624bcfbc4ca38b7ba9159a3464f';
    private $tokenGender = 'skgmfyARScVJHxrcNe';
    private $tokenMaps = 'AIzaSyBK2UvEeVFy6iDtDLyEXTsUr2R6dVoTEr8';


    /**
     * Creates the iCal-Object
     *
     * @param {string} $filename The path to the iCal-file
     *
     * @return Object The iCal-Object
     */
    public function __construct($filename)
    {
        if (!$filename) {
            return false;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (stristr($lines[0], 'BEGIN:VCALENDAR') === false) {
            return false;
        } else {
            // TODO: Fix multiline-description problem (see http://tools.ietf.org/html/rfc2445#section-4.8.1.5)
            foreach ($lines as $line) {
                $line = trim($line);
                $add  = $this->keyValueFromString($line);
                if ($add === false) {
                    $this->addCalendarComponentWithKeyAndValue($type, false, $line);
                    continue;
                }
                list($keyword, $value) = $add;
                switch ($line) {
                    case "BEGIN:VTODO":
                        $this->todo_count++;
                        $type = "VTODO";
                        break;
                    case "BEGIN:VEVENT":
                        $this->event_count++;
                        $type = "VEVENT";
                        break;
                    case "BEGIN:VCALENDAR":
                    case "BEGIN:DAYLIGHT":
                    case "BEGIN:VTIMEZONE":
                    case "BEGIN:STANDARD":
                        $type = $value;
                        break;
                    case "END:VTODO":
                    case "END:VEVENT":
                    case "END:VCALENDAR":
                    case "END:DAYLIGHT":
                    case "END:VTIMEZONE":
                    case "END:STANDARD":
                        $type = "VCALENDAR";
                        break;
                    default:
                        $this->addCalendarComponentWithKeyAndValue($type,
                            $keyword,
                            $value);
                        break;
                }
            }
            return $this->cal;
        }
    }

    /**
     * Add to $this->ical array one value and key.
     *
     * @param {string} $component This could be VTODO, VEVENT, VCALENDAR, ...
     * @param {string} $keyword   The keyword, for example DTSTART
     * @param {string} $value     The value, for example 20110105T090000Z
     *
     * @return {None}
     */
    public function addCalendarComponentWithKeyAndValue($component,
                                                        $keyword,
                                                        $value)
    {
        if ($keyword == false) {
            $keyword = $this->last_keyword;
            switch ($component) {
                case 'VEVENT':
                    $value = $this->cal[$component][$this->event_count - 1]
                        [$keyword].$value;
                    break;
                case 'VTODO' :
                    $value = $this->cal[$component][$this->todo_count - 1]
                        [$keyword].$value;
                    break;
            }
        }

        if (stristr($keyword, "DTSTART") or stristr($keyword, "DTEND")) {
            $keyword = explode(";", $keyword);
            $keyword = $keyword[0];
        }
        switch ($component) {
            case "VTODO":
                $this->cal[$component][$this->todo_count - 1][$keyword] = $value;
                //$this->cal[$component][$this->todo_count]['Unix'] = $unixtime;
                break;
            case "VEVENT":
                $this->cal[$component][$this->event_count - 1][$keyword] = $value;
                break;
            default:
                $this->cal[$component][$keyword] = $value;
                break;
        }
        $this->last_keyword = $keyword;
    }

    /**
     * Get a key-value pair of a string.
     *
     * @param {string} $text which is like "VCALENDAR:Begin" or "LOCATION:"
     *
     * @return {array} array("VCALENDAR", "Begin")
     */
    public function keyValueFromString($text)
    {
        preg_match("/([^:]+)[:]([\w\W]*)/", $text, $matches);
        if (count($matches) == 0) {
            return false;
        }
        $matches = array_splice($matches, 1, 2);
        return $matches;
    }

    /**
     * Return Unix timestamp from ical date time format
     *
     * @param {string} $icalDate A Date in the format YYYYMMDD[T]HHMMSS[Z] or
     *                           YYYYMMDD[T]HHMMSS
     *
     * @return {int}
     */
    public function iCalDateToUnixTimestamp($icalDate)
    {
        $checkTZ = strpos($icalDate, 'Z');
        $icalDate = str_replace('T', '', $icalDate);
        $icalDate = str_replace('Z', '', $icalDate);
        $pattern  = '/([0-9]{4})';   // 1: YYYY
        $pattern .= '([0-9]{2})';    // 2: MM
        $pattern .= '([0-9]{2})';    // 3: DD
        $pattern .= '([0-9]{0,2})';  // 4: HH
        $pattern .= '([0-9]{0,2})';  // 5: MM
        $pattern .= '([0-9]{0,2})/'; // 6: SS
        preg_match($pattern, $icalDate, $date);
        // Unix timestamp can't represent dates before 1970
        if ($date[1] <= 1970) {
            return false;
        }
        // Unix timestamps after 03:14:07 UTC 2038-01-19 might cause an overflow
        // if 32 bit integers are used.
        $timestamp = mktime(
            (int)$date[4] - (($checkTZ === false) ? 0 : 4),
            (int)$date[5],
            (int)$date[6],
            (int)$date[2],
            (int)$date[3],
            (int)$date[1]);
        return  $timestamp;
    }

    /**
     * Returns an array of arrays with all events. Every event is an associative
     * array and each property is an element it.
     *
     * @return {array}
     */
    public function events()
    {
        $array = $this->cal;
        return $array['VEVENT'];
    }

    /**
     * Returns a boolean value whether thr current calendar has events or not
     *
     * @return {boolean}
     */
    public function hasEvents()
    {
        return ( count($this->events()) > 0 ? true : false );
    }

    /**
     * Returns false when the current calendar has no events in range, else the
     * events.
     *
     * Note that this function makes use of a UNIX timestamp. This might be a
     * problem on January the 29th, 2038.
     * See http://en.wikipedia.org/wiki/Unix_time#Representing_the_number
     *
     * @param {boolean} $rangeStart Either true or false
     * @param {boolean} $rangeEnd   Either true or false
     *
     * @return {mixed}
     */
    public function eventsFromRange($rangeStart = false, $rangeEnd = false)
    {
        $events = $this->sortEventsWithOrder($this->events(), SORT_ASC);
        if (!$events) {
            return false;
        }
        $extendedEvents = array();

        if ($rangeStart !== false) {
            $rangeStart = new DateTime($rangeStart);
        }

        if ($rangeEnd !== false) {
            $rangeEnd = new DateTime($rangeEnd);
        }

        $rangeStart = $rangeStart->format('U');
        $rangeEnd   = $rangeEnd->format('U');

        // loop through all events by adding two new elements
        foreach ($events as $anEvent) {
            $timestamp = $this->iCalDateToUnixTimestamp($anEvent['DTSTART']);
            if ($timestamp >= $rangeStart && $timestamp <= $rangeEnd) {
                $extendedEvents[] = $anEvent;
            }
        }
        return $extendedEvents;
    }

    /**
     * Returns a boolean value whether thr current calendar has events or not
     *
     * @param {array} $events    An array with events.
     * @param {array} $sortOrder Either SORT_ASC, SORT_DESC, SORT_REGULAR,
     *                           SORT_NUMERIC, SORT_STRING
     *
     * @return {boolean}
     */
    public function sortEventsWithOrder($events, $sortOrder = SORT_ASC)
    {
        $extendedEvents = array();

        // loop through all events by adding two new elements
        foreach ($events as $anEvent) {
            if (!array_key_exists('UNIX_TIMESTAMP', $anEvent)) {
                $anEvent['UNIX_TIMESTAMP'] =
                    $this->iCalDateToUnixTimestamp($anEvent['DTSTART']);
            }
            if (!array_key_exists('REAL_DATETIME', $anEvent)) {
                $anEvent['REAL_DATETIME'] =
                    date("d.m.Y", $anEvent['UNIX_TIMESTAMP']);
            }

            $extendedEvents[] = $anEvent;
        }

        foreach ($extendedEvents as $key => $value) {
            $timestamp[$key] = $value['UNIX_TIMESTAMP'];
        }
        array_multisort($timestamp, $sortOrder, $extendedEvents);
        return $extendedEvents;
    }

    /**
     * Return name without special characters
     *
     * @param $dirtyString
     * @return bool|string
     */
    public function getName($dirtyString)
    {
        $arrayString = explode(" ", str_replace(['*',' key ', ' KEY '],'',$dirtyString));
        $string = false;

        foreach ($arrayString as $piece){
            if(preg_match('/[\'^£$%&*()}{@#~?><>0123456789.;:,|=_+¬-]/', $piece)) {
                break;
            }
            $string = ($string) ? $string . " " . $piece : $piece;
        }
        return $string;
    }

    /**
     * Return Login
     *
     * @param $name
     * @return bool|string
     */
    public function getLogin($name)
    {
        $arrayName = explode(" ", $name);
        $count = count($arrayName) - 1;
        return ($count >= 1) ? strtolower($arrayName[0].".".$arrayName[$count]) : strtolower(str_replace(" ",".",$name));
    }

    /**
     * Get Address
     *
     * @param $dirtyString
     * @return mixed
     */
    public function getAddress($dirtyString)
    {
        $arrayAddress = [
            'number' => '',
            'street' => '',
            'city' => '',
            'state' => '',
            'zip' => ''
        ];
        $data = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='. urlencode(str_replace("\\","",$dirtyString)) . '&sensor=false'));

        if(count($data->results)){
            foreach ($data->results[0]->address_components as $obj){
                switch ($obj->types[0]){
                    case 'street_number':
                        $arrayAddress['number'] = $obj->short_name;
                        break;
                    case 'route':
                        $arrayAddress['street'] = $obj->short_name;
                        break;
                    case 'locality':
                        $arrayAddress['city'] = $obj->short_name;
                        break;
                    case 'administrative_area_level_1':
                        $arrayAddress['state'] = $obj->short_name;
                        break;
                    case 'postal_code':
                        $arrayAddress['zip'] = $obj->short_name;
                        break;
                }
            }
            $arrayAddress['address'] = $arrayAddress['number']." ".$arrayAddress['street'];
        } else{
            $arrayAddress['address'] = str_replace("\\","",$dirtyString);
        }
        return $arrayAddress;
    }

    /**
     * Return phones and types
     *
     * @param string $dirtyString
     * @return array
     */
    public function getPhones($dirtyString = '')
    {
        $matches = [];
        $phones = ['landline' => '','mobile' => ''];
        preg_match_all('/[0-9]{10}|[0-9]{3}[\-][0-9]{6}|[0-9]{3}[\s][0-9]{6}|[0-9]{3}[\s][0-9]{3}[\s][0-9]{4}|[0-9]{3}[\-][0-9]{3}[\-][0-9]{4}|[\(][0-9]{3}[\)][\s][0-9]{3}[\s][0-9]{4}/', $dirtyString, $matches);

        foreach ($matches[0] as $value) {
            switch ($this->typePhone('1'.str_replace(['-',' ','(',')'],"",$value))){
                case 'landline':
                    $phones['landline'] = str_replace(['-',' ','(',')'],"",$value);
                break;
                case 'mobile':
                    $phones['mobile'] = str_replace(['-',' ','(',')'],"",$value);
                break;
                default:
                    $phones['landline'] = str_replace(['-',' ','(',')'],"",$value);
                break;
            }
        }
        return $phones;
    }

    /**
     * Get type phone or return false
     *
     * @param $number
     * @return bool
     */
    public function typePhone($number)
    {
        try {
            // Initialize CURL:
            $ch = curl_init('http://apilayer.net/api/validate?access_key='.$this->tokenPhone.'&number='.$number.'');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);

            // Decode JSON response:
            $validationResult = json_decode($json, true);

            if($validationResult['valid']){
                return $validationResult['line_type'];
            }
            return false;
        } catch (\Exception $e){
            return false;
        }
    }

    /**
     * Return email
     *
     * @param string $dirtyString
     * @return array
     */
    public function getEmail($dirtyString = '')
    {
        $matches = [];
        $pattern="/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";

        preg_match_all($pattern, $dirtyString, $matches);

        foreach($matches[0] as $email){
            return $email;
        }
        return null;
    }

    /**
     * Get gender by name
     *
     * @param $name
     * @return bool
     */
    public function getGender($name)
    {
        $arrayName = explode(" ", $name);
        $data = json_decode(file_get_contents('https://gender-api.com/get?key=' . $this->tokenGender . '&name=' . urlencode($arrayName[0])));
        return ($data->gender) ? (($data->gender == 'male') ? 1 : 0) : 0;
    }

    /**
     * Check if have key
     *
     * @param string $dirtyString
     * @return bool
     */
    public function getKey($dirtyString)
    {
        return (strpos(strtolower($dirtyString), ' key ') !== false) ? 1 : 0;
    }

    /**
     * Check if is vacant
     *
     * @param $var
     * @return bool
     */
    public function isVacant($var)
    {
        return strtolower($var) == 'vacant' ? true :false;
    }


    /**
     * Format event
     *
     * @param $event
     * @return object
     */
    public function event($event)
    {
        $flag = true;
        if(isset($event['EXDATE;TZID=America/New_York'])) {
            if($event['DTSTART'] == $event['EXDATE;TZID=America/New_York']){
                $flag = false;
            }
        }

        if(!$this->isVacant($event['SUMMARY']) && $flag) {
            $user = $this->getName($event['SUMMARY']);
            $arrayInfo = [
                'vacant' => false,
                'user' => $user,
                'login' => $this->getLogin($user),
                'gender' => $this->getGender($user),
                'key' => $this->getKey($event['SUMMARY']),
                'address' => $this->getAddress($event['LOCATION']),
                'phones' => $this->getPhones($event['DESCRIPTION']),
                'email' => $this->getEmail($event['DESCRIPTION']),
                'timestamp' => $event['UNIX_TIMESTAMP'],
                'date' => Carbon::createFromTimestamp($event['UNIX_TIMESTAMP'])->format('Y/m/d H:i:s')
            ];
        } else {
            $arrayInfo = [
                'vacant' => true
            ];
        }
        return $this->arrayToJson($arrayInfo);
    }
}