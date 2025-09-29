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
HELLO ADMIN   </h1>
</section>
<section class="text-center py-16">

  <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
    <a href="<?= BASE_URL ?>/admin/products" 
       class="bg-black p-8 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-box text-3xl mb-4"></i>
      <h2 class="btn-admin">MANAGE PRODUCTS</h2>
    </a>

    <a href="<?= BASE_URL ?>/admin/add-product" 
       class="bg-black p-8 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-plus text-3xl mb-4"></i>
      <h2 class="btn-admin">ADD PRODUCTS</h2>
    </a>

  <a href="<?= BASE_URL ?>/admin/add-admin" 
    class="bg-black p-8 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-plus text-3xl mb-4"></i>
     <h2 class="btn-admin">ADD ADMIN</h2>
  </a>

    <a href="<?= BASE_URL ?>/logout" 
       class="bg-black p-8 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-right-from-bracket text-3xl mb-4"></i>
      <h2 class="btn-admin">LOGOUT</h2>
    </a>
  </div>
  
</section>
