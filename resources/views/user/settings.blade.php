<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body class="bg-gray-100 font-sans text-sm">
    @include('partial.navbar')
  <!-- Layout wrapper -->
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="bg-white w-64 shadow-md p-4">
      <div class="mb-8">
        <h1 class="text-lg font-semibold text-black">Lucien Avenue</h1>
        <p class="text-xs text-gray-500">Settings</p>
      </div>
      <nav class="space-y-4" id="sidebarMenu">
        <a href="#" data-panel="EditProfile" class="block text-base text-gray-700 hover:text-green-600">Edit your profile</a>
        <a href="#" data-panel="ShippingAddress" class="block text-base text-gray-700 hover:text-green-600">Your addres</a>
        <a href="#" data-panel="ChangePassword" class="block text-base text-gray-700 hover:text-green-600">Change your password</a>
        <a href="#" data-panel="Deleteacc" class="block text-base text-gray-700 hover:text-green-600">Delete account</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto" id="mainContent">
      <div id="defaultContent">
        <!-- Default content (Home) will be loaded here -->
      </div>
    </main>
  </div>

  <!-- JavaScript -->
  <script>
    const panels = {
     "EditProfile": `
  <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Edit Profile</h2>

    <form class="space-y-4">

      <!-- NAMA -->
      <div>
        <label for="fullName" class="block mb-1 text-gray-700">Full Name</label>
        <input type="text" id="fullName" name="fullName" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter full name" value="" />
      </div>

      <!-- EMAIL -->
      <div>
        <label for="email" class="block mb-1 text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="you@example.com" value="" />
      </div>

      <!-- TELEPON -->
      <div>
        <label for="phone" class="block mb-1 text-gray-700">Phone Number</label>
        <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="+62xxxxxxxxxx" value="" />
      </div>

      <!-- BUTTON -->
      <div class="pt-4">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Save Profile</button>
      </div>

    </form>
  </div>
`,


  "ShippingAddress": `
  <div class="mb-4">
  <h3 class="text-lg font-semibold text-gray-800 mb-2">Pilih Lokasi di Peta</h3>
  <div id="map" class="w-full h-64 rounded shadow-sm mb-4"></div>
  <div>
    <label class="block text-sm font-medium text-gray-700">Alamat Otomatis</label>
    <input type="text" id="autoAddress" class="w-full p-2 border rounded mb-2" readonly />
    <input type="hidden" id="lat">
    <input type="hidden" id="lng">
  </div>
</div>

         <div>
            <label for="address" class="block mb-1 text-gray-700">Add address</label>
            <textarea id="address" name="address" rows="4" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500 resize-none" placeholder="Add your address"></textarea>
          </div>

           <div class="pt-4">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Save address</button>
      </div>
    `,

    "ChangePassword": `
  <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Change Password</h2>

    <form id="changePasswordForm" class="space-y-4">
      <div>
        <label for="currentPassword" class="block mb-1 text-gray-700">Current Password</label>
        <input type="password" id="currentPassword" name="currentPassword" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>
      </div>

      <div>
        <label for="newPassword" class="block mb-1 text-gray-700">New Password</label>
        <input type="password" id="newPassword" name="newPassword" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>
      </div>

      <div>
        <label for="confirmPassword" class="block mb-1 text-gray-700">Confirm New Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>
      </div>

      <div>
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Confirm</button>
      </div>
    </form>
  </div>
`,
  "Deleteacc" : `
  <div class="flex flex-col md:flex-row items-start md:items-center justify-between mt-8 gap-4">


  <!-- Tombol Hapus Akun -->
  <div>
    <p class="text-sm text-gray-500 mb-1">Do you wanna delete your account?</p>
    <button
      class="text-red-600 text-sm hover:underline transition duration-150"
    >
      Delete account
    </button>
  </div>

</div>






  `

    };
    //panel sidebar
    const defaultContent = document.getElementById("defaultContent");
    const links = document.querySelectorAll("#sidebarMenu a");

    function loadPanel(name) {
      links.forEach(link => {
        link.classList.remove("text-green-600", "font-semibold");
        link.classList.add("text-gray-700");
      });

      const activeLink = Array.from(links).find(link => link.dataset.panel === name);
      if (activeLink) {
        activeLink.classList.remove("text-gray-700");
        activeLink.classList.add("text-green-600", "font-semibold");
      }

      defaultContent.innerHTML = panels[name] || `<p class="text-gray-500">Content for "${name}" is not available.</p>`;
    }

    links.forEach(link => {
      link.addEventListener("click", e => {
        e.preventDefault();
        const panelName = link.dataset.panel;
        loadPanel(panelName);
      });
    });

    //untuk load panel utama
    loadPanel("EditProfile");



    function initMap() {
    const map = L.map('map').setView([-6.200000, 106.816666], 13); // Jakarta default

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    let marker;

    map.on('click', function(e) {
      const { lat, lng } = e.latlng;
      document.getElementById('lat').value = lat;
      document.getElementById('lng').value = lng;

      if (marker) {
        marker.setLatLng(e.latlng);
      } else {
        marker = L.marker(e.latlng).addTo(map);
      }

      // Ambil alamat dengan reverse geocoding OpenStreetMap (Nominatim)
      fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
        .then(res => res.json())
        .then(data => {
          const display = data.display_name || "Alamat tidak ditemukan";
          document.getElementById('autoAddress').value = display;
        });
    });
  }

  // Jalankan saat panel dimuat
  if (window.location.hash === "#ShippingAddress") {
    setTimeout(initMap, 100); // sedikit delay agar elemen muncul
  }

  // Kalau pakai button navigasi panel:
  document.querySelectorAll('[data-panel="ShippingAddress"]').forEach(btn => {
    btn.addEventListener('click', () => setTimeout(initMap, 100));
  });



  </script>
 @include("partial.footer")
</body>
</html>
