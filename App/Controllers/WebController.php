<?php

namespace App\Controllers;

use App\Database\ConnDb;


class WebController
{
    public function home()
    {

        $db = ConnDb::fromEnv();
        $pdo = $db->conectar();

        echo $pdo ? 'ok' : 'erro';

        $titulo = 'Home';

        include __DIR__ . '/../Views/Web/home.php';
    }
}