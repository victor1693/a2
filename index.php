<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content=" A2 - Ejercicio de Programación" name="title"/>
        <meta content="Ejercicio de programación Web en PHP con MySQL" name="description"/>
        <title>
            A2 - Ejercicio de Programación
        </title>
        <link rel="shortcut icon" href="img/fav-icon.png" /> 
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css">
        </link>
    </head>
</html>
<body>
    <div class="bg-white animated fadeIn head-conteiner mt-3">
        <div class="logo-container">
            <img src="img/a2-academy-logo.jpg">
            </img>
        </div>
        <div class="title-container">
            <h1>
                Ejercicio de programación en PHP y MySQL
                <p class="m-0 text-primary">
                    Ing. Victor Fernández
                </p>
            </h1>
        </div>
    </div>
    <div class="animated fadeIn head-conteiner mt-3 p-0">
        <button class="btn btn-primary btn-sm btn-user">
            <i class="fa fa-user">
            </i>
            Nuevo usuario
        </button>
        <button class="btn btn-primary btn-sm btn-tabla">
            <i class="fa fa-file-text">
            </i>
            <span>
                Ocultar registros
            </span>
        </button>
    </div>
    <div class="tabla mt-4 bg-white animated fadeIn">
        <h2>
            Registros
        </h2>
        <table class="table table condensed table-bordered bg-white table-hover">
            <thead>
                <td class="count-filas">
                    #
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    Apellido
                </td>
                <td>
                    Fecha
                </td>
                <td class="action-col">
                    Acción
                </td>
            </thead>
            <tbody id="table-container"> 
            </tbody>
        </table>
    </div>
    <!-- Modal CRUD usuarios-->
    <div>
        <div class="modal" id="modal-crud" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Registro de usuario
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5 img-crud-container">
                                <img src="img/user-crud.png">
                                </img>
                            </div>
                            <div class="col-sm-7">
                                <form action="#" method="POST">
                                	<input type="hidden" name="id" id="id"></input>
                                	<input type="hidden" name="type" id="type"></input>
                                    <div class="form-group mb-1">
                                        <label>
                                            Nombre:
                                        </label>
                                        <input autocomplete="off" class="form-control input-sm form" id="nombre" maxlength="40" name="nombre" placeholder="" type="text">
                                        </input>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>
                                            Apellido:
                                        </label>
                                        <input autocomplete="off" class="form-control input-sm form" id="apellido" maxlength="40" name="apellido" placeholder="" type="text">
                                        </input>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label>
                                            Fecha:
                                        </label>
                                        <input autocomplete="off" class="form-control input-sm form" id="datepicker" name="fecha" placeholder="" type="text">
                                        </input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm btn-save" type="button">
                            Guardar
                        </button>
                        <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js">
    </script>
    <script src="js/custom.js">
    </script>
     <script src="js/ajax.js">
    </script>
</body>
