<?php
class Database {
    private $host = "localhost";
    private $db   = "fiorenzo_new";   // ✅ your DB name
    private $user = "root";       // ✅ XAMPP default
    private $pass = "";           // ✅ XAMPP default empty password
    private $charset = "utf8mb4";

    public function getConnection() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
