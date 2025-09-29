<?php
require_once __DIR__ . '/../../config/config.php';

class Product {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /** ✅ Get all products */
    public function getAllProducts() {
        $sql = "
            SELECT 
                product_id,
                product_name,
                price,
                old_price,
                image,
                description,
                category
            FROM products
        ";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

  public function getProductsByCategory($categoryName) {
    $stmt = $this->conn->prepare("
        SELECT 
            product_id,
            product_name,
            price,
            old_price,
            image,
            description,
            category
        FROM products
        WHERE category = ?
    ");
    $stmt->bind_param("s", $categoryName);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

public function getProductById($id) {
    $stmt = $this->conn->prepare("
        SELECT 
            product_id,
            product_name,
            price,
            old_price,
            image,
            description,
            category
        FROM products
        WHERE product_id = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


    /** ✅ Create product */
    public function createProduct($product_name, $price, $old_price, $image, $description, $category) {
        $stmt = $this->conn->prepare("
            INSERT INTO products (product_name, price, old_price, image, description, category)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sddsss",
            $product_name, $price, $old_price, $image, $description, $category
        );
        return $stmt->execute();
    }

    /** ✅ Update product */
    public function updateProduct($id, $product_name, $price, $old_price, $image, $description, $category) {
        $stmt = $this->conn->prepare("
            UPDATE products
            SET product_name=?, price=?, old_price=?, image=?, description=?, category=?
            WHERE product_id=?
        ");
        $stmt->bind_param("sddsssi",
            $product_name, $price, $old_price, $image, $description, $category, $id
        );
        return $stmt->execute();
    }

    /** ✅ Delete product */
    public function deleteProduct($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
