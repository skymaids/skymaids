<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Modules\Auth\Traits\PasswordResetTrait;
use Illuminate\Support\Facades\Password;

/**
 * Class ResetPasswordController
 * OBS: Class base do auth do laravel com algumas alterações
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @date 08/09/2016
 * @version 1.0
 */
class ResetPasswordController extends BaseController
{
    use PasswordResetTrait, ResetsPasswords;

    /**
     * Redireciona após registrar
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Cria uma instancia
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Mostra o form se o token for aceito
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token = null)
    {
        $user = $this->getUserByToken($token);

        if($user)
        {
            return view('modules.auth.passwords.reset')->with(
                ['token' => $token, 'username' => $user->username, 'email' => $user->email]
            );
        }

        return redirect()->guest('login');
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request Request $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }
}
