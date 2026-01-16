<?php

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;

    public function __construct($data) {
        $this->id       = $data['id'] ?? 0;
        $this->name     = $data['nom'];
        $this->email    = $data['email'];
        $this->password = $data['mot_de_passe'];
        $this->role     = $data['role'] ?? 'sportif';
    }

    public function create(PDO $pdo): int {
        $sql = "INSERT INTO users (nom, email, mot_de_passe, role)
                VALUES (:nom, :email, :mot_de_passe, :role)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom'          => $this->name,
            ':email'        => $this->email,
            ':mot_de_passe' => $this->password,
            ':role'         => $this->role
        ]);

        return (int) $pdo->lastInsertId();
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getRole(): string { return $this->role; }
    public function getPassword(): string { return $this->password; }

    public static function findByEmail(PDO $pdo, string $email): ?User {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User($data);
    }
}
