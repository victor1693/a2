<?php

function mensaje($mensaje, $status)
{
    $error = array(
        'status' => $status,
        'error' => $mensaje
    );
    echo json_encode($error);
}

function toJSON($arr)
{
    $json = array();
    while ($row = $arr->fetch_array(MYSQLI_ASSOC))
    {
        $json[] = $row;
    }
    return json_encode($json);
}

function validarData($a = array())
{
    $bandera = false;
    if (!isset($a['nombre']))
    {
        $mensaje = "El campo nombre es obligatorio.";
        mensaje($mensaje, 'fail');
    }
    else if (trim($a['nombre']) == "")
    {
        $mensaje = "El nombre del usuario no puede ser un campo vacío";
        mensaje($mensaje, 'fail');
    }

    else if (strlen(trim($a['nombre'])) > 40)
    {
        $mensaje = "El nombre del usuario no puede ser mayor a 40 caracteres.";
        mensaje($mensaje, 'fail');
    }

    else if (!isset($a['apellido']))
    {
        $mensaje = "El campo apellido es obligatorio.";
        mensaje($mensaje, 'fail');
    }
    else if (trim($a['apellido']) == "")
    {
        $mensaje = "El apellido del usuario no puede ser un campo vacío";
        mensaje($mensaje, 'fail');
    }

    else if (strlen(trim($a['apellido'])) > 40)
    {
        $mensaje = "El apellido del usuario no puede ser mayor a 40 caracteres.";
        mensaje($mensaje, 'fail');
    }

    else if (!isset($a['fecha']))
    {
        $mensaje = "El campo fecha es obligatorio.";
        mensaje($mensaje, 'fail');
    }
    else if (trim($a['fecha']) == "")
    {
        $mensaje = "El fecha del usuario no puede ser un campo vacío";
        mensaje($mensaje, 'fail');
    }
    else
    {
        $bandera = true;
    }
    return $bandera;
}

?>
