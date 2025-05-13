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
  @include('partial.sticknavbar')
  <div class="flex min-h-screen">
    <aside class="bg-white w-64 shadow-md p-4">
      <div class="mb-8">
        <h1 class="text-lg font-semibold text-black">Lucien Avenue</h1>
        <p class="text-xs text-gray-500">Settings</p>
      </div>
      <nav class="space-y-4" id="sidebarMenu">
        <a href="#" data-panel="EditProfile" class="block text-base text-gray-700 hover:text-green-600">Edit your profile</a>
        <a href="#" data-panel="ShippingAddress" class="block text-base text-gray-700 hover:text-green-600">Your address</a>
        <a href="#" data-panel="ChangePassword" class="block text-base text-gray-700 hover:text-green-600">Change your password</a>
        <a href="#" data-panel="Deleteacc" class="block text-base text-gray-700 hover:text-green-600">Delete account</a>
      </nav>
    </aside>

    <main class="flex-1 p-6 overflow-y-auto" id="mainContent">
      <div id="defaultContent"></div>
    </main>
  </div>

  <script>
    const panels = {
"EditProfile": `
  <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Edit Profile</h2>

    <form id="editProfileForm" class="space-y-4" enctype="multipart/form-data">

      <!-- FOTO PROFIL -->
      <div class="flex items-center space-x-4">
        <img id="profilePreview" src="/images/User.png" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover border" />
        <div>
          <label class="block mb-1 text-gray-700" for="profilePic">Profile Picture</label>
          <input type="file" id="profilePic" name="profilePic" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-2 file:border file:rounded file:border-gray-300 file:text-sm file:bg-white file:text-gray-700 hover:file:bg-gray-100"/>
        </div>
      </div>

      <!-- NAMA -->
      <div>
        <label for="firstName" class="block mb-1 text-gray-700">First Name</label>
        <input type="text" id="firstName" name="firstName" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter first name" />
      </div>

      <div>
        <label for="lastName" class="block mb-1 text-gray-700">Last Name</label>
        <input type="text" id="lastName" name="lastName" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter last name" />
      </div>

      <!-- EMAIL -->
      <div>
        <label for="email" class="block mb-1 text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="you@example.com" />
      </div>

      <!-- TELEPON -->
      <div>
        <label for="phone" class="block mb-1 text-gray-700">Phone Number</label>
        <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="+62xxxxxxxxxx" />
      </div>

      <!-- TANGGAL LAHIR -->
    <div>
    <label for="dob" class="block mb-1 text-gray-700">Date of Birth</label>
    <input type="date" id="dob" name="dob" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" />
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

    function loadPanel(name) {
      $('#sidebarMenu a').removeClass('text-green-600 font-semibold').addClass('text-gray-700');
      $('#sidebarMenu a[data-panel="' + name + '"]').removeClass('text-gray-700').addClass('text-green-600 font-semibold');
      $('#defaultContent').html(panels[name] || '<p class="text-gray-500">Content for "' + name + '" is not available.</p>');
    }

    $(document).ready(function() {
      $('#sidebarMenu a').on('click', function(e) {
        e.preventDefault();
        const panelName = $(this).data('panel');
        loadPanel(panelName);
        if (panelName === 'ShippingAddress') {
          setTimeout(initMap, 100);
        }
      });

      loadPanel('EditProfile');
    });

    function initMap() {
      const map = L.map('map').setView([-6.200000, 106.816666], 13);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
      }).addTo(map);

      let marker;
      map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        $('#lat').val(lat);
        $('#lng').val(lng);

        if (marker) {
          marker.setLatLng(e.latlng);
        } else {
          marker = L.marker(e.latlng).addTo(map);
        }

        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
          .then(res => res.json())
          .then(data => {
            const display = data.display_name || "Alamat tidak ditemukan";
            $('#autoAddress').val(display);
          });
      });
    }

    // Preview foto profil sebelum upload
$(document).on('change', '#profilePic', function(e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      $('#profilePreview').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
  }
});

   $(document).on('submit', '#editProfileForm', function(e) {
  e.preventDefault();

  const formData = new FormData(this);
  const dob = $('#dob').val(); // ambil tanggal lahir

  formData.append('dob', dob); // tambahkan ke FormData (meskipun sebenarnya udah ikut karena ada name="dob")

  $.ajax({
    url: '/api/update-profile',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    success: function(response) {
      alert('Profile updated successfully!');
    },
    error: function(xhr) {
      alert('Failed to update profile.');
    }
  });
});




  </script>
  @include("partial.footer")
</body>
</html>
