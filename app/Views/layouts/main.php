<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fiorenzo</title>

  <!-- Tailwind CSS -->
  <link href="<?= BASE_URL ?>/assets/output.css" rel="stylesheet">
</head>

<body class="min-h-screen text-gray-900" 
      style="background:url('assets/Backgroundimage.png') center/cover fixed no-repeat;">

  <!-- ================= NAVBAR START ================= -->
  <nav class="fixed top-0 left-0 w-full z-50 bg-black/100 text-white border-b border-white/0">
  <div class="flex items-center justify-between px-8 py-7">

      <!-- Brand -->
      <a href="<?= BASE_URL ?>/home" class="font-cinzel-deco tracking-[0.35em] text-lg md:text-xl">
        FIORENZO
      </a>

      <!-- Desktop Nav -->
      <ul class="hidden md:flex gap-8 text-sm font-cinzel-deco">
        <li><a class="hover:text-secondary" href="<?= BASE_URL ?>/home">HOME</a></li>
        <li><a class="hover:text-secondary" href="<?= BASE_URL ?>/about">ABOUT US</a></li>
        <li><a class="hover:text-secondary" href="<?= BASE_URL ?>/shopwomen">FOR HER</a></li>
        <li><a class="hover:text-secondary" href="<?= BASE_URL ?>/shopmen">FOR HIM</a></li>
        <li><a class="hover:text-secondary" href="<?= BASE_URL ?>/faq">FAQ</a></li>
        <li><a class="hover:text-secondary" href="<?= BASE_URL ?>/ethics">OUR ETHICS</a></li>
      </ul>

      <!-- Icons + Hamburger -->
      <div class="flex items-center gap-4">
        <!-- Cart Icon -->
        <a href="<?= BASE_URL ?>/cart" aria-label="Cart" class="hover:text-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="currentColor" class="w-6 h-6">
            <path d="M2.25 3h1.5l1.5 9h12l1.5-6h-15M6.75 21a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm9 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
          </svg>
        </a>

        <!-- Account Icon -->
        <a href="<?= BASE_URL ?>/login" aria-label="Account" class="hover:text-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="currentColor" class="w-6 h-6">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 1.5c-2.67 0-8 1.34-8 4v1.5h16v-1.5c0-2.66-5.33-4-8-4z"/>
          </svg>
        </a>

        <!-- Hamburger -->
        <button id="menuBtn" class="md:hidden focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
          </svg>
        </button>
      </div>
    </div>

 <!-- Mobile Menu (horizontal) -->
<div id="mobileMenu" 
     class="hidden md:hidden px-6 py-4 bg-black text-white font-cinzel-deco text-xs flex gap-6 justify-center">
  <a href="<?= BASE_URL ?>/home" class="hover:text-gray-300">HOME</a>
  <a href="<?= BASE_URL ?>/about" class="hover:text-gray-300">ABOUT US</a>
  <a href="<?= BASE_URL ?>/shopwomen" class="hover:text-gray-300">FOR HER</a>
  <a href="<?= BASE_URL ?>/shopmen" class="hover:text-gray-300">FOR HIM</a>
  <a href="<?= BASE_URL ?>/faq" class="hover:text-gray-300">FAQ</a>
  <a href="<?= BASE_URL ?>/ethics" class="hover:text-gray-300">OUR ETHICS</a>
</div>

  </nav>
  <!-- ================= NAVBAR END ================= -->

  <main class="w-full mt-24">
    <?= $content ?? '' ?>
  </main>

  <!-- JS Toggle -->
  <script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');
    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
  <script>
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".scroll-animate");

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        obs.unobserve(entry.target); // run only once
      }
    });
  }, { threshold: 0.2 });

  elements.forEach(el => observer.observe(el));
});
</script>

</body>

 <footer class="bg-black text-white py-12">
        <div class=" text-info max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-6">

          <!-- Column 1 -->
          <div>
            <h3 class="text-lg font-semibold mb-4">MAY WE HELP YOU?</h3>
            <ul class="space-y-2 text-sm">
              <li><a href="#" class="hover:underline">Contact Us</a></li>
              <li><a href="#" class="hover:underline">Email Us</a></li>
              <li><a href="#" class="hover:underline">FAQs</a></li>
            </ul>
          </div>

          <!-- Column 2 -->
          <div>
            <h3 class="text-lg font-semibold mb-4">OUR COMPANY</h3>
            <ul class="space-y-2 text-sm">
              <li><a href="#" class="hover:underline">About Fiorenzo</a></li>
              <li><a href="#" class="hover:underline">Shop Men</a></li>
              <li><a href="#" class="hover:underline">Shop Women</a></li>
              <li><a href="#" class="hover:underline">FAQs</a></li>
              <li><a href="#" class="hover:underline">Our Ethics</a></li>
              <li><a href="#" class="hover:underline">Our Artists</a></li>
            </ul>
          </div>

          <!-- Column 3 -->
          <div>
            <h3 class="text-lg font-semibold mb-4">EMAIL US</h3>
            <input type="email" placeholder="Your email"
                  class="w-full px-3 py-2 rounded-md bg-transparent border border-gray-500 focus:outline-none focus:border-white text-sm">
          </div>

          <!-- Column 4 -->
          <div>
            <h3 class="text-lg font-semibold mb-4">FOLLOW FIORENZO</h3>
            <div class="flex gap-4 text-2xl">
              <a href="#" class="hover:text-gray-400">▶</a>
              <a href="#" class="hover:text-gray-400">📸</a>
              <a href="#" class="hover:text-gray-400">💼</a>
            </div>
          </div>
        </div>

        <!-- Bottom -->
        <div class="text-center text-xs text-gray-400 mt-10">
          © 2016 - 2025 GUCCIO GUCCI S.P.A. - ALL RIGHTS RESERVED.  
          SIAE LICENCE # 2294/I/1936 AND 5647/I/1936
        </div>

        <div class="topic-h1 text-center">
          FIORENZO
        </div>
      </footer>




</html>
