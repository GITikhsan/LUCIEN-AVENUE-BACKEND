<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    input.no-arrow::-webkit-outer-spin-button,
    input.no-arrow::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input.no-arrow {
      -moz-appearance: textfield;
    }
  </style>
</head>
<body class="m-0 font-sans bg-white">

  @include('partial.sticknavbar')

  <div class="grid md:grid-cols-[250px_1fr] grid-cols-1 grid-rows-[auto_1fr] h-screen">
    <!-- SIDEBAR -->
    <aside class="flex flex-col items-center justify-start border-r border-gray-200 p-5">
      <div class="w-full text-center mb-6">
        <h2 class="mt-2 text-lg font-semibold">USERNAME</h2>
      </div>

      <!-- MENU -->
      <ul class="w-full text-sm font-semibold space-y-4">
        <li><a href="#" data-panel="DATA SAYA" class="flex justify-between items-center hover:text-green-600 transition">DATA SAYA </a></li>
        <li><a href="#" data-panel="PEMBELIAN SAYA" class="flex justify-between items-center hover:text-green-600 transition">PEMBELIAN SAYA </a></li>
        <li><a href="#" data-panel="PENGEMBALIAN" class="flex justify-between items-center hover:text-green-600 transition">PENGEMBALIAN </a></li>
        <br>
        <li>
          <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="flex w-full justify-between items-center text-left hover:text-green-600 transition">
              LOG OUT
            </button>
          </form>
        </li>



      </ul>
    </aside>

    <!-- MAIN PANEL -->
    <main id="contentPanel" class="flex justify-center items-start p-10 overflow-auto">
      <!-- Default: DATA SAYA -->
      <div id="defaultForm">
        <!-- ini akan diganti secara dinamis lewat JS -->
      </div>
    </main>
  </div>

  <!-- SCRIPT -->
  <script>
    const contentPanel = document.getElementById("contentPanel");

    const panels = {
      "DATA SAYA": `
        <form class="w-4/5 max-w-4xl p-8 bg-white text-black flex items-start space-x-8">
        <!-- Foto Profil -->
        <div class="flex-shrink-0">
          <img src="/images/PNGpic2.png" alt="Foto Profil" class="w-40 h-40 rounded-full object-cover border border-gray-300">
        </div>

        <!-- Data Pengguna -->
        <div class="flex-1">
          <div class="grid grid-cols-[150px_10px_auto] gap-y-4 items-start">
            <label class="font-bold">First Name</label>
            <span class="text-center">:</span>
            <p>John</p>

            <label class="font-bold">Last Name</label>
            <span class="text-center">:</span>
            <p>Doe</p>

            <label class="font-bold">Date of Birth</label>
            <span class="text-center">:</span>
            <p>1990-01-01</p>

            <label class="font-bold">Alamat</label>
            <span class="text-center">:</span>
            <p>Jl. Merdeka No. 123, Jakarta</p>

            <label class="font-bold">Your Email</label>
            <span class="text-center">:</span>
            <p>john.doe@example.com</p>

            <label class="font-bold">Your Password</label>
            <span class="text-center">:</span>
            <p>********</p><br><br>
            <div class="flex justify-end mt-4">
            <a href="/settings" class="bg-green-800 hover:bg-gray-400 text-white px-4 py-2 rounded-md">
              ✏️Ubah
            </a>
          </div>
          </div>
        </div>
      </form>
      `,
      "PEMBELIAN SAYA": `
        <div class="w-full max-w-4xl space-y-6">
          <!-- Contoh item pembelian, bisa diulang -->
          <div class="bg-white border rounded-lg shadow-md p-4">
            <!-- Produk -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
              <img src="/images/100JT/100,000,000(1).png" alt="Produk" class="w-24 h-24 object-contain border rounded">
              <div class="flex-1">
                <p class="font-semibold text-gray-800">Air Jordan 1 Retro Low Dior</p>
                <p class="text-sm text-gray-600">x1</p>
                <div class="flex items-center gap-2">
                  <p class="text-red-600 font-bold">IDR 100,000,000</p>
                </div>
              </div>
            </div>
            <!-- Footer aksi -->
            <div class="flex flex-col md:flex-row justify-between items-center mt-4 border-t pt-4">
              <!-- Tombol Nilai -->
              <button onclick="alert('Fitur nilai belum aktif')" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded">
                Nilai
              </button>
              <!-- Total Harga -->
              <div class="text-right mt-4 md:mt-0 text-gray-700">
                <span class="text-sm">Total:</span> 
                <span class="text-xl font-bold text-red-600">IDR 100,000,000</span>
              </div>
            </div>
          </div>
          <div class="bg-white border rounded-lg shadow-md p-4">
            <!-- Produk -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
              <img src="/images/4JT/4,240,000.png" alt="Produk" class="w-24 h-24 object-contain border rounded">
              <div class="flex-1">
                <p class="font-semibold text-gray-800">Air Jordan 1 Retro Low OG SP Travis Scott Velvet Brown</p>
                <p class="text-sm text-gray-600">x1</p>
                <div class="flex items-center gap-2">
                  <p class=" text-base text-gray-400 line-through">IDR 5,808,219</p>
                  <p class="text-red-600 font-bold">IDR 4,240,000</p>
                </div>
              </div>
            </div>
            <!-- Footer aksi -->
            <div class="flex flex-col md:flex-row justify-between items-center mt-4 border-t pt-4">
              <!-- Tombol Nilai -->
              <button onclick="alert('Fitur nilai belum aktif')" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded">
                Nilai
              </button>
              <!-- Total Harga -->
              <div class="text-right mt-4 md:mt-0 text-gray-700">
                <span class="text-sm">Total:</span> 
                <span class="text-xl font-bold text-red-600">IDR 4,240,000</span>
              </div>
            </div>
          </div>
          <div class="bg-white border rounded-lg shadow-md p-4">
            <!-- Produk -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
              <img src="/images/3JT/3,210,000(1).png" alt="Produk" class="w-24 h-24 object-contain border rounded">
              <div class="flex-1">
                <p class="font-semibold text-gray-800">Air Jordan 1 Low SE Craft Light Olive</p>
                <p class="text-sm text-gray-600">x1</p>
                <div class="flex items-center gap-2">
                  <p class="text-red-600 font-bold">IDR 3,210,000</p>
                </div>
              </div>
            </div>
            <!-- Footer aksi -->
            <div class="flex flex-col md:flex-row justify-between items-center mt-4 border-t pt-4">
              <!-- Tombol Nilai -->
              <button onclick="alert('Fitur nilai belum aktif')" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded">
                Nilai
              </button>
              <!-- Total Harga -->
              <div class="text-right mt-4 md:mt-0 text-gray-700">
                <span class="text-sm">Total:</span> 
                <span class="text-xl font-bold text-red-600">IDR 3,210,000</span>
              </div>
            </div>
          </div>
        </div>
      `,
      "PENGEMBALIAN": `
        <div class="w-full max-w-2xl bg-white p-6 rounded shadow">
          <h2 class="text-2xl font-bold mb-4">Pengembalian Barang</h2>
          <p class="mb-4 text-gray-600">Ajukan pengembalian barang jika produk yang diterima tidak sesuai, rusak, atau cacat.</p>
          <form class="space-y-4">
            <div>
              <label class="block font-semibold">Nomor Pesanan</label>
              <input type="text" class="w-full border p-2 rounded" placeholder="Contoh: INV123456789" />
            </div>
            <div>
              <label class="block font-semibold">Alasan Pengembalian</label>
              <textarea class="w-full border p-2 rounded" placeholder="Jelaskan alasan pengembalian..."></textarea>
            </div>
            <div>
              <label class="block font-semibold">Upload Bukti (opsional)</label>
              <input type="file" />
            </div>
            <div>
              <label class="block font-semibold">Nomor WhatsApp</label>
              <input type="number" oninput="if(this.value.length > 14) this.value = this.value.slice(0, 14)" class="w-full border p-2 rounded no-arrow" />
            </div>
            <button class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-600">Ajukan Pengembalian</button>
          </form>
        </div>
      `,
    };

    function renderPanel(panelName) {
      const html = panels[panelName] || `
        <div class="w-full max-w-xl">
          <h1 class="text-2xl font-bold mb-4">${panelName}</h1>
          <p>Konten belum tersedia.</p>
        </div>`;
      contentPanel.innerHTML = html;

      // Bind ulang event untuk password toggle
      const toggle = document.getElementById("togglePassword");
      if (toggle) {
        toggle.addEventListener("click", () => {
          const pw = document.getElementById("password");
          const icon = document.getElementById("eyeIcon");
          const isVisible = pw.type === "text";
          pw.type = isVisible ? "password" : "text";
          icon.src = isVisible ? "/public/images/open-eyes.png" : "/public/images/close-eyes.png";
          icon.alt = isVisible ? "Show password" : "Hide password";
        });
      }
    }

    // Set default content
    renderPanel("DATA SAYA");

    // Event handler untuk sidebar links
    document.querySelectorAll("aside ul li a").forEach(link => {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const panel = link.dataset.panel;
        if (panel) renderPanel(panel);
      });
    });
  </script>

  <script src="/javascript/countryCode.js"></script>

  @include("partial.footer")
</body>
</html>