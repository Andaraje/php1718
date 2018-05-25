$(document).ready(function(){
    
    var jsonData = JSON.parse(localStorage.getItem("jsonData"));
    var email="";
    if($.isEmptyObject(jsonData)){
       var jsonData = {}
        // añadimos al json un array llamado "carrito"
        jsonData.carrito = [] // este array contendrá un objeto con el user y el total de articulos  
        localStorage.setItem("jsonData", JSON.stringify(jsonData))  //GUARDAMOS EN LOCALSTORAGE
    }else{
        rellenarCarrito();
        checkOut();
    }
    
    
    //mostrar div con cesta
    $(".cart a").click(function(e){
        
        if($(".cart-inv:visible").length == 0){
            $(".cart-inv").css("display","block");
            $(".cart-inv").focus();
        }else{
            $(".cart-inv").hide();
            $(".cart-inv").blur();
        }
    })
    //Añadir al carrito
    $('.add_cart_btn').click(function(e){
        e.preventDefault();
        var boolean = false;
        var numerocarrito=0;
        //recojo el id del producto
        var codigo=$("#ref").text();
        //la cantidad
        var cant=parseInt($(".qty").val());
        //nombre del producto
        var nombre=$("#nom").text();
        //precio del producto
        var precio = $(".precio").text();
        precio=precio.replace("€","");
        //ruta de la imagen
        var img=$("#imgpro").attr("src");
        //y el usuario que lo está comprando
        var user=usuario();
        //y el usuario
        var user=usuario();
        //compruebo si este usuario ya tiene productos en su cesta
        $.each(jsonData.carrito, function(i, item) {
            if(jsonData.carrito[i].User==user)
            {
                boolean = true;
                numerocarrito=i;
            }
        })

        //empezando la compra

        if(boolean==false){
            //si es la primera vez que entra y todavia no tiene un carrito
            
            //ahora creo un objeto con todos estos parámetros
            var objeto = {   
                "User": user,
            	"Productos": [[codigo,cant,nombre, img, precio]]    
            }
            jsonData.carrito.push(objeto);
            localStorage.setItem("jsonData", JSON.stringify(jsonData))
            
        }else{
            //si ya ha entrado más veces
            var boolean2=false;
            var numeropro=0;
            //comprobar si el producto ya existe en la cesta
            $.each(jsonData.carrito[numerocarrito].Productos, function(i, item) {
                if(jsonData.carrito[numerocarrito].Productos[i][0]==codigo){
                    boolean2=true;
                    numeropro=i;
                }
            })

            //en el caso de que el producto esté en la cesta
            if(boolean2==true){
                //le sumo la cantidad a la posición 1 (cantidad) de este producto
                var lodeantes=jsonData.carrito[numerocarrito].Productos[numeropro][1];
                jsonData.carrito[numerocarrito].Productos[numeropro][1]=(cant+lodeantes);
                localStorage.setItem("jsonData", JSON.stringify(jsonData))
                rellenarCarrito();
                
            }else{
                jsonData.carrito[numerocarrito].Productos.push([codigo,cant, nombre, img, precio])
                localStorage.setItem("jsonData", JSON.stringify(jsonData))
                rellenarCarrito();
                
            }
        }
        
        
    })
    //recoger usuario registrado
    function usuario(){
        var email = $("#email").text();
        return email;
    }
    //rellenar div del carrito el cual se encuentra en todas la páginas 
    function rellenarCarrito(){
        var contador = 0;   //Contador para saber cuantos productos tiene el carrito
        $.each(jsonData.carrito, function(i, item) {
            email = usuario();
            if(jsonData.carrito[i].User=email)
            {

                contador=jsonData.carrito[i].Productos.length;
                $("#cajacarrito").empty();
                $.each(jsonData.carrito[i].Productos, function(j, jitem) {

                    $("#cajacarrito").append("<tr><td><a class='delete' ref='" +jsonData.carrito[i].Productos[j][0] + "'href='#'><i class='fa fa-times-circle'></i></a></td> <td>" +jsonData.carrito[i].Productos[j][0] + "</td> <td>"+jsonData.carrito[i].Productos[j][1] + "</td><td> "+jsonData.carrito[i].Productos[j][2] +"</td></tr>")
                    //función eliminar articulo del carrito
    
                    $('.delete').click(function(e){
                        e.preventDefault();
                        var numerouser=0;
                        var boolean = false;
                        //coger la referencia del producto
                        var ref=$(this).attr("ref");
                        var user=usuario();
                        $.each(jsonData.carrito, function(i, item) {
                            if(jsonData.carrito[i].User==user)
                            {
                                boolean = true;
                                if(boolean==true){
                                    $.each(jsonData.carrito[i].Productos, function(j, jitem){
                                        if(jsonData.carrito[i].Productos[j][0]==ref){
                                            delete jsonData.carrito[i].Productos[j];
                                            jsonData.carrito[i].Productos.splice(j,1);
                                            localStorage.setItem("jsonData", JSON.stringify(jsonData))
                                            
                                            
                                        }
                                    rellenarCarrito();
                                    checkOut();
                                    })
                                }
                            }
                        })
                        
                    })
                })

                
            }
        })
        $("#numproductos").text(contador);
    }

    

    //funcion que se ejecuta cuando se está en la pestaña carrito, la cual exprime el jsonData y lo pega en el body
    //esta función tambien se ocupa de calcular el total y subtotal de la compra según la cantidad de articulos
    function checkOut(){
        $.each(jsonData.carrito, function(i, item) {
            email = usuario();
            if(jsonData.carrito[i].User=email)
            {
                $("#tablecart").empty();
                $.each(jsonData.carrito[i].Productos, function(j, jitem) {

                    $("#tablecart").append(" <tr> ");
                    $("#tablecart").append("<td class='col-lg-1'><a class='delete' ref='"+jsonData.carrito[i].Productos[j][0] +"' href='#'><i class='fa fa-times-circle'></i></a></td>");
                    $("#tablecart").append("<td class='col-lg-2'><img width='200px' src='"+jsonData.carrito[i].Productos[j][3] +"' ></td>");
                    $("#tablecart").append("<td class='col-lg-1'>"+ jsonData.carrito[i].Productos[j][2]+"</td>");
                    $("#tablecart").append("<td class='col-lg-1 precio'>"+ jsonData.carrito[i].Productos[j][4]+"</td>");
                    $("#tablecart").append("<td class='col-lg-2'><input type='number' min='0' value='"+ jsonData.carrito[i].Productos[j][1]+"'></td>");
                    $("input[type='number']").change(function(){
                        var total = 0;
                        $.each($(".precio"), function(i, item){
                            var cantidad = parseInt($(item).next().children("input").val());
                            var precio = parseInt($(item).text());
                            total += cantidad*precio;
                        })
                        $("#subtotal").empty();
                        $("#subtotal").append(total + "€");
                        $(".total_amount .float-right").empty();
                        $(".total_amount .float-right").append(((total*21)/100)+total + "€");
                })
                    $("#tablecart").append("</tr>")
                    var total = 0;
                        $.each($(".precio"), function(i, item){
                            var cantidad = parseInt($(item).next().children("input").val());
                            var precio = parseInt($(item).text());
                            total += cantidad*precio;
                        })
                        $("#subtotal").empty();
                        $("#subtotal").append(total + "€");
                        $(".total_amount .float-right").empty();
                        $(".total_amount .float-right").append(((total*21)/100)+total + "€");
                })

                
            }
        })
    }
    


    //Pagar la factura, este apartado se hará un ajax que enviará todos los id de los productos que se encuentren en localstorage
    //e irá realizando una tupla en la tabla factura con ese id, el nombre del cliente, y el total
    $("#comprar").click(function(){
        var user=usuario();
        var n=0;
                    $.each(jsonData.carrito, function(i, item) {
                        if(jsonData.carrito[i].User==user)
                        {
                            n = i;
                            boolean = true;
                            if(boolean==true){
                                
                                    $.ajax({
                                        method: "POST",
                                        url: "Pagado/",
                                        data: {'array':JSON.stringify(jsonData.carrito[i].Productos)},
                                        dataType: 'json',
                                        success: function(data)
                                        {
                                            
                                            
                                                
                                                $(".modal-body").append("<p> Para descargar la factura ve al panel de usuario y mira tus pedidos :) </p> " );                
                                                jsonData.carrito[i].splice(i,1);
                                                localStorage.setItem("jsonData", JSON.stringify(jsonData));
                                            
                                        },
                                        error: function(jqXHR, exception)
                                        {
                                            if(jqXHR.status === 405)
                                            {
                                                $(".modal-body").append("<p> El Carrito esta vacio </p> " );                
                                            }
                                            if(jqXHR.status === 500)
                                            {
                                                $(".modal-body").append("<p> Ha habido un problema, contacte con nosotros y notifiquenoslo </p> " );                

                                            }
                                        }
                                    });
                                
                            }
                        }
                    })
                    rellenarCarrito();
                    checkOut();
        
                    
    })
    




})
    