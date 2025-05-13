<!DOCTYPE html>
<html lang="en">
@include('partial.sticknavbar')
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


      <!-- Select Gender -->
<div class="space-y-4" data-aos="fade-down" data-aos-delay="150">
  <h2 class="text-xl font-semibold text-gray-800">Select Gender</h2>

  <div class="flex gap-2">
    <label class="flex-1">
      <input type="radio" name="gender" value="men" class="peer hidden" />
      <div class="w-full text-center border border-gray-300 rounded-lg py-3 text-sm font-medium text-gray-600
                  peer-checked:bg-gray-900 peer-checked:text-white 
                  hover:bg-gray-100 transition duration-200 cursor-pointer">
        Men
      </div>
    </label>

    <label class="flex-1">
      <input type="radio" name="gender" value="women" class="peer hidden" />
      <div class="w-full text-center border border-gray-300 rounded-lg py-3 text-sm font-medium text-gray-600
                  peer-checked:bg-gray-900 peer-checked:text-white 
                  hover:bg-gray-100 transition duration-200 cursor-pointer">
        Women
      </div>
    </label>

    <label class="flex-1">
      <input type="radio" name="gender" value="youth" class="peer hidden" />
      <div class="w-full text-center border border-gray-300 rounded-lg py-3 text-sm font-medium text-gray-600
                  peer-checked:bg-gray-900 peer-checked:text-white 
                  hover:bg-gray-100 transition duration-200 cursor-pointer">
        Youth
      </div>
    </label>
  </div>
</div>



        <!-- Size -->
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-xl font-semibold">Size</h2>
            <div class="grid grid-cols-4 gap-3 pt-2">
              <!-- Ukuran 20 -->
              <label>
                <input type="radio" name="size" value="20" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  20
                </div>
              </label>

              <!-- Ukuran 21 -->
              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  21
                </div>
              </label>

              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  22
                </div>
              </label>

              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  23
                </div>
              </label>

              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  24
                </div>
              </label>

              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  25
                </div>
              </label>

              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  26
                </div>
              </label>

              <label>
                <input type="radio" name="size" value="21" class="peer hidden" />
                <div class="border rounded-md py-3 text-base text-center cursor-pointer text-gray-700 border-gray-300 peer-checked:bg-black peer-checked:text-white transition">
                  27
                </div>
              </label>
            </div>
          </div>


        <!-- Discount Filter -->
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
        <h2 class="text-xl font-semibold text-gray-800">Discount</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">

            <!-- Any -->
            <label>
              <input type="radio" name="discount" value="any" class="sr-only peer" checked>
              <div class="w-full py-3 text-sm font-medium text-center rounded-xl border border-gray-300 bg-gray-100 text-gray-700 peer-checked:bg-gray-800 peer-checked:text-white transition-all cursor-pointer">
                Any
              </div>
            </label>

            <!-- 10%+ -->
            <label>
              <input type="radio" name="discount" value="10" class="sr-only peer">
              <div class="w-full py-3 text-sm font-medium text-center rounded-xl border border-green-300 bg-green-50 text-green-700 peer-checked:bg-green-600 peer-checked:text-white transition-all cursor-pointer">
                10%+
              </div>
            </label>

            <!-- 25%+ -->
            <label>
              <input type="radio" name="discount" value="25" class="sr-only peer">
              <div class="w-full py-3 text-sm font-medium text-center rounded-xl border border-blue-300 bg-blue-50 text-blue-700 peer-checked:bg-blue-600 peer-checked:text-white transition-all cursor-pointer">
                25%+
              </div>
            </label>

            <!-- 50%+ -->
            <label>
              <input type="radio" name="discount" value="50" class="sr-only peer">
              <div class="w-full py-3 text-sm font-medium text-center rounded-xl border border-red-300 bg-red-50 text-red-700 peer-checked:bg-red-600 peer-checked:text-white transition-all cursor-pointer">
                50%+
              </div>
            </label>

          </div>
        </div>




        <!-- Price Filter -->
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="300">
          <h2 class="text-xl font-semibold text-gray-800">Price Range</h2>

          <div class="relative">
            <select class="w-full appearance-none px-4 py-3 pr-10 rounded-xl border border-gray-300 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-black shadow-sm">
              <option value="">Select a range</option>
              <option value="0-1000000">💸 Below IDR 1.000.000</option>
              <option value="1000000-3000000">💰 IDR 1.000.000 – 3.000.000</option>
              <option value="3000000-5000000">💼 IDR 3.000.000 – 5.000.000</option>
              <option value="5000000-10000000">💎 IDR 5.000.000 – 10.000.000</option>
              <option value="10000000+">🛍️ Above IDR 10.000.000</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
        </div>




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


        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>
       
  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
  </div>

  <!-- Kartu Produk 1 -->
  <div class="rounded-xl border border-gray-200 p-3 shadow-sm hover:shadow-md transition bg-white">
    <div class="mb-2">
      <span class="inline-block bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded">
        10%
      </span>
    </div>
    <div class="w-full h-28 flex items-center justify-center overflow-hidden mb-3">
      <img src="/images/youth adidas/2,920,000(1).webp" alt="Product" class="object-contain h-full" />
    </div>
    <h3 class="text-sm font-semibold text-gray-800 leading-snug">
      Yeezy Boost 350 V2 Dazling Blue (Toddler)
    </h3>
    <p class="text-green-600 text-sm font-bold mt-1">
      IDR 2,920,000
    </p>
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