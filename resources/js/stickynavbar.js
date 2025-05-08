$(document).ready(function () {
    lucide.createIcons();

    const $searchButton = $('#searchButton');
    const $searchBox = $('#searchBox');
    const $cartButton = $('#cartButton');
    const $shoppingBagBox = $('#shoppingBagBox');
    const $searchInput = $('#searchInput');

    $searchButton.on('click', function () {
        const rect = this.getBoundingClientRect();
        const topPosition = rect.bottom + window.scrollY;
        const leftPosition = rect.left + window.scrollX;

        $searchBox.css({
            top: `${topPosition + 25}px`,
            left: `${leftPosition - 180}px`
        });

        $searchBox.toggleClass('hidden');
        $shoppingBagBox.addClass('hidden');

        if (!$searchBox.hasClass('hidden')) {
            $searchInput.focus();
        }
    });

    $cartButton.on('click', function () {
        $shoppingBagBox.toggleClass('hidden');
        $searchBox.addClass('hidden');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest($shoppingBagBox).length && !$(e.target).closest($cartButton).length) {
            $shoppingBagBox.addClass('hidden');
        }
        if (!$(e.target).closest($searchBox).length && !$(e.target).closest($searchButton).length) {
            $searchBox.addClass('hidden');
        }
    });

    $('[aria-label="Menu"]').on('click', function () {
        $('#mobile-menu').toggleClass('hidden');
    });

    // Cart Functions
    function updateCartTotal() {
        let total = 0;
        $('.cart-item').each(function () {
            const price = parseInt($(this).data('price'), 10);
            const qty = parseInt($(this).find('.item-qty-display').text(), 10);
            total += price * qty;
        });

        $('#cartTotal').text(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(total));
    }

    function attachEventHandlers($container) {
        $container.find('.qty-increase').on('click', function () {
            const $qtyDisplay = $container.find('.item-qty-display');
            let qty = parseInt($qtyDisplay.text(), 10);
            qty++;
            $qtyDisplay.text(qty);
            $container.data('qty', qty);
            updateCartTotal();
        });

        $container.find('.qty-decrease').on('click', function () {
            const $qtyDisplay = $container.find('.item-qty-display');
            let qty = parseInt($qtyDisplay.text(), 10);
            if (qty > 1) {
                qty--;
                $qtyDisplay.text(qty);
                $container.data('qty', qty);
                updateCartTotal();
            }
        });

        $('.remove-item').on('click', function () {
            const $item = $(this).closest('.cart-item'); // cari .cart-item terdekat dari tombol
            $item.remove(); // hapus hanya elemen itu
            updateCartTotal(); // hitung ulang total

            if ($('.cart-item').length === 0) {
                $('#bagItems').html('<p class="text-center text-gray-500">Your bag is empty.</p>');
            }
        });
    }

    $('.cart-item').each(function () {
        attachEventHandlers($(this));
    });

    updateCartTotal();

    $('#closeBag').on('click', function () {
        $shoppingBagBox.addClass('hidden');
    });

    // Search overlay
    const $overlay = $('#searchOverlay');
    const $container = $('#searchContainer');

    function showSearch() {
        $overlay.removeClass('opacity-0 pointer-events-none');
        $container.removeClass('opacity-0 scale-95');
        setTimeout(() => $searchInput.focus(), 200);
    }

    function hideSearch() {
        $overlay.addClass('opacity-0 pointer-events-none');
        $container.addClass('opacity-0 scale-95');
        $searchInput.val('');
    }

    $searchButton.on('click', showSearch);

    $('#closeSearch').on('click', hideSearch);

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') hideSearch();
    });

    $overlay.on('click', function (e) {
        if (e.target === this) hideSearch();
    });

    // Dropdown menu
    $('#menuToggle').on('click', function (e) {
        e.stopPropagation();
        $('#menuDropdown').toggleClass('hidden');
    });

    $(document).on('click', function () {
        $('#menuDropdown').addClass('hidden');
    });


    $(document).ready(function () {
        const mediaQuery = window.matchMedia('(min-width: 768px)');

        function isDesktop() {
            return mediaQuery.matches;
        }

        function handleScroll() {
            if (isDesktop()) {
                if ($(window).scrollTop() > 10) {
                    $('#navbar').removeClass('h-20').addClass('h-14');
                    $('#brandTitle')
                        .removeClass('text-xl sm:text-2xl md:text-3xl lg:text-4xl')
                        .addClass('text-sm sm:text-base md:text-xl lg:text-2xl');
                } else {
                    $('#navbar').removeClass('h-14').addClass('h-20');
                    $('#brandTitle')
                        .removeClass('text-sm sm:text-base md:text-xl lg:text-2xl')
                        .addClass('text-xl sm:text-2xl md:text-3xl lg:text-4xl');
                }
            } else {
                // Mobile mode: langsung kecil dan TETAP tanpa animasi scroll
                $('#navbar').removeClass('h-20').addClass('h-14');
                $('#brandTitle')
                    .removeClass('text-xl sm:text-2xl md:text-3xl lg:text-4xl')
                    .addClass('text-sm sm:text-base md:text-xl lg:text-2xl');
            }
        }

        // 1. Jalankan saat halaman siap
        handleScroll();

        // 2. Jalankan ulang saat ukuran berubah (termasuk aktifin mode hp di DevTools)
        mediaQuery.addEventListener('change', handleScroll);
        $(window).on('resize', handleScroll);

        // 3. Jalankan saat scroll — tapi HANYA untuk desktop
        $(window).on('scroll', function () {
            if (isDesktop()) {
                handleScroll();
            }
        });
    });


});
