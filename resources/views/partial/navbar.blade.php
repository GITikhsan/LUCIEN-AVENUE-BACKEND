
<body class="bg-white">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<!-- Navbar -->
<header class="w-full px-4 py-6 sm:py-8 md:py-10 flex justify-between items-center border-b border-gray-300 bg-white relative">
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
    <button aria-label="Search" id="searchButton" class="relative">
      <i data-lucide="search" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7"></i>
    </button>
    <button aria-label="Menu" class="flex items-center gap-1">
      <i data-lucide="menu" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7"></i>
      <span class="text-xs sm:text-sm md:text-base font-semibold tracking-wide hidden sm:inline">MENU</span>
    </button>

    <!-- Kotak Pencarian (disembunyikan saat awal) -->
    <div id="searchBox" class="absolute hidden mt-4 w-80 p-4 bg-white rounded-lg shadow-lg">
      <input type="text" id="searchInput" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black" placeholder="Search...">
    </div>
  </div>
</header>



<script>
  // Ambil elemen tombol dan kotak pencarian
  const searchButton = document.getElementById('searchButton');
  const searchBox = document.getElementById('searchBox');

  // Event listener untuk tombol search
  searchButton.addEventListener('click', () => {
    // Dapatkan posisi tombol
    const rect = searchButton.getBoundingClientRect();
    const topPosition = rect.bottom + window.scrollY;
    const leftPosition = rect.left + window.scrollX;

    // Update posisi kotak pencarian
    searchBox.style.top = `${topPosition + 25}px`; // Menambahkan jarak 10px di bawah tombol
    searchBox.style.left = `${leftPosition - 180}px`;

    // Toggle visibility dari kotak pencarian
    searchBox.classList.toggle('hidden');
    // Fokuskan ke input saat kotak pencarian muncul
    if (!searchBox.classList.contains('hidden')) {
      document.getElementById('searchInput').focus();
    }
  });
</script>

<script>
  lucide.createIcons();
</script>

<!-- Mobile Menu (optional) -->
<!-- Add a simple off-canvas mobile menu for smaller screens -->

<div class="md:hidden fixed top-0 left-0 w-full h-full bg-white shadow-lg z-50 hidden" id="mobile-menu">
  <div class="flex flex-col items-center p-4">
    <a href="#" class="text-lg py-2">Contact Us</a>
    <a href="#" class="text-lg py-2">Shop Spring Summer 2025</a>
    <button aria-label="Close Menu" onclick="document.getElementById('mobile-menu').classList.add('hidden')">
      Close
    </button>
  </div>
</div>

<script>
  lucide.createIcons();
  // Add JavaScript to handle mobile menu toggle
  const menuButton = document.querySelector('[aria-label="Menu"]');
  menuButton.addEventListener('click', () => {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
  });
</script>


