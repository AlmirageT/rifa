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
        <link rel="icon" href="{{ asset('assets/img/favicon_atotal.png') }}" type="{{ asset('assets/image/jpg') }}">
        
        <title>Rifo Mi Propiedad</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-mobile.css') }}">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
      
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/9987974c2b.js" crossorigin="anonymous"></script>
        @yield('css')
        @toastr_css
    </head>
    <body>
        

        @yield('content')
        <footer>
            <section class="container"> 
               <hr>
                <div class="row">  
                    <div class=" col-lg-3" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title letras-footer">Rifo Mi Propiedad</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id vitae doloremque illum officiis quis possimus inventore, esse error magnam. In iste vero id eum quod voluptates aut quidem cum mollitia.</p>
                        </div> 
                    </div>
               
                         <div class=" col-lg-3" style="width: 15rem;">
                        <div class="card-body">
                            <h5 class="card-title letras-footer ">Ubicación</h5>
                            <p>Av. Providencia 1650 OF 601 - Providencia</p>
                            <h5 class="card-title letras-footer">Hablemos</h5>
                            <p>600 656 0250</p>
                        </div> 
                    </div> 
               
                    <div class="col-lg-3" style="width: 15rem;">
                       <!--     <div class="card-body">
                            <div class="card-title letras-footer">
                                <h5 class="">Sitios de interés</h5>
                                <ul class="contenedor-links">
                                    <li><a href="https://isbast.com/"> Isbast</a></li> 
                                    <li><a href="../college-1.1/index.html">College Iquimica</a></li> 
                                    <li><a href="http://parsimonia.cl/">Parsimonia</a></li> 
                                    <li><a href="https://iquimica.cl/">Iquimica</a></li>
                                </ul>  
                            </div>
                            
                        </div>  -->
                               <h5 class="letras-footer">RRSS</h5>
                            <ul class="contenedor-links flex">
                                <li><a target="_blank" href="#"><i class="fab rrss-icon fa-instagram"></i></a></li>
                                <li><a target="_blank" href="#"><i class="fab rrss-icon fa-facebook-square"></i></a></li>            
                            </ul>
                    </div> 

                    <div class="col-lg-3" style="width: 15rem;" >
                        <div class="card-body">
                            <a href="index.html"> <img class="logo-footer" src="{{ asset('assets/img/logo.png') }}" alt="iquimica"></a>
                        </div> 
                    </div>
                </div> 
            </section>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        @toastr_js
        @toastr_render
  @yield('scripts')

        </body>
</html>