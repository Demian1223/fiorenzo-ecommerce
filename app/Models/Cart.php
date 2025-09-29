<?php
require_once __DIR__ . '/../../config/config.php';

class Cart {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /** ✅ Get all cart items for a user */
    public function getCartItems($userId) {
        $stmt = $this->conn->prepare("
            SELECT 
                ci.cartitem_id,
                ci.quantity,
                ci.size,
                p.product_id,
                p.product_name,
                p.image,
                p.price,
                (ci.quantity * p.price) AS total
            FROM cartitem ci
            INNER JOIN cart c ON ci.cart_id = c.cart_id
            INNER JOIN products p ON ci.product_id = p.product_id
            WHERE c.user_id = ?
        ");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    /** ✅ Add item to cart */
    public function addToCart($userId, $productId, $size, $qty) {
        // Ensure cart exists
        $cartId = $this->getOrCreateCart($userId);

        $stmt = $this->conn->prepare("
            INSERT INTO cartitem (cart_id, product_id, size, quantity)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("iisi", $cartId, $productId, $size, $qty);
        return $stmt->execute();
    }

    /** ✅ Create a cart if it doesn’t exist */
    private function getOrCreateCart($userId) {
        $stmt = $this->conn->prepare("SELECT cart_id FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        if ($res) {
            return $res['cart_id'];
        } else {
            $stmt = $this->conn->prepare("INSERT INTO cart (user_id, created_at) VALUES (?, NOW())");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            return $this->conn->insert_id;
        }
    }
}
