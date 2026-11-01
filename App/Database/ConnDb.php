<?php

namespace App\Database;

use PDO;
use PDOException;
use Exception;

class ConnDb
{
    private ?PDO $conexao = null;

    private string $host;
    private string $name;
    private string $user;
    private string $password;

    public function __construct() 
    {
        // O host aceita o fallback para localhost, pois ele faz sentido no ambiente de desenvolvimento
        $this->host     = $_ENV['DB_HOST'] ?? 'localhost';
        
        // Para os outros, se não existirem no $_ENV, jogamos um erro de configuração
        $this->name     = $_ENV['DB_NAME']     ?? throw new Exception("Configuração 'DB_NAME' não encontrada no ambiente.");
        $this->user     = $_ENV['DB_USER']     ?? throw new Exception("Configuração 'DB_USER' não encontrada no ambiente.");
        $this->password = $_ENV['DB_PASS'] ?? throw new Exception("Configuração 'DB_PASSWORD' não encontrada no ambiente.");
    }

    public function conectar(): PDO 
    {
        if ($this->conexao instanceof PDO) {
            return $this->conexao;
        }

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $this->conexao = new PDO($dsn, $this->user, $this->password, $options);
            return $this->conexao;
        } catch (PDOException $e) {
    
            throw new Exception("Erro ao conectar ao banco de dados. Verifique as credenciais no arquivo de ambiente.");
        }
    }
}