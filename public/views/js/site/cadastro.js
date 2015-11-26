/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    /**
     * Tipo de cadastro
     */
    $("input[name=empresa_tipo]").click(function(){
       
       var value = $(this).val();
       if (value === 1) {
           
       } else {
           
       }
        
    });
    
    /**
     * Tags do servico
     */        
    $('#empresa_servico').tagEditor({
        autocomplete: { 
            delay: 0, 
            position: { collision: 'flip' }, 
            source: function( request, response ) {
                $.ajax({
                    url: "/busca/servico",
                    dataType: "json",
                    data: {
                        key: request.term
                    },
                    success: function( data ) {                        
                        response(data);
                    }
                });
            }
        },
        forceLowercase: false        
    });
});

