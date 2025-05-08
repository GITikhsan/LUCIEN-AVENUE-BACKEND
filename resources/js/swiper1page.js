$(document).ready(function() {
    // ——————————————
    // Paksa scroll ke atas
    // ——————————————
    $(window).scrollTop(0);

    // ========================================
    // Handle Swiper (Product Image Slider)
    // ========================================
    const swiper = new Swiper('.product-image-slider', {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

    // ========================================
    // Handle Accordion Toggle
    // ========================================
    $('.accordion-toggle').on('click', function() {
      const $content = $(this).closest('.accordion-item').find('.accordion-content');
      const isOpen = $content.css('max-height') !== '0px';

      if (isOpen) {
        $content.css('max-height', '0');
        $(this).text('+');
      } else {
        $content.css('max-height', $content.prop('scrollHeight') + 'px');
        $(this).text('−');
      }
    });

    // ========================================
    // Handle Size Button (Select Shoe Size)
    // ========================================
    $('.size-button').on('click', function() {
      $('.size-button').removeClass('bg-black text-white');
      $(this).addClass('bg-black text-white');
      $('#selected-size').text(`Selected Size: ${$(this).text()}`);
    });

    // ========================================
    // Handle Quantity Button (+ and -)
    // ========================================
    const $qty = $('#quantity');
    $('#increase').on('click', () => $qty.val(parseInt($qty.val()) + 1));
    $('#decrease').on('click', () => {
      const v = parseInt($qty.val());
      if (v > 1) $qty.val(v - 1);
    });
    $qty.on('input', () => {
      if ($qty.val() === '' || parseInt($qty.val()) < 1) {
        $qty.val(1);
      }
    });

    // ========================================
    // Handle Toggle Button (Switch between options)
    // ========================================
    $('.toggle-btn').on('click', function() {
      $('.toggle-btn').removeClass('active');
      $(this).addClass('active');
    });

    // ========================================
    // Handle Image Zoom (Double Click + Mouse Move)
    // ========================================
    $('.zoom-follow').each(function() {
      const $container = $(this);
      const $img = $container.find('img');
      let zoomActive = false;

      $img.css('transition', 'transform 0.5s ease');

      $container.on('dblclick', () => {
        zoomActive = !zoomActive;
        if (!zoomActive) {
          $img.css('transform', 'scale(1)');
          swiper.autoplay.start();
        } else {
          swiper.autoplay.stop();
        }
      });

      $container.on('mousemove', e => {
        if (!zoomActive) return;
        const bounds = this.getBoundingClientRect();
        const x = (e.clientX - bounds.left) / bounds.width * 100;
        const y = (e.clientY - bounds.top) / bounds.height * 100;
        $img.css({
          transform: `scale(2) translate(-${x - 50}%, -${y - 50}%)`,
          transformOrigin: `${x}% ${y}%`
        });
      });

      $container.on('mouseleave', () => {
        if (!zoomActive) {
          $img.css('transform', 'scale(1)');
        }
      });
    });
  });
