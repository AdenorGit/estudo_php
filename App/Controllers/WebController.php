<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\EventosModel;
use RuntimeException;

class WebController
{
    public function home(): void
    {
        $titulo = 'Home';

        try {
            $eventosModel = new EventosModel();
            $eventos = $eventosModel->carregarTodos();
        } catch (RuntimeException $e) {
            error_log('[WebController] ' . $e->getMessage());
            $eventos = [];
        }

        include __DIR__ . '/../Views/Web/home.php';
    }
}
