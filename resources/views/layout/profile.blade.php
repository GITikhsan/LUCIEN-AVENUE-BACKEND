<!DOCTYPE html>
<html lang="en">
    @include('partial.navbar')
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 font-sans bg-white">

  <div class="grid md:grid-cols-[250px_1fr] grid-cols-1 grid-rows-[auto_1fr] h-screen">

    <!-- SIDEBAR -->
    <aside class="grid-in-sidebar flex flex-col items-center justify-start border-r border-gray-200 p-5">
      <div class="w-full text-center mb-6">
        <h2 class="mt-2 text-lg font-semibold">USERNAME</h2>
      </div>

      <!-- MENU -->
      <ul class="w-full text-sm font-semibold space-y-4">
        <li><a href="#DATA SAYA" class="flex justify-between items-center hover:text-green-600 transition">DATA SAYA <span>→</span></a></li>
        <li><a href="#" class="flex justify-between items-center hover:text-green-600 transition">PEMBELIAN SAYA <span>→</span></a></li>
        <li><a href="#" class="flex justify-between items-center hover:text-green-600 transition">PENGEMBALIAN <span>→</span></a></li>
        <li><a href="#" class="flex justify-between items-center hover:text-green-600 transition">LANGGANAN SAYA <span>→</span></a></li>
        <li><a href="#" class="flex justify-between items-center hover:text-green-600 transition">BANTUAN <span>→</span></a></li>
        <li><a href="#" class="flex justify-between items-center hover:text-green-600 transition">WISHLIST <span>→</span></a></li>
      </ul>
    </aside>

    <!-- MAIN PANEL -->
    <main id="contentPanel" class="grid-in-form flex justify-center items-start p-10 overflow-auto">
      <!-- Konten awal (DATA SAYA) -->
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

        <!-- Alamat Saya -->
        <label class="font-bold mt-5 block">Alamat :</label>
        <textarea placeholder="Alamat lengkap" class="w-full p-2 mt-1 border border-black rounded"></textarea>

        <label class="font-bold mt-5 block">Your email</label>
        <input type="email" placeholder="Email" class="w-full p-2 mt-1 border border-black rounded"/>

        <label class="font-bold mt-5 block">Your password</label>
        <div class="relative mb-4">
            <input id="password" type="password" placeholder="Password"
                    class="w-full p-2 mt-1 border border-black rounded"/>
            <button type="button" id="togglePassword"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 focus:outline-none">
              <img id="eyeIcon" src="/images/password_hide.png" alt="Toggle Eye" class="w-5 h-5">
            </button>
        </div>
      </form>
    </main>
  </div>

  <!-- SCRIPTS -->
  <script>
    // Toggle password visibility
    const passwordInput = document.getElementById("password");
    const toggleButton = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

    toggleButton.addEventListener("click", () => {
      const isVisible = passwordInput.type === "text";
      passwordInput.type = isVisible ? "password" : "text";
      eyeIcon.src = isVisible ? "/images/password_hide.png" : "/images/password_show.png";
      eyeIcon.alt = isVisible ? "Show password" : "Hide password";
    });

    // Ganti konten panel
    document.querySelectorAll("aside ul li a").forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const text = this.innerText.trim();
        let contentHTML = "";

        switch (text) {
          case "DATA SAYA":
            contentHTML = 
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
                  <input type="password" placeholder="Password" class="w-full p-2 mt-1 border border-black rounded"/>
                </div>
              </form>
            ;
            break;
          case "PEMBELIAN SAYA":
            contentHTML = <div class="w-full max-w-xl"><h1 class="text-2xl font-bold mb-4">Pembelian Saya</h1><p>Riwayat pembelian akan tampil di sini.</p></div>;
            break;
          default:
            contentHTML = <div class="w-full max-w-xl"><h1 class="text-2xl font-bold mb-4">${text}</h1><p>Konten belum tersedia.</p></div>;
        }

        document.getElementById("contentPanel").innerHTML = contentHTML;
      });
    });
  </script>

  <script src="/javascript/countryCode.js"></script>
</body>
</html>
@include("partial.footer")
