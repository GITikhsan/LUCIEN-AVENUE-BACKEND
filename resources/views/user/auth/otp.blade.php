<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OTP Verification</title>
  <link href="{{ asset('css/otp.css')}}" rel="stylesheet" type="text/css">
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Inter Font (optional) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-white font-sans relative overflow-hidden">

  <div class="w-full max-w-xl px-4 text-center relative">
    <!-- Heading -->
    <h2 class="font-bold text-xl absolute top-[7%] left-1/2 transform -translate-x-1/2 z-20">
      We sent the OTP code through your email
    </h2>

    <!-- Background Illustration -->
    <img src="/images/Loginicon.png" alt="Illustration" class="w-full opacity-50 z-0" />

    <!-- OTP Inputs -->
    <div class="absolute top-[40%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex gap-4 z-20">
      <input type="text" maxlength="1" class="Otp w-14 h-14 text-center text-lg border border-black rounded bg-white-600 focus:outline-none" />
      <input type="text" maxlength="1" class="Otp w-14 h-14 text-center text-lg border border-black rounded bg-white-600 focus:outline-none" />
      <input type="text" maxlength="1" class="Otp w-14 h-14 text-center text-lg border border-black rounded bg-white-600 focus:outline-none" />
      <input type="text" maxlength="1" class="Otp w-14 h-14 text-center text-lg border border-black rounded bg-white-600 focus:outline-none" />
    </div>

    <!-- Confirm Button -->
    <button type="submit" class="cta-buttonY top-[30%]">Confirm</button>

    <!-- Links -->
    <div class="mt-10 z-20 relative">
      <a href="forgotPage.html" class="block text-green-700 font-bold mt-4 hover:underline">Resend Code?</a>
    </div>
  </div>
  <script>
    // Auto focus between inputs
    const inputs = document.querySelectorAll('.Otp');
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
