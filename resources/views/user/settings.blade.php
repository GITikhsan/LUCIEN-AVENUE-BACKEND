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

  <!-- Layout wrapper -->
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="bg-white w-64 shadow-md p-4">
      <div class="mb-8">
        <h1 class="text-lg font-semibold text-black">Lucien Avenue</h1>
        <p class="text-xs text-gray-500">Dashboard</p>
      </div>
      <nav class="space-y-4" id="sidebarMenu">
        <a href="#" data-panel="EditProfile" class="block text-base text-gray-700 hover:text-green-600">Edit your profile</a>
        <a href="#" data-panel="Discussion" class="block text-base text-gray-700 hover:text-green-600">Chat</a>
        <a href="#" data-panel="Product" class="block text-base text-gray-700 hover:text-green-600">Product Input</a>
        <a href="#" data-panel="ImageInput" class="block text-base text-gray-700 hover:text-green-600">Image Input</a>
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
        <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-xl mt-10">
  <h2 class="text-xl font-bold text-gray-800 mb-4">Ubah Data Pribadi</h2>

  <form class="space-y-4">
    <div>
      <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
      <input id="nama" type="text" class="input w-full"  />
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
      <input id="email" type="email" class="input w-full" value="andi@email.com" />
    </div>

    <div>
      <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
      <input id="telepon" type="tel" class="input w-full" value="081234567890" />
    </div>

    <div class="pt-4">
      <button type="submit" class="px-6 py-2 bg-black text-white rounded-xl hover:bg-gray-800">
        Simpan Perubahan
      </button>
    </div>
  </form>
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


  </script>

</body>
</html>
