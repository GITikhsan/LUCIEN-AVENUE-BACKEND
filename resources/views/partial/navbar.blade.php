<body class="bg-white">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Navbar -->
    <header
        class="w-full px-4 py-6 sm:py-8 md:py-10 flex justify-between items-center border-b border-gray-300 bg-white relative">
        <!-- Kiri: Contact Us -->
        <div class="flex items-center gap-2 sm:gap-3">
            <span class="text-xl sm:text-2xl md:text-3xl font-bold text-black">+</span>
            <a href="#" class="text-sm sm:text-base md:text-lg font-semibold text-black hover:underline transition-all">
                Contact Us
            </a>
        </div>

        <!-- Tengah: Brand -->
        <div
            class="absolute left-1/2 top-4 sm:top-6 md:top-1/2 transform -translate-x-1/2 md:-translate-y-1/2 transition-all duration-300">
            <h1
                class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-semibold tracking-widest text-black whitespace-nowrap">
                LUCIEN AVENUE
            </h1>
        </div>

        <!-- Kanan: Icons + Menu -->
        <div class="flex items-center gap-3 sm:gap-4 text-black relative">
            <button aria-label="Cart" id="cartButton" class="relative">
                <i data-lucide="shopping-bag" class="w-6 h-6"></i>
            </button>
            <button aria-label="User">
                <i data-lucide="user" class="w-6 h-6"></i>
            </button>
            <button aria-label="Search" id="searchButton" class="relative">
                <i data-lucide="search" class="w-6 h-6"></i>
            </button>
            <button aria-label="Menu" class="flex items-center gap-1">
                <i data-lucide="menu" class="w-6 h-6"></i>
                <span class="text-sm font-semibold tracking-wide hidden sm:inline">MENU</span>
            </button>
            <!-- Search Overlay -->
            <div id="searchOverlay" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-50 hidden">
                <div class="absolute top-8 left-1/2 transform -translate-x-1/2 w-full max-w-2xl px-4">
                    <div class="bg-white rounded-full shadow-lg flex items-center px-4 py-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input id="searchInput" type="text" placeholder="Search products..."
                            class="flex-1 px-3 py-2 bg-transparent focus:outline-none text-gray-800" />
                        <button id="closeSearch" class="text-gray-500 hover:text-black text-xl">&times;</button>
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
    <script>
    lucide.createIcons();

    const searchButton = document.getElementById('searchButton');
    const searchBox = document.getElementById('searchBox');
    const cartButton = document.getElementById('cartButton');
    const shoppingBagBox = document.getElementById('shoppingBagBox');

    searchButton.addEventListener('click', () => {
        const rect = searchButton.getBoundingClientRect();
        const topPosition = rect.bottom + window.scrollY;
        const leftPosition = rect.left + window.scrollX;

        searchBox.style.top = `${topPosition + 25}px`;
        searchBox.style.left = `${leftPosition - 180}px`;

        searchBox.classList.toggle('hidden');
        shoppingBagBox.classList.add('hidden');

        if (!searchBox.classList.contains('hidden')) {
            document.getElementById('searchInput').focus();
        }
    });

    cartButton.addEventListener('click', () => {
        shoppingBagBox.classList.toggle('hidden');
        searchBox.classList.add('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!shoppingBagBox.contains(e.target) && !cartButton.contains(e.target)) {
            shoppingBagBox.classList.add('hidden');
        }
        if (!searchBox.contains(e.target) && !searchButton.contains(e.target)) {
            searchBox.classList.add('hidden');
        }
    });

    const menuButton = document.querySelector('[aria-label="Menu"]');
    menuButton.addEventListener('click', () => {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    </script>

    <script>
    function updateCartTotal() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            const price = parseInt(item.dataset.price, 10);
            const qty = parseInt(item.querySelector('.item-qty-display').textContent, 10);
            total += price * qty;
        });

        document.getElementById('cartTotal').textContent = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(total);
    }

    function attachEventHandlers(container) {
        container.querySelector('.qty-increase').addEventListener('click', () => {
            const qtyDisplay = container.querySelector('.item-qty-display');
            let qty = parseInt(qtyDisplay.textContent, 10);
            qty++;
            qtyDisplay.textContent = qty;
            container.dataset.qty = qty;
            updateCartTotal();
        });

        container.querySelector('.qty-decrease').addEventListener('click', () => {
            const qtyDisplay = container.querySelector('.item-qty-display');
            let qty = parseInt(qtyDisplay.textContent, 10);
            if (qty > 1) {
                qty--;
                qtyDisplay.textContent = qty;
                container.dataset.qty = qty;
                updateCartTotal();
            }
        });

        container.querySelector('.remove-item').addEventListener('click', () => {
            container.remove();
            updateCartTotal();
            if (document.querySelectorAll('.cart-item').length === 0) {
                document.getElementById('bagItems').innerHTML =
                    '<p class="text-center text-gray-500">Your bag is empty.</p>';
            }
        });
    }

    // Attach events to initial items
    document.querySelectorAll('.cart-item').forEach(item => attachEventHandlers(item));

    // Initial total
    updateCartTotal();

    // Close button
    document.getElementById('closeBag').addEventListener('click', () => {
        document.getElementById('shoppingBagBox').classList.add('hidden');
    });
    </script>

    <script>
    const searchOverlay = document.getElementById('searchOverlay');
    const searchBtn = document.getElementById('searchButton'); // Tombol kaca pembesar
    const closeSearch = document.getElementById('closeSearch');

    searchBtn?.addEventListener('click', () => {
        searchOverlay.classList.remove('hidden');
        document.getElementById('searchInput').focus();
    });

    closeSearch?.addEventListener('click', () => {
        searchOverlay.classList.add('hidden');
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') searchOverlay.classList.add('hidden');
    });
    </script>


</body>
