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
<body class="bg-gray-50 text-gray-900 font-sans">
  <div class="max-w-screen-xl mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row items-start gap-12">

      <!-- Sidebar Filter -->
      <aside class="w-full lg:w-80 bg-white rounded-2xl shadow-md p-6 space-y-10 text-base self-start">

      <!-- Category Filter -->
      <div class="space-y-4">
        <h2 class="text-xl font-semibold">Category</h2>
      <div class="flex flex-wrap gap-4">
       <button class="px-3 py-1.5 rounded-md bg-white text-black text-sm font-medium border hover:bg-black hover:text-white">
        Sneakers
      </button>
        <button class="px-3 py-1.5 rounded-md bg-white text-black text-sm font-medium border hover:bg-black hover:text-white">
        Apparel
      </button>
    <button class="px-3 py-1.5 rounded-md bg-white text-black text-sm font-medium border hover:bg-black hover:text-white">
      Luxury
    </button>
  </div>
</div>



        <!-- Size & Gender Tabs -->
<div class="space-y-4">
  <h2 class="text-xl font-semibold">Size</h2>

  <!-- Gender Tabs -->
  <div class="flex space-x-6 border-b text-sm font-medium">
    <button class="pb-2 border-b-2 border-black text-black">Men</button>
    <button class="pb-2 text-gray-400 hover:text-black">Women</button>
    <button class="pb-2 text-gray-400 hover:text-black">Youth/Toddler</button>
  </div>

  <!-- Size Options -->
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
        <div>
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

        <!-- Color Filter -->
        <div>
            <h2 class="text-xl font-semibold mb-4">Color</h2>
            <div class="flex flex-wrap gap-3">
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-green-600 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-blue-600 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-pink-300 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-red-600 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-purple-700 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-yellow-400 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
              <label class="relative cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <span class="w-6 h-6 rounded-full bg-red-800 block peer-checked:ring-2 peer-checked:ring-black"></span>
              </label>
            </div>
          </div>

        <!-- Brand Filter -->
        <div>
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
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Available Sneakers</h2>
            <select class="border px-4 py-2 rounded-md text-sm">
              <option>Sort: Featured Items</option>
              <option>Price: Low to High</option>
              <option>Price: High to Low</option>
              <option>Newest</option>
            </select>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
          <!-- Product Card -->
              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>

              <div class="bg-white rounded-2xl p-4 transition duration-300">
                
                <!-- Bungkus gambar dan teks dengan width tetap -->
                <div class="w-[200px]">
                  
                  <!-- Gambar -->
                  <div class="w-full h-40 overflow-hidden rounded-xl">
                    <img src="/images/20JT/22,000,000.png" alt="Product" class="w-full h-full object-contain" />
                  </div>

                  <!-- Teks -->
                  <div class="w-full mt-4 space-y-1">
                    <h3 class="text-sm font-medium break-words">
                      New Balance 530 Arid Stone travis scottt oye banget
                    </h3>
                    <p class="text-green-600 font-bold text-sm">IDR 1,000,000</p>
                  </div>

                </div>

              </div>


          </div>

        </div>
      </section>
    </div>
  </div>
</body>
</html>

@include('partial.footer')
