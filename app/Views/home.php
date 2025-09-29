<section class="relative h-[80vh] md:h-[100vh] flex items-center justify-center overflow-hidden">
  <!-- Background video -->
  <video autoplay muted loop playsinline 
         class="absolute inset-0 w-full h-full object-cover">
    <source src="assets/HeroVideo.mp4" type="video/mp4">
  </video>

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/70"></div>

  <!-- Centered text -->
  <h1 class="topic-h1 scroll-animate">
    FIORENZO
  </h1>
</section>


<!-- BRANDS SECTION -->
<section class="w-full max-w-7xl mx-auto px-8 py-5 text-center">
  <h2 class=" topic-h2">
OUR SPONSORS DELIVER DIRECTLY TO YOUR HOUSE  </h2>
  </section>


<section class="w-full px-12">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-12 ">

  <!-- LV -->
  <div class="flex flex-col items-center">
    <img src="assets/LV.png" alt="Louis Vuitton" class="w-full h-80 object-contain transition-transform duration-500 hover:scale-110 animate-fadeInUp delay-[200ms]">
    
  </div>

  <!-- Gucci -->
  <div class="flex flex-col items-center">
    <img src="assets/GUCCI.png" alt="Gucci" class="w-full h-80 object-contain transition-transform duration-500 hover:scale-110 animate-fadeInUp">
    
  </div>

  <!-- Dior -->
  <div class="flex flex-col items-center">
    <img src="assets/Dior.png" alt="Dior" class="w-full h-80 object-contain transition-transform duration-500 hover:scale-110 animate-fadeInUp">
    
  </div>

  <!-- Chanel -->
  <div class="flex flex-col items-center">
    <img src="assets/Channel.png" alt="Chanel" class="w-full h-80 object-contain transition-transform duration-500 hover:scale-110 animate-fadeInUp">
    
  </div>

</div>
</section>

<section class="relative flex items-center justify-center overflow-hidden px-6 mt-20">
  <!-- Video container -->
  <div class="relative w-full h-[100vh]  overflow-hidden shadow-lg">
    <!-- Background video -->
    <video autoplay muted loop playsinline 
           class="w-full h-full object-cover">
      <source src="assets/runnaway.mp4" type="video/mp4">
    </video>

    <!-- Overlay (only covers video now) -->
    <div class="absolute inset-0 bg-black/70"></div>
<div class="absolute inset-0 flex items-center justify-center">
      <h1 class="topic-h1 animate-fadeInDown">SHOW SUMMER 2026</h1> 

  </div>
</section>

<section class="w-full max-w-7xl mx-auto px-8 py-5 text-center mt-20">
  <h2 class=" topic-h2 ">
THE IDEAL PARTNER FOR SRI LANKA, FIORENZO PIECES CAPTURE THE MODERN ELEGENCE OF TRUE LUXURY.  </section>

<section class="max-w-6xl mx-auto px-4 py-20">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
    
    <!-- SHOP MEN -->
    <div class="relative group h-[700px] animate-fadeInLeft">
      <!-- Background video -->
      <video autoplay muted loop playsinline
             class="absolute inset-0 w-full h-full object-cover">
        <source src="assets/boyintro.mp4" type="video/mp4">
      </video>
      <!-- Dark overlay -->
      <div class="absolute inset-0 bg-black/70 group-hover:bg-black/50 transition"></div>
      
      <!-- Text & Discover -->
      <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
        <h2 class="button">For Him</h2>
        <a href="<?= BASE_URL ?>/shopmen" 
           class="font-semibold text-white relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
          Discover
        </a>
      </div>
    </div>

    <!-- SHOP WOMEN -->
    <div class="relative group h-[700px]">
      <!-- Background video -->
      <video autoplay muted loop playsinline
             class="absolute inset-0 w-full h-full object-cover">
        <source src="assets/girlintro.mp4" type="video/mp4">
      </video>
      <!-- Dark overlay -->
      <div class="absolute inset-0 bg-black/70 group-hover:bg-black/50 transition"></div>
      
      <!-- Text & Discover -->
      <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
        <h2 class="button">For Her</h2>
        <a href="<?= BASE_URL ?>/shopwomen"
           class="font-semibold text-white relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
          Discover
        </a>
      </div>
    </div>

  </div>
</section>

<section class="last">
  <!-- Title -->
  <h2 class="topic-h2 text-center mb-14 font-semibold">
    WHY CHOOSE FIORENZO ?
  </h2>
  </section>

  <!-- Cards Grid -->
  <section class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-8xl mx-auto">
    
    <!-- Card 1 -->
    <div class="flex flex-col items-center animate-fadeInUp">
      <img src="assets/artisits.png" alt="Our Artists" class="w-111 h-[50rem] object-cover shadow-lg animate-fadeInUp">
    </div>

    <!-- Card 2 -->
    <div class="flex flex-col items-center">
      <img src="assets/FreeDelivery.png" alt="Free Delivery" class="w-150 h-[50rem] object-cover shadow-lg">
    </div>

    <!-- Card 3 -->
    <div class="flex flex-col items-center">
      <img src="assets/sustainablefashion.png" alt="Ethical Fashion" class="w-111 h-[50rem] object-cover shadow-lg">
    </div>

  </section>
</section>


     