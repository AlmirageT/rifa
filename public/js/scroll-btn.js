$(document).ready(function() {
     /* SCROLL MENU */
    $("#cont-detalles").css({"height":$(window).height("30px") + "px"});
    
    var flag = false;
    var scroll;
    
    $(window).scroll(function(){
        scroll = $(window).scrollTop();
        if(screen.width >= 1366 && screen.width <= 1920){
            if (scroll > 520) {
                $("#btn-flotante").css({"width": "25%",  "border": "solid 1px #ccc", "padding": "20px",
                "position": "fixed", "z-index": "3", "background": "#fff", "border-radius": "30px", 
                "right": "165px", "bottom": "420px",
                "-webkit-box-shadow": "0px 50px 43px -15px rgba(204,204,204,1)",
                "-moz-box-shadow": "0px 50px 43px -15px rgba(204,204,204,1)",
                "box-shadow": "0px 50px 43px -15px rgba(204,204,204,1)", "text-align": "center", "justify-content": "center", "transition": "ease-out 1s"  });
            
            } else {
                $("#btn-flotante").css({"right": "165px", "bottom": "1000px"});
            }
        }
  

        
    });
    
    

});
   