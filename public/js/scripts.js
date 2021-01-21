$(document).ready(function() {

    $('#btnMenuIcon').click(function() {

        menu = $('#navigation ul');
        
        if(menu.hasClass ('show')) {
            menu.removeClass('show'); 
        } else {
                (menu.addClass('show'));
        }     
    });  
    $('#esconderMenu').click(function() {
        menu = $('#navigation ul');
        if(menu.hasClass ('show')) {
            menu.removeClass('show'); 
        }
    });
                                  
                            
});
                            