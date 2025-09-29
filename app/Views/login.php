<section class="max-w-md mx-auto mt-20 bg-white/80 p-10 rounded-xl shadow-lg">
  <h2 class="text-2xl font-cinzel-deco mb-6 text-center">SIGN IN</h2>

  <?php if (!empty($_SESSION['error'])): ?>
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
      <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?= BASE_URL ?>/login" class="space-y-4">
    <input type="email" name="email" placeholder="Email" required class="w-full border p-3 rounded">
    <input type="password" name="password" placeholder="Password" required class="w-full border p-3 rounded">
    <button type="submit" class="w-full bg-black text-white py-3 rounded hover:bg-gray-800">SIGN IN</button>
  </form>

  <p class="text-center mt-4 text-sm">
    Don't have an account?
    <a href="<?= BASE_URL ?>/signup" class="text-black underline">Create Profile</a>
  </p>
</section>
