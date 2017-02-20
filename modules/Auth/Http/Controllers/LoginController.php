<?php

namespace Modules\Auth\Http\Controllers;

use SkyMaids\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * OBS: Class base do auth do laravel com algumas alterações
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @date 08/09/2016
 * @version 1.0
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    const USER_ACCESS = 1;

    /**
     * Redirecionamento após o login
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
        $this->middleware('guest', ['except' => ['logout','showLockForm','lock']]);
    }

    /**
     * Pega o username usado no controler
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Mostra o form
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('modules.auth.login');
    }

    /**
     * Muda permissão para que só usuários ativos façam login
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(),'password');
        $data['user_status_id'] = self::USER_ACCESS;

        return $data;
    }

    /**
     * Logout do sistema
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect(env('URL_ADMIN_LOGIN'));
    }
}