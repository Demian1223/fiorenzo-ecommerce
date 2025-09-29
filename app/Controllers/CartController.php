<?php
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../core/Database.php';

class CartController {

    /* ---------- helpers ---------- */
    private function clampQty($n) {
        $n = (int)$n;
        if ($n < 1) $n = 1;
        if ($n > 10) $n = 10;
        return $n;
    }

    private function addBusinessDays(\DateTime $date, int $days): \DateTime {
        while ($days > 0) {
            $date->modify('+1 day');
            $w = (int)$date->format('N'); // 1..7 Mon..Sun
            if ($w <= 5) $days--;
        }
        return $date;
    }

    /* ---------- cart actions ---------- */

    // /cart/add?id=123&qty=1&size=M  (your router calls this with GET)
    public function add($id) {
        $id   = (int)$id;
        $size = isset($_GET['size']) ? trim($_GET['size']) : null;
        $qty  = $this->clampQty($_GET['qty'] ?? 1);

        $productModel = new Product();
        $p = $productModel->getProductById($id);
        if (!$p) { $_SESSION['error'] = "Product not found."; header("Location: ".BASE_URL."/cart"); exit; }

        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

        // merge if same product+size exists
        $found = false;
        foreach ($_SESSION['cart'] as &$it) {
            if ($it['id'] == $p['product_id'] && $it['size'] === $size) {
                $it['qty'] = $this->clampQty($it['qty'] + $qty);
                $found = true;
                break;
            }
        }
        unset($it);

        if (!$found) {
            $_SESSION['cart'][] = [
                'id'    => (int)$p['product_id'],
                'name'  => $p['product_name'],
                'image' => $p['image'],
                'price' => (float)$p['price'],
                'size'  => $size,
                'qty'   => $qty
            ];
        }

        $_SESSION['success'] = "Item added to cart.";
        header("Location: " . BASE_URL . "/cart");
        exit;
    }

    // POST /cart/update-qty
    public function updateQty() {
        if (!isset($_SESSION['cart'])) return;
        $id   = (int)($_POST['id'] ?? 0);
        $size = $_POST['size'] ?? null;
        $qty  = $this->clampQty($_POST['qty'] ?? 1);

        foreach ($_SESSION['cart'] as &$it) {
            if ($it['id'] === $id && $it['size'] === $size) {
                $it['qty'] = $qty;
                $_SESSION['success'] = "Quantity updated.";
                break;
            }
        }
        unset($it);
    }

    // GET /cart/delete?id=123&size=M
    public function delete($id) {
        if (!isset($_SESSION['cart'])) return;
        $id   = (int)$id;
        $size = $_GET['size'] ?? null;

        $_SESSION['cart'] = array_values(array_filter(
            $_SESSION['cart'],
            fn($it) => !($it['id'] === $id && $it['size'] === $size)
        ));
        $_SESSION['success'] = "Item removed.";
    }

    // GET /cart
    public function index() {
        $cartItems = $_SESSION['cart'] ?? [];
        $subtotal = 0.0;
        foreach ($cartItems as $it) $subtotal += ((float)$it['price']) * ((int)$it['qty']);
        $delivery = 0.00;
        $total    = $subtotal + $delivery;

        ob_start();
        require __DIR__ . '/../Views/cart.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layouts/main.php';
    }

    // GET /cart/reset
    public function reset() {
        unset($_SESSION['cart']);
        $_SESSION['success'] = "Cart cleared.";
    }

    /* ---------- checkout ---------- */
    // POST /cart/checkout  (router already checks login + POST)
   public function checkout() {
    // ✅ Ensure user is logged in
    if (!isset($_SESSION['user'])) {
        $_SESSION['redirect_after_login'] = BASE_URL . "/cart";
        $_SESSION['error'] = "Please log in to checkout.";
        header("Location: " . BASE_URL . "/login");
        exit;
    }

    // ✅ Calculate total before clearing cart
    $cart = $_SESSION['cart'] ?? [];
    $total = 0.0;
    foreach ($cart as $it) {
        $total += ((float)$it['price']) * ((int)$it['qty']);
    }

    // ✅ Clear the cart
    unset($_SESSION['cart']);

    // ✅ Create confirmation details
    $confirmation = [
        'order_id'      => rand(1000, 9999), // fake order ID for display
        'total'         => $total,
        'delivery_date' => $this->addBusinessDays(new \DateTime(), 3)->format('d M Y')
    ];

    // ✅ Load success page directly
    ob_start();
    require __DIR__ . '/../Views/checkout_success.php';
    $content = ob_get_clean();
    require __DIR__ . '/../Views/layouts/main.php';
 }
}

