<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '266149197994866');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=266149197994866&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->
    
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180685280-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-180685280-1');
  </script>
    <meta charset="UTF-8">
    <meta name="description" content="Prueba tu suerte con nosotros, compra un ticket y podrias ser el flamante ganador de una propiedad" />
    <meta name="keywords" content="rifo mi propiedad, rifa departamento, rifa casa, rifa, propiedad, casa, departamento" />
    @yield('meta')
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Francisca Ocares, Ivan Saez">
    <link rel="icon" href="{{ asset('images/variantes logo rifopoly-07.png') }}" type="image/jpg">
    <title>Rifopoly</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/9987974c2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;700&display=swap" rel="stylesheet">
    <style>
      html{
        scroll-behavior: smooth;
      }
    </style>
    @yield('css')
  @toastr_css

</head>

<body>
    <div id="loader-page" class="loader-page"></div>
     <!-- BOTÓN FLOTANTE WSP -->
     <a href="https://wa.me/56942940824"><div class="plus-button" style="background-size: cover;"></div></a>
    @include('layouts.public.header')
    @yield('content')
    
    @include('layouts.public.footer')

    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script type="text/javascript">
      $(window).on('load', function () {
            setTimeout(function () {
          $(".loader-page").css({visibility:"hidden",opacity:"0"})
        }, 1);
      });
  </script>
  <script>
    function toggleMenu() {
      const menuToggle = document.querySelector('.toggle');
      const navigation = document.querySelector('.navigation');
      menuToggle.classList.toggle('active')
      navigation.classList.toggle('active')
  }
  </script>


<script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml2');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: false})
    .add({
      targets: '.ml2 .letter',
      scale: [4,1],
      opacity: [0,1],
      translateZ: 0,
      easing: "easeOutExpo",
      duration: 950,
      delay: (el, i) => 70*i
    });
    $(document).ready(function() {
        // Inicializando WOW
        new WOW().init();
    });
  </script> 
  @toastr_js
  @toastr_render
    @yield('scripts')
    </body>
</html>