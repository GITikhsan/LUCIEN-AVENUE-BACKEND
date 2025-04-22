<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>VELLARE Navbar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white">

<!-- Navbar -->
<header class="w-full px-6 py-5 flex justify-between items-center relative border-b border-gray-200 bg-white">
  <!-- Kiri: Contact Us -->
  <div class="flex items-center gap-3">
    <span class="text-2xl font-bold text-black">+</span>
    <a href="#" class="text-lg font-semibold text-black hover:underline">Contact Us</a>
  </div>

  <!-- Tengah: Brand -->
  <div class="absolute left-1/2 -translate-x-1/2 transform">
    <h1 class="text-3xl font-serif font-semibold tracking-widest text-black">LUCIEN AVENUE</h1>
  </div>

  <!-- Kanan: Icons + Menu -->
  <div class="flex items-center gap-6 text-black">
    <!-- Shopping Bag Icon -->
    <button aria-label="Cart">
      <i data-lucide="shopping-bag" class="w-6 h-6"></i>
    </button>

    <!-- User Icon -->
    <button aria-label="User">
      <i data-lucide="user" class="w-6 h-6"></i>
    </button>

    <!-- Search Icon -->
    <button aria-label="Search">
      <i data-lucide="search" class="w-6 h-6"></i>
    </button>

    <!-- Menu Icon + Text -->
    <button aria-label="Menu" class="flex items-center gap-1">
      <i data-lucide="menu" class="w-6 h-6"></i>
      <span class="text-sm font-semibold tracking-wide">MENU</span>
    </button>
  </div>
</header>

<!-- Book An Appointment Bar -->
<div class="w-full bg-gray-200 text-center py-3">
  <a href="#" class="text-sm font-medium underline hover:no-underline transition-all">
  Book an Appointment: Shop Spring Summer 2025 in Store
  </a>
</div>

<script>
  lucide.createIcons();
</script>

</body>
</html>
