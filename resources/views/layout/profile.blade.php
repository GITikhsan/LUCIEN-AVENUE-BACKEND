<!DOCTYPE html>
<html lang="en">
    @include('partial.navbar')
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 font-sans bg-white">

  <div class="grid grid-cols-[250px_1fr] grid-rows-[70px_1fr] grid-areas-template h-screen">


    <aside class="grid-in-sidebar  flex items-center justify-center">
      <div class="bg-white w-[90%] p-5 rounded-lg shadow-md flex flex-col items-center">
        <div class="text-center mb-4">
          <img src="/images/User.png" alt="UserIcon" class="w-32 mx-auto" />
          <h2 class="mt-2 text-lg font-semibold">USERNAME</h2>
          <a href="#" class="text-green-600 text-sm hover:underline">Edit picture</a>
        </div>

        <div class="mt-auto mb-5 text-center">
          <a href="/license" class="block text-green-600 text-xs my-1 hover:underline">License</a>
        </div>

        <div class="text-center text-sm font-bold text-black">
          <img src="/images/Customer_service.png" alt="CustomerService" class="mx-auto mb-1 w-6" />
          <p>Customer service</p>
        </div>
      </div>
    </aside>

    <main class="grid-in-form flex justify-center items-start p-10">
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

        <label class="font-bold mt-5 block">Your email</label>
        <input type="email" placeholder="Email" class="w-full p-2 mt-1 border border-black rounded"/>

        <label class="font-bold mt-5 block">Your password</label>
        <div class="relative flex items-center mt-1">
          <input type="password" placeholder="Password" class="w-full p-2 border border-black rounded pr-10"/>
          <img src="/images/Password_Eye.png" alt="EyeIcon" class="absolute right-3 w-5 cursor-pointer"/>
        </div>
      </form>
    </main>
  </div>

  <style>
    /* Custom CSS Grid Names for Tailwind CSS (not supported directly) */
    .grid-areas-template {
      grid-template-areas:
        "header header"
        "sidebar form";
    }
    .grid-in-header {
      grid-area: header;
    }
    .grid-in-sidebar {
      grid-area: sidebar;
    }
    .grid-in-form {
      grid-area: form;
    }
  </style>

</body>
</html>
@include("partial.footer")
