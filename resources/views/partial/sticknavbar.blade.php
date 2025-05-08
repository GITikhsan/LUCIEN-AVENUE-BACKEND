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
                <i data-lucide="user" class="w-6 h-6"></i>
            </button>
            <button aria-label="Search" id="searchButton" class="relative">
                <i data-lucide="search" class="w-6 h-6"></i>
            </button>
            <!-- Button -->
            <div class="relative inline-block">
            <!-- Menu Button -->
            <button id="menuToggle" aria-label="Menu" class="p-2 text-neutral-800 hover:text-black transition-colors duration-200">
                <i data-lucide="menu" class="w-6 h-6 stroke-[1.5] transition-transform duration-200 hover:scale-105"></i>
            </button>

            <!-- Dropdown -->
            <div id="menuDropdown" class="absolute right-0 mt-2 w-40 bg-white shadow-lg border border-gray-200 rounded-md py-2 text-sm text-neutral-800 hidden z-50 transition-all duration-200">
                <a href="#contact" class="block px-4 py-2 hover:bg-gray-100 transition">Contact Us</a>
                <a href="#contact" class="block px-4 py-2 hover:bg-gray-100 transition">About Us</a>
                <a href="#settings" class="block px-4 py-2 hover:bg-gray-100 transition">Settings</a>
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
                class="absolute mt-4 w-[26rem] max-h-[34rem] bg-white rounded-2xl shadow-2xl right-0 top-full z-50 flex flex-col hidden">
                <!-- Header -->
                <div class="p-6 border-b flex items-center justify-between">
                    <h2 class="text-xl font-bold">Your Bag</h2>
                    <button id="closeBag" class="text-gray-500 hover:text-black text-2xl font-bold">&times;</button>
                </div>

                <!-- Scrollable Items -->
                <div id="bagItems" class="flex-1 overflow-y-auto p-6 space-y-4">
                    <!-- Example Item -->
                    <template id="cartItemTemplate">
                        <div class="flex items-start gap-4 border-b pb-4 cart-item" data-price="0" data-qty="1">
                            <img src="/images/wanita jordan/1,590,000(1).webp" alt="Product"
                                class="w-20 h-20 rounded-lg object-contain object-center p-1 bg">
                            <div class="flex-1">
                                <p class="font-semibold text-sm text-gray-800 item-name"></p>
                                <p class="text-sm text-gray-500">Size: <span
                                        class="font-medium text-gray-700 item-size"></span></p>
                                <p class="text-sm text-gray-500 mb-1 item-price"></p>
                                <div class="flex items-center mt-2 gap-2">
                                    <button
                                        class="qty-decrease px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">−</button>
                                    <span
                                        class="item-qty-display px-3 py-1 text-sm font-semibold bg-gray-100 rounded-full border border-gray-300">1</span>
                                    <button
                                        class="qty-increase px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">+</button>
                                    <button
                                        class="remove-item ml-auto text-sm text-red-500 hover:underline">Remove</button>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Item 1 -->
                    <div class="flex items-start gap-4 border-b pb-4 cart-item" data-price="1540000" data-qty="2">
                        <img src="/images/wanita jordan/1,590,000(1).webp" alt="Product"
                            class="w-20 h-20 rounded-lg object-contain object-center p-1 bg">
                        <div class="flex-1">
                            <p class="font-semibold text-sm text-gray-800">Nike Air Max</p>
                            <p class="text-sm text-gray-500">Size: <span class="font-medium text-gray-700">42</span></p>
                            <p class="text-sm text-gray-500 mb-1">Rp1.540.000</p>
                            <div class="flex items-center mt-2 gap-2">
                                <button
                                    class="qty-decrease px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">−</button>
                                <span
                                    class="item-qty-display px-3 py-1 text-sm font-semibold bg-gray-100 rounded-full border border-gray-300">1</span>
                                <button
                                    class="qty-increase px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">+</button>
                                <button class="remove-item ml-auto text-sm text-red-500 hover:underline">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-4 border-b pb-4 cart-item" data-price="1540000" data-qty="2">
                        <img src="/images/wanita jordan/1,590,000(1).webp" alt="Product"
                            class="w-20 h-20 rounded-lg object-contain object-center p-1 bg">
                        <div class="flex-1">
                            <p class="font-semibold text-sm text-gray-800">Nike Air Max</p>
                            <p class="text-sm text-gray-500">Size: <span class="font-medium text-gray-700">42</span></p>
                            <p class="text-sm text-gray-500 mb-1">Rp1.540.000</p>
                            <div class="flex items-center mt-2 gap-2">
                                <button
                                    class="qty-decrease px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">−</button>
                                <span
                                    class="item-qty-display px-3 py-1 text-sm font-semibold bg-gray-100 rounded-full border border-gray-300">1</span>
                                <button
                                    class="qty-increase px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">+</button>
                                <button class="remove-item ml-auto text-sm text-red-500 hover:underline">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex items-start gap-4 border-b pb-4 cart-item" data-price="1540000" data-qty="2">
                        <img src="/images/sepatu1.webp" alt="Product"
                            class="w-20 h-20 rounded-lg object-contain object-center p-1 bg">
                        <div class="flex-1">
                            <p class="font-semibold text-sm text-gray-800">Nike Air Max</p>
                            <p class="text-sm text-gray-500">Size: <span class="font-medium text-gray-700">42</span></p>
                            <p class="text-sm text-gray-500 mb-1">Rp1.540.000</p>
                            <div class="flex items-center mt-2 gap-2">
                                <button
                                    class="qty-decrease px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">−</button>
                                <span
                                    class="item-qty-display px-3 py-1 text-sm font-semibold bg-gray-100 rounded-full border border-gray-300">1</span>
                                <button
                                    class="qty-increase px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">+</button>
                                <button class="remove-item ml-auto text-sm text-red-500 hover:underline">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex items-start gap-4 border-b pb-4 cart-item" data-price="1540000" data-qty="2">
                        <img src="/images/sepatu1.webp" alt="Product"
                            class="w-20 h-20 rounded-lg object-contain object-center p-1 bg">
                        <div class="flex-1">
                            <p class="font-semibold text-sm text-gray-800">Nike Air Max</p>
                            <p class="text-sm text-gray-500">Size: <span class="font-medium text-gray-700">42</span></p>
                            <p class="text-sm text-gray-500 mb-1">Rp1.540.000</p>
                            <div class="flex items-center mt-2 gap-2">
                                <button
                                    class="qty-decrease px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">−</button>
                                <span
                                    class="item-qty-display px-3 py-1 text-sm font-semibold bg-gray-100 rounded-full border border-gray-300">1</span>
                                <button
                                    class="qty-increase px-3 py-1 text-sm font-semibold rounded-full bg-gray-200 hover:bg-gray-300">+</button>
                                <button class="remove-item ml-auto text-sm text-red-500 hover:underline">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total dan Checkout -->
                <div class="p-6 border-t">
                    <div class="flex justify-between text-lg font-semibold text-gray-800 mb-4">
                        <span>Total:</span>
                        <span id="cartTotal">Rp0</span>
                    </div>
                    <button
                        class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">Checkout</button>
                </div>
            </div>
            <!-- Empty Cart Message -->
            <p id="emptyCartMsg" class="text-center text-gray-500 text-sm mt-4 hidden">Your cart is empty.</p>
        </div>
      </div>
    </header>

    <!-- Mobile Menu -->
    <div class="md:hidden fixed top-0 left-0 w-full h-full bg-white shadow-lg z-50 hidden" id="mobile-menu">
        <div class="flex flex-col items-center p-4">
            <a href="#" class="text-lg py-2">Contact Us</a>
            <a href="#" class="text-lg py-2">Shop Spring Summer 2025</a>
            <button aria-label="Close Menu" onclick="document.getElementById('mobile-menu').classList.add('hidden')">
                Close
            </button>
        </div>
    </div>

    <!-- Scripts -->
<!-- jQuery CDN (jika belum ada) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Lucide icons -->
<script src="https://unpkg.com/lucide@latest"></script>

@vite('resources/js/stickynavbar.js')


</body>
