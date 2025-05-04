<!DOCTYPE html>
<html lang="en">
@include('partial.navbar')
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sneaker Filter Page</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS Animate on Scroll -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

  <style>
    input::-webkit-inner-spin-button,
    input::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield;
    }
    .active {
      @apply bg-black text-white;
    }

    /* Ring pulse for color selection */
    input:checked + span {
      animation: ringPulse 0.3s ease;
    }
    @keyframes ringPulse {
      0% {
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
      }
      100% {
        box-shadow: 0 0 0 6px rgba(0, 0, 0, 0);
      }
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-900 font-sans">
  <div class="max-w-screen-xl mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row items-start gap-12">

      <!-- Sidebar Filter with slide-in -->
      <aside class="w-full lg:w-80 bg-white rounded-2xl shadow-md p-6 space-y-10 text-base self-start" data-aos="fade-right" data-aos-duration="800">


      <!-- select gender -->
      <div class="space-y-4" data-aos="fade-down" data-aos-delay="150">
  <h2 class="text-xl font-semibold text-gray-800">Select Gender</h2>

  <div class="grid grid-cols-3 gap-2">
    <label class="block cursor-pointer border border-gray-300 rounded-lg text-center py-3 text-sm font-medium text-gray-600 hover:bg-black hover:text-white transition">
      <input type="radio" name="gender" value="men" class="sr-only peer">
      <span class="block peer-checked:text-white peer-checked:bg-black rounded-lg">Men</span>
    </label>

    <label class="block cursor-pointer border border-gray-300 rounded-lg text-center py-3 text-sm font-medium text-gray-600 hover:bg-black hover:text-white transition">
      <input type="radio" name="gender" value="women" class="sr-only peer">
      <span class="block peer-checked:text-white peer-checked:bg-black rounded-lg">Women</span>
    </label>

    <label class="block cursor-pointer border border-gray-300 rounded-lg text-center py-3 text-sm font-medium text-gray-600 hover:bg-black hover:text-white transition">
      <input type="radio" name="gender" value="toddler" class="sr-only peer">
      <span class="block peer-checked:text-white peer-checked:bg-black rounded-lg">Toddler</span>
    </label>
  </div>
</div>



        <!-- Size -->
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
          <h2 class="text-xl font-semibold">Size</h2>
          <div class="grid grid-cols-4 gap-3 pt-2">
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">35</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">36</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">37</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">38</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">39</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">40</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">41</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">42</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">43</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">44</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">45</button>
          </div>
        </div>

        <!-- Discount -->
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-xl font-semibold text-gray-800">Discount</h2>
        <div class="flex gap-2 bg-white/30 backdrop-blur-md p-2 rounded-xl border border-gray-200 shadow-sm">
          <button class="flex-1 px-3 py-2 text-sm rounded-lg text-gray-700 hover:bg-black hover:text-white transition focus:outline-none focus:ring-2 focus:ring-black">Any</button>
          <button class="flex-1 px-3 py-2 text-sm rounded-lg text-green-700 hover:bg-green-600 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-green-600">10%+</button>
          <button class="flex-1 px-3 py-2 text-sm rounded-lg text-blue-700 hover:bg-blue-600 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-blue-600">25%+</button>
          <button class="flex-1 px-3 py-2 text-sm rounded-lg text-red-700 hover:bg-red-600 hover:text-white transition focus:outline-none focus:ring-2 focus:ring-red-600">50%+</button>
        </div>
      </div>


        <!-- Price Filter -->
        <div data-aos="fade-up" data-aos-delay="300">
  <h2 class="text-xl font-semibold text-gray-800 mb-4">Price Range</h2>

  <!-- Display values -->
  <div class="flex justify-between mb-4 text-sm text-gray-600 font-medium">
    <span>Min: <span id="minPriceDisplay">IDR 0</span></span>
    <span>Max: <span id="maxPriceDisplay">IDR 100.000.000</span></span>
  </div>

  <!-- Sliders -->
  <div class="space-y-6 max-w-md">
    <input id="minPrice" type="range" min="0" max="100000000" value="0" step="500000"
      class="w-full accent-black cursor-pointer">
    <input id="maxPrice" type="range" min="0" max="100000000" value="100000000" step="500000"
      class="w-full accent-black cursor-pointer">
  </div>
</div>

<script>
  const minSlider = document.getElementById('minPrice');
  const maxSlider = document.getElementById('maxPrice');
  const minDisplay = document.getElementById('minPriceDisplay');
  const maxDisplay = document.getElementById('maxPriceDisplay');

  function formatIDR(value) {
    return 'IDR ' + parseInt(value).toLocaleString('id-ID');
  }

  function updateDisplay() {
    const min = parseInt(minSlider.value);
    const max = parseInt(maxSlider.value);

    const snappedMin = Math.round(min / 500000) * 500000;
    const snappedMax = Math.round(max / 500000) * 500000;

    minSlider.value = snappedMin;
    maxSlider.value = snappedMax;

    if (snappedMin > snappedMax) maxSlider.value = snappedMin;
    if (snappedMax < snappedMin) minSlider.value = snappedMax;

    minDisplay.textContent = formatIDR(minSlider.value);
    maxDisplay.textContent = formatIDR(maxSlider.value);
  }

  minSlider.addEventListener('input', updateDisplay);
  maxSlider.addEventListener('input', updateDisplay);

  updateDisplay(); // initial sync
</script>



        <!-- Color Filter with ring pulse -->
        <div data-aos="fade-up" data-aos-delay="400">
          <h2 class="text-xl font-semibold mb-4 text-gray-800">Color</h2>
          <div class="flex flex-wrap gap-3">
            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-green-600 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>

            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-blue-600 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>

            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-pink-300 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>

            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-red-600 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>

            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-purple-700 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>

            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-yellow-400 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>

            <label class="relative cursor-pointer">
              <input type="checkbox" class="peer sr-only" />
              <span class="w-7 h-7 rounded-full bg-red-800 block transition-all duration-200 peer-checked:ring-2 peer-checked:ring-black hover:scale-110"></span>
            </label>
          </div>
        </div>


        <!-- Brand Filter -->
        <div data-aos="fade-up" data-aos-delay="500">
          <h2 class="text-xl font-semibold mb-4">Brands</h2>
          <div class="flex flex-col gap-y-5 text-sm">
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="accent-black w-4 h-4">
              <span>Nike</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="accent-black w-4 h-4">
              <span>Adidas</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="accent-black w-4 h-4">
              <span>Air Jordan</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="accent-black w-4 h-4">
              <span>Yeezy</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer">
              <input type="checkbox" class="accent-black w-4 h-4">
              <span>New Balance</span>
            </label>
          </div>
        </div>

      </aside>

      <!-- Product Section -->
      <section class="flex-1">
      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4" data-aos="fade-down" data-aos-delay="100">
  <h2 class="text-xl font-semibold text-gray-800">Available Sneakers</h2>
  
  <div class="relative">
    <select class="appearance-none bg-gray-100 border border-gray-300 text-sm text-gray-700 rounded-xl px-4 py-2 pl-3 pr-10 shadow-sm focus:outline-none focus:ring-2 focus:ring-black focus:border-black transition">
      <option>Sort: Featured Items</option>
      <option>Price: Low to High</option>
      <option>Price: High to Low</option>
      <option>Newest</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
      <!-- Tailwind's built-in chevron -->
      <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
</div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

          <!-- Product Card 1 -->
          <div class="border border-neutral-200 rounded-xl p-3 w-full max-w-xs hover:shadow-md transition duration-300" data-aos="fade-up" data-aos-delay="100">

          <!-- Diskon -->
          <div class="mb-2">
            <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded">
              10% OFF
            </span>
          </div>

          <!-- Gambar -->
          <div class="w-full h-40 flex items-center justify-center overflow-hidden mb-3">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="h-full object-contain" />
          </div>

          <!-- Nama Produk -->
          <h3 class="text-[15px] font-medium text-gray-900 leading-tight break-words">
            New Balance 530 Arid Stone Travis Scott Oye Banget
          </h3>

          <!-- Harga -->
          <p class="text-[16px] font-semibold text-green-600 mt-1">
            IDR 1,000,000
          </p>

        </div>

          <!-- Product Card 2 -->
          <div class="border border-neutral-200 rounded-xl p-3 w-full max-w-xs hover:shadow-md transition duration-300" data-aos="fade-up" data-aos-delay="200">

          <!-- Diskon -->
          <div class="mb-2">
            <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded">
              10% OFF
            </span>
          </div>

          <!-- Gambar -->
          <div class="w-full h-40 flex items-center justify-center overflow-hidden mb-3">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="h-full object-contain" />
          </div>

          <!-- Nama Produk -->
          <h3 class="text-[15px] font-medium text-gray-900 leading-tight break-words">
            New Balance 530 Arid Stone Travis Scott Oye Banget
          </h3>

          <!-- Harga -->
          <p class="text-[16px] font-semibold text-green-600 mt-1">
            IDR 1,000,000
          </p>

          </div>
        
          <!-- Product Card 3 -->
          <div class="border border-neutral-200 rounded-xl p-3 w-full max-w-xs hover:shadow-md transition duration-300" data-aos="fade-up" data-aos-delay="300">

          <!-- Diskon -->
          <div class="mb-2">
            <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded">
              10% OFF
            </span>
          </div>

          <!-- Gambar -->
          <div class="w-full h-40 flex items-center justify-center overflow-hidden mb-3">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="h-full object-contain" />
          </div>

          <!-- Nama Produk -->
          <h3 class="text-[15px] font-medium text-gray-900 leading-tight break-words">
            New Balance 530 Arid Stone Travis Scott Oye Banget
          </h3>

          <!-- Harga -->
          <p class="text-[16px] font-semibold text-green-600 mt-1">
            IDR 1,000,000
          </p>

        </div>

        <!-- Product Card 4 -->
        <div class="border border-neutral-200 rounded-xl p-3 w-full max-w-xs hover:shadow-md transition duration-300" data-aos="fade-up" data-aos-delay="400">

        <!-- Diskon -->
        <div class="mb-2">
          <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded">
            10% OFF
          </span>
        </div>

        <!-- Gambar -->
        <div class="w-full h-40 flex items-center justify-center overflow-hidden mb-3">
          <img src="/images/20JT/22,000,000.png" alt="Product" class="h-full object-contain" />
        </div>

        <!-- Nama Produk -->
        <h3 class="text-[15px] font-medium text-gray-900 leading-tight break-words">
          New Balance 530 Arid Stone Travis Scott Oye Banget
        </h3>

        <!-- Harga -->
        <p class="text-[16px] font-semibold text-green-600 mt-1">
          IDR 1,000,000
        </p>

        </div>

        </div>
      </section>
    </div>
  </div>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true,
      easing: 'ease-in-out'
    });
  </script>
</body>
</html>

@include('partial.footer')