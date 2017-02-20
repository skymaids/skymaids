<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Class ForgotPasswordController
 * OBS: Class base do auth do laravel com algumas alterações
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @date 08/09/2016
 * @version 1.0
 */
class ForgotPasswordController extends BaseController
{
    use SendsPasswordResetEmails;

    /**
     * Criar uma instancia.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Renderiza o form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('modules.auth.passwords.email');
    }

    /**
     * Envia o link para resetar senha do usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email','username' => 'required']);

        /**
         * Verifica o usuário pelo email e username e envia o email retorna erro caso não consiga
         */
        $response = $this->broker()->sendResetLink(
            $request->only(['email','username']), $this->resetNotifier()
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
}
