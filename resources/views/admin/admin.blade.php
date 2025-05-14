<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 font-sans text-sm">
  <div class="flex min-h-screen">
    <aside class="bg-white w-64 shadow-md p-4">
      <div class="mb-8">
        <h1 class="text-lg font-semibold text-black">Lucien Avenue</h1>
        <p class="text-xs text-gray-500">Dashboard</p>
      </div>
      <nav class="space-y-4" id="sidebarMenu">
        <a href="#" data-panel="Home" class="block text-base text-gray-700 hover:text-green-600">Home</a>
        <a href="#" data-panel="Discussion" class="block text-base text-gray-700 hover:text-green-600">Chat</a>
        <a href="#" data-panel="Product" class="block text-base text-gray-700 hover:text-green-600">Product Input</a>
        <a href="#" data-panel="ImageInput" class="block text-base text-gray-700 hover:text-green-600">Image Input</a>
      </nav>
    </aside>
    <main class="flex-1 p-6 overflow-y-auto" id="mainContent">
      <div id="defaultContent"></div>
    </main>
  </div>

  <script>
    const panels = { "Home": `
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-xl font-semibold text-gray-800">Activity</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-4 mb-6">
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">New Orders</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">Ready to Ship</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">New Chats</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">New Discussions</p>
            <p class="text-xl font-bold">0</p>
          </div>
          <div class="bg-white p-4 rounded-xl shadow-sm text-center">
            <p class="text-gray-500">New Reviews</p>
            <p class="text-xl font-bold">0</p>
          </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow mb-6">
          <h3 class="font-semibold mb-2">Store and Product Analysis</h3>
          <p class="text-gray-400 text-sm">Last update: </p>
          <div class="h-24 bg-gray-100 mt-4 rounded animate-pulse"></div>
        </div>
      `,

      "Discussion": `
        <div class="bg-white p-6 rounded-xl shadow">
          <h3 class="text-xl font-semibold mb-4">Product Discussion</h3>
          <div class="space-y-4">
            <div class="border p-4 rounded">
              <p class="font-semibold">User123:</p>
              <p class="text-gray-700">Is this product compatible with Android 12?</p>
              <p class="text-sm text-gray-500 mt-2">2 hours ago</p>
            </div>
            <div class="border p-4 rounded bg-gray-50">
              <p class="font-semibold">Admin:</p>
              <p class="text-gray-700">Yes, this product is compatible with Android 12 and above.</p>
              <p class="text-sm text-gray-500 mt-2">1 hour ago</p>
            </div>
            <div class="mt-6">
              <textarea placeholder="Write a reply..." class="w-full p-2 border rounded mb-2"></textarea>
              <button class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-600">Reply</button>
            </div>
          </div>
        </div>
      `,

      "Product" : `
      <div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 w-80 text-center">
          <h3 class="text-lg font-semibold mb-4">Are you sure?</h3>
          <div class="flex justify-center gap-4">
            <button id="confirmYes" class="bg-gray-300 hover:bg-green-400 text-black px-4 py-2 rounded">Yes</button>
            <button id="confirmNo" class="bg-gray-300 hover:bg-green-400 text-black px-4 py-2 rounded">No</button>
          </div>
        </div>
      </div>

      <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Shoe Data Input</h2>

        <form class="space-y-4">
          <div>
            <label for="nama" class="block mb-1 text-gray-700">Shoe Name</label>
            <input type="text" id="nama" name="nama" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Shoe name">
          </div>

          <div>
            <label for="merek" class="block mb-1 text-gray-700">Brand</label>
            <input type="text" id="merek" name="merek" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Brand">
          </div>

          <div>
            <label for="harga" class="block mb-1 text-gray-700">Price (Rp)</label>
            <input type="number" id="harga" name="harga" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Price">
          </div>

          <div>
            <label for="ukuran" class="block mb-1 text-gray-700">Size</label>
            <select id="ukuran" name="ukuran" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
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

          <div>
            <label for="Color" class="block mb-1 text-gray-700">Color</label>
            <input type="text" id="Color" name="Color" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Color">
          </div>

          <div>
            <label for="Material" class="block mb-1 text-gray-700">Material</label>
            <input type="text" id="Material" name="Material" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Material">
          </div>



          <div>
            <label for="Gender" class="block mb-1 text-gray-700">Gender</label>
            <select id="Gender" name="Gender" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Unisex">Unisex</option>
            </select>
          </div>

          <div>
            <label for="Description" class="block mb-1 text-gray-700">Description</label>
            <textarea id="Description" name="Description" rows="4" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500 resize-none" placeholder="Add description"></textarea>
          </div>


          <div class="pt-2">
            <button type="submit" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Save</button>
          </div>
        </form>
      </div>
      `,

      "ImageInput" : `

      <<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Upload Images (Max 9)</h2>
    <form id="imageUploadForm" class="space-y-4" enctype="multipart/form-data">
      <label id="dropZone" class="flex items-center justify-center w-full p-6 border-2 border-dashed border-gray-300 rounded cursor-pointer bg-gray-50 text-gray-500 hover:bg-gray-100 transition">
        <p>Drag & drop images here or click to select</p>
        <input type="file" id="imageInput" accept="image/*" multiple class="hidden" />
      </label>
      <p class="text-sm text-gray-500">You can upload up to 9 images.</p>
      <div id="imagePreview" class="grid grid-cols-3 gap-4 mt-4"></div>
      <button type="submit" id="submitImages" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded w-full">Save Images</button>
    </form>
  </div>

 `
};

    function loadPanel(name) {
      $("#sidebarMenu a").removeClass("text-green-600 font-semibold").addClass("text-gray-700");
      const $activeLink = $(`#sidebarMenu a[data-panel='${name}']`);
      $activeLink.removeClass("text-gray-700").addClass("text-green-600 font-semibold");
      $("#defaultContent").html(panels[name] || `<p class='text-gray-500'>Content for "${name}" is not available.</p>`);
    }

    $(document).ready(function () {
      $("#sidebarMenu a").on("click", function (e) {
        e.preventDefault();
        const panelName = $(this).data("panel");
        loadPanel(panelName);
      });

      loadPanel("Home");

      let uploadedImages = [];

      function updatePreview() {
        const previewContainer = $('#imagePreview');
        previewContainer.html('');
        uploadedImages.forEach((file, index) => {
          const reader = new FileReader();
          reader.onload = function (e) {
            const img = $('<img>').attr('src', e.target.result).addClass('w-full h-32 object-cover rounded shadow');
            const wrapper = $('<div>').addClass('relative');
            const removeBtn = $('<button>')
              .addClass('absolute top-1 right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center')
              .html('&times;')
              .on('click', () => {
                uploadedImages.splice(index, 1);
                updatePreview();
              });
            wrapper.append(img).append(removeBtn);
            previewContainer.append(wrapper);
          };
          reader.readAsDataURL(file);
        });
      }

      $(document).on('click', '#dropZone', function () {
        $('#imageInput').click();
      });

      $(document).on('change', '#imageInput', function () {
        const newFiles = Array.from(this.files);
        if (uploadedImages.length + newFiles.length > 9) {
          alert('You can only upload up to 9 images.');
          return;
        }
        uploadedImages = uploadedImages.concat(newFiles);
        updatePreview();
      });

      $(document).on('dragover', '#dropZone', function (e) {
        e.preventDefault();
        $(this).addClass('bg-green-100');
      });

      $(document).on('dragleave', '#dropZone', function () {
        $(this).removeClass('bg-green-100');
      });

      $(document).on('drop', '#dropZone', function (e) {
        e.preventDefault();
        $(this).removeClass('bg-green-100');
        const droppedFiles = Array.from(e.originalEvent.dataTransfer.files);
        if (uploadedImages.length + droppedFiles.length > 9) {
          alert('You can only upload up to 9 images.');
          return;
        }
        uploadedImages = uploadedImages.concat(droppedFiles);
        updatePreview();
      });

      $(document).on('submit', '#imageUploadForm', function (e) {
        e.preventDefault();
        if (uploadedImages.length === 0) {
          alert('Please upload at least one image.');
          return;
        }
        alert(uploadedImages.length + ' image(s) submitted!');
        uploadedImages = [];
        updatePreview();
        $('#imageInput').val('');
      });

      $(document).on("click", "form button[type=submit]", function(e) {
        e.preventDefault();
        $("#confirmModal").removeClass("hidden");
      });

      $(document).on("click", "#confirmYes", function() {
        $("#confirmModal").addClass("hidden");
        alert("Data has been saved!");
        $("form")[0].reset();
      });

      $(document).on("click", "#confirmNo", function() {
        $("#confirmModal").addClass("hidden");
      });
    });
  </script>
</body>
</html>
