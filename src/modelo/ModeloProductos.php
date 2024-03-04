<?php


class ModeloProductos{
private int $LlaveP;
private string $NombreP;
private string $TipoP;
private string $OrigenP;
private int $PrecioP;
private string $CaracteristicasP;
private string $FotoP;
private string $SaborizanteP;
private bool $ExistenciaP;

	
	function setLlavep(int $valor){
		$this->LlaveP = $valor;
	}
	function getLlavep():int{
		return $this->LlaveP;
	}
	
	function setNombreP(string $valor){
		$this->NombreP = $valor;
	}
	function getNombreP():string{
		return $this->NombreP;
	}
    function setTipoP(string $valor){
		$this->TipoP = $valor;
	}
	function getTipoP():string{
		return $this->TipoP;
	}
    function setOrigenP(string $valor){
		$this->OrigenP = $valor;
	}
	function getOrigenP():string{
		return $this->OrigenP;
	} 

    function setPrecioP(int $valor){
		$this->PrecioP = $valor;
	}
	function getPrecioP():int{
		return $this->PrecioP;
	} 

    function setCaracteristicasP(string $valor){
		$this->CaracteristicasP = $valor;
	}
	function getCaracteristicasP():string{
		return $this->CaracteristicasP;
	} 
    function setSaborizanteP(string $valor){
		$this->SaborizanteP = $valor;
	}
	function getSaborizanteP():string{
		return $this->SaborizanteP;
	} 
    function setFotoP(string $valor){
		$this->FotoP = $valor;
	}
	function getFotoP():string{
		return $this->FotoP;
	} 
	function setExistenciaP(bool $valor){
		$this->ExistenciaP = $valor;
	}
	function getExistenciaPP():bool{
		return $this->ExistenciaP;
	} 
}