<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 font-sans bg-white">

  @include('partial.navbar')

  <div class="grid md:grid-cols-[250px_1fr] grid-cols-1 grid-rows-[auto_1fr] h-screen">
    <!-- SIDEBAR -->
    <aside class="flex flex-col items-center justify-start border-r border-gray-200 p-5">
      <div class="w-full text-center mb-6">
        <h2 class="mt-2 text-lg font-semibold">USERNAME</h2>
      </div>

      <!-- MENU -->
      <ul class="w-full text-sm font-semibold space-y-4">
        <li><a href="#" data-panel="DATA SAYA" class="flex justify-between items-center hover:text-green-600 transition">DATA SAYA <span>→</span></a></li>
        <li><a href="#" data-panel="PEMBELIAN SAYA" class="flex justify-between items-center hover:text-green-600 transition">PEMBELIAN SAYA <span>→</span></a></li>
        <li><a href="#" data-panel="PENGEMBALIAN" class="flex justify-between items-center hover:text-green-600 transition">PENGEMBALIAN <span>→</span></a></li>
        <li><a href="#" data-panel="BANTUAN" class="flex justify-between items-center hover:text-green-600 transition">BANTUAN <span>→</span></a></li>
        <li><a href="#" data-panel="PEMBAYARAN" class="flex justify-between items-center hover:text-green-600 transition">PEMBAYARAN <span>→</span></a></li>
        <br><br>
        <!-- <li>
          <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="flex w-full justify-between items-center text-left hover:text-green-600 transition">
              LOG OUT
            </button>
          </form>
        </li> -->

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
        <form class="w-4/5 max-w-xl p-8 bg-white">
          <label class="font-bold mt-5 block">First Name :</label>
          <input type="text" placeholder="Username" class="w-full p-2 mt-1 border border-black rounded"/>
          <label class="font-bold mt-5 block">Last Name :</label>
          <input type="text" placeholder="Last Name" class="w-full p-2 mt-1 border border-black rounded"/>
          <label class="font-bold mt-5 block">Date of birth :</label>
          <div class="flex gap-3 mt-1">
            <input type="text" placeholder="Date" class="w-24 p-2 border border-black rounded"/>
            <input type="text" placeholder="Month" class="w-24 p-2 border border-black rounded"/>
            <input type="text" placeholder="Year" class="w-24 p-2 border border-black rounded"/>
          </div>
          <label class="font-bold mt-5 block">Alamat :</label>
          <textarea placeholder="Alamat lengkap" class="w-full p-2 mt-1 border border-black rounded"></textarea>
          <label class="font-bold mt-5 block">Your email</label>
          <input type="email" placeholder="Email" class="w-full p-2 mt-1 border border-black rounded"/>
          <label class="font-bold mt-5 block">Your password</label>
          <div class="relative mb-4">
            <input id="password" type="password" placeholder="Password" class="w-full p-2 mt-1 border border-black rounded"/>
            <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 focus:outline-none">
              <img id="eyeIcon" src="/images/password_hide.png" alt="Toggle Eye" class="w-5 h-5">
            </button>
          </div>
        </form>
      `,
      "PEMBELIAN SAYA": `
        <div class="w-full max-w-4xl space-y-6">
          <!-- Contoh item pembelian, bisa diulang -->
          <div class="bg-white border rounded-lg shadow-md p-4">
            <!-- Header toko -->
            <div class="flex justify-between items-center border-b pb-3 mb-3">
              <div class="font-semibold text-gray-700">Digital.id.Store</div>
              <button class="px-2 py-1 bg-orange-500 text-white text-sm rounded hover:bg-orange-600">Chat</button>
            </div>

            <!-- Produk -->
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
              <img src="/images/pembelian_saya_example.png" alt="Produk" class="w-24 h-24 object-cover border rounded">
              <div class="flex-1">
                <p class="font-semibold text-gray-800">"S.P.T.F.Y" PREM1UM Lifetime</p>
                <p class="text-sm text-gray-600">x1</p>
                <div class="flex items-center gap-2">
                  <p class="text-sm text-gray-400 line-through">Rp100.000</p>
                  <p class="text-red-600 font-bold">Rp9.999</p>
                </div>
              </div>
            </div>

            <!-- Footer aksi -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-4 border-t pt-4">
              <div class="flex gap-2 mt-2 md:mt-0">
                <button onclick="alert('Fitur nilai belum aktif')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-1 rounded">Nilai</button>
                <button onclick="alert('Fitur chat penjual belum aktif')" class="border border-gray-300 px-4 py-1 rounded hover:bg-gray-50">Hubungi Penjual</button>
                <button onclick="alert('Fitur beli ulang belum aktif')" class="border border-gray-300 px-4 py-1 rounded hover:bg-gray-50">Beli Lagi</button>
              </div>
            </div>

            <div class="text-right mt-4 text-gray-700">
              <span class="text-sm">Total:</span> <span class="text-xl font-bold text-red-600">Rp11.999</span>
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
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Ajukan Pengembalian</button>
          </form>
        </div>
      `,

      "BANTUAN": `
        <div class="w-full max-w-2xl bg-white p-6 rounded shadow">
          <h2 class="text-2xl font-bold mb-4">Pusat Bantuan</h2>
          <ul class="list-disc pl-5 space-y-2 text-gray-700">
            <li><strong>Cara Melacak Pesanan:</strong> Klik menu "Pembelian Saya", lalu lihat status pengiriman.</li>
            <li><strong>Cara Membatalkan Pesanan:</strong> Ajukan sebelum pesanan dikirim oleh penjual.</li>
            <li><strong>Masalah Pembayaran:</strong> Hubungi CS kami lewat <a href="#" class="text-blue-500 underline">form ini</a>.</li>
          </ul>
          <div class="mt-6">
            <h3 class="font-semibold">Masih butuh bantuan?</h3>
            <p>Kirim pertanyaanmu lewat <a href="#" class="text-blue-500 underline">form kontak</a> atau hubungi kami via WhatsApp.</p>
          </div>
        </div>
      `,

      "PEMBAYARAN": `
        <div class="w-full max-w-xl bg-white p-6 rounded shadow">
          <h2 class="text-2xl font-bold mb-4">Metode Pembayaran</h2>
          <ul class="space-y-4">
            <li class="flex items-center justify-between border-b pb-3">
              <div>
                <p class="font-semibold">Transfer Bank</p>
                <p class="text-sm text-gray-500">BNI, BRI, Mandiri, BCA</p>
              </div>
              <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Pilih</button>
            </li>
            <li class="flex items-center justify-between border-b pb-3">
              <div>
                <p class="font-semibold">E-Wallet</p>
                <p class="text-sm text-gray-500">OVO, DANA, GoPay, ShopeePay</p>
              </div>
              <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Pilih</button>
            </li>
            <li class="flex items-center justify-between border-b pb-3">
              <div>
                <p class="font-semibold">Kartu Kredit/Debit</p>
                <p class="text-sm text-gray-500">Visa, Mastercard</p>
              </div>
              <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Pilih</button>
            </li>
          </ul>
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