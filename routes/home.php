<?php

use \App\Http\Response;
use \App\Controller\Home;

/** ROTA ADMIN */
$router->get('/home', [
    'middlewares' => [
        'required-login'
    ],
    function ($request) {
        return new Response(200, Home::getHome($request));
    }
]);