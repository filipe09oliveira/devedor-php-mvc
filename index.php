<?php

require __DIR__ . '/includes/app.php';

use App\Http\Request;
use \App\Http\Router;

/** Inicia a Router */
$router = new Router(URL);

/** Inclue as rotas de Login */
include __DIR__ . '/routes/login.php';

/** Inclue as rotas de Home */
include __DIR__ . '/routes/home.php';

/** Inclue as rotas de Devedor */
include __DIR__ . '/routes/devedor.php';

/** Inclue as rotas de UserController */
include __DIR__ . '/routes/user.php';

include __DIR__ . '/functions.php';

/** Impre o response da rota */
$router->run()->sendResponse();
