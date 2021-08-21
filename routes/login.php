<?php

use \App\Http\Response;
use App\Controller\LoginController as LoginController;

/** ROTA LOGIN  */
$router->get('/', [
    'middlewares' => [
        'required-logout'
    ],
    function ($request) {
        return new Response(200, LoginController::getLogin($request));
    }
]);

/** ROTA LOGIN (POST) */
$router->post('/', [
    'middlewares' => [
        'required-logout'
    ],
    function ($request) {
        return new Response(200, LoginController::setLogin($request));
    }
]);

/** ROTA LOGOUT  */
$router->get('/logout', [
    'middlewares' => [
        'required-login'
    ],
    function ($request) {
        return new Response(200, LoginController::setLogout($request));
    }
]);

