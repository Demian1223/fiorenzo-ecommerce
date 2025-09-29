<section class="max-w-md mx-auto mt-20 bg-white/80 p-10 rounded-xl shadow-lg">
  <h2 class="text-2xl font-cinzel-deco mb-6 text-center">CREATE PROFILE</h2>

  <?php if (!empty($_SESSION['error'])): ?>
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
      <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($_SESSION['success'])): ?>
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
      <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?= BASE_URL ?>/signup" class="space-y-4">
    <!-- Email -->
    <input type="email" name="email"
           value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>"
           placeholder="Email" required class="w-full border p-3 rounded">

    <!-- Password -->
    <input type="password" name="password"
           placeholder="Create Password" required class="w-full border p-3 rounded">

    <!-- First name -->
    <input type="text" name="first_name"
           value="<?= htmlspecialchars($_SESSION['old']['first_name'] ?? '') ?>"
           placeholder="First Name" required class="w-full border p-3 rounded">

    <!-- Last name -->
    <input type="text" name="last_name"
           value="<?= htmlspecialchars($_SESSION['old']['last_name'] ?? '') ?>"
           placeholder="Last Name" required class="w-full border p-3 rounded">

    <!-- Date of birth -->
    <input type="date" name="dob"
           value="<?= htmlspecialchars($_SESSION['old']['dob'] ?? '') ?>"
           max="<?= date('Y-m-d') ?>" required class="w-full border p-3 rounded">

    <button type="submit" class="btn-customer">CREATE PROFILE</button>
  </form>

  <?php unset($_SESSION['old']); ?>
</section>
