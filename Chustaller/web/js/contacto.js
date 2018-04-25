$(document).ready(function(){
    //esconder los label
    $('div div label').hide();
    //añadir clases al formulario de contacto
    $('#contact div').addClass('form-group col-lg-4');
    $('#contact div:last').removeClass('form-group col-lg-4');
    $('#contact div:last').addClass('form-group col-lg-12');
    $('textarea').parent().removeClass('col-lg-4');
    $('textarea').parent().addClass('col-lg-12');
    $('#contact_save').addClass('btn btn-outline-dark form-control');
});