<?php

error_reporting(E_ALL);

class Origen{
private int $idOrigen=0;
private ?string $nombre;
	
	public function buscarTodos():array{
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrRet = null;
	$oOrigen=null;
		if ($oAccesoDatos->conectar()){
			$sQuery = "SELECT t1.idOrigen, t1.nombre
				FROM Origen t1
				ORDER BY t1.nombre";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
			$oAccesoDatos->desconectar();
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
       return $this->nombre;
    }
   
}
?>