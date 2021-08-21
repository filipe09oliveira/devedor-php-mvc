<?php

namespace App\Http\Middleware;

use App\Session\Login as SessionLogin;

class RequireLogout
{
    /**
     * Método responsável por executar o middleware
     * @param Request $request
     * @param \Closure $next
     * @return Response
     */
    public function handle($request, $next)
    {
        /** Verifica se usuário está logado */
        if (SessionLogin::isLogged()) {
            $request->getRouter()->redirect('/home');
        }
        return $next($request);
    }
}