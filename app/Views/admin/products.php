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
    ALL PRODUCTS  </h1>
</section>

<table class="min-w-full bg-black rounded shadow">
  <thead>
    <tr class="bg-gray-200 text-left">
      <th class="p-3">Image</th>
      <th class="p-3">Name</th>
      <th class="p-3">Price</th>
      <th class="p-3">Description</th> <!-- ✅ New column -->
      <th class="p-3">Category</th>
      <th class="p-3">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $p): ?>
      <tr class="border-t">
        <!-- Image -->
        <td class="p-3">
          <img src="<?= BASE_URL . '/' . $p['image'] ?>" 
               alt="<?= htmlspecialchars($p['product_name']) ?>" 
               class="text-info">
        </td>

        <!-- Product Name -->
        <td class="text-info"><?= htmlspecialchars($p['product_name']) ?></td>

        <!-- Price (with old price strikethrough) -->
        <td class="p-3">
          <?php if (!empty($p['old_price'])): ?>
            <span class="line-through text-info ">Rs. <?= number_format($p['old_price'], 2) ?></span>
          <?php endif; ?>
          <span class="text-info">Rs. <?= number_format($p['price'], 2) ?></span>
        </td>

        <!-- ✅ Description (shortened) -->
        <td class="text-info">
          <?= htmlspecialchars(substr($p['description'], 0, 30)) ?>...
        </td>

        <!-- Category -->
        <td class="text-info"><?= htmlspecialchars($p['category']) ?></td>

        <!-- Actions -->
        <td class="p-3 flex gap-2">
          <a href="<?= BASE_URL ?>/admin/edit-product?id=<?= $p['product_id'] ?>" 
             class="btn-customer">Edit</a>

          <a href="<?= BASE_URL ?>/admin/delete-product?id=<?= $p['product_id'] ?>" 
             onclick="return confirm('Are you sure you want to delete this product?')" 
             class="btn-customer">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
