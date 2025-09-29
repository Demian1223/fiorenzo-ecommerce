<?php
require_once __DIR__ . '/../../app/Models/Product.php';
$productModel = new Product();
$products = $productModel->getProductsByCategory('men'); // ✅ fetch men category products
?>

<section class="relative h-[80vh] md:h-[100vh] flex items-center justify-center overflow-hidden">
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
    <source src="assets/forhim.mp4" type="video/mp4">
  </video>
  <div class="absolute inset-0 bg-black/70"></div>
  <h1 class="topic-h1">FOR HIM</h1>
</section>

<section class="max-w-7xl mx-auto px-7 py-20">
  <h1 class="topic-h2 text-center mb-16">READY TO WEAR</h1>
</section>

<section class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
  <?php foreach ($products as $product): ?>
    <div class="group">
      <div class="relative">
        <img src="<?= BASE_URL . '/' . ($product['image'] ?? 'assets/placeholder.png') ?>" 
             alt="<?= htmlspecialchars($product['product_name']) ?>" 
             class="w-full aspect-[3/4] object-cover rounded-lg shadow-lg group-hover:scale-105 transition duration-500">
      </div>
      <div class="mt-4 text-center">
        <!-- Product Name -->
        <h3 class="producttext"><?= htmlspecialchars($product['product_name']) ?></h3>

        

        <!-- View Details -->
        <a href="<?= BASE_URL ?>/product?id=<?= $product['product_id'] ?>" 
           class="btn-primary mt-4 inline-block">View Details</a>
      </div>
    </div>
  <?php endforeach; ?>
</section>
