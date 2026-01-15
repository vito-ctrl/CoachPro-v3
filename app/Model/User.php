<?php

    class User {
        private string $name;
        private string $email;
        private string $password;
        private string $role = 'sportif'; 

        public function __construct(array $data) {
            $this->name  = trim($data['name']);
            $this->email = trim($data['email']);
            $this->password = password_hash($data['pass'], PASSWORD_DEFAULT);
            $this->role = 'sportif';
        }

        public function create(PDO $pdo): int
        {
            $sql = "INSERT INTO users (nom, email, mot_de_passe, role)
                    VALUES (:nom, :email, :mot_de_passe, :role)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nom'     => $this->name,
                ':email'    => $this->email,
                ':mot_de_passe' => $this->password,
                ':role'     => $this->role
            ]);

            return (int) $pdo->lastInsertId();
        }
    }
