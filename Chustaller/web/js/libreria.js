$(document).ready(function (){


    var URLactual = $(location).attr('href');
    if(URLactual.search( 'buscar' )>1){
        URLactual.replace('buscar', '');
        $("#buscar").click(function(){
            var valor=$("#cajabusqueda").val();
            location.href= valor;
            });
        $( "#cajabusqueda" ).keypress(function(e) {
            if(e.which == 13) {
                var valor=$("#cajabusqueda").val();
                location.href=  valor;
            }
        });
    }else{
        //botón para hacer una búsqueda
        $("#buscar").click(function(){
            var valor=$("#cajabusqueda").val();
            location.href="buscar/" + valor;
            });
        $( "#cajabusqueda" ).keypress(function(e) {
            if(e.which == 13) {
                var valor=$("#cajabusqueda").val();
                location.href="buscar/" + valor;
            }
        });
    }

    //paginación de las búsquedas
    $("#resultado").DataTable({
        "pageLength": 8,
        language: {
            "decimal": "",
            "emptyTable": "No hay articulos para esta búsqueda",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
      });
      $("#resultado_filter").hide();
});