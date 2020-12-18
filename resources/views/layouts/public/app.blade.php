<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
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
          src="https://www.facebook.com/tr?id=266149197994866&ev=PageView&noscript=1"/>
        </noscript>
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
    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="{{ asset('img/favicon.png') }}" type="{{ asset('image/jpg') }}">
        
        <title>Rifo Mi Propiedad</title>
        <meta property="og:url" content="{{ asset('propiedades') }}" >
        <meta property="og:type" content="website" />
        <meta property="og:title" content="COMPRA TUS TICKETS DE RIFA Y GANA ESTA PROPIEDAD" >
        <meta property="og:description" content="Aprovecha esta oportunidad única para poder ganar un departamento de lujo por tan solo $20.000" >
        <meta property="og:image" content="{{ asset('img/DSC_1688.jpg') }}" >
        <meta property="og:image:width" content="200" >
        <meta property="og:image:height" content="200" >
        <meta name="description" content="Departamento de lujo en Marina del Golf Rapel, moto de agua, kit de palos de golf y $2.000.000.- pueden ser tuyos por $20.000.-">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style-mobile.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style-tablet.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
      
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
        {{-- font awesome --}}
        <script src="{{ asset('js/9987974c2b.js') }}" crossorigin="anonymous"></script>
        @yield('css')
        @toastr_css
    </head>
    <body>
      <a href="https://wa.me/56942940824"><div class="plus-button" style="background-size: cover;"></div></a>
        @include('layouts.public.cookies')
        @include('layouts.public.header')
        @yield('content')
        @include('layouts.public.footer')
        <script src="{{ asset('js/jquery-3.5.1.js') }}" ></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <script src="{{ asset('js/es.js') }}"></script>
        
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/efectos.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        @toastr_js
        @toastr_render
        @yield('scripts')
    </body>
</html>