$(document).ready(function(){
  var arrays = [];
  arrays.push(['dia', 'veces']);
  $("#todo > tr").each(function(i){
    arrays.push([ $(this).find("td").eq(1).text(), parseInt($(this).find("td").eq(0).text()) ]);
    
});
  $(".resultado").DataTable({
    "pageLength": 8,
    language: {
        "decimal": "",
        "order": [[ 1, 'desc' ] ],
        "emptyTable": "No hay resultados",
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
  var row = $('.row');
  


  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable(arrays);

    var options = {
      title: 'Vistas de Chustaller',
      hAxis: {title: 'Dias',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('visitasdias'));
    chart.draw(data, options);
  }
  $("#appbundle_articulos_cantidad").get(0).type = 'number';
  $("#appbundle_articulos_precio").get(0).type = 'number';
  $("#appbundle_articulos_categoria").addClass('form-control');
  $("#appbundle_articulos_combustibleNombre").addClass('form-control');
  $('form input[type=submit]').addClass('form-control');
  $('form input[type=submit]').attr('value', 'Añadir')
})