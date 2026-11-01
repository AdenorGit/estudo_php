<?php

namespace App\Controllers;


class WebController
{
    public function home()
    {

        $titulo = 'Home';

        include __DIR__ . '/../Views/Web/home.php';
    }
}