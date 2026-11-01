<?php

// === INSTANCIAR ROTEADOR ============================================

    $router = new \Bramus\Router\Router();
    $router->setNamespace('\App\Controllers');


// === ROTAS PÚBLICAS =================================================

    $router->get('/', 'WebController@home');


// === EXECUTAR ROTAS =================================================

    $router->run();
