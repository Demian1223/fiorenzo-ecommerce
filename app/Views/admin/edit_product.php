<section class="relative h-[80vh] md:h-[100vh] flex items-center justify-center overflow-hidden">
  <!-- Background video -->
  <video autoplay muted loop playsinline 
         class="absolute inset-0 w-full h-full object-cover">
    <source src="assets\admin.mp4" type="video/mp4">
  </video>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/70"></div>

  <!-- Centered text -->
  <h1 class="topic-h1 animate-fadeInDown">
    EDIT PRODUCTS
  </h1>
</section>

<form method="POST" class="bg-white p-8 rounded-xl shadow space-y-4">
  <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

  <!-- Product Name -->
  <input name="product_name" 
         value="<?= htmlspecialchars($product['product_name'] ?? '') ?>" 
         placeholder="Product Name" required 
         class="w-full border p-3 rounded">

  <!-- Price ✅ validation added -->
  <input name="price" 
         value="<?= htmlspecialchars($product['price'] ?? '') ?>" 
         placeholder="Price" type="number" step="0.01" min="0" required 
         class="w-full border p-3 rounded">

  <!-- Old Price -->
  <input name="old_price" 
         value="<?= htmlspecialchars($product['old_price'] ?? '') ?>" 
         placeholder="Old Price" type="number" step="0.01" min="0"
         class="w-full border p-3 rounded">

  <!-- Image -->
  <input name="image" 
         value="<?= htmlspecialchars($product['image'] ?? '') ?>" 
         placeholder="Image Path (assets/...)" required 
         class="w-full border p-3 rounded">

  <!-- Description -->
  <textarea name="description" 
            placeholder="Description" 
            class="w-full border p-3 rounded"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>

  <!-- Category -->
  <select name="category" class="w-full border p-3 rounded">
    <option value="women" <?= ($product['category'] ?? '') === 'women' ? 'selected' : '' ?>>Women</option>
    <option value="men" <?= ($product['category'] ?? '') === 'men' ? 'selected' : '' ?>>Men</option>
    <option value="general" <?= ($product['category'] ?? '') === 'general' ? 'selected' : '' ?>>General</option>
  </select>

  <button class="bg-black text-white py-3 px-6 rounded hover:bg-gray-800">Update Product</button>
</form>
