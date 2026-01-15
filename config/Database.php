<?php

class Database
{
    private string $host;
    private string $port;
    private string $dbname;
    private string $username;
    private string $password;
    private ?PDO $pdo = null;

    public function __construct(){
        $env = parse_ini_file(__DIR__ . '/../.env');

        $this->host     = $env['DB_HOST'];
        $this->port     = $env['DB_PORT'];
        $this->dbname   = $env['DB_NAME'];
        $this->username = $env['DB_USER'];
        $this->password = $env['DB_PASS'];
    }

    public function connect(): PDO{
        if ($this->pdo === null) {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}";

            $this->pdo = new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }

        return $this->pdo;
    }
}
