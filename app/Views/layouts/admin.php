<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fiorenzo Admin</title>
  <link href="<?= BASE_URL ?>/assets/output.css" rel="stylesheet">
</head>
<body class="min-h-screen text-gray-900" style="background:url('<?= BASE_URL ?>/assets/Backgroundimage.png') center/cover fixed no-repeat;">

  <!-- ADMIN NAV -->
  <nav class="fixed top-0 left-0 w-full z-50 bg-black text-white">
    <div class="flex items-center justify-between px-6 md:px-8 py-4">
      <!-- Brand -->
      <a href="<?= BASE_URL ?>/admin" class="font-cinzel-deco tracking-[0.35em] text-lg">
        FIORENZO <span class="opacity-80">ADMIN</span>
      </a>

      <!-- Desktop menu -->
      <ul class="hidden md:flex gap-8 text-sm font-cinzel-deco">
        <li><a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin">DASHBOARD</a></li>
        <li><a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin/products">PRODUCTS</a></li>
        <li><a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin/add-product">ADD PRODUCT</a></li>
        <li><a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin/add-admin">ADD ADMIN</a></li>
        <li><a class="hover:text-gray-300" href="<?= BASE_URL ?>/logout">LOGOUT</a></li>
      </ul>

      <!-- Hamburger -->
      <button id="admMenuBtn" class="md:hidden focus:outline-none" aria-label="Toggle menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Mobile menu -->
    <!-- Mobile menu (horizontal instead of vertical) -->
<div id="admMobileMenu" 
     class="hidden md:hidden px-6 py-4 bg-black font-cinzel-deco text-sm flex gap-6 justify-center">
  <a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin">DASHBOARD</a>
  <a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin/products">PRODUCTS</a>
  <a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin/add-product">ADD PRODUCT</a>
  <a class="hover:text-gray-300" href="<?= BASE_URL ?>/admin/add-admin">ADD ADMIN</a>
  <a class="hover:text-gray-300" href="<?= BASE_URL ?>/logout">LOGOUT</a>
</div>

  </nav>

  <main class="w-full pt-24 px-4 md:px-8 max-w-7xl mx-auto">
    <?= $content ?? '' ?>
  </main>

  <script>
    const admBtn = document.getElementById('admMenuBtn');
    const admMenu = document.getElementById('admMobileMenu');
    if (admBtn && admMenu) admBtn.addEventListener('click', () => admMenu.classList.toggle('hidden'));
  </script>
</body>
</html>
