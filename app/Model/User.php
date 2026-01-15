<?php

    class User {
        private string $name;
        private string $email;
        private string $password;
        private string $role = 'sportif'; 

        public function __construct(array $data) {
            $this->name  = $data['name'];
            $this->email = $data['email'];
            $this->password = password_hash($data['pass'], PASSWORD_DEFAULT);
            $this->role = 'sportif';
        }

        public function create(PDO $pdo): int {
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

        public static function findByEmail($pdo, $email) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");  
            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
