<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OTP Verification</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    .otp-box {
      background-image: url('/images/Loginicon.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-blend-mode: overlay;
      background-color: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(6px);
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <!-- OTP Form Content -->
  <div class="otp-box w-full max-w-md p-8 rounded-lg shadow-lg text-center border border-gray-300">

    <h2 class="text-2xl font-semibold mb-2">OTP Verification</h2>
    <p class="text-gray-800 text-sm mb-6">
      We’ve sent a 6-digit verification code to your email. Please enter it below.
    </p>

    <form class="flex flex-col gap-4 mb-6">
      <div class="grid grid-cols-6 gap-2">
        <input type="text" maxlength="1" class="otp-input border rounded-md p-3 text-center text-lg bg-white bg-opacity-80" />
        <input type="text" maxlength="1" class="otp-input border rounded-md p-3 text-center text-lg bg-white bg-opacity-80" />
        <input type="text" maxlength="1" class="otp-input border rounded-md p-3 text-center text-lg bg-white bg-opacity-80" />
        <input type="text" maxlength="1" class="otp-input border rounded-md p-3 text-center text-lg bg-white bg-opacity-80" />
        <input type="text" maxlength="1" class="otp-input border rounded-md p-3 text-center text-lg bg-white bg-opacity-80" />
        <input type="text" maxlength="1" class="otp-input border rounded-md p-3 text-center text-lg bg-white bg-opacity-80" />
      </div>

      <button type="submit" class="mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md transition duration-200">
        Verify OTP
      </button>
    </form>

    <p class="text-sm text-gray-800">
      Didn't receive the code?
      <a href="#" class="text-green-700 font-bold hover:underline">Resend Code</a>
    </p>
  </div>

  <script>
    // Auto focus between inputs
    const inputs = document.querySelectorAll('.otp-input');
    inputs.forEach((input, index) => {
      input.addEventListener('input', () => {
        if (input.value && index < inputs.length - 1) {
          inputs[index + 1].focus();
        }
      });

      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
          inputs[index - 1].focus();
        }
      });
    });
  </script>
</body>
</html>
