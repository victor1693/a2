<?php 
class Conexion
{  
    public function cn()
    {
        $cn = mysqli_connect("localhost", "root", "", "a2db");
        if (!$cn) {
            echo "Error: No se pudo establecer conexión con la BD." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        return $cn;
    }
}
 
?>