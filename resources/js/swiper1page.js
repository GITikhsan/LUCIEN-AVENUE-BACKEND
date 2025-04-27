document.addEventListener("DOMContentLoaded", function () {
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
<<<<<<< HEAD
=======

>>>>>>> d162a10565d3eb3608a0fe0ed372ea2607077d63
  });

  // ========================================
  // Handle Accordion Toggle
  // ========================================
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

  // ========================================
  // Handle Size Button (Select Shoe Size)
  // ========================================
  const sizeButtons = document.querySelectorAll('.size-button');
  const selectedSizeText = document.getElementById('selected-size');

  sizeButtons.forEach(button => {
    button.addEventListener('click', () => {
      sizeButtons.forEach(btn => btn.classList.remove('bg-black', 'text-white'));
      button.classList.add('bg-black', 'text-white');
      selectedSizeText.textContent = `Selected Size: ${button.textContent}`;
    });
  });

  // ========================================
  // Handle Quantity Button (+ and -)
  // ========================================
  const quantityDisplay = document.getElementById('quantity');
  const increaseBtn = document.getElementById('increase');
  const decreaseBtn = document.getElementById('decrease');

  let quantity = 1;

<<<<<<< HEAD
  increaseBtn.addEventListener('click', () => {
    quantity++;
    quantityDisplay.textContent = quantity;
  });
=======
  zoomContainers.forEach(container => {
    const img = container.querySelector('img');
    img.style.transition = 'transform 0.5s ease';
    let zoomActive = false;
>>>>>>> d162a10565d3eb3608a0fe0ed372ea2607077d63

  decreaseBtn.addEventListener('click', () => {
    if (quantity > 1) {
      quantity--;
      quantityDisplay.textContent = quantity;
    }
  });

  // ========================================
  // Handle Toggle Button (Switch between options)
  // ========================================
  const toggleButtons = document.querySelectorAll('.toggle-btn');
  toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
      toggleButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
    });
  });

  // ========================================
  // Handle Image Zoom (Double Click + Mouse Move)
  // ========================================
  const zoomContainers = document.querySelectorAll('.zoom-follow');
  zoomContainers.forEach(container => {
    const img = container.querySelector('img');
    let zoomActive = false;

    container.addEventListener('dblclick', () => {
      zoomActive = !zoomActive;
      if (!zoomActive) {
        img.style.transform = 'scale(1)';
      }
      if (zoomActive) {
        swiper.autoplay.stop();
      } else {
        swiper.autoplay.start();
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
