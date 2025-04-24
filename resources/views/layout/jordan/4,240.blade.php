<!DOCTYPE html>
<html lang="en">
@include('partial.navbar')

    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beli Air Jordan 1 Retro Low OG SP Travis Scott Velvet Brown</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          }
        }
      }
    }
    </script>
    <style>
      .swiper-slide img {
        max-width: 350px;
        width: 100%;
        height: auto;
        object-fit: contain;
        margin-left: auto;
        margin-right: auto;
        cursor: grab;
      }

      .swiper-slide img:active{
        cursor: grabbing;
      }


      .custom-nav {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.75rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        cursor: pointer;
        background-color: white;
        color: black;
        transition: background-color 0.2s ease, color 0.2s ease;
      }

      .custom-nav:hover,
      .custom-nav:active{
        background-color: black;
        color: white;
      }

      .swiper-button-prev {
        left: 12px;
      }

      .swiper-button-next {
        right: 12px;
      }

      /* Hide default Swiper arrows */
      .swiper-button-next::after,
      .swiper-button-prev::after {
        display: none !important;
      }

      .swiper-pagination {
        margin-top: 4.5rem; /* tambahin jarak pagination ke bawah */
        text-align: center;
        position: relative;
      }

      .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: #aaa;
        opacity: 0.6;
        margin: 0 6px;
        border-radius: 9999px;
        transition: all 0.3s ease;
      }

      .swiper-pagination-bullet-active {
        background-color: #000;
        opacity: 1;
      }

      /* tampilan button hitam brand new dkk */
      .toggle-btn.active {
        background-color: black;
        color: white;
      }

    </style>
  </head>

  <body class="font-sans text-black text-sm bg-white">
    <div class="max-w-[1240px] mx-auto px-6 mt-10">

    <section class="relative border-2 border-gray-300 rounded-xl p-6 md:p-12 text-base md:text-lg min-h-[560px]">
  <!-- Garis Tengah -->
  <div class="hidden md:block absolute top-0 bottom-0 left-1/2 -translate-x-1/2 w-px bg-gray-300 z-10"></div>

  <!-- Container Utama -->
  <div class="flex flex-col md:flex-row w-full h-full gap-8">

    <!-- SWIPER -->
    <div class="w-full md:max-w-[520px] mx-auto md:mx-0 md:pr-6 flex items-end">
      <div class="swiper product-image-slider rounded-xl overflow-hidden">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="swiper-zoom-container zoom-follow">
              <img src="/images/4JT/4,240,000.png" alt="Air Jordan 1 Retro Low OG SP Travis Scott Velvet Brown" class="w-full h-auto object-contain" />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container zoom-follow">
              <img src="/images/4JT/4,240,000(2).png" alt="" class="w-full h-auto object-contain" />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container zoom-follow">
              <img src="/images/4JT/4,240,000(3).png" alt="" class="w-full h-auto object-contain" />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container zoom-follow">
              <img src="/images/4JT/4,240,000(4).png" alt="" class="w-full h-auto object-contain" />
            </div>
          </div>
        </div>

        <!-- Bullet pagination -->
        <div class="swiper-pagination mt-6"></div>

        <!-- Navigation -->
        <div class="swiper-button-prev custom-nav left-2 top-1/2 -translate-y-1/2 absolute z-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </div>
        <div class="swiper-button-next custom-nav right-2 top-1/2 -translate-y-1/2 absolute z-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </div>
      </div>
    </div>

    <!-- DETAIL PRODUK -->
    <div class="flex-1 min-w-[320px] space-y-5 md:pl-6">
      <h2 class="text-2xl font-semibold leading-snug">
        Air Jordan 1 Retro Low OG SP Travis Scott Velvet Brown
      </h2>
      <div class="space-y-1">
        <div class="uppercase text-sm tracking-wide text-gray-600">Start From</div>
        <div class="text-2xl font-bold text-black">IDR 4,240,000</div>
      </div>


    <div class="flex gap-3" id="toggleGroup">
        <button class="toggle-btn flex-1 bg-black text-white py-3 rounded-lg text-base border border-transparent hover:bg-white hover:text-black hover:border-black">
            Brand New
        </button>
        <button class="toggle-btn flex-1 bg-black text-white py-3 rounded-lg text-base border border-transparent hover:bg-white hover:text-black hover:border-black">
            Used
        </button>

    <!-- Tombol untuk menampilkan dropdown -->
    <button id="toggleButton" class="toggle-btn flex-1 bg-black text-white py-3 rounded-lg text-base border border-transparent hover:bg-white hover:text-black hover:border-black">
        Pre-Order
    </button>

    <!-- Dropdown ukuran (sembunyi awalnya) -->
    <div class="relative inline-block left-[-172px]">
    <div id="sizeDropdown" class="absolute left-0 top-full mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-50">
        <ul class="py-2 text-sm text-gray-700 max-h-60 overflow-y-auto">
            @foreach (range(36, 44) as $size)
                <li>
                    <button class="size-option w-full text-left px-4 py-2 hover:bg-gray-100">
                        {{ $size }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script
<script>
    $(document).ready(function() {
        // Ketika tombol diklik, toggle dropdown
        $('#toggleButton').click(function(e) {
            e.stopPropagation(); // biar gak nutup langsung
            $('#sizeDropdown').toggleClass('hidden');
        });

        // Klik di luar dropdown untuk menutup
        $(document).click(function(event) {
            if (!$(event.target).closest('#sizeDropdown, #toggleButton').length) {
                $('#sizeDropdown').addClass('hidden');
            }
        });

        // Pilih ukuran dan update teks tombol
        $('.size-option').click(function() {
            var selectedSize = $(this).text();
            $('#toggleButton').text('Ukuran: ' + selectedSize);
            $('#sizeDropdown').addClass('hidden');
        });
    });
</script>-->


    </div>




      <div class="space-y-4" id="accordion">
        <div class="accordion-item border-b border-gray-300 pb-2">
          <div class="flex justify-between font-medium text-sm md:text-base cursor-pointer">
            <span>Please Make Sure The Size Fits You.</span>
            <button class="accordion-toggle text-xl font-bold">+</button>
          </div>
        <div class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-in-out text-sm text-gray-600">
      <p class="pt-2">
        If you are unsure about your size, please click the size chart button and browse through the chart to find your correct measurements. Our company policy does not accept refunds or returns for sizing-related issues. For more details, kindly contact our Customer Service to consult further.
      </p>
    </div>
  </div>

      <div class="accordion-item border-b border-gray-300 pb-2">
        <div class="flex justify-between font-medium text-sm md:text-base cursor-pointer">
          <span>Authentic. Guaranteed.</span>
          <button class="accordion-toggle text-xl font-bold">+</button>
        </div>
        <div class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-in-out text-sm text-gray-600">
          <p class="pt-2">
            All products sold are 100% authentic and verified by our team of experts. We guarantee original items only.
          </p>
        </div>
      </div>
    </div>


      <div class="mt-6">
        <p class="mb-3">Share this product to your friends!</p>
        <div class="flex gap-4 items-center">
          <img src="/images/instagram.png" alt="Instagram" class="w-7 md:w-8" />
          <img src="/images/facebook.png" alt="Facebook" class="w-7 md:w-8" />
          <img src="/images/whatsapp.png" alt="WhatsApp" class="w-7 md:w-8" />
          <img src="/images/twitter.png" alt="Twitter" class="w-7 md:w-8" />
          <img src="/images/email.png" alt="Email" class="w-7 md:w-8" />
        </div>
      </div>
    </div>
  </div>
</section>

      <div class="mt-20">
  <h2 class="text-2xl font-bold mb-2">Description</h2>
  <hr class="border-t-2 border-gray-300 mb-4" />
  <p class="text-base leading-relaxed">
  Air Jordan 1 Retro Low OG SP Travis Scott Velvet Brown blends Travis Scott’s signature style with
  Jordan Brand’s iconic silhouette. Featuring a reversed Swoosh, premium suede in earthy tones, and
  Cactus Jack branding, this low-top delivers both standout looks and everyday comfort. A must-have
  for fans and collectors alike.
  </p>
</div>

      <section class="mb-20 mt-16">
        <div class="border border-gray-300 rounded-xl overflow-hidden mt-8">
          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6">
            <div class="p-4 text-center border-r border-b border-gray-300">
              <strong class="block text-base mb-2">SKU</strong>
              <div class="text-sm">DM7866 202</div>
            </div>
            <div class="p-4 text-center border-r border-b border-gray-300">
              <strong class="block text-base mb-2">Color</strong>
              <div class="text-sm">DARK MOCHA/BLACK/VELVET BROWN</div>
            </div>
            <div class="p-4 text-center border-r border-b border-gray-300">
              <strong class="block text-base mb-2">Material</strong>
              <div class="text-sm">-</div>

            </div>
            <div class="p-4 text-center border-r border-b border-gray-300">
              <strong class="block text-base mb-2">Dimension</strong>
              <div class="text-sm">-</div>
            </div>
            <div class="p-4 text-center border-r border-b border-gray-300">
              <strong class="block text-base mb-2">Release Date</strong>
              <div class="text-sm">-</div>
            </div>
            <div class="p-4 text-center border-b border-gray-300">
              <strong class="block text-base mb-2">Retail (approx).</strong>
              <div class="text-sm">-</div>
            </div>
          </div>
        </div>
      </section>

      <section class="bg-gradient-to-b from-white via-[#f9f9f9] to-white py-10">
      <h3 class="text-sm text-center mb-6 font-semibold">Similar Products</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-x-20 gap-y-10">

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/20JT/22,000,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
           <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Retro Low OG SP Travis Scott</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 22,000,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/7JT/7,950,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Retro Low OG SP Travis Scott Medium Olive</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 7,950,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/15JT/15,700,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Retro Low OG SP Travis Scott Reverse Mocha</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 15,700,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/5JT/5,790,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Retro Low OG Zion Williamson Voodoo</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 5,790,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/100JT/130,000,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Retro High Off-White White</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 130,000,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/20JT/20,000,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Low Fragment x Travis Scott</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 20,000,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/100JT/187,500,000.png" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 1 Retro Low Dior</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 187,500,000</div>
            </div>
          </a>
        </div>

        <div class="text-left">
          <a href="#" class="text-black no-underline">
           <img src="/images/5JT/5,290,000.jpeg" alt="..." class="rounded-xl w-40 md:w-52 lg:w-64 mx-auto" />
            <div class="mt-3">
             <div class="text-xs font-bold min-h-[40px]">Air Jordan 4 Retro SB Pine Green</div>
              <div class="text-green-600 font-bold text-sm mt-1">IDR 5,290,000</div>
            </div>
          </a>
        </div>

  </div>
</section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @vite('resources/js/swiper1page.js')

  </body>
</html>

@include('partial.footer')
