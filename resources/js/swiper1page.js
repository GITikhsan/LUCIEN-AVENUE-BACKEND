
document.addEventListener("DOMContentLoaded", function () {
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

  const zoomContainers = document.querySelectorAll('.zoom-follow');

  zoomContainers.forEach(container => {
    const img = container.querySelector('img');
    img.style.transition = 'transform 0.5s ease';
    let zoomActive = false;

    container.addEventListener('dblclick', () => {
      zoomActive = !zoomActive;

      // reset zoom kalau dinonaktifin
      if (!zoomActive) {
        img.style.transform = 'scale(1)';
      }
      if (zoomActive) {
        swiper.autoplay.stop(); // stop auto roll pas zoom
      } else {
        swiper.autoplay.start(); // nyalain lagi kalau udah selesai zoom
        img.style.transform = 'scale(1)';
      }
    });

    container.addEventListener('mousemove', (e) => {
      if (!zoomActive) return;

      const bounds = container.getBoundingClientRect();
      const x = (e.clientX - bounds.left) / bounds.width * 100;
      const y = (e.clientY - bounds.top) / bounds.height * 100;

      img.style.transform = `scale(2) translate(-${x - 50}%, -${y - 50}%)`;
      img.style.transformOrigin = `${x}% ${y}%`;
    });

    container.addEventListener('mouseleave', () => {
      if (!zoomActive) {
        img.style.transform = 'scale(1)';
      }
    });
});

});


