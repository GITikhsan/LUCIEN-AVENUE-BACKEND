<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Now</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/fashionStyle.css')}}" rel="stylesheet" type="text/css">

   
</head>
<body class="bg-white font-sans">
    @include('partial.sticknavbar')

    <!-- Header Section -->
    <div class="relative w-full h-screen bg-cover bg-center" style="background-image: url('/images/M_BC_SHOES_LVTrainerDenim_Mars_01_DI3.webp');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
        <div class="container mx-auto px-6 relative z-10 flex items-center justify-center h-full">
            <div class="text-gray-200 text-center">
                <h2 class="text-4xl md:text-6xl font-bold mb-4 animate-pulse uppercase tracking-widest">Your Fashion, Your Future</h2>
                <p class="text-lg text-gray-300 mb-6">Explore the world of stylish sneakers 🌍</p>
                <a href="/html/homePage.html" class="bg-gray-400 text-black hover:bg-green-800 hover:text-white font-bold py-3 px-6 rounded-full transition-transform duration-300 transform hover:scale-105 inline-block">Explore Now</a>
            </div>
        </div>
    </div>'
    

    <!-- Gallery Section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


    <div class="gallery-slider">
        <div><img src="/images/4JT/4,240,000.png" alt="Fashion 1" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/3JT/3,210,000(1).png" alt="Fashion 2" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/2JT/2,030,000(1).png" alt="Fashion 3" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/4JT/4,240,000.png" alt="Fashion 4" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/3JT/3,210,000(1).png" alt="Fashion 5" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/2JT/2,030,000(1).png" alt="Fashion 6" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/3JT/3,210,000(1).png" alt="Fashion 7" class="w-full rounded-xl shadow-md"></div>
        <div><img src="/images/2JT/2,030,000(1).png" alt="Fashion 8" class="w-full rounded-xl shadow-md"></div>
    </div>
    <script>
    $(document).ready(function(){
        $('.gallery-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        responsive: [
            {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
            },
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2
            }
            }
        ]
        });
    });
    </script>
    <style>
     .slick-prev {
        left: -40px; 
    }

    .slick-next {
       right: -40px;
    }
        
    .slick-slide {
        padding: 10px;
    }
    .slick-prev, .slick-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 50;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.7); 
        border-radius: 50%;

    }

    .slick-prev:before, .slick-next:before {
        color: black;
        font-size: 40px;
    }
    .gallery-slider {
       

        position: relative;
        padding: 10px;
        margin: 0 auto;
        max-width: 1200px;
        overflow: visible;
        
        
    }
    </style>

    <!-- Hero Section -->
    <section id="hero" class="flex flex-col md:flex-row items-center justify-between bg-gray-200 px-6 md:px-20 py-16 gap-8">
        <div class="flex-1 text-left">
            <h1 class="text-3xl md:text-4xl font-bold text-black mb-4">🔥 New Arrival: Streetwear Sneakers</h1>
            <p class="text-gray-700 mb-6">Comfort and style come together in one step</p>
            <a href="/html/homePage.html" class="bg-gray-400 text-black hover:bg-green-800 hover:text-white font-bold py-3 px-6 rounded-full transition-transform duration-300 transform hover:scale-105 inline-block">Explore Now</a>
        </div>
        <div class="flex-1 text-center">
            <img src="/images/3JT/3,210,000(1).png" alt="Sneaker Promo" class="max-w-xs w-full rounded-xl mx-auto">
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="featured-products" class="py-16 px-4 md:px-20 bg-white text-black text-center">
        <h2 class="text-2xl font-bold mb-10">Our Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="bg-white rounded-xl shadow-md p-4 hover:-translate-y-1 transition">
                <img src="/images/3JT/3,210,000(1).png" alt="Product 1" class="w-full rounded-md mb-3">
                <h3 class="font-semibold text-lg mb-2">Air Jordan 1 Retro Low OG SP Travis Scott Velvet Browny Pink Foam</h3>
                <p class="mb-3">Rp 2.200.000</p>
                <a href="#" class="inline-block bg-gray-300 hover:bg-green-800 hover:text-white py-2 px-4 rounded-full">Detail</a>
            </div>
            <div class="bg-white rounded-xl shadow-md p-4 hover:-translate-y-1 transition">
                <img src="/images/3JT/3,210,000(1).png" alt="Product 2" class="w-full rounded-md mb-3">
                <h3 class="font-semibold text-lg mb-2">Air Jordan 1 Retro Low OG SP Travis Scott Medium Olive (Toddler)</h3>
                <p class="mb-3">Rp 2.350.000</p>
                <a href="#" class="inline-block bg-gray-300 hover:bg-green-800 hover:text-white py-2 px-4 rounded-full">Detail</a>
            </div>
            <div class="bg-white rounded-xl shadow-md p-4 hover:-translate-y-1 transition">
                <img src="/images/3JT/3,210,000(1).png" alt="Product 2" class="w-full rounded-md mb-3">
                <h3 class="font-semibold text-lg mb-2">Air Jordan 1 Retro Low OG SP Travis Scott Medium Olive (Toddler)</h3>
                <p class="mb-3">Rp 2.350.000</p>
                <a href="#" class="inline-block bg-gray-300 hover:bg-green-800 hover:text-white py-2 px-4 rounded-full">Detail</a>
            </div>
            <div class="bg-white rounded-xl shadow-md p-4 hover:-translate-y-1 transition">
                <img src="/images/3JT/3,210,000(1).png" alt="Product 2" class="w-full rounded-md mb-3">
                <h3 class="font-semibold text-lg mb-2">Air Jordan 1 Retro Low OG SP Travis Scott Medium Olive (Toddler)</h3>
                <p class="mb-3">Rp 2.350.000</p>
                <a href="#" class="inline-block bg-gray-300 hover:bg-green-800 hover:text-white py-2 px-4 rounded-full">Detail</a>
            </div>
            
        </div>
        <div class="mt-10">
            <a href="/html/homePage.html" class="bg-gray-400 text-black hover:bg-green-800 hover:text-white font-bold py-3 px-6 rounded-full transition-transform duration-300 transform hover:scale-105 inline-block">Explore Now</a>
        </div>
    </section>

    @include('partial.footer')
</body>
</html>
