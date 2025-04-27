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


        <div class="relative mb-4">
            <input id="password" type="password" placeholder="Password"
                   class="w-full border rounded-md p-3 pr-10 text-base"/>

            <!-- Eye icon button -->
            <button type="button" id="togglePassword"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 focus:outline-none">
              <img id="eyeIcon" src="/public/images/password_hide.png" alt="Toggle Eye" class="w-5 h-5">
            </button>
          </div>


        <button type="submit" class="cta-buttonY">Confirm</button>
      </form>

      <small class="text-gray-500 text-sm text-center mt-3 block">Your data will be protected and will not be shared</small>
    </div>
  </div>

  <script>
    const passwordInput = document.getElementById("password");
    const toggleButton = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

    toggleButton.addEventListener("click", () => {
      const isPasswordVisible = passwordInput.type === "text";

      passwordInput.type = isPasswordVisible ? "password" : "text";

      // Change the image based on visibility
      eyeIcon.src = isPasswordVisible ? "/public/images/password_hide.png" : "/public/images/password_show.png";
      eyeIcon.alt = isPasswordVisible ? "Show password" : "Hide password";
    });
  </script>

  <script src="/javascript/countryCode.js"></script>
</body>
</html>
