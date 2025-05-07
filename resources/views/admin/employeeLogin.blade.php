<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LoginEmployeePage</title>
  <link href="{{ asset('css/login.css')}}" rel="stylesheet" type="text/css">
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Import Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="min-h-screen bg-white flex items-center justify-center font-inter">
  <div class="flex flex-col md:flex-row bg-white p-8 rounded-lg  max-w-5xl w-full gap-10 items-center">



    <!-- Right Login Section -->
    <div class="flex-1 w-full md:w-1/2">
      <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2 text-center">Karyawan Wajib Login!!!</h2>
      </div>

      <form class="flex flex-col gap-4 mb-6">
        <input type="username" placeholder="Username" required class="border rounded-md w-full p-3 text-base" />
        <div class="relative mb-4">
            <input id="password" type="password" placeholder="Password"
                   class="w-full border rounded-md p-3 pr-10 text-base"/>

            <button type="button" id="togglePassword"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 focus:outline-none">
              <img id="eyeIcon" src="/images/password_hide.png" alt="Toggle Eye" class="w-5 h-5">
            </button>
          </div>
        <button type="submit" class="cta-buttonY">
         Login
        </button>
      </form>

<script>
const passwordInput = document.getElementById("password");
    const toggleButton = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

  toggleButton.addEventListener("click", () => {
    const isPasswordVisible = passwordInput.type === "text";
    passwordInput.type = isPasswordVisible ? "password" : "text";
    eyeIcon.src = isPasswordVisible ? "/images/password_hide.png" : "/images/password_show.png";
    eyeIcon.alt = isPasswordVisible ? "Show password" : "Hide password";
  });
</script>
  <script src="/javascript/countryCode.js"></script>
</body>
</html>
