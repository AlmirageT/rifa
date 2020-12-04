$(document).ready(function() {

    $('#btnMenuIcon').click(function() {

        console.log("Abrir menu");
        menu = $('#navigation ul');
        
        if(menu.hasClass ('show')) {
            menu.removeClass('show'); 
        } else {
                (menu.addClass('show'));
        console.log('Cerrar menu');
        }     
    });  
    $('#esconderMenu').click(function() {
        console.log("Abrir menu");
        menu = $('#navigation ul');
        if(menu.hasClass ('show')) {
            menu.removeClass('show'); 
        }
    });
                                  
                            
});
                            