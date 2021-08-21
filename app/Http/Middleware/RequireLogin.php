<?php

namespace App\Http\Middleware;

use App\Session\Login as SessionLogin;

class RequireLogin
{
    /**
     * Método responsável or executar o middleware
     * @param Request $request
     * @param \Closure $next
     * @return Response
     */
    public function handle($request, $next)
    {
        /** Verifica se usuário está logado */
        if (!SessionLogin::isLogged()) {
            $request->getRouter()->redirect('/');
        }
        return $next($request);
    }
}