<body class="bg-white">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Navbar -->
    <header id="navbar"
    class="h-20 w-full px-4 py-1 flex justify-between items-center border-b border-gray-300 bg-white sticky top-0 z-50 transition-all duration-300">
        <!-- Kiri: Contact Us -->
        <div class="flex items-center gap-2 sm:gap-3">
        </div>

        <!-- Tengah: Brand -->
        <div
            class="absolute transition-all duration-300
                    left-4 top-4
                    sm:left-1/2 sm:top-6
                    md:top-1/2 md:-translate-y-1/2
                    sm:transform sm:-translate-x-1/2">
                    <h1 id="brandTitle"
                        class="text-base font-serif font-semibold tracking-widest text-black whitespace-nowrap
                                sm:text-2xl md:text-3xl lg:text-4xl
                                transition-all duration-300">
                        LUCIEN AVENUE
                    </h1>
        </div>

            <!-- Kanan: Icons + Menu -->
            <div class="flex items-center gap-5 sm:gap-6 text-black relative mr-2">
            <button aria-label="Cart" id="cartButton" class="relative">
                <i data-lucide="shopping-bag" class="w-6 h-6"></i>
            </button>
            <button aria-label="User">
                <a href="/profile">
                <i data-lucide="user" class="w-6 h-6"></i>
                </a>
            </button>
            <button aria-label="Search" id="searchButton" class="relative">
                <i data-lucide="search" class="w-6 h-6"></i>
            </button>

            <!-- Button + Dropdown -->
            <div class="relative inline-block text-left">
                <!-- Menu Button -->
                <button id="menuToggle" aria-label="Menu" class="p-2 text-neutral-700 hover:text-black transition-colors duration-200 rounded-full hover:bg-gray-100">
                    <i data-lucide="menu" class="w-6 h-6 stroke-[1.5] transition-transform duration-200 hover:scale-110"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="menuDropdown" class="absolute right-0 mt-3 w-48 bg-white border border-gray-200 shadow-xl rounded-xl py-2 text-sm text-neutral-800 hidden z-50 transition-all duration-300 ease-out backdrop-blur-md">
                    <a href="/aboutus" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-md">
                        <i data-lucide="info" class="w-4 h-4 stroke-[1.5]"></i> About Us
                    </a>
                    <a href="/settings" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 transition rounded-md">
                        <i data-lucide="Settings" class="w-4 h-4 stroke-[1.5]"></i> Settings
                    </a>
                </div>
            </div>


            </div>


            <!-- Search Overlay -->
            <div id="searchOverlay" class="fixed inset-0 z-50 bg-white/50 backdrop-blur-md flex justify-center pointer-events-none opacity-0 transition-opacity duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]">
            <div id="searchContainer" class="mt-10 w-full max-w-2xl px-4 transform scale-95 opacity-0 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]">
                <div class="relative">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                <input
                    id="searchInput"
                    type="text"
                    placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 text-sm text-gray-900 placeholder-gray-500 bg-white bg-opacity-80 rounded-full shadow-md outline-none focus:ring-2 focus:ring-black/40 focus:shadow-lg"
                />
                </div>
            </div>
            </div>

            <!-- Shopping Bag Dropdown -->
            <div id="shoppingBagBox"
                class="absolute top-14 right-4 w-[28rem] max-h-[36rem] bg-white rounded-3xl shadow-2xl z-50 flex flex-col hidden transition-all duration-300 ease-in-out ring-1 ring-gray-100">

                <!-- Header -->
            <div class="px-6 py-5 border-b border-gray-200 bg-white flex items-center justify-between rounded-t-3xl shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-900 tracking-tight">👜 Your Bag</h2>
                <button id="closeBag" class="text-gray-400 hover:text-gray-900 text-3xl font-bold transition-all duration-200">&times;</button>
            </div>

            <!-- Items Scroll Area -->
            <div id="bagItems" class="flex-1 overflow-y-auto px-6 py-5 space-y-6 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 hover:scrollbar-thumb-gray-400 bg-gradient-to-b from-white via-gray-50 to-white rounded-b-2xl">

                <!-- Template Item -->
                <template id="cartItemTemplate">
                    <div class="flex gap-4 items-start p-5 bg-white rounded-2xl shadow-md transition hover:shadow-lg cart-item" data-price="0" data-qty="1">
                        <img src="" alt="Product"
                            class="w-20 h-20 object-contain rounded-xl bg-gray-100 p-2 border border-gray-200 item-img">
                        <div class="flex-1 space-y-1.5">
                            <p class="text-base font-semibold text-gray-900 item-name"></p>
                            <p class="text-sm text-gray-500">Size: <span class="item-size text-gray-700 font-semibold"></span></p>
                            <p class="text-sm font-bold text-gray-800 item-price"></p>
                            <div class="flex items-center mt-3 gap-2">
                                <button class="qty-decrease w-8 h-8 bg-gray-100 hover:bg-gray-200 text-base rounded-full transition">−</button>
                                <span class="item-qty-display w-8 h-8 bg-white border border-gray-300 text-sm rounded-full flex items-center justify-center">1</span>
                                <button class="qty-increase w-8 h-8 bg-gray-100 hover:bg-gray-200 text-base rounded-full transition">+</button>
                                <button class="remove-item ml-auto text-sm text-red-500 hover:text-red-700 hover:underline transition">Remove</button>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Example Static Item -->
                <div class="flex gap-4 items-start p-5 bg-white rounded-2xl shadow-md transition hover:shadow-lg cart-item" data-price="1540000" data-qty="2">
                    <img src="/images/wanita jordan/1,590,000(1).webp" alt="Product"
                        class="w-20 h-20 object-contain rounded-xl bg-gray-100 p-2 border border-gray-200">
                    <div class="flex-1 space-y-1.5">
                        <p class="text-base font-semibold text-gray-900">Nike Air Max</p>
                        <p class="text-sm text-gray-500">Size: <span class="font-semibold text-gray-700">42</span></p>
                        <p class="text-sm font-bold text-gray-800">Rp1.540.000</p>
                        <div class="flex items-center mt-3 gap-2">
                            <button class="qty-decrease w-8 h-8 bg-gray-100 hover:bg-gray-200 text-base rounded-full transition">−</button>
                            <span class="item-qty-display w-8 h-8 bg-white border border-gray-300 text-sm rounded-full flex items-center justify-center">1</span>
                            <button class="qty-increase w-8 h-8 bg-gray-100 hover:bg-gray-200 text-base rounded-full transition">+</button>
                            <button class="remove-item ml-auto text-sm text-red-500 hover:text-red-700 hover:underline transition">Remove</button>
                        </div>
                    </div>
                </div>

                <!-- Example Static Item -->
                <div class="flex gap-4 items-start p-5 bg-white rounded-2xl shadow-md transition hover:shadow-lg cart-item" data-price="1540000" data-qty="2">
                    <img src="/images/wanita jordan/1,590,000(1).webp" alt="Product"
                        class="w-20 h-20 object-contain rounded-xl bg-gray-100 p-2 border border-gray-200">
                    <div class="flex-1 space-y-1.5">
                        <p class="text-base font-semibold text-gray-900">Nike Air Max</p>
                        <p class="text-sm text-gray-500">Size: <span class="font-semibold text-gray-700">42</span></p>
                        <p class="text-sm font-bold text-gray-800">Rp1.540.000</p>
                        <div class="flex items-center mt-3 gap-2">
                            <button class="qty-decrease w-8 h-8 bg-gray-100 hover:bg-gray-200 text-base rounded-full transition">−</button>
                            <span class="item-qty-display w-8 h-8 bg-white border border-gray-300 text-sm rounded-full flex items-center justify-center">1</span>
                            <button class="qty-increase w-8 h-8 bg-gray-100 hover:bg-gray-200 text-base rounded-full transition">+</button>
                            <button class="remove-item ml-auto text-sm text-red-500 hover:text-red-700 hover:underline transition">Remove</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-5 border-t border-gray-200 bg-white rounded-b-3xl shadow-inner">
                <div class="flex justify-between items-center text-lg font-semibold text-gray-900 mb-4">
                    <span>Total:</span>
                    <span id="cartTotal" class="text-amber-600">Rp0</span>
                </div>
                <button
                    class="w-full bg-gradient-to-r from-black via-gray-900 to-black text-white py-3 rounded-xl shadow-lg hover:shadow-xl hover:bg-gray-800 transition-all duration-300 ease-in-out text-base font-semibold tracking-wide">
                    Proceed to Checkout
                </button>
            </div>
            <!-- Empty Cart Message -->
            <p id="emptyCartMsg" class="text-center text-gray-500 text-sm mt-4 hidden">Your cart is empty.</p>
        </div>
      </div>
    </header>

    <!-- Mobile Menu
    <div class="md:hidden fixed top-0 left-0 w-full h-full bg-white shadow-lg z-50 hidden" id="mobile-menu">
        <div class="flex flex-col items-center p-4">
            <a href="#" class="text-lg py-2">Contact Us</a>
            <a href="#" class="text-lg py-2">Shop Spring Summer 2025</a>
            <button aria-label="Close Menu" onclick="document.getElementById('mobile-menu').classList.add('hidden')">
                Close
            </button>
        </div>
    </div> -->

<!-- Lucide icons -->
<script src="https://unpkg.com/lucide@latest"></script>

@vite('resources/js/stickynavbar.js')


</body>
