<?php
use App\Http\Response;
use App\Controller\DevedorController;

/** ROTA DE LISTAGEM DE DEVEDOR */
$router->get('/devedor', [
    'middlewares' => [
        'required-login'
    ],
    function ($request) {
        return new Response(200, DevedorController::getDevedores($request));
    }
]);

/** ROTA DE CADASTRO DE DEVEDOR */
$router->get('/devedor/create', [
    'middlewares' => [
        'required-login'
    ],
    function ($request) {
        return new Response(200, DevedorController::getCreateDevedor($request));
    }
]);

/** ROTA DE CADASTRO DE DEVEDOR (POST) */
$router->post('/devedor/create', [
    'middlewares' => [
        'required-login'
    ],
    function ($request) {
        return new Response(200, DevedorController::setCreateDevedor($request));
    }
]);

/** ROTA DE EDIÇÃO DE UM DEVEDOR */
$router->get('/devedor/edit/{id}', [
    'middlewares' => [
        'required-login'
    ],
    function ($request, $id) {
        return new Response(200, DevedorController::getEditDevedor($request, $id));
    }
]);

/** ROTA DE EDIÇÃO DE UM DEVEDOR (POST)*/
$router->post('/devedor/edit/{id}', [
    'middlewares' => [
        'required-login'
    ],
    function ($request, $id) {
        return new Response(200, DevedorController::setEditDevedor($request, $id));
    }
]);

/** ROTA DE EXLUSÃO DE UM DEVEDOR */
$router->get('/devedor/delete/{id}', [
    'middlewares' => [
        'required-login'
    ],
    function ($request, $id) {
        return new Response(200, DevedorController::getDeleteDevedor($request, $id));
    }
]);

/** ROTA DE EXLUSÃO DE UM DEVEDOR */
$router->post('/devedor/delete/{id}', [
    'middlewares' => [
        'required-login'
    ],
    function ($request, $id) {
        return new Response(200, DevedorController::setDeleteDevedor($request, $id));
    }
]);