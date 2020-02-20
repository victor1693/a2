<?php  
require('conexion.php');

class Usuario extends Conexion
{
	public $nombre;
	public $apellido;
	public $fecha;
 
    //Obtiene todos los registros
    public function getUsers()
    {
        $sql      = "SELECT * FROM tbl_users";
        $usuarios = $this->cn()->query($sql); 
         return $usuarios;
    }

    //Obtiene un solo registro
    public function getUser()
    {
        $sql      = "SELECT * FROM tbl_users WHERE id = ".$this->id.""; 
        $usuarios = $this->cn()->query($sql); 
        return $usuarios;
    }

    //Agrega un nuevo registro
    public function createUsers()
    { 
    	$sql = "INSERT INTO tbl_users (nombre,apellido,fecha) VALUES('".$this->nombre."','".$this->apellido."','".$this->fecha."')";
        $this->cn()->query($sql); 
    }

    //Actualiza un registro
    public function updateUsers()
    {   
    	$sql = "UPDATE tbl_users SET nombre = '".$this->nombre."',apellido ='".$this->apellido."',fecha ='".$this->fecha."' WHERE id = ".$this->id; 
        $this->cn()->query($sql); 
    }

    // Elimina un registro
    public function deleteUsers()
    { 
    	$sql = "DELETE FROM tbl_users WHERE id =".$this->id.""; 
        $this->cn()->query($sql); 
    }   
} 
?>