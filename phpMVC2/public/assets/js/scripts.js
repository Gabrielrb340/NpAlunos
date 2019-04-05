
jQuery(document).ready(function() {
	
    /*
        MASCARA DE CPF MADE BY JORDAN
    */
      $("#cpass").keyup(function(){
        var valido =false;

              if ($("#pass").val() != $("#cpass").val()) {
          $("#messagem").html("*Senhas Diferentes").css("color","red");
          $("button[type=submit]").attr("disabled", "disabled");
          
              }else{
          $("#messagem").html("Senhas Validas").css("color","green");
          $("button[type=submit]").removeAttr("disabled");
              }
        });
       $("#CPF").mask("999.999.999-99");
       $("#tel").mask("(99) 9999-9999");
       console.log("Funcionei!!");

    /*
        Fullscreen background
    */
    
    $.backstretch([
                    "./img/backgrounds/definitivebackground.jpg"
	             ], {duration: 3000, fade: 750});
    
    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    
});
