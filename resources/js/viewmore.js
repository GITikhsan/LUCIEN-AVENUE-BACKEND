$(document).ready(function () {

    $(window).scrollTop(0);

    // Buka filter
    $('#openFilterBtn').on('click', function () {
      $('#mobileFilter')
        .removeClass('hidden translate-x-full')
        .addClass('block translate-x-0');
      $('#filterOverlay').removeClass('hidden');
    });

    // Tutup filter saat klik overlay
    $('#filterOverlay').on('click', function () {
      $('#mobileFilter')
        .removeClass('translate-x-0')
        .addClass('translate-x-full hidden');
      $('#filterOverlay').addClass('hidden');
    });

    $('#closeFilterBtn').on('click', function() {
      $('#mobileFilter')
        .removeClass('translate-x-0')
        .addClass('translate-x-full hidden');
      $('#filterOverlay').addClass('hidden');
    });

        // Saat buka filter
    $('#openFilterBtn').on('click', function () {
        $('#mobileFilter').removeClass('translate-x-full');
        $('body').addClass('overflow-hidden'); // Matikan scroll body
    });

    // Saat tutup filter
    $('#closeFilterBtn').on('click', function () {
        $('#mobileFilter').addClass('translate-x-full');
        $('body').removeClass('overflow-hidden'); // Balikin scroll
    });

    $(window).on('load', function () {
    setTimeout(function() {
        $(window).scrollTop(0);
        $('.overflow-y-auto').scrollTop(0);
    }, 100); // Delay 100ms
    });

  });
