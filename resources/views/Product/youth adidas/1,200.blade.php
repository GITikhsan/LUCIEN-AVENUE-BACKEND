<!DOCTYPE html>
<html lang="en">
@include('partial.sticknavbar')

    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beli Adidas Gazelle J Night Indigo Cloud White (Grade School)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="{{ asset('css/btnswiper.css')}}" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    .fade-section {
      opacity: 0;
      transform: translateY(20px);
      transition: all 1.2s ease-out;
    }

    .animate-in {
      opacity: 1;
      transform: translateY(0);
    }
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
  </style>
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
  </head>

  <body class="font-sans text-black text-sm bg-white snap-y snap-mandatory overflow-y-scroll">
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
              <img src="/images/youth adidas/1,200,000(1).webp" alt="" class="w-full h-auto object-contain" />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container zoom-follow">
              <img src="/images/youth adidas/1,200,000(2).webp" alt="" class="w-full h-auto object-contain" />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container zoom-follow">
              <img src="/images/youth adidas/1,200,000(3).webp" alt="" class="w-full h-auto object-contain" />
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
    <div class=" flex-1 min-w-[320px] space-y-5 md:pl-6">
      <h2 class=" text-2xl font-semibold leading-snug">
        Adidas Gazelle J Night Indigo Cloud White (Grade School)
      </h2>

     <!-- Harga -->
      <div class="mb-6">
        <div class=" flex items-center gap-2 mb-1">
          <p class=" text-sm text-gray-500 font-medium uppercase tracking-wide">Price</p>
          <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-sm leading-none">32% OFF</span>
        </div>

        <div class=" flex items-baseline gap-2">
          <p class=" text-base text-gray-400 line-through">IDR 1.764.705</p>
          <p class=" text-2xl font-semibold text-gray-900">IDR 1,200,000</p>
        </div>
      </div>


    <!-- Pilih Size -->
    <div class=" mb-6">
      <p class=" text-sm text-gray-700 font-medium mb-2">Select Size</p>
      <div class=" flex flex-wrap gap-2">
        <button class="size-button px-3 py-2 border border-gray-300 rounded-md text-gray-700 text-sm hover:bg-black hover:text-white transition-all">20</button>
        <button class="size-button px-3 py-2 border border-gray-300 rounded-md text-gray-700 text-sm hover:bg-black hover:text-white transition-all">21</button>
        <button class="size-button px-3 py-2 border border-gray-300 rounded-md text-gray-700 text-sm hover:bg-black hover:text-white transition-all">22</button>
        <button class="size-button px-3 py-2 border border-gray-300 rounded-md text-gray-700 text-sm hover:bg-black hover:text-white transition-all">23</button>
        <button class="size-button px-3 py-2 border border-gray-300 rounded-md text-gray-700 text-sm hover:bg-black hover:text-white transition-all">24</button>
      </div>
      <p id="selected-size" class="text-xs text-gray-500 mt-2"></p>
    </div>

    <div>
        <p class="text-sm text-gray-700 font-medium mb-2">Quantity</p>
        <div class="flex items-center gap-2">
        <button id="decrease" class="w-8 h-8 flex items-center justify-center border rounded-md text-black  hover:bg-black hover:text-white">-</button>
        <input
            id="quantity"
            type="number"
            value="1"
            min="1"
            class="w-10 h-8 text-center border rounded-md focus:outline-none focus:ring-2 focus:ring-black appearance-none"/>
        <button id="increase" class="w-8 h-8 flex items-center justify-center border rounded-md  text-black  hover:bg-black hover:text-white">+</button>
        </div>
    </div>


<!-- Tambahkan jQuery di layout utama -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tombol Add to Cart & Buy Now -->
<div class="flex flex-col md:flex-row gap-4">
  <button class="w-full bg-black text-white py-3 rounded-full font-semibold text-sm hover:bg-gray-800 transition-all">
    Add to Cart
  </button>

  <button id="openModalBtn" class="w-full bg-yellow-400 text-black py-3 rounded-full font-semibold text-sm hover:bg-yellow-500 transition-all">
    Buy Now
  </button>
</div>

<!-- Modal -->
<div id="agreementModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white rounded-lg shadow-xl max-w-lg w-full p-6 relative">
    <!-- Tombol Close -->
    <button class="absolute top-3 right-3 closeModalBtn
               w-6 h-6 p-1 border border-gray-800 rounded-full flex items-center justify-center
               text-gray-800 hover:text-white hover:bg-black transition">
  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
  </svg>
</button>


    <h2 class="text-2xl font-bold mb-4">Buyer’s Agreement</h2>

    <div class="space-y-4 text-sm text-gray-700">
      <div>
        <strong class="block font-semibold">You Are Buying AUTHENTIC Product</strong>
        <p>I understand products are authenticated but may have minor wear or imperfections.</p>
      </div>
      <div>
        <strong class="block font-semibold">You Have Reviewed Product Details</strong>
        <p>I’ve reviewed images, name, SKU, size, and condition before purchase.</p>
      </div>
      <div>
        <strong class="block font-semibold">You Are Aware of The RETURN Policy</strong>
        <p>I accept returns are limited by Lucien Avenue’s policy.</p>
      </div>
      <div>
        <strong class="block font-semibold">You Understand Shipping and Handling Processes</strong>
        <p>I understand shipping delays by third–party couriers are beyond Lucien Avenue’s control.</p>
      </div>
      <div>
        <strong class="block font-semibold">Lucien Avenue is Not Liable For Seller’s Compliance</strong>
        <p>While Lucien Avenue ensures sellers follow Indonesian laws, it is not liable for non-compliance beyond these assurances.</p>
      </div>

      <p>By proceeding, I agree to all <a href="#" class="underline text-blue-600">terms and conditions</a> governing the sale and use of the Lucien Avenue platform.</p>
    </div>

    <button id="open-payment" class="w-full bg-green-600 text-white py-2 rounded-full text-lg font-medium hover:bg-green-700 transition-all">
      Proceed →
    </button>
  </div>
</div>

<div id="payment-up" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full p-6 relative">

        <!-- Address Box -->
        <div class="border border-red-200 rounded-xl p-4 bg-red-50 mb-5" id="address-box">
            <div class="flex items-start gap-3">
                <div class="text-red-500 text-xl mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24"><path fill="red" d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg></div>
                <div>
                    <p class="font-semibold text-gray-800">You haven't add any address yet.</p>
                    <p class="text-sm text-gray-500">Add your shipping address to continue.</p>
                </div>
            </div>
            <button id="add-address-btn" class="mt-4 bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">Add Address</button>
        </div>

        <!-- Voucher Section -->
        <div class="border border-green-200 rounded-xl p-4 bg-green-50 mb-5">
            <div class="flex items-center justify-between">
                <div class="text-sm text-green-800 font-medium">You have vouchers available</div>
                <button id="view-voucher" class="bg-green-600 text-white px-4 py-1.5 rounded-lg hover:bg-green-700 transition">View</button>
            </div>
        </div>

        <!-- Payment Summary -->
        <div class="rounded-xl p-4 bg-gray-100 mb-5">
            <p class="font-semibold text-gray-700 mb-3">Payment Summary</p>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Product Price</span>
                <span>IDR 1,540,000</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Authentication Fee</span>
                <span class="text-green-600 font-medium">FREE</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mb-3">
                <span>Processing Fee <span class="text-xs text-green-500 ml-1">🛈</span></span>
                <span>IDR 36,000</span>
            </div>
            <div class="flex justify-between font-semibold text-gray-800 border-t pt-2">
                <span>Total</span>
                <span>IDR 1,576,000</span>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition closePaymentBtn">Back</button>
            <button id="choose-payment" class="flex-1 bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed" disabled>Choose Payment</button>
        </div>

    </div>

    <div id="address-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-full max-w-xl h-[90vh] rounded-xl shadow overflow-hidden">
    <div class="overflow-y-auto h-full p-6">

        <!-- Header -->
        <div class="flex items-center mb-4">
            <button id="cancel-modal" class="text-xl">←</button>
            <h2 class="text-2xl font-bold flex-grow text-center">Tambah Alamat</h2>
        </div>
        <div class="w-full h-px bg-gray-400 mb-4"></div>

        <h3 class="font-semibold text-lg mb-4">Lengkapi detail alamat</h3>

        <!-- Form -->
        <form class="space-y-4">
            <div>
                <label class="text-sm">Nama Penerima</label>
                <input name="nama" type="text" maxlength="50" class="mt-1 w-full border rounded px-3 py-2" required />
            </div>

            <div>
                <label class="text-sm">Nomor HP</label>
                <input name="hp" id="hp" type="text" maxlength="15" class="mt-1 w-full border rounded px-3 py-2" required />
            </div>

            <div>
                <label class="text-sm">Label Alamat</label>
                <input name="label" type="text" maxlength="30" class="mt-1 w-full border rounded px-3 py-2 input-address" />
            </div>

            <div>
                <label class="text-sm">Kota & Kecamatan</label>
                <input name="kota" type="text" class="mt-1 w-full border rounded px-3 py-2 input-address" />
            </div>

            <div>
                <label class="text-sm">Alamat Lengkap</label>
                <textarea name="alamat" maxlength="200" class="mt-1 w-full border rounded px-3 py-2 resize-none input-address"></textarea>
            </div>

            <div>
                <label class="text-sm">Catatan untuk Kurir (Opsional)</label>
                <textarea name="catatan" maxlength="45" class="mt-1 w-full border rounded px-3 py-2 resize-none"></textarea>
            </div>

            <div class="flex justify-between items-center border p-3 rounded">
                <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="red" d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg>
                    <span class="text-sm">Tambah Pinpoint (Opsional)</span>
                </div>
                <button type="button" class="text-green-600 font-semibold">Atur</button>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="utama" id="utama" />
                <label for="utama" class="text-sm">Jadikan alamat utama</label>
            </div>

            <div class="flex items-start gap-2">
                <input type="checkbox" name="setuju" id="setuju" required />
                <label for="setuju" class="text-sm">Saya menyetujui <a href="#" class="text-green-600 font-semibold">Syarat & Ketentuan</a> serta <a href="#" class="text-green-600 font-semibold">Kebijakan Privasi</a></label>
            </div>

            <!-- Simpan -->
            <button type="submit" id="save-address" class="w-full bg-green-600 text-white py-3 mt-4 rounded hover:green-800 transition">
                Simpan
            </button>
        </form>
    </div>
   </div>
 </div>
</div>

<!-- jQuery Script -->
@vite('resources/js/popup_requirement.js')

<!-- Accordion -->
<div class="space-y-4 mt-6" id="accordion">
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

<!-- Share -->
<div class=" mt-6">
  <p class=" mb-3">Share this product to your friends!</p>
  <div class=" flex gap-4 items-center">
    <img src="/images/instagram.png" alt="Instagram" class="w-7 md:w-8" />
    <img src="/images/facebook.png" alt="Facebook" class="w-7 md:w-8" />
    <img src="/images/whatsapp.png" alt="WhatsApp" class="w-7 md:w-8" />
    <img src="/images/twitter.png" alt="Twitter" class="w-7 md:w-8" />
    <img src="/images/email.png" alt="Email" class="w-7 md:w-8" />
  </div>
</div>

</section>

<section class="snap-start py-10">
  <div class="fade-section mt-10 border-t-2 border-gray-300 pt-6">
    <h3 class="text-2xl font-bold text-gray-800 mb-4">Description</h3>
    <p class="text-gray-600 leading-relaxed">
      Step back in time while staying on trend with these adidas Gazelle shoes for juniors. Originally released in 1991 and reimagined for today's streets, this iconic silhouette delivers the retro style that defined a generation. A suede upper and classic detailing bring authentic '90s vibes, while a rubber cupsole built for all-day wear means even young sneakerheads can appreciate these throwbacks. Whether for school or kicking it with friends, this pair connects the past and present with every step.
    </p>

    <!-- Detail Card -->
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 bg-gray-50 p-6 rounded-xl shadow-sm">
      <div >
        <p class="text-gray-500 text-sm mb-1">SKU</p>
        <p class="font-bold text-lg">IG1695</p>
        <p class="text-gray-500 text-sm mt-4 mb-1">Material</p>
        <p class="text-gray-700">-</p>
        <p class="text-gray-500 text-sm mt-4 mb-1">Release Date</p>
        <p class="text-gray-700">-</p>
      </div>

      <div >
        <p class="text-gray-500 text-sm mb-1">Color</p>
        <p class="font-bold text-lg">NIGHT INDIGO / CLOUD WHITE / CORE WHITE</p>
        <p class="text-gray-500 text-sm mt-4 mb-1">Dimension</p>
        <p class="text-gray-700">-</p>
        <p class="text-gray-500 text-sm mt-4 mb-1">Retail (approx.)</p>
        <p class="text-gray-700">-</p>
      </div>
    </div>

  </div>
</section>

            <div class="snap-start relative px-4 md:px-10 py-6 md:py-10">
              <h3 class="fade-section text-xl font-semibold text-center text-gray-800 uppercase tracking-wide">
                Similar Products
              </h3>
            </div>

            <!-- Produk grid: 4 kolom, 2 baris -->
            <div class="snap-start  grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10 px-4 md:px-10">
              <!-- Ulangi 8 produk -->
              <!-- Product Card -->
              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/1,500,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Adidas Handball Spezial Grey (Grade School)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                      IDR 1,500,000
                    </div>
                  </div>
                </a>
              </div>

              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/2,500,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Adidas Samba Dia De Los Muertos Off White (Grade School)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                     IDR 2,500,000
                    </div>
                  </div>
                </a>
              </div>

              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/2,920,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Yeezy Boost 350 V2 Dazling Blue (Toddler)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                       IDR 2,920,000
                    </div>
                  </div>
                </a>
              </div>

              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/2,360,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />

                    <!-- Discount Badge -->
                    <span class="absolute top-2 left-3 bg-gradient-to-r from-red-400 to-red-600 text-white text-[10px] font-semibold px-3 py-[3px] rounded-lg shadow-sm tracking-wider uppercase">
                      30% Off
                    </span>
                  </div>

                  <!-- Penempatan detail produk HARUS di luar div.relative -->
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                      Adidas Gazelle Toy Story Jessie (Grade School)
                    </h2>
                    <div class="text-gray-400 line-through text-sm">
                      IDR 3.371.429
                    </div>
                    <div class="text-green-600 font-bold text-sm mt-1">
                       IDR 2,360,000
                    </div>
                  </div>
                </a>
              </div>

              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/1,860,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Adidas Superstar Hello Kitty White (Grade School)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                      IDR 1,860,000
                    </div>
                  </div>
                </a>
              </div>

              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/2,010,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Adidas Superstar J Rainbow Decal (Grade School)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                      IDR 2,010,000
                    </div>
                  </div>
                </a>
              </div>

              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/2,350,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Adidas Gazelle Semi Pink Spark (Grade School)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                      IDR 2,350,000
                    </div>
                  </div>
                </a>
              </div>


              <div class="fade-section bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                <a href="#" class="block p-4">
                  <div class="relative">
                    <img src="/images/youth adidas/1,340,000(1).webp" alt=""
                      class="w-full h-auto rounded-xl object-cover transition-transform duration-300 hover:scale-105" />
                  </div>
                  <div class="mt-4">
                    <h2 class="text-base font-semibold text-gray-900 min-h-[60px] leading-tight">
                    Adidas Ultraboost Light Cloud White (Grade School)
                    </h2>
                    <div class="text-green-600 font-bold text-sm mt-2">
                      IDR 1,340,000
                    </div>
                  </div>
                </a>
              </div>
            </div>
        </div>

        <div class="snap-start px-4 md:px-10 pt-1 pb-18 flex justify-center items-start my-20">
            <a href="/products"
                class="fade-section inline-flex items-center gap-1
                    px-6 py-2 text-sm
                    md:px-8 md:text-base
                    font-medium text-white
                    border border-white
                    bg-gradient-to-r from-black via-gray-900 to-black
                    rounded-full
                    hover:scale-105 hover:shadow-lg
                    transition-all duration-300 ease-in-out group">
                <span>View More</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>


</section>




    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @vite('resources/js/swiper1page.js')
    @vite('resources/js/scrollanimated.js')

  </body>
<div class="fade-section">
  @include('partial.footer')
</div>

</html>
