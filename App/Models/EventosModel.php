<?php

declare(strict_types=1);

namespace App\Models;

use App\Database\ConnDb;
use PDO;
use PDOException;
use RuntimeException;

class EventosModel
{
    private PDO $db;

    public function __construct(?ConnDb $conn = null)
    {
        $conn ??= ConnDb::fromEnv();
        $this->db = $conn->conectar();
    }

    /**
     * Carrega os eventos ativos a partir da data atual, em ordem crescente.
     *
     * @return array<int, array<string, mixed>>
     */
    public function carregarTodos(): array
    {
        $sql = "SELECT eve_id, eve_titulo, eve_dt_evento, eve_local,
                       eve_descricao, eve_cartaz, eve_ativo,
                       eve_dt_criacao, fk_eve_usu, eve_complementos
                FROM t_eventos
                WHERE eve_ativo = 1
                  AND eve_dt_evento >= CURDATE()
                ORDER BY eve_dt_evento ASC";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            error_log('[EventosModel] ' . $e->getMessage());
            throw new RuntimeException('Falha ao carregar eventos.', previous: $e);
        }
    }
}
