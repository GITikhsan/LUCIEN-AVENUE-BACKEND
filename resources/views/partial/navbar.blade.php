<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LUCIEN AVENUE</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white">

<!-- Navbar -->
<header class="w-full px-4 py-6 sm:py-8 md:py-10 flex justify-between items-center border-b border-gray-200 bg-white relative">
  <!-- Kiri: Contact Us -->
  <div class="flex items-center gap-2 sm:gap-3">
    <span class="text-xl sm:text-2xl md:text-3xl font-bold text-black">+</span>
    <a href="#" class="text-sm sm:text-base md:text-lg font-semibold text-black hover:underline transition-all">
      Contact Us
    </a>
  </div>

  <!-- Tengah: Brand -->
  <div class="absolute left-1/2 top-4 sm:top-6 md:top-1/2 transform -translate-x-1/2 md:-translate-y-1/2 transition-all duration-300">
    <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-semibold tracking-widest text-black whitespace-nowrap">
      LUCIEN AVENUE
    </h1>
  </div>

  <!-- Kanan: Icons + Menu -->
  <div class="flex items-center gap-3 sm:gap-4 text-black">
    <button aria-label="Cart">
      <i data-lucide="shopping-bag" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7"></i>
    </button>
    <button aria-label="User">
      <i data-lucide="user" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7"></i>
    </button>
    <button aria-label="Search">
      <i data-lucide="search" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7"></i>
    </button>
    <button aria-label="Menu" class="flex items-center gap-1">
      <i data-lucide="menu" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7"></i>
      <span class="text-xs sm:text-sm md:text-base font-semibold tracking-wide hidden sm:inline">MENU</span>
    </button>
  </div>
</header>

<!-- Book An Appointment Bar -->
<div class="w-full bg-gray-200 text-center py-4 sm:py-5 px-2">
  <a href="#" class="text-sm sm:text-base font-medium underline hover:no-underline transition-all block md:inline">
    Book an Appointment: Shop Spring Summer 2025 in Store
  </a>
</div>

<script>
  lucide.createIcons();
</script>

</body>
</html>
