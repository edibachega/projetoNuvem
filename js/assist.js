$(document).ready(function(){

        

    $('#bt-cadastrar').click(function(){

        var temErro = false;
        
        
        $('input, select').each(function(idx, elem){
            var valor = $(elem).val();
            $(elem).parents('.form-group').removeClass('has-error');

            if (valor == "")
            {
                temErro = true;
                $(elem).parents('.form-group').addClass('has-error')
               
            }
        });
        
        if (temErro == true)
        {
            //tem problema
        } else {
            $('#form-assist').submit(); 
            
             $('input, select').each(function(idx, elem){
                 $(elem).val("");
             });
        }

              
    });
    
    $('#form-assist').submit(function(evento){
       evento.preventDefault();
       
       var dados = {
           codigo: $('#codigo').val(),
           
           
       };
      
       
    });
    
   
    
});

