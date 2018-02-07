$(document).ready(function(){
    //empezar el chat
    $Primero="y"
    $.get("chat.php",$Primero,function(y){
        $(".caja").append(y);
    });

    //comprobar si hay mensajes nuevos
    function actualizar(){
        $actualiza="z";
        //$.get("chat.php",$actualiza,function(){

        //});
    }
    setInterval(actualizar, 1000);

    //programar boton de enviar
    $("#enviar").click(function(ev){
        ev.preventDefault();
        var datosEnviados={x:JSON.stringify({usuario:$("#name").val(),mensaje:$("#msg").val()})};
        console.log(datosEnviados);
        $.get("chat.php",datosEnviados,function(x){
            $(".caja").append(x)
        })
    });

});