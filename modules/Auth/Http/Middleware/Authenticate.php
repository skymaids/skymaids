<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class Authenticate
 * @package Modules\Auth
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 08/09/2016
 * @version 1.0
 */
class Authenticate
{
    /**
     * Responsavel por verificar o bloqueio do sistema
     * OBS: Chamado sempre quando o middlewaer WEB dor acionado
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (\Request::route()->getName() == 'auth.logout') {
            $request->session()->forget('lock');
        }

        $collectionAllow = [
            'auth.password.forgot',
            'auth.login',
            'auth.logout',
            'auth.register',
            'auth.password.reset',
            'auth.password.email',
            'auth.logout',
            'auth.lock'
        ];

        if (in_array(\Request::route()->getName(), $collectionAllow)) {
            if (\Request::route()->getName() !== 'auth.lock') {
                if($request->session()->get('lock')) {
                    return redirect('lock');
                }
            }
            return $next($request);
        }

        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        if($request->session()->get('lock')) {
            return redirect('lock');
        }

        return $next($request);
    }
}
