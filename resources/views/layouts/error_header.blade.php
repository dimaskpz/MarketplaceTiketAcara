<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size: 16px;}
    img {margin-bottom: -8px;}
    .mySlides {display: none;}
    </style>
  </head>
  <body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
      <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button"><b>VIHO</b>Workshop System</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
          {{-- LINK LOGIN --}}
                @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="w3-bar-item w3-button">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                            @endif
                        @endauth
                @endif
        </div>
      </div>
    </div>
    <div class="w3-display-left w3-padding w3-hide-small" style="width:40%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-large">
          @yield('content')
        </h1>
        <hr class="w3-opacity">
        <a href="{{ route('Welcome') }}" class="w3-button w3-teal">Kembali</a>

      </div>
    </div>
  </body>
</html>
