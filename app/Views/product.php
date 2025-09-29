<section class="relative h-[80vh] md:h-[100vh] flex items-center justify-center overflow-hidden">
  <!-- Background video -->
  <video autoplay muted loop playsinline 
         class="absolute inset-0 w-full h-full object-cover">
    <source src="assets/WOMENCOVER.mp4" type="video/mp4">
  </video>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/70"></div>

  <!-- Centered text -->
  <h1 class="topic-h1">
    FOR HER
  </h1>
</section>

<section class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-12">

  <!-- Left: Product Image -->
  <div>
    <img src="<?= BASE_URL . '/' . htmlspecialchars($productData['image']) ?>" 
     alt="<?= htmlspecialchars($productData['product_name']) ?>"
     class="w-full h-[600px] object-cover rounded-lg shadow-lg">

  </div>

  <!-- Right: Product Details -->
  <div class="space-y-6">

    <h1 class="productdetailtext"><?= htmlspecialchars($productData['product_name']) ?></h1>


    <!-- Price (with old price if available) -->
    <div class="flex items-center gap-4">
      <span class="productdetailtext">
        Rs. <?= number_format($productData['price'], 2) ?>
      </span>
      <?php if (!empty($productData['old_price'])): ?>
        <span class=" producttext line-through text-gray-500">
          Rs. <?= number_format($productData['old_price'], 2) ?>
        </span>
      <?php endif; ?>
    </div>

    <!-- Accordion Sections -->
    <div class="divide-y divide-gray-300">
      <details class="producttext" open>
        <summary class="cursor-pointer font-medium">Product Details</summary>
        <p class="producttext">
          <?= nl2br(htmlspecialchars($productData['description'] ?? 'No description available.')) ?>
        </p>
      </details>
    </div>

    <!-- Add to Cart -->
    <form action="<?= BASE_URL ?>/cart/add" method="GET" class="space-y-4">
<input type="hidden" name="id" value="<?= $productData['product_id'] ?>">

      <!-- Sizes (static dropdown — can be made dynamic later) -->
      <div>
        <h3 class="font-medium mb-2">Size</h3>
        <select name="size" required class="border border-gray-400 px-4 py-2 rounded w-40">
          <option value="S">Small</option>
          <option value="M">Medium</option>
          <option value="L">Large</option>
          <option value="XL">XL</option>
        </select>
      </div>

      <!-- Quantity -->
      <div class="flex items-center gap-4">
        <label class="font-medium">Quantity:</label>
        <input type="number" name="qty" min="1" max="10" value="1"
               class="border px-3 py-2 w-20 text-center rounded" required>
      </div>

      <!-- Submit -->
      <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
        Add to Cart
      </button>
    </form>

  </div>
</section>
