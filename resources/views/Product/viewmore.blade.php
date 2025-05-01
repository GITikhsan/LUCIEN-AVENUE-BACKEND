<!DOCTYPE html>
<html lang="en">
@include('partial.navbar')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sneaker Filter Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
  </style>
</head>
<body class="bg-white text-gray-900">
  <div class="max-w-screen-xl mx-auto px-2 py-6">
    <div class="flex flex-col lg:flex-row gap-10">

      <!-- Sidebar Filter -->
      <aside class="w-full lg:w-80 space-y-12 text-base">

        <!-- Size Filter -->
        <div>
          <h2 class="text-xl font-semibold mb-4">Size</h2>
          <div class="grid grid-cols-4 gap-3">
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">4</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">4.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">5.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">6</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">6.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">7</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">7.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">8</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">8.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">9</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">9.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">10</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">10.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">11</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">11.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">12</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">12.5</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">13</button>
            <button class="border rounded-md py-3 text-base hover:bg-black hover:text-white">13.5</button>
          </div>
        </div>

        <!-- Price Filter -->
        <div>
          <h2 class="text-xl font-semibold mb-4">Price Range</h2>
          <div class="flex flex-col space-y-5">
            <div class="relative">
              <span class="absolute left-4 top-3 text-gray-300 text-lg">IDR</span>
              <input type="number" placeholder="Minimum Price" class="appearance-none w-full pl-20 pr-4 py-3 border rounded-md placeholder-gray-300 text-lg font-medium" />
            </div>
            <div class="relative">
              <span class="absolute left-4 top-3 text-gray-300 text-lg">IDR</span>
              <input type="number" placeholder="Maximum Price" class="appearance-none w-full pl-20 pr-4 py-3 border rounded-md placeholder-gray-300 text-lg font-medium" />
            </div>
          </div>
        </div>

        <!-- Brand Filter -->
        <div>
          <h2 class="text-xl font-semibold mb-4">Brands</h2>
          <div class="flex flex-col space-y-3 text-base">
            <label><input type="checkbox" class="mr-2">Nike</label>
            <label><input type="checkbox" class="mr-2">Adidas</label>
            <label><input type="checkbox" class="mr-2">New Balance</label>
            <label><input type="checkbox" class="mr-2">ASICS</label>
            <label><input type="checkbox" class="mr-2">Onitsuka Tiger</label>
            <label><input type="checkbox" class="mr-2">Puma</label>
          </div>
        </div>

      </aside>

      <!-- Product Section -->
      <section class="flex-1">
        <div class="flex justify-between items-center mb-6">
          
          <select class="border px-4 py-2 rounded-md text-sm">
            <option>Sort: Featured Items</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Newest</option>
          </select>
        </div>

        <div class="grid grid-cols-4 gap-4">
          <!-- Product Card -->
          <div class="flex flex-col items-start">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-40 object-cover rounded-lg">
            <div class="mt-2">
              <h3 class="text-xs font-medium">New Balance 530 Arid Stone</h3>
              <p class="text-green-600 font-bold text-xs mt-2">IDR 1,000,000</p>
            </div>
          </div>
        
          <div class="flex flex-col items-start">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-40 object-cover rounded-lg">
            <div class="mt-2">
              <h3 class="text-xs font-medium">New Balance 530 Arid Stone</h3>
              <p class="text-green-600 font-bold text-xs mt-2">IDR 1,000,000</p>
            </div>
          </div>

          <div class="flex flex-col items-start">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-40 object-cover rounded-lg">
            <div class="mt-2">
              <h3 class="text-xs font-medium">New Balance 530 Arid Stone</h3>
              <p class="text-green-600 font-bold text-xs mt-2">IDR 1,000,000</p>
            </div>
          </div>

          <div class="flex flex-col items-start">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-40 object-cover rounded-lg">
            <div class="mt-2">
              <h3 class="text-xs font-medium">New Balance 530 Arid Stone</h3>
              <p class="text-green-600 font-bold text-xs mt-2">IDR 1,000,000</p>
            </div>
          </div>

          <div class="flex flex-col items-start">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-40 object-cover rounded-lg">
            <div class="mt-2">
              <h3 class="text-xs font-medium">New Balance 530 Arid Stone</h3>
              <p class="text-green-600 font-bold text-xs mt-2">IDR 1,000,000</p>
            </div>
          </div>

          <div class="flex flex-col items-start">
            <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-40 object-cover rounded-lg">
            <div class="mt-2">
              <h3 class="text-xs font-medium">New Balance 530 Arid Stone</h3>
              <p class="text-green-600 font-bold text-xs mt-2">IDR 1,000,000</p>
            </div>
          </div>
        
          
        </div>
      </section>

    </div>
  </div>
</body>
</html>
