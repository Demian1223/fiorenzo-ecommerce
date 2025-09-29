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
    ADD NEW PRODUCTS
  </h1>
</section>

<?php if (!empty($_SESSION['error'])): ?>
  <div class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4">
    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/admin/add-product"
      class="bg-white p-8 rounded-xl shadow space-y-4">

  <!-- Product Name -->
  <input name="product_name" placeholder="Product Name" required class="w-full border p-3 rounded">

  <!-- Price ✅ validation added -->
  <input name="price" placeholder="Price" type="number" step="0.01" min="0" required class="w-full border p-3 rounded">

  <!-- Old Price -->
  <input name="old_price" placeholder="Old Price" type="number" step="0.01" min="0" class="w-full border p-3 rounded">

  <!-- Image -->
  <input name="image" placeholder="Image Path (assets/...)" required class="w-full border p-3 rounded">

  <!-- Description -->
  <textarea name="description" placeholder="Description" class="w-full border p-3 rounded"></textarea>

  <!-- Category -->
  <select name="category" class="w-full border p-3 rounded">
    <option value="women">Women</option>
    <option value="men">Men</option>
    <option value="general">General</option>
  </select>

  <button class="bg-black text-white py-3 px-6 rounded hover:bg-gray-800">Add Product</button>
</form>
