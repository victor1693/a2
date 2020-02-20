<?php
require ('usuario.php');
require ('functiones.php');

$usuario = new Usuario();
if (isset($_POST['action']))
{
    $accion = $_POST['action'];

    /*OBTENER TODOS LOS REGISTROS*/

    if ($accion == "getAll")
    {
        $result = $usuario->getUsers();
        echo toJSON($result);
    }

    /*OBTENER UN SOLO REGISTRO*/

    else if ($accion == "getOne")
    {
        if (!($_POST['id']))
        {
            $mensaje = "Faltan datos para obtener el usuario. Intentelo de nuevo.";
            mensaje($mensaje, 'fail');
        }
        else if (!(ctype_digit($_POST['id'])))
        {
            $mensaje = "El ID del usuario, debe ser numérico.";
            mensaje($mensaje, 'fail');
        }
        else
        {
            $usuario->id = $_POST['id'];
            $result = $usuario->getUser();
            echo toJSON($result);
        }
    }

    /*ACTUALZAR REGISTRO*/

    else if ($accion == "update" || $accion == "create")
    {
        if (validarData($_POST))
        {
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->fecha = $_POST['fecha'];
            if ($accion == "create")
            {
                $usuario->createUsers();
            }
            else if ($accion == "update")
            {
                $usuario->id = $_POST['id'];
                echo $usuario->updateUsers();
            }
        }
    }

    /*ELIMINAR REGISTRO*/

    else if ($accion == "delete")
    {
        if (!($_POST['id']))
        {
            $mensaje = "Faltan datos para eliminar el usuario. Intentelo de nuevo.";
            mensaje($mensaje, 'fail');
        }
        else if (!(ctype_digit($_POST['id'])))
        {
            $mensaje = "El ID del usuario, debe ser numérico.";
            mensaje($mensaje, 'fail');
        }
        else
        {
            $before = $usuario->getUsers();
            $usuario->id = $_POST['id'];
            $result = $usuario->deleteUsers();
            $after = $usuario->getUsers();
            if ($before->num_rows == $after->num_rows)
            {
                $mensaje = "No se eliminaron registros";
                mensaje($mensaje, 'error');
            }
            else
            {
                $mensaje = "Registro eliminado con exito.";
                mensaje($mensaje, 'success');
            }
        }
    }
    else
    {
        $mensaje = "La acción que desea ejecutar, no res conocida.";
        mensaje($mensaje, 'error');
    }
}
else
{
    $mensaje = "Es necesario que indique la acción a ejecutar.";
    mensaje($mensaje, 'error');
}

?>