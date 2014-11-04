$(function(){

    var removerServicio = function(e){
        e.preventDefault();
        $(this).closest('tr').remove();
    } 


    /*Tooltip*/
    $('a[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    /*Cancelar*/
    $('.cancelForm').on('click',function(e){
    	e.preventDefault();
    	$(this).prop('disabled',true);
    	history.go(-1);
    });

    /*Datepicker*/
    $(".datepicker").datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        todayHighlight: true
    });

    /*DataTable*/
    $('#tableListar').DataTable({
        "language": {
            "lengthMenu"            : "Mostrar _MENU_ registros por página",
            "zeroRecords"           : "No se encontraron resultados",
            "info"                  : "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty"             : "No hay registros disponibles",
            "infoFiltered"          : "(filtrado de _MAX_ registros totales)",
            "sSearch"               : "",
            "sSearchPlaceholder"    : 'Buscar',
            "oPaginate"             : {
                "sFirst"                : "Primero",
                "sPrevious"             : "Anterior", 
                "sNext"                 : "Siguiente",
                "sLast"                 : "Último"
            }
        }
    });

    /*Agregar Servicio*/
    $('#btnAgregarServicio').on('click',function(e){
        e.preventDefault();
        var idServicio      = $('#id_servicio').val(),
            nomServicio     = $('#id_servicio option:selected').text(),
            precioSugerido  = $('#id_servicio option:selected').data('precio'),
            observacion     = $('#observacion').val();

        if(!idServicio){
            alert('Por favor, seleccione un servicio');
        }else{
            var fila = $('<tr>');

            var inputId = $('<input>').prop({
                name    : 'servicios[]',
                value   : idServicio,
                type    : 'hidden'
            });

            var inputPrecio = $('<input>').prop({
                name    : 'preciosSugeridos[]',
                value   : precioSugerido,
                type    : 'hidden'
            });

            var inputObs = $('<textarea>').prop({name : 'observaciones[]' }).html(observacion).addClass('hidden');

            $('<td>').html(nomServicio).append(inputId).append(inputObs).append(inputPrecio).appendTo(fila);

            //TODO pasar a multiline
            $('<td>').html(observacion).appendTo(fila);

            $('<td>').html(precioSugerido).appendTo(fila);

            var cerrar = $('<a href="#" title="Eliminar consulta"><span class="glyphicon glyphicon-remove"></span></a>');
            cerrar.addClass('removeItemConsulta').on('click',removerServicio);

            $('<td>').append(cerrar).appendTo(fila);

            $('#tblServicios tbody').append(fila);

            $('#id_servicio').val('');
            $('#observacion').val('');
        }
    });

    $('.removeItemConsulta').on('click',removerServicio);

});

