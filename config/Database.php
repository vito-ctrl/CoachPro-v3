<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use Dotenv\Dotenv;
    
    class Database {
        private string $username;
        private string $password;
        private string $dbname;
        private string $host;

        public function __construct(){
            $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
            $dotenv->load();

            $this->username = $_ENV['USER_NAME'];
            $this->password = $_ENV['PASS'];
            $this->dbname = $_ENV['DB_NAME'];
            $this->host = $_ENV['HOST'];
        }

        public function connect(): PDO {
            try {
                return new PDO(
                    "pgsql:host={$this->host};dbname={$this->dbname}",
                    $this->username,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
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
