<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <link href="{{ asset('css/register.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex items-center justify-center font-sans">

  <div class="flex flex-col md:flex-row max-w-5xl w-full p-5">

    <div class="flex-1 flex items-center justify-center">
      <img src="/images/doggy.png" alt="Illustration" class="w-full h-auto max-w-md"/>
    </div>

    <div class="flex-1 p-10">
      <h2 class="text-2xl font-semibold mb-2">Register</h2>
      <p class="mb-5">Already have an account?
        <a href="/login" class="text-green-700 font-bold hover:underline">Login here</a>
      </p>

      <form class="flex flex-col gap-3">
        <input type="email" placeholder="Email address" required class="border rounded-md w-full p-3 text-base"/>

        <div class="flex gap-3 items-center">
          <input id="phone" type="tel" placeholder="Phone number" inputmode="numeric" pattern="[0-9]*" maxlength="13" class="flex-1 p-3 border rounded-md text-base w-full"/>
        </div>


        <div class="flex items-center gap-3 mb-4">
            <input id="password" type="password" placeholder="Password" required
                   class="border rounded-md w-full p-3 text-base"/>

            <div class="flex items-center gap-1">
              <input type="checkbox" id="showPassword" class="w-4 h-4"/>
              <label for="showPassword" class="text-sm text-gray-700">Show</label>
            </div>
          </div>

          <!-- Confirm Password Field with checkbox next to it -->
          <div class="flex items-center gap-3 mb-4">
            <input id="confirmPassword" type="password" placeholder="Confirm Password" required
                   class="border rounded-md w-full p-3 text-base"/>

            <div class="flex items-center gap-1">
              <input type="checkbox" id="showConfirmPassword" class="w-4 h-4"/>
              <label for="showConfirmPassword" class="text-sm text-gray-700">Show</label>
            </div>
          </div>

        <button type="submit" class="cta-buttonY">Confirm</button>
      </form>

      <small class="text-gray-500 text-sm text-center mt-3 block">Your data will be protected and will not be shared</small>
    </div>
  </div>

  <script>
    const toggleVisibility = (checkboxId, inputId) => {
      document.getElementById(checkboxId).addEventListener("change", function () {
        const input = document.getElementById(inputId);
        input.type = this.checked ? "text" : "password";
      });
    };

    toggleVisibility("showPassword", "password");
    toggleVisibility("showConfirmPassword", "confirmPassword");
  </script>
  <script src="/javascript/countryCode.js"></script>
</body>
</html>
