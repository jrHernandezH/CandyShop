<?php 
error_reporting(E_ALL);
include_once('../modelo/Conexion.php');
class Personas {
    protected ?string $Cuenta;
    protected ?string $Contrasenia;
    protected ?string $Nombre;
    protected ?string $Prim_Apellido;
    protected ?string $Segu_Apellido;
    protected ?string $Direccion;
    protected ?string $Correo;
    protected bool $Activa=true;
    


    public function setCuenta(?string $cuenta): void {
        $this->Cuenta = $cuenta;
    }

    public function getCuenta(): ?string {
        return $this->Cuenta;
    }

    // Setter y Getter para Contrasenia
    public function setContrasenia(?string $contrasenia): void {
        $this->Contrasenia = $contrasenia;
    }

    public function getContrasenia(): ?string {
        return $this->Contrasenia;
    }

    // Setter y Getter para Nombre
    public function setNombre(?string $nombre): void {
        $this->Nombre = $nombre;
    }

    public function getNombre(): ?string {
        return $this->Nombre;
    }

    // Setter y Getter para Prim_Apellido
    public function setPrim_Apellido(?string $apellido): void {
        $this->Prim_Apellido = $apellido;
    }

    public function getPrim_Apellido(): ?string {
        return $this->Prim_Apellido;
    }

    // Setter y Getter para Segu_Apellido
    public function setSegu_Apellido(?string $apellido): void {
        $this->Segu_Apellido = $apellido;
    }

    public function getSegu_Apellido(): ?string {
        return $this->Segu_Apellido;
    }

    // Setter y Getter para Direccion
    public function setDireccion(?string $direccion): void {
        $this->Direccion = $direccion;
    }

    public function getDireccion(): ?string {
        return $this->Direccion;
    }

    // Setter y Getter para Correo
    public function setCorreo(?string $correo): void {
        $this->Correo = $correo;
    }

    public function getCorreo(): ?string {
        return $this->Correo;
    }

    public function setActiva(bool $valor){
        $this->Activa = $valor;
     }
     public function getActiva():bool{
        return $this->Activa;

    }
public function getNombreCompleto():string{
		return $this->Nombre." ".$this->Prim_Apellido." ".$this->Segu_Apellido;
	}
}


?>