$(document).ready(function() {
    getUsers();
});
//Obtiene todos los usuarios de la BD y refresca la tabla.
function getUsers() {
    $.ajax({
        method: "POST",
        url: "core/actions.php",
        data: {
            action: "getAll"
        }
    }).done(function(data) {
        reloadData(data);
    });
}
//Obtiene un usuario dependiendo el ID del mismo.
function getUser(idValue) {
    $.ajax({
        method: "POST",
        url: "core/actions.php",
        data: {
            action: "getOne",
            id: idValue,
        }
    }).done(function(data) {
        loadForm(data);
    });
}
//Agrega un nuevo usuario de la BD y refresca la tabla.
function createUser() {
    $.ajax({
        method: "POST",
        url: "core/actions.php",
        data: {
            action: "create",
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            fecha: $("#datepicker").val(),
        }
    }).done(function(data) {
        getUsers();
        $('#modal-crud').modal('hide');
        $("input").val('');
        $.notify("Usuario creado con exito", "info");
    });
}
//Actualiza un usuario dependiendo el ID del mismo y refresca la tabla.
function updateUser(idValue) {
    $.ajax({
        method: "POST",
        url: "core/actions.php",
        data: {
            action: "update",
            id: idValue,
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            fecha: $("#datepicker").val(),
        }
    }).done(function(data) {
        getUsers();
        $('#modal-crud').modal('hide');
        $("input").val('');
        $.notify("Registro actualizado con exito.", "info");
    });
}
//Elimina un usuario dependiendo el ID del mismo y refresca la tabla.
function deleteUser(idValue) {
    var r = confirm("¿Está seguro que desea eliminar este registro?");
    if (r == true) {
        $.ajax({
            method: "POST",
            url: "core/actions.php",
            data: {
                action: "delete",
                id: idValue,
            }
        }).done(function(data) {
            getUsers();
            $.notify("Registro eliminado", "info");
        });
    }
}
// Funcion para limpiar y listar los valores en la tabla.
function reloadData(data) {
    $("#table-container").html('');
    var fila = "";
    var contador = 1;
    $.each(JSON.parse(data), function(key, value) {
        btnEdi = '<button class="btn btn-default text-secondary btn-action" title="Editar" onclick="getUser(' + value.id + ')"><i class="fa fa-pencil-square"></i></button> '
        btnDel = '<td>' + btnEdi + '<button class="btn btn-default text-danger btn-action" title="Eliminar" onclick="deleteUser(' + value.id + ')"><i class="fa fa-minus-square"></i></button></td>';
        fila = fila + "<tr><td>" + contador + "</td><td>" + value.nombre + "</td><td>" + value.apellido + "</td><td>" + value.fecha + " " + btnDel + "</td></tr>";
        contador++;
    });
    $("#table-container").html(fila);
}
// Carga los datos de un usuario el formulario (usada por la funcion getUser)
function loadForm(data) {
    $("input").val();
    $.each(JSON.parse(data), function(key, value) {
        $("#nombre").val(value.nombre);
        $("#apellido").val(value.apellido);
        $("#datepicker").val(value.fecha);
        $("#id").val(value.id);
    });
    $('#modal-crud').modal('show')
}