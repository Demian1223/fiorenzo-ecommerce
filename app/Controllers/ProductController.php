<?php
require_once __DIR__ . '/../Models/Product.php';

class ProductController {
    public function show($id) {
        $id = (int)$id;
        $productModel = new Product();
        $productData = $productModel->getProductById($id);

        if (!$productData) {
            http_response_code(404);
            echo "Product not found.";
            exit;
        }

        ob_start();
        require __DIR__ . '/../Views/product.php'; // ✅ productData available here
        $content = ob_get_clean();

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
