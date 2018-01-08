window.addEventListener("load", function(){
    var boton = document.getElementById("obtener");
    boton.addEventListener("click", function(){
        var ajax=new XMLHttpRequest();
        ajax.open("get", "fichero.txt", true);
        ajax.onreadystatechange=function(){
            if(ajax.status==200 && ajax.readyState==4){
                var div= document.getElementById("mensaje");
                div.innerHTML=ajax.responseText;
            }
        }
        ajax.send();
    })
})