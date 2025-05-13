<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    #sidebar {
      width: 16rem; /* w-64 */
    }
  </style>
</head>
<body class="bg-gray-100 font-sans text-sm">
  <!-- Navbar -->
  @include('partial.sticknavbar')

  <!-- Mobile Header -->
  <div class="md:hidden bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-lg font-semibold text-black">More Settings</h1>
    <button id="toggleSidebar" class="text-gray-700 text-2xl focus:outline-none"  ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
  <line x1="12" y1="5" x2="12" y2="19"/>
  <polyline points="19 12 12 19 5 12"/>
</svg>
</button>
  </div>

  <!-- Main Layout -->
  <div class="flex flex-col md:flex-row min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="bg-white shadow-md p-4 fixed inset-y-0 left-0 z-50 w-64 transform -translate-x-full md:translate-x-0 md:relative md:block transition-transform duration-300 ease-in-out">
      <div class="mb-8">
        <h2 class="text-lg font-semibold text-black">Lucien Avenue</h2>
        <p class="text-xs text-gray-500">Settings</p>
      </div>
      <nav id="sidebarMenu" class="space-y-4">
        <a href="#" data-panel="EditProfile" class="block text-base text-gray-700 hover:text-green-600">Edit your profile</a>
        <a href="#" data-panel="ShippingAddress" class="block text-base text-gray-700 hover:text-green-600">Your address</a>
        <a href="#" data-panel="ChangePassword" class="block text-base text-gray-700 hover:text-green-600">Change your password</a>
        <a href="#" data-panel="Deleteacc" class="block text-base text-gray-700 hover:text-green-600">Delete account</a>
      </nav>
    </aside>

    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- Content -->
    <main class="flex-1 p-4 md:p-6 overflow-y-auto md:ml-64" id="mainContent">
      <div id="defaultContent"></div>
    </main>
  </div>

  <!-- Panels (diisi via JS) -->
  <script>
    const panels = {
      "EditProfile": `
      <div class="w-full max-w-xl mx-auto bg-white p-4 md:p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Edit Profile</h2>
        <form id="editProfileForm" class="space-y-4" enctype="multipart/form-data">
          <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-2 sm:space-y-0 sm:space-x-4">
            <img id="profilePreview" src="/images/User.png" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border" />
            <div class="w-full">
              <label class="block mb-1 text-gray-700">Profile Picture</label>
              <input type="file" id="profilePic" name="profilePic" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-2 file:border file:rounded file:border-gray-300 file:text-sm file:bg-white file:text-gray-700 hover:file:bg-gray-100"/>
            </div>
          </div>
          <div><label class="block mb-1 text-gray-700">First Name</label><input type="text" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><label class="block mb-1 text-gray-700">Last Name</label><input type="text" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><label class="block mb-1 text-gray-700">Email</label><input type="email" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><label class="block mb-1 text-gray-700">Phone Number</label><input type="tel" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><label class="block mb-1 text-gray-700">Date of Birth</label><input type="date" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div class="pt-4"><button type="submit" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Save Profile</button></div>
        </form>
      </div>`,

      "ShippingAddress": `
      <div class="w-full max-w-xl mx-auto bg-white p-4 md:p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pilih Lokasi di Peta</h3>
        <div id="map" class="w-full h-64 rounded shadow-sm mb-4 z-0"></div>
        <div><label class="block text-sm font-medium text-gray-700">Alamat Otomatis</label><input type="text" id="autoAddress" class="w-full p-2 border rounded mb-2" readonly /><input type="hidden" id="lat"><input type="hidden" id="lng"></div>
        <div><label class="block mb-1 text-gray-700">Add address</label><textarea class="w-full p-2 border rounded resize-none focus:outline-none focus:ring-2 focus:ring-green-500" rows="4"></textarea></div>
        <div class="pt-4"><button class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Save address</button></div>
      </div>`,

      "ChangePassword": `
      <div class="w-full max-w-md mx-auto bg-white p-4 md:p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Change Password</h2>
        <form class="space-y-4">
          <div><label class="block mb-1 text-gray-700">Current Password</label><input type="password" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><label class="block mb-1 text-gray-700">New Password</label><input type="password" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><label class="block mb-1 text-gray-700">Confirm New Password</label><input type="password" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" /></div>
          <div><button class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Confirm</button></div>
        </form>
      </div>`,

      "Deleteacc": `
      <div class="w-full max-w-xl mx-auto mt-8 bg-white p-4 md:p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500 mb-3">Do you wanna delete your account?</p>
        <button class="text-red-600 text-sm hover:underline transition duration-150">Delete account</button>
      </div>`
    };

    // JS behavior
    function loadPanel(name) {
      $('#sidebarMenu a').removeClass('text-green-600 font-semibold').addClass('text-gray-700');
      $('#sidebarMenu a[data-panel="' + name + '"]').removeClass('text-gray-700').addClass('text-green-600 font-semibold');
      $('#defaultContent').html(panels[name] || '<p class="text-gray-500">Content not available.</p>');
    }

    function initMap() {
      const map = L.map('map').setView([-6.2, 106.8167], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' }).addTo(map);

      let marker;
      map.on('click', function (e) {
        const lat = e.latlng.lat, lng = e.latlng.lng;
        $('#lat').val(lat); $('#lng').val(lng);
        if (marker) { marker.setLatLng(e.latlng); } else { marker = L.marker(e.latlng).addTo(map); }
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
          .then(res => res.json())
          .then(data => $('#autoAddress').val(data.display_name || "Alamat tidak ditemukan"));
      });
    }

    $(document).ready(function () {
      loadPanel('EditProfile');
      $('#sidebarMenu a').on('click', function (e) {
        e.preventDefault();
        const panel = $(this).data('panel');
        loadPanel(panel);
        if (panel === 'ShippingAddress') setTimeout(initMap, 100);
        if (window.innerWidth < 768) {
          $('#sidebar').addClass('-translate-x-full');
          $('#sidebarOverlay').addClass('hidden');
        }
      });

      $('#toggleSidebar').on('click', function () {
        $('#sidebar').removeClass('-translate-x-full');
        $('#sidebarOverlay').removeClass('hidden');
      });

      $('#sidebarOverlay').on('click', function () {
        $('#sidebar').addClass('-translate-x-full');
        $(this).addClass('hidden');
      });
    });
  </script>

  <!-- Footer -->
  @include('partial.footer')
</body>
</html>
