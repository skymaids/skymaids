<?php
/**
 * Class Menu
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 27/07/2016
 * @version 1.0
 */
class Portrait
{
    /**
     * Retorna menu para ser renderizado na view
     *
     * @param array $arrayInfo
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @internal param string $id
     */
    public static function get($arrayInfo = [])
    {
        $userId = ($arrayInfo) ? $arrayInfo['userId'] :  Auth::user()->id;
        $file   = $userId.'.jpg';
        $folder = '/images/portraits/';
        $path   = public_path() . '/' . $folder . $file;
        $gender = ($arrayInfo) ? $arrayInfo['userGender'] :  Auth::user()->gender;

        return file_exists($path) ? $folder . $file : $folder . 'default' . $gender . '.jpg';
    }
}