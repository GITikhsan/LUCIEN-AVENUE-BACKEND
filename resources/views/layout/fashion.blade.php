<!DOCTYPE html>
<html lang="en">
@include('partial.navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Now</title>
    <link href="{{ asset('css/fashionStyle.css')}}" rel="stylesheet" type="text/css">
</head>
<body>


<!------ Header ----->


    <div id="header">

            <div class="container">
                 <!-------
            <h1 class="logo">VELLARE</h1>
            <nav>
                <ul id="sidemenu">
                    <li><a href="#header"">Home</a></li>
                    <li><a href="/html/AboutUs.html"">About</a></li>
                    <li><a href="/html/homePage.html"">Shop</a></li>
                    <li><a href="#contact"">Contact us</a></li>
                    <li><a href="/html/Login.html"">Login</a></li>
                    <li><a href="/html/registerPage.html"">Register</a></li>
                </ul>
            </nav>
            ------------>
            <div class="header-text">
                <h2>Your Fashion, Your Future</h2>
                <p class="tagline">Explore the world of stylish sneakers 🌍</p>
                <a href="/html/homePage.html" class="cta-buttonY">Explore Now</a>
            </div>
        </div>
    </div>

    <!---------------GALLERY SECTION ------------->
    <section id="gallery">
        <h2 style="font-size: 28px; font-weight: bold;">Our Collection</h2>
        <p class="gallery-subtitle">Explore our latest shoes styles 👟</p>

        <div class="gallery-container">
                <div class="gallery-item"><img src="/images/4JT/4,240,000.png" alt="Fashion 1"></div>
                <div class="gallery-item"><img src="/images/4JT/4,450,000.png" alt="Fashion 2"></div>
                <div class="gallery-item"><img src="/images/5JT/5,000,000.png" alt="Fashion 3"></div>
                <div class="gallery-item"><img src="/images/5JT/5,550,000.png" alt="Fashion 4"></div>
                <div class="gallery-item"><img src="/images/6JT/6,040,000.png" alt="Fashion 5"></div>
                <div class="gallery-item"><img src="/images/6JT/6,470,000.png" alt="Fashion 6"></div>
                <div class="gallery-item"><img src="/images/7JT/7,950,000.png" alt="Fashion 7"></div>
                <div class="gallery-item"><img src="/images/100JT/130,000,000.png" alt="Fashion 8"></div>
        </div>
    </section>

    <!-----------Product Featured Ads------------->
    <section id="hero">
        <div class="hero-content">
            <h1>🔥 New Arrival: Streetwear Sneakers</h1>
            <p>Comfort and style come together in one step</p>
            <a href="/html/homePage.html" class="cta-buttonY">Explore Now</a>
        </div>
        <div class="hero-image">
            <img src="/images/6JT/6,040,000.png" alt="Sneaker Promo">
        </div>
    </section>


    <!---------------Highlight------------------->
    <section id="featured-products">
        <h2>Our Featured Products</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="/images/100JT/130,000,000.png" alt="Product 1">
                <h3>Air Jordan 1 Retro Low OG SP Travis Scott Velvet Browny Pink Foam</h3>
                <p>Rp 2.200.00</p>
                <a href="#" class="buy-button">Detail</a>
            </div>
            <div class="product-card">
                <img src="/images/100JT/187,500,000.png" alt="Product 2">
                <h3>Air Jordan 1 Retro Low OG SP Travis Scott Medium Olive (Toddler)</h3>
                <p>Rp 2.350.000</p>
                <a href="#" class="buy-button">Detail</a>
            </div>
            <!-- untuk Tambah produk lainnya -->
        </div>
    </section>

    <!---------------Promo-----------------
    <section id="promo-banner">
        <h2>🎉 This Week's Special: 20% OFF!</h2>
        <p>Use code<strong>STYLE20</strong>at checkout 🛒</p>
        <a href="/html/homePage.html" class="cta-buttonY">Explore Now</a>
    </section>------------>

    <!-------Contact Us--------
    <section id="contact">
        <div class="contact-container">
        <div class="container-contact-left">
            <h1>Contact us</h1>
            <p>Jika ada pertanyaan, kritik, atau saran, jangan ragu untuk menghubungi kami melalui form di bawah ini atau kontak media sosial kami.</p>
            <p><i class="fas fa-envelope"></i> Email: <span>info@namadomain.com</span></p>
            <p><i class="fab fa-whatsapp"></i> WhatsApp: <span>+62 822-8189-9371</span></p>
            <p><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Pogung Dalangan, Pogung Kidul, Sinduadi, Sleman, Yogyakarta 55284</p>
        </div>
        <div class="container-contact-right">
            <form>
                <input type="text" placeholder="Your Name" required />
                <input type="email" placeholder="Your Email" required />
                <textarea placeholder="Your Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
        </div>
    </section>------------>

    @include('partial.footer')


</body>
</html>
