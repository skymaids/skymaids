<?php
namespace Modules\Auth\Traits;

use Illuminate\Support\Facades\DB;

/**
 * Class Service
 * @oldtable servco
 * @package Modules\Auth
 * @author Reginaldo Moreira <reginaldo@imatec.com.br>
 * @Date 12/08/2016
 * @version 1.0
 */
trait PasswordResetTrait
{
    /**
     * Seta token na tabela de password_resets
     * @param $token
     */
    public function setUserInPasswordResets($userId, $token)
    {
        DB::update('update password_resets set user_id = ? where token = ?', [$userId,$token]);
    }

    /**
     * Seta token na tabela de password_resets
     * @param $token
     */
    public function getUserByToken($token)
    {
        $result = DB::select('select users.email,users.username from users 
                              inner join password_resets on password_resets.user_id = users.id 
                              where password_resets.token = ?', [$token]);

        return ($result) ? $result[0] : false;
    }
}