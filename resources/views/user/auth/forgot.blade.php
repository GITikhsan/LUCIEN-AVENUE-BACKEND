<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Forgot Password</title>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Import Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-white flex items-center justify-center font-inter">
  <div class="flex flex-col md:flex-row bg-white p-8 rounded-lg max-w-4xl w-full gap-10 items-center">

    <!-- Left Image Section -->
    <div class="flex-shrink-0 flex items-center justify-center w-full md:w-1/2">
      <img src="/images/LoginIcon.png" alt="Forgot Password Illustration" class="w-full h-auto max-w-md object-contain">
    </div>

    <!-- Right Form Section -->
    <div class="flex-1 w-full md:w-1/2">
      <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Forgot Password</h2>
        <p class="text-gray-600 text-sm">
          Enter your email address to reset your password
        </p>
      </div>

      <form class="flex flex-col gap-4 mb-6">
        <input type="email" placeholder="Email address" required class="border rounded-md w-full p-3 text-base" />
        <button type="submit" class="cta-buttonY">
          Send Reset Link
        </button>
      </form>

      <div class="text-center">
        <a href="{{ url('/login') }}" class="text-green-700 font-bold hover:underline">
          Back to Login
        </a>
      </div>
    </div>

  </div>
</body>
</html>
