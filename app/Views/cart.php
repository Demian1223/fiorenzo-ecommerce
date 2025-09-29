<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>
<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>
<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>



<?php if (empty($cartItems)): ?>
  <p class="text-center text-gray-700">Your cart is empty.</p>
<?php else: ?>
  <div class="grid grid-cols-1 gap-6">
    <?php foreach ($cartItems as $item): ?>
      <div class="flex flex-col md:flex-row items-center justify-between bg-white/80 backdrop-blur p-6 rounded-xl shadow">
        <div class="flex items-center gap-6">
          <img src="<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-28 h-28 object-cover rounded">
          <div>
            <h2 class="text-xl font-semibold"><?= htmlspecialchars($item['name']) ?></h2>
            <p class="text-gray-600">Rs. <?= number_format($item['price'], 2) ?></p>

            <form action="<?= BASE_URL ?>/cart/update-qty" method="POST" class="flex items-center gap-3 mt-2">
              <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
              <input type="hidden" name="size" value="<?= htmlspecialchars($item['size']) ?>">
              <label class="text-sm">Qty</label>
              <input type="number" name="qty" min="1" max="10" value="<?= (int)$item['qty'] ?>"
                     class="border rounded px-2 py-1 w-16 text-sm">
              <button class="px-3 py-1 text-xs bg-black text-white rounded">Update</button>
              <a class="px-3 py-1 text-xs bg-gray-200 rounded hover:bg-gray-300"
                 href="<?= BASE_URL ?>/cart/delete?id=<?= (int)$item['id'] ?>&size=<?= urlencode($item['size']) ?>">✕ Remove</a>
            </form>

            <?php if (!empty($item['size'])): ?>
              <p class="text-xs text-gray-500 mt-1">Size: <?= htmlspecialchars($item['size']) ?></p>
            <?php endif; ?>
          </div>
        </div>

        <p class="text-lg font-medium mt-4 md:mt-0">
          Total: Rs. <?= number_format($item['price'] * $item['qty'], 2) ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="mt-10 bg-white/80 backdrop-blur p-6 rounded-xl shadow">
  <h2 class="text-2xl font-cinzel-deco text-center mb-6">Delivery Details</h2>

  <form action="<?= BASE_URL ?>/cart/checkout" method="POST" class="grid grid-cols-1 gap-4">
    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium mb-1">First Name</label>
        <input name="first_name" type="text" class="w-full border px-3 py-2 rounded" required>
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Last Name</label>
        <input name="last_name" type="text" class="w-full border px-3 py-2 rounded" required>
      </div>
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Email</label>
      <input name="email" type="email" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Delivery Address</label>
      <input name="address" type="text" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Province</label>
      <input name="province" type="text" class="w-full border px-3 py-2 rounded" required>
    </div>

   <div class="mt-6 max-w-md ml-auto">
  <div class="flex justify-between mb-2">
    <span class="text-gray-600">Subtotal</span>
    <span>Rs. <?= number_format($subtotal, 2) ?></span>
  </div>
  <div class="flex justify-between mb-2">
    <span class="text-gray-600">Delivery</span>
    <span>Rs. <?= number_format($delivery, 2) ?></span>
  </div>
  <div class="flex justify-between font-semibold text-lg border-t pt-3">
    <span>Total</span>
    <span>Rs. <?= number_format($total, 2) ?></span>
  </div>

  <!-- Checkout button stays inside form -->
  <div class="flex justify-between mt-6">
    <!-- Reset Cart is OUTSIDE checkout form -->
    <a href="<?= BASE_URL ?>/cart/reset" 
       class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">
      Reset Cart
    </a>

    <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
      Checkout
    </button>
  </div>
</div>
</form> <!-- close checkout form here -->

<p class="mt-6 text-center text-xs text-gray-700 max-w-2xl mx-auto">
  THANK YOU FOR SHOPPING WITH FIORENZO. PLEASE ENSURE YOUR DETAILS ARE CORRECT.
  PAYMENT IS COLLECTED AT DELIVERY (CASH OR CARD). ONCE CONFIRMED, ORDERS ARE NON-REFUNDABLE.
</p>
