<?php

declare(strict_types=1);

namespace App\Models;

use App\Database\ConnDb;
use PDO;
use PDOException;
use RuntimeException;

class UsuarioModel
{
    private PDO $db;

    public function __construct(?ConnDb $conn = null)
    {
        // Injeta a dependência ou cria via factory de ambiente.
        $conn ??= ConnDb::fromEnv();
        $this->db = $conn->conectar();
    }

    /**
     * Busca um usuário ativo pelo e-mail.
     *
     * @return array<string, mixed> Retorna os dados do usuário ou array vazio.
     */
    public function buscarPorEmail(string $email): array
    {
        $sql = "SELECT usu_id, usu_nome, usu_email, usu_cpf, usu_senha, usu_admin, usu_ativo, usu_dt_criacao
                FROM t_usuario
                WHERE usu_email = :email AND usu_ativo = 1
                LIMIT 1";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $resultado ?: [];
        } catch (PDOException $e) {
            // Loga o erro real e propaga uma exceção genérica para o chamador.
            error_log('[UsuarioModel] ' . $e->getMessage());
            throw new RuntimeException('Falha ao consultar usuário.', previous: $e);
        }
    }
}