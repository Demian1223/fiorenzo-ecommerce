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
    ADD NEW ADMINS
  </h1>
</section>


<form method="POST" class="bg-white p-8 rounded-xl shadow space-y-4 max-w-lg mx-auto">
  <!-- Email -->
  <input type="email" 
         name="email" 
         placeholder="Admin Email" 
         required 
         class="w-full border p-3 rounded">

  <!-- Password -->
  <input type="password" 
         name="password" 
         placeholder="Password" 
         required 
         class="w-full border p-3 rounded">

  <!-- Submit -->
  <button class="bg-black text-white py-3 px-6 rounded hover:bg-gray-800">
    Create Admin
  </button>
</form>
<?php if (!empty($_SESSION['error'])): ?>
  <div class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4">
    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
  <div class="bg-green-100 text-green-600 px-4 py-2 rounded mb-4">
    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
  </div>
<?php endif; ?>
