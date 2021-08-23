<?php
use App\Http\Response;
use App\Controller\UserController as UserController;

/** ROTA DE LISTAGEM DE USUÁRIO */
$router->get('/users', [
    'middlewares' => [
        'required-login'
    ],
    function ($request) {
        return new Response(200,UserController::getUsers($request));
    }
]);

/** ROTA DE CADASTRO DE DEVEDOR */
$router->get('/signup', [
    'middlewares' => [
        'required-logout'
    ],
    function ($request) {
        return new Response(200, UserController::getCreateUser($request));
    }
]);

/** ROTA DE CADASTRO DE DEVEDOR (POST) */
$router->post('/signup', [
    'middlewares' => [
        'required-logout'
    ],
    function ($request) {
        return new Response(200, UserController::setCreateUser($request));
    }
]);