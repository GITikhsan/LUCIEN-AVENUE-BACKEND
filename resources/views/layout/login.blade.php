<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="{{ asset('css/login.css')}}" rel="stylesheet" type="text/css">
  <!-- Import Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Extend Tailwind config to use Inter -->

  </script>
</head>
<body class="min-h-screen bg-white flex items-center justify-center font-inter text-center">
  <div class="flex flex-col md:flex-row bg-white p-8 rounded-lg max-w-4xl w-full gap-10 ">

    <!-- Left Image Section -->
    <div class="flex justify-center items-center md:w-[300px]">
      <img src="/images/doggy.png" alt="Login Illustration" class="max-w-[300px] w-full object-contain">
    </div>

    <!-- Right Login Section -->
    <div class="flex-1 text-left">
      <div class="mb-6">
        <h2 class="text-3xl font-semibold mb-2">Login</h2>
        <p class="text-gray-600 text-sm">
          Don't have an account?
          <a href="/html/registerPage.html" class="text-green-600 font-bold ml-2 hover:underline">Sign up here</a>
        </p>
      </div>

      <form class="flex flex-col gap-4 mb-4">
        <input type="email" placeholder="Email address" required class="px-4 py-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-green-500"/>
        <input type="password" placeholder="Password" required class="px-4 py-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-green-500"/>
        <button type="submit" class="cta-buttonY">
          Login
        </button>
      </form>

      <div class="text-center mt-4">
        <a href="/html/forgotPage.html" class="text-green-600 font-bold text-sm inline-block mb-4 hover:underline">
          Forgot password?
        </a>

        <p class="text-sm text-gray-600 mb-2">Or login with another account</p>

        <div class="flex justify-center">
          <img src="/images/googleColor.png" alt="Google" class="h-8 cursor-pointer hover:scale-105 transition-transform duration-200">
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</body>
</html>
