
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

  const accordionToggles = document.querySelectorAll('.accordion-toggle');
 
  accordionToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
      const content = toggle.closest('.accordion-item').querySelector('.accordion-content');
      const isOpen = content.style.maxHeight && content.style.maxHeight !== "0px";
  
      if (isOpen) {
        content.style.maxHeight = null;
        toggle.textContent = '+';
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
        toggle.textContent = '−';
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    const toggleButtons = document.querySelectorAll('.toggle-btn');
  
    toggleButtons.forEach(button => {
      button.addEventListener('click', () => {
        toggleButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
      });
    });
  });
  


  const zoomContainers = document.querySelectorAll('.zoom-follow');

  zoomContainers.forEach(container => {
    const img = container.querySelector('img');
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

      // Toggle button state
  const toggleButtons = document.querySelectorAll('.toggle-btn');

  toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
      toggleButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
    });
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


