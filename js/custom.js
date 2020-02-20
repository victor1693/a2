var tableFlag = 1;
$(".btn-tabla").on("click", function() {
    var icon = '<i class="fa fa-file-text"></i>'
    if (tableFlag == 1) {
        $(".tabla").hide();
        tableFlag = 0;
        $(this).html(icon + ' Mostrar registros');
    } else if (tableFlag == 0) {
        $(".tabla").show();
        tableFlag = 1;
        $(this).html(icon + ' Ocultar registros');
    }
});
$(".btn-save").on("click", function() {
    if (validar() == true) {
        if ($("#id").val() == "") {
            createUser();
        } else {
            updateUser($("#id").val());
        }
    }
});
$('.btn-user').on('click', function() {
    $("input").val("");
    $('#modal-crud').modal('show');
})
$(".form").keypress(function(e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) {
        if (validar() == true) {
            if ($("#id").val() == "") {
                createUser();
            } else {
                updateUser($("#id").val());
            }
        }
    }
});

function validar() {
    $("input").removeClass('required');
    if ($("#nombre").val() == '') {
        $.notify("Complete el campo nombre", "info");
        $("#nombre").addClass('required');
    } else if ($("#apellido").val() == '') {
        $("#apellido").addClass('required');
        $.notify("Complete el campo apellido", "info");
    } else if ($("#datepicker").val() == '') {
        $("#datepicker").addClass('required');
        $.notify("Complete el campo fecha", "info");
    } else {
        return true;
    }
}
$(function() {
    $("#datepicker").datepicker({
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
});