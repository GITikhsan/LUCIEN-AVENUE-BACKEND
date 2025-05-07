<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OTP Verification</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{ asset('css/login.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="bg-gradient-to-b from-gray-50 to-white min-h-screen flex items-center justify-center">
  <div class="bg-white rounded-3xl w-full max-w-sm p-8 sm:p-10 text-center">
    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6">
      Verify your email
    </h2>
    <p class="text-sm text-gray-500 mb-8">We’ve sent a 6-digit code to your email. Enter it below to confirm.</p>

    <!-- OTP Input -->
    <div class="otp flex justify-center gap-3 mb-6">
      <input type="text" maxlength="1" class="w-12 h-12 sm:w-14 sm:h-14 text-center text-xl sm:text-2xl font-medium border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 transition" />
      <input type="text" maxlength="1" class="w-12 h-12 sm:w-14 sm:h-14 text-center text-xl sm:text-2xl font-medium border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 transition" />
      <input type="text" maxlength="1" class="w-12 h-12 sm:w-14 sm:h-14 text-center text-xl sm:text-2xl font-medium border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 transition" />
      <input type="text" maxlength="1" class="w-12 h-12 sm:w-14 sm:h-14 text-center text-xl sm:text-2xl font-medium border border-gray-300 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 transition" />
    </div>

    <!-- Confirm Button -->
    <button class="cta-buttonY disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed"
    disabled>
      Confirm Code
    </button>

    <!-- Links -->
    <div class="mt-6 text-sm text-gray-600 space-y-2">
      <a href="#" class="text-green-700 font-bold hover:underline">Resend Code</a>

    </div>
  </div>
  <script>

const inputs = document.querySelectorAll('.otp input');

inputs.forEach((input, index) => {
  input.addEventListener('input', () => {
    // Move to next input if current one has a value
    if (input.value.length === 1 && index < inputs.length - 1) {
      inputs[index + 1].focus();
    }
  });

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Backspace') {
      if (input.value === '' && index > 0) {
        inputs[index - 1].focus();
      }
    }
  });
});

function checkAllFilled() {
  const allFilled = Array.from(inputs).every(i => i.value !== '');
  if (allFilled) {
    document.querySelector('.cta-buttonY').disabled = false;
  } else {
    document.querySelector('.cta-buttonY').disabled = true;
  }
}

inputs.forEach(input => {
  input.addEventListener('input', checkAllFilled);
});

  </script>
</body>
</html>
