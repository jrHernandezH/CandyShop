<?php

error_reporting(E_ALL);
include_once("AccesoDatos.php");
class Origen{
private int $idOrigen=0;
<<<<<<< HEAD
private ?string $nombre = " s";
=======
private ?string $nombre = " ";
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
	
	public function buscarTodos():array{
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrRet = null;
	$oOrigen=null;
		if ($oAccesoDatos->openConnection()){
			$sQuery = "SELECT t1.Llave_Origen, t1.Nombre
				FROM Origen t1
				ORDER BY t1.Nombre";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
			$oAccesoDatos->closeConnection();
			if ($arrRS){
				$arrRet = array();
				foreach($arrRS as $arrLinea){
					$oOrigen = new Origen();
					$oOrigen->setIdOrigen($arrLinea[0]);
					$oOrigen->setNombre($arrLinea[1]);
					$arrRet[] = $oOrigen;
				}
			}
		}
		return $arrRet;
	}
		public function buscarPorId(): ?string {
			$oAccesoDatos = new AccesoDatos();
			$sQuery = "";
			$arrRS = null;
			$nombre = null;
			
			if ($oAccesoDatos->openConnection()) {
				$sQuery = "SELECT Nombre FROM Origen WHERE Llave_Origen = ?";
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array($this->getIdOrigen()));
				$oAccesoDatos->closeConnection();
		
				if ($arrRS && count($arrRS) > 0) {
					
					$nombre = $arrRS[0][0];
					

				}
			}
		
			return $nombre;
		}
	
    public function setIdOrigen(int $valor){
       $this->idOrigen = $valor;
    }
    public function getIdOrigen():int{
       return $this->idOrigen;
    }
	
    public function setNombre(string $valor){
       $this->nombre = $valor;
    }
    public function getNombre():?string{
       return $this->buscarPorId();
    }
	
   
}
?>