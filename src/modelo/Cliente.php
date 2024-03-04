<?php
error_reporting(E_ALL);
include_once('../modelo/Conexion.php');
include_once('../modelo/Personas.php');
class Cliente extends Personas {

    private ?int $TelefonoCel;


       // Setter para TelefonoCel
       public function setTelefonoCel(?int $telefonoCel): void {
        $this->TelefonoCel = $telefonoCel;
    }

    // Getter para TelefonoCel
    public function getTelefonoCel(): ?int {
        return $this->TelefonoCel;
    }
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
	


    public function existeCuentaCliente()
    {
        $existe = false;
        $result = array();
        if (($this->Contrasenia == "" || $this->Cuenta == ""))
            throw new Exception("Cliente->existeCuentaCliente: faltan datos");
        else {
            $query = "SELECT cliente.Cuenta, cliente.TelefonoCel, personas.Contraseña, 
            personas.Nombre, personas.Prim_Apellido, personas.Segu_Apellido, personas.Direccion, 
            personas.Correo 
            FROM cliente
            JOIN personas ON personas.Cuenta = cliente.Cuenta
            WHERE personas.Contraseña = '$this->Contrasenia' and personas.Cuenta = '$this->Cuenta'
            and personas.Activa = '1'";

            $conexion = new ConexionDB();
            $result = $conexion->ejecutarSelect($query);
            if ($result != null) {
                $this->Cuenta = $result[0][0];
                $this->TelefonoCel = $result[0][1];
                $this->Contrasenia =$result[0][2];
                $this->Nombre = $result[0][3];
                $this->Prim_Apellido = $result[0][4];
                $this->Segu_Apellido = $result[0][5];
                $this->Direccion = $result[0][6];
                $this->Correo = $result[0][7];
              
                $existe = true;
            }
        }
        return $existe;
    }


}
?>
