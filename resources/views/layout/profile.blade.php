<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans m-0">
  <div class="grid grid-cols-[250px_1fr] grid-rows-[70px_1fr] h-screen grid-areas-[header_header] [sidebar_form]">

    <!-- Header -->
    <header class="col-span-2 bg-gradient-to-r from-gray-500 to-black text-black flex justify-center items-center text-2xl font-bold">
      VELLARE
    </header>

    <!-- Sidebar -->
    <aside class="bg-white border-r-[10px] border-gray-500 flex items-center justify-center">
      <div class=" flex flex-col items-center">

        <!-- Profile icon and info -->
        <div class="flex flex-col items-center mb-8">
          <img src="/images/User.png" alt="UserIcon" class="w-32 mb-3">
          <h2 class="text-xl font-semibold">USERNAME</h2>
          <a href="#" class="text-green-600 text-sm hover:underline">Edit picture</a>
        </div>

        <!-- Links -->
        <div class="mt-auto mb-5 text-center">
          <a href="/html/License.html" class="block text-green-600 text-sm mb-2 hover:underline">License</a>
        </div>

        <!-- Support -->
        <div class="text-center text-sm font-bold text-black">
          <img src="/images/Customer_service.png" alt="CustomerService" class="mx-auto mb-2">
          <p>Customer service</p>
        </div>
      </div>
    </aside>

    <!-- Main Form Section -->
    <main class="p-10 flex justify-center items-start">
      <form class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <label class="block font-bold mt-4">First Name :</label>
        <input type="text" placeholder="Username" class="w-full p-2 mt-1 border border-black rounded" />

        <label class="block font-bold mt-4">Last Name :</label>
        <input type="text" placeholder="Last Name" class="w-full p-2 mt-1 border border-black rounded" />

        <label class="block font-bold mt-4">Date of birth :</label>
        <div class="flex gap-3 mt-1">
          <input type="text" placeholder="Date" class="w-[100px] p-2 border border-black rounded" />
          <input type="text" placeholder="Month" class="w-[100px] p-2 border border-black rounded" />
          <input type="text" placeholder="Year" class="w-[100px] p-2 border border-black rounded" />
        </div>

        <label class="block font-bold mt-4">Your email</label>
        <input type="email" placeholder="Email" class="w-full p-2 mt-1 border border-black rounded" />

        <label class="block font-bold mt-4">Your password</label>
        <div class="relative flex items-center mt-1">
          <input type="password" placeholder="Password" class="w-full p-2 border border-black rounded" />
          <img src="/images/Password_Eye.png" alt="EyeIcon" class="absolute right-3 w-4 cursor-pointer" />
        </div>
      </form>
    </main>

  </div>
</body>
</html>
