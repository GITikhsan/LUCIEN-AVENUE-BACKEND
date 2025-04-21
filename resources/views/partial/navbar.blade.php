<header class="relative flex justify-between items-center px-6 py-4 border-b">

  <nav class="flex space-x-8 font-medium text-gray-900 flex items-center">
    <a href="{{ url('/fashion') }}" class="px-3 py-1 rounded-md hover:bg-gray-200 transition">Home</a>
    <a href="{{ url('/aboutus') }}" class="px-3 py-1 rounded-md hover:bg-gray-200 transition">About</a>
    <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-200 transition">Shop</a>
    
  </nav>

  <div class="absolute left-1/2 transform -translate-x-1/2">
  <div class="w-full max-w-sm min-w-[900px] px-2">
    <div class="relative">
      <!-- Icon search -->
      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
        </svg>
      </div>
      <!-- Input field -->
      <input
        type="text"
        placeholder="Search something.."
        class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-10 pr-4 py-2 transition duration-300 ease-in-out focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
      />
    </div>
  </div>
</div>


  <div class="font-medium text-gray-900 flex items-center gap-1">
    <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-200 transition">Log in</a>
    <a href="#" class="px-3 py-1 rounded-md hover:bg-gray-200 transition">Register</a>
  </div>
</header>