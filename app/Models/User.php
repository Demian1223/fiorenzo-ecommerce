<?php
require_once __DIR__ . '/../../config/config.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /** ✅ Get user by email */
    public function getByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    /** ✅ Create a customer (default role) */
    public function create($email, $password, $first, $last, $role = 'customer') {
        $fullName = trim($first . ' ' . $last);

        $stmt = $this->conn->prepare("
            INSERT INTO users (name, email, password, role)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("ssss", $fullName, $email, $password, $role);
        return $stmt->execute();
    }

    public function createAdmin($email, $password) {
    // Check if email already exists
    $stmt = $this->conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists → return false instead of error
        return false;
    }

    // Insert new admin if email does not exist
    $stmt = $this->conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 'admin')");
    $stmt->bind_param("ss", $email, $password);
    return $stmt->execute();
}


}
