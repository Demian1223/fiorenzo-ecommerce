<?php
require_once __DIR__ . '/../Models/Product.php';

class AdminProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    /** Show all products */
    public function index() {
        $products = $this->model->getAllProducts();
        ob_start();
        require __DIR__ . '/../Views/admin/products.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layouts/admin.php';
    }

    /** Create product */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_name = $_POST['product_name'] ?? null;
            $price        = $_POST['price'] ?? null;
            $old_price    = $_POST['old_price'] ?? null;
            $image        = $_POST['image'] ?? null;
            $description  = $_POST['description'] ?? null;
            $category     = $_POST['category'] ?? null;

            if ($this->model->createProduct($product_name, $price, $old_price, $image, $description, $category)) {
                header("Location: " . BASE_URL . "/admin/products");
                exit;
            } else {
                $_SESSION['error'] = "Failed to add product";
            }
        }

        ob_start();
        require __DIR__ . '/../Views/admin/add_product.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layouts/admin.php';
    }

    /** Delete product */
    public function delete($id) {
        $this->model->deleteProduct($id);
        header("Location: " . BASE_URL . "/admin/products");
        exit;
    }

    /** Edit product */
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_name = $_POST['product_name'] ?? null;
            $price        = $_POST['price'] ?? null;
            $old_price    = $_POST['old_price'] ?? null;
            $image        = $_POST['image'] ?? null;
            $description  = $_POST['description'] ?? null;
            $category     = $_POST['category'] ?? null;

            $this->model->updateProduct($id, $product_name, $price, $old_price, $image, $description, $category);
            header("Location: " . BASE_URL . "/admin/products");
            exit;
        }

        $product = $this->model->getProductById($id);
        ob_start();
        require __DIR__ . '/../Views/admin/edit_product.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Views/layouts/admin.php';
    }
}
