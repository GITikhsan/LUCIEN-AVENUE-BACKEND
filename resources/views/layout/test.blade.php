
<!------
@extends('layout.app')

@section('title', 'About Us')

@section('content')----->

@include('partial.header')


<section class="bg-gray-100 py-16 text-center">
  <h1 class="text-4xl font-bold mb-4">TEST</h1>
  <p class="max-w-2xl mx-auto text-gray-600">
    Untuk menjadi perusahaan yang diinginkan pelanggan kami, kami — Bagus, Ikhsan Fauzi, Wahyu, Ian, Wahid, dan Zaidan — hadir dengan semangat kolaboratif dan visi global dalam dunia fashion digital.
  </p>
</section>

TEST
@endsection
<!-----
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About</title>
  <link rel="stylesheet" href="/css/AboutUs.css" />

</head>
<body>

    <div id="header">
       <div class="container">
        <h1 class="logo">VELLARE</h1>
        <nav>
            <ul id="sidemenu">
                <li><a href="/html/fashion.html"">Home</a></li>
                <li><a href="/html/homePage.html"">Shop</a></li>
                <li><a href="#contact"">Contact</a></li>
                <li><a href="/html/Login.html">Login</a></li>
                <li><a href="/html/registerPage.html">Register</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>



@endsection



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About</title>
  <link rel="stylesheet" href="/css/AboutUs.css" />
</head>
<body>


@include('partial.navbar')

<main>
    @yield('content')
</main>

@include('partial.footer')

</body>
</html>

------>
tes
