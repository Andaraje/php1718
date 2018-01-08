window.addEventListener("load", function(){
    //cargar plantillas
    var cabecera = document.getElementById("cabecera").descargar("./templates/cabecera.html", false);
    var cuerpo = document.getElementById("cuerpo").descargar("./templates/chat.html", false);
    var pie = document.getElementById("pie").descargar("./templates/pie.html", false);
    //programar boton
    var boton = document.getElementById("send").addEventListener("click", function(e){
        e.preventDefault();
        var ajax= new XMLHttpRequest();
        var objeto={}
        var usuario=document.getElementById("formulario");
        objeto.usuario=formulario.usuario.value;
        objeto.mensaje=formulario.mensaje.value;
        var json = JSON.stringify(objeto);
        ajax.open("get","chat.php?x="+json, true);
        ajax.onreadystatechange=function(){
            if(ajax.status==200 && ajax.readyState==4){
                if(ajax.responseText=="OK"){
                    formulario.mensaje.value="";
                    formulario.mensaje.focus();
                }else{
                    alert("Ha ocurrido un error");
                }
            }else if(ajax.status!==200 && ajax.readyState==4)
            {
                alert("Error de conexion");
            }
        }
        ajax.send();
    })
    //actualizra la pagina
    function recargar(){
        var ajax = new XMLHttpRequest();
        ajax.open("get","chat.php?y=*", true);
        ajax.onreadystatechange=function(){
            if(ajax.status==200 && ajax.readyState==4){
                //se imprime la bd en el div chat
                var div = document.getElementById("chat");
                div.innerHTML=this.responseText;
            }
        }
        ajax.send();
        
    }
    window.setInterval(recargar, 1000);
});

HTMLElement.prototype.descargar=function(url, async){
    var metodo;
    if (async===undefined){
        metodo=true;
    }else{
        metodo=async;
    }
    var donde = this;
    var ajax = new XMLHttpRequest();
    ajax.open("get",url, metodo);
    ajax.onreadystatechange=function(){
        if(ajax.status==200 && ajax.readyState==4){
            donde.innerHTML=ajax.responseText;

        }
    }
    ajax.send();
}