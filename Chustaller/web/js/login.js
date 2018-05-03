$(document).ready(function(){
    //retocar formulario
    $('label').hide();  //esconder las etiquetas
    $('.login_form div').addClass('col-lg-12 form-group');  //dar formato
    $('#form_Login').addClass('btn update-btn form-control btn-login'); //boton de registro


    //añadiendo el select de pronvincias al formulario

    	
    $('#provincias').appendTo('#appbundle_cliente');
    $('#appbundle_cliente_poblacionpoblacion').parent().appendTo('#appbundle_cliente');
    $('#appbundle_cliente_Registrate').parent().appendTo('#appbundle_cliente');

    //ajax para filtrar las poblaciones de la provincia seleccionada

    
    $('#provincias').each(function(){
        $(this).click(function(){
            var url1=$(this).val();
            $.ajax({
                method: "GET",
                url: "login/" +url1,
                dataType: 'json',
                success: function(data)
                {
                    
                    var posts=JSON.parse(data.posts);
                    $('#appbundle_cliente_poblacionpoblacion').empty();
                    for (i in posts)
                    {
                        
                        $("#appbundle_cliente_poblacionpoblacion").append("<option value='"+ posts[i].idpoblacion + "'>'"+ posts[i].poblacion + "</option> " );                
                        

                    }
                    
                },
                error: function(jqXHR, exception)
                {
                    if(jqXHR.status === 405)
                    {
                        console.error("METHOD NOT ALLOWED!");
                    }
                }
            });
        })
        
    });

})