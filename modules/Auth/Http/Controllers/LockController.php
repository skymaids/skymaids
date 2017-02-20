<?php
namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use SkyMaids\Http\Controllers\Controller;
use Modules\Auth\Traits\LockSessionTrait;
use Illuminate\Support\Facades\Auth;

/**
 * Class LockController
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @date 20/07/2016
 * @version 1.0
 */
class LockController extends Controller
{
    use LockSessionTrait;

    /**
     * Username
     *
     * @var string
     */
    protected $username;

    /**
     * Rota de redirecionamento em caso de sucesso
     *
     * @var string
     */
    protected $routeSuccess = 'home';

    /**
     * View que renderiza o bloqueio
     *
     * @var string
     */
    protected $viewLock = 'modules.auth.lock';

    /**
     * Mostra o form do bloqueio da aplicação
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showLockForm(Request $request)
    {
        if (Auth::user()){
            $username   = Auth::user()->username;
            $userId     = Auth::user()->id;
            $userGender = Auth::user()->gender;

            $this->lockSession($request->session());

            return view($this->viewLock, compact(['username','userId','userGender']));
        }

        return redirect('/login');
    }

    /**
     * Valida a senha digitada e faz o redirecionamento para tela inicial
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function lock(Request $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            $this->unlockSession($request->session());

            return redirect()->route($this->routeSuccess);
        } else {
            return redirect()->back()->withErrors(['password' => 'Senha incorreta favor digitar novamente!']);
        }
    }
}
