$(document).ready(function () {
    // Lucide render
    lucide.createIcons();

    // Toggle search
    $('#searchToggle').click(function () {
      $('#searchOverlay').removeClass('hidden');
      lucide.createIcons();
    });

    $('#closeSearch').click(function () {
      $('#searchOverlay').addClass('hidden');
    });

    // Toggle cart
    $('#cartToggle').click(function () {
      $('#cartPanel, #cartBackdrop').removeClass('hidden');
      lucide.createIcons();
    });

    $('#closeCart, #cartBackdrop').click(function () {
      $('#cartPanel, #cartBackdrop').addClass('hidden');
    });

    // Toggle mobile menu
    $('#menuToggle').click(function () {
      $('#mobileMenu').toggleClass('hidden');
    });
  });
