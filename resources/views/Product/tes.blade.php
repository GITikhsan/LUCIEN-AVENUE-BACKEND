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

        <!-- Category Filter -->
        <div class="space-y-4">
          <h2 class="text-xl font-semibold" data-aos="fade-down" data-aos-delay="100">Category</h2>
          <div class="flex flex-wrap gap-4">
            <button class="px-3 py-1.5 rounded-md bg-white text-black text-sm font-medium border hover:bg-black hover:text-white">Sneakers</button>
            <button class="px-3 py-1.5 rounded-md bg-white text-black text-sm font-medium border hover:bg-black hover:text-white">Apparel</button>
            <button class="px-3 py-1.5 rounded-md bg-white text-black text-sm font-medium border hover:bg-black hover:text-white">Luxury</button>
          </div>
        </div>

        <!-- Size & Gender Tabs -->
        <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
          <h2 class="text-xl font-semibold">Size</h2>
          <div class="flex space-x-6 border-b text-sm font-medium">
            <button class="pb-2 border-b-2 border-black text-black">Men</button>
            <button class="pb-2 text-gray-400 hover:text-black">Women</button>
            <button class="pb-2 text-gray-400 hover:text-black">Youth/Toddler</button>
          </div>
          <div class="grid grid-cols-4 gap-3 pt-2">
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">4</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">4.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">5.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">6</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">6.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">13</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">13.5</button>
          </div>
        </div>

        <!-- Price Filter -->
        <div data-aos="fade-up" data-aos-delay="300">
          <h2 class="text-xl font-semibold mb-4">Price Range</h2>
          <div class="flex flex-col space-y-5">
            <div class="relative">
              <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-sm">IDR</span>
              <input type="number" placeholder="Minimum Price" class="w-full pl-16 pr-4 py-2 border rounded-lg text-sm" />
            </div>
            <div class="relative">
              <span class="absolute inset-y-0 left-4 flex items-center text-gray-400 text-sm">IDR</span>
              <input type="number" placeholder="Maximum Price" class="w-full pl-16 pr-4 py-2 border rounded-lg text-sm" />
            </div>
          </div>
        </div>

        <!-- Color Filter with ring pulse -->
        <div data-aos="fade-up" data-aos-delay="400">
          <h2 class="text-xl font-semibold mb-4">Color</h2>
          <div class="flex flex-wrap gap-3">
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-green-600 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-blue-600 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-pink-300 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-red-600 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-purple-700 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-yellow-400 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
            <label class="relative cursor-pointer"><input type="checkbox" class="sr-only" /><span class="w-6 h-6 rounded-full bg-red-800 block peer-checked:ring-2 peer-checked:ring-black"></span></label>
          </div>
        </div>

        <!-- Brand Filter -->
        <div data-aos="fade-up" data-aos-delay="500">
          <h2 class="text-xl font-semibold mb-4">Brands</h2>
          <div class="flex flex-col space-y-3 text-sm">
            <label><input type="checkbox" class="mr-2">Nike</label>
            <label><input type="checkbox" class="mr-2">Adidas</label>
            <label><input type="checkbox" class="mr-2">Air Jordan</label>
            <label><input type="checkbox" class="mr-2">Yeezy</label>
          </div>
        </div>
      </aside>

      <!-- Product Section -->
      <section class="flex-1">
        <div class="flex justify-between items-center mb-6" data-aos="fade-down" data-aos-delay="100">
          <h2 class="text-xl font-semibold">Available Sneakers</h2>
          <select class="border px-4 py-2 rounded-md text-sm">
            <option>Sort: Featured Items</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Newest</option>
          </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">

          <!-- Product Card 1 -->
          <div class="bg-white rounded-2xl p-4 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg" data-aos="fade-up" data-aos-delay="100">
            <div class="w-[200px]">
              <div class="w-full h-40 overflow-hidden rounded-xl">
                <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
              </div>
              <div class="w-full mt-4 space-y-1">
                <h3 class="text-sm font-medium break-words">New Balance 530 Arid Stone travis scottt oye banget</h3>
                <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
              </div>
            </div>
          </div>

          <!-- Tambahkan lebih banyak produk di sini dengan delay berbeda -->
          <div class="bg-white rounded-2xl p-4 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg" data-aos="zoom-in" data-aos-delay="200">
            <div class="w-[200px]">
              <div class="w-full h-40 overflow-hidden rounded-xl">
                <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
              </div>
              <div class="w-full mt-4 space-y-1">
                <h3 class="text-sm font-medium break-words">Nike Air Max Zoom 2024 Limited</h3>
                <p class="text-green-600 font-bold text-sm">IDR 2,000,000</p>
              </div>
            </div>
          </div>

          <!-- Produk berikut bisa lanjut dengan data-aos-delay 300, 400, dst. -->

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
