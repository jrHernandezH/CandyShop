<?php

error_reporting(E_ALL);

include_once("Tipo.php");
include_once("Origen.php");
include_once("AccesoDatos.php");
class Producto{
    protected int $idProducto;
    protected ?string $Nombre;
    protected ?int $Precio;
    protected ?string $Caracteristicas;
    protected ?string $Fotografia;
    protected bool $Saborizantes;
    protected ?Tipo $tipo;
    protected ?Origen $origen;


	public function buscarTodos():array{
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$arrRS=null;
		$arrRet = array();
		$oProducto=null;
			if ($oAccesoDatos->openConnection()){
				$sQuery = "SELECT Llave_Producto, Nombre, Precio, 
								Caracteristicas, Fotografia, Saborizante, 
								Tipo, Llave_Origen
					FROM productos
					ORDER BY Llave_Producto";
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
				
				$oAccesoDatos->closeConnection();
				if ($arrRS){
					foreach($arrRS as $arrLinea){
						$oProducto = new Producto();
						$oProducto->setIdProducto($arrLinea[0]);
						$oProducto->setNombre($arrLinea[1]);
						$oProducto->setPrecio($arrLinea[2]);
						$oProducto->setCaracteristicas($arrLinea[3]);
						$oProducto->setFotografia($arrLinea[4]);
						$oProducto->setSaborizante($arrLinea[5]);
						$oProducto->setTipo(Tipo::from($arrLinea[6]));
						$oProducto->setOrigen(new Origen());
						$oProducto->getOrigen()->setIdOrigen($arrLinea[7]);
						$arrRet[] = $oProducto;
					}
				}
			}
			return $arrRet;
		}
	public function buscarTodosPorTipo():array{
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrRet = array();
	$oProducto=null;
	$arrParams=array();
		if ($this->tipo == null)
			throw new Exception("Producto->buscarTodosPorFiltro: faltan datos");
		else{
			if ($oAccesoDatos->openConnection()){
				$sQuery = "SELECT Llave_Producto, Nombre, Precio, 
								Caracteristicas, Fotografia, Saborizante, 
								Tipo, Llave_Origen
					FROM productos
					WHERE tipo = 1
					ORDER BY Nombre";
				$arrParams = array(":tipo"=>$this->tipo->value);
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
				$oAccesoDatos->closeConnection();
				if ($arrRS){
					foreach($arrRS as $arrLinea){
						$oProducto = new Producto();
						$oProducto->setIdProducto($arrLinea[0]);
						$oProducto->setNombre($arrLinea[1]);
						$oProducto->setPrecio($arrLinea[2]);
						$oProducto->setCaracteristicas($arrLinea[3]);
						$oProducto->setFotografia($arrLinea[4]);
						$oProducto->setSaborizante($arrLinea[5]);
						$oProducto->setTipo(Tipo::from($arrLinea[6]));
						$oProducto->setOrigen(new Origen());
						$oProducto->getOrigen()->setIdOrigen($arrLinea[7]);
						$arrRet[] = $oProducto;
					}
				}
			}
		}
		return $arrRet;
	}
	
	public function buscar():bool{
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
	
    public function setIdProducto(int $valor){
       $this->idProducto = $valor;
    }
    public function getIdProducto():?int{
       return $this->idProducto;
    }
    public function setNombre(string $valor){
        $this->Nombre = $valor;
     }
     public function getNombre():?string{
        return $this->Nombre;
     }
     public function setPrecio(int $valor){
        $this->Nombre = $valor;
     }
     public function getPrecio():?int{
        return $this->Nombre;
     }
     public function setCaracteristicas(string $valor){
        $this->Caracteristicas = $valor;
     }
     public function getCaracteristicas():?string{
        return $this->Caracteristicas;
     }
     public function setFotografia(string $valor){
        $this->Fotografia = $valor;
     }
     public function getFotografia():?string{
        return $this->Fotografia;
     }
 
     public function setSaborizante(bool $valor){
        $this->Saborizantes = $valor;
     }
     public function getSaborizante():?bool{
        return $this->Saborizantes;
     }


	 public function setTipo(Tipo $valor){
		$this->tipo = $valor;
	 }
	 public function getTipo():?Tipo{
		return $this->tipo;
	 }
	 public function setOrigen(Origen $valor){
		$this->origen = $valor;
	 }
	 public function getOrigen():?Origen{
		return $this->origen;
	 }
}
?>