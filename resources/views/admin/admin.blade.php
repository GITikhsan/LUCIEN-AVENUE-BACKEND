<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-sm">

  <!-- Layout wrapper -->
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="bg-white w-64 shadow-md p-4">
      <div class="mb-8">
        <h1 class="text-lg font-semibold text-black">Lucien Avenue</h1>
        <p class="text-xs text-gray-500">Dashboard</p>
      </div>
      <nav class="space-y-4" id="sidebarMenu">
        <a href="#" data-panel="Home" class="block text-base text-gray-700 hover:text-green-600">Home</a>
        <a href="#" data-panel="Diskusi" class="block text-base text-gray-700 hover:text-green-600">Diskusi</a>
        <a href="#" data-panel="Produk" class="block text-base text-gray-700 hover:text-green-600">Input Produk</a>
        <a href="#" data-panel="Pesanan" class="block text-base text-gray-700 hover:text-green-600">Pesanan</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6" id="mainContent">
      <div id="defaultContent">
        <!-- Default content (Home) will be loaded here -->
      </div>
    </main>
  </div>

  <!-- JavaScript -->
  <script>
    const panels = {
      "Home": `
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-xl font-semibold text-gray-800">Aktivitas</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-4 mb-6">
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">Pesanan Baru</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">Siap Dikirim</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">Chat Baru</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">Diskusi Baru</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">Ulasan Baru</p>
            <p class="text-xl font-bold">0</p>
          </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow mb-6">
          <h3 class="font-semibold mb-2">Analisis toko dan produk</h3>
          <p class="text-gray-400 text-sm">Update terakhir: </p>
          <div class="h-24 bg-gray-100 mt-4 rounded animate-pulse"></div>
        </div>
      `,
      "Diskusi": `
        <div class="bg-white p-6 rounded-xl shadow">
          <h3 class="text-xl font-semibold mb-4">Diskusi Produk</h3>
          <div class="space-y-4">
            <div class="border p-4 rounded">
              <p class="font-semibold">User123:</p>
              <p class="text-gray-700">Apakah produk ini bisa digunakan untuk Android 12?</p>
              <p class="text-sm text-gray-500 mt-2">2 jam lalu</p>
            </div>
            <div class="border p-4 rounded bg-gray-50">
              <p class="font-semibold">Admin:</p>
              <p class="text-gray-700">Ya, produk ini kompatibel dengan Android 12 ke atas.</p>
              <p class="text-sm text-gray-500 mt-2">1 jam lalu</p>
            </div>
            <div class="mt-6">
              <textarea placeholder="Tulis balasan..." class="w-full p-2 border rounded mb-2"></textarea>
              <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Balas</button>
            </div>
          </div>
        </div>
      `,
      "Produk" : `
      <!DOCTYPE html>

<body class="bg-gray-100 p-6 font-sans text-sm">

  <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Input Data Sepatu</h2>

    <form class="space-y-4">
      <!-- Nama Sepatu -->
      <div>
        <label for="nama" class="block mb-1 text-gray-700">Nama Sepatu</label>
        <input type="text" id="nama" name="nama" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: Adidas Ultraboost">
      </div>

      <!-- Merek -->
      <div>
        <label for="merek" class="block mb-1 text-gray-700">Merek</label>
        <input type="text" id="merek" name="merek" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Contoh: Adidas">
      </div>

      <!-- Harga -->
      <div>
        <label for="harga" class="block mb-1 text-gray-700">Harga (Rp)</label>
        <input type="number" id="harga" name="harga" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Harga">
      </div>

      <!-- Ukuran -->
      <div>
        <label for="ukuran" class="block mb-1 text-gray-700">Ukuran</label>
        <select id="ukuran" name="ukuran" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500 placeholder="pilih ukuran">
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">38</option>
          <option value="38">38</option>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
        </select>
      </div>

      <!-- Deskripsi -->
      <div>
        <label for="deskripsi" class="block mb-1 text-gray-700">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500 resize-none" placeholder="Tambahkan deskripsi sepatu..."></textarea>
      </div>

      <!-- Input Gambar -->
<input type="file" id="gambarInput" class="block w-full text-sm text-gray-500" accept="image/*">

<!-- Preview Gambar -->
<div id="preview" class="mt-4 hidden">
  <img id="gambarPreview" src="#" alt="Preview Gambar" class="max-w-xs rounded shadow">
</div>

      <!-- Tombol Submit -->
      <div class="pt-2">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Simpan Data</button>
      </div>
    </form>
  </div>

</body>
</html>
`
    };

    const defaultContent = document.getElementById("defaultContent");
    const links = document.querySelectorAll("#sidebarMenu a");

    function loadPanel(name) {
      // Reset styles
      links.forEach(link => {
        link.classList.remove("text-green-600", "font-semibold");
        link.classList.add("text-gray-700");
      });

      // Apply active style
      const activeLink = Array.from(links).find(link => link.dataset.panel === name);
      if (activeLink) {
        activeLink.classList.remove("text-gray-700");
        activeLink.classList.add("text-green-600", "font-semibold");
      }

      // Load content
      defaultContent.innerHTML = panels[name] || `<p class="text-gray-500">Konten untuk "${name}" belum tersedia.</p>`;
    }

    // Event listener
    links.forEach(link => {
      link.addEventListener("click", e => {
        e.preventDefault();
        const panelName = link.dataset.panel;
        loadPanel(panelName);
      });
    });

    

    // Load default (Home)
    loadPanel("Home");
    
    $(document).ready(function() {
    $('#gambarInput').on('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          $('#gambarPreview').attr('src', e.target.result);
          $('#preview').removeClass('hidden');
        }
        reader.readAsDataURL(file);
      }
    });
  });

  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
