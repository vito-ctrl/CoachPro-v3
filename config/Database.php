<?php

class Database {
    private string $username = "vito";
    private string $password = "vito123456789";

    public function connect(): PDO {
        try {
            return new PDO(
                "pgsql:host=localhost;dbname=test",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }
}

// $db = new Database();
// $pdo = $db->connect();

// echo "Connected successfully!";
