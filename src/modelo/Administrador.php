<?php
error_reporting(E_ALL);
include_once('../modelo/AccesoDatos.php');
include_once('../modelo/Personas.php');
class Administrador extends Personas {
   





    public function buscar():bool{
		throw new Exception("Unsupported Operation");
	}
	
	public function buscarTodos():array{
		throw new Exception("Unsupported Operation");
	}

	public function insertar():int {
		throw new Exception("Unsupported Operation");
	}

	public function modificar():int{
		throw new Exception("Unsupported Operation");
	}

	public function eliminar():int {
		throw new Exception("Unsupported Operation");
	}
	


public function existeCuentaAdministrador()
{
  
    $existe = false;
    $result = array();
    if (($this->Contrasenia == "" || $this->Cuenta == ""))
        throw new Exception("Administrador->existeCuentaAdministrador: faltan datos");
    else {
     
        $query = "SELECT administrador.Cuenta, personas.Contraseña, 
        personas.Nombre, personas.Prim_Apellido, personas.Segu_Apellido, personas.Direccion, 
        personas.Correo 
        FROM administrador
        JOIN personas ON personas.Cuenta = administrador.Cuenta
        WHERE personas.Contraseña = '$this->Contrasenia' and personas.Cuenta = '$this->Cuenta'
        and personas.Activa = 1";

        $conexion = new AccesoDatos();
        $result = $conexion->ejecutarSelect($query);
  
        if ($result != null) {
            $this->Cuenta = $result[0][0];
            $this->Contrasenia = $result[0][1];
            $this->Nombre = $result[0][2];
            $this->Prim_Apellido = $result[0][3];
            $this->Segu_Apellido = $result[0][4];
            $this->Direccion = $result[0][5];
            $this->Correo = $result[0][6];
          
            $existe = true;
        }
    }
    return $existe;
}
}

?>
