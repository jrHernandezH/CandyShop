<?php

error_reporting(E_ALL);

include_once("Tipo.php");
include_once("Origen.php");
include_once("AccesoDatos.php");
class Producto{
    protected int $idProducto;
    protected ?string $Nombre;
    protected ?float $Precio;
    protected ?string $Caracteristicas;
    protected ?string $Fotografia;
    protected int $Saborizantes;
    protected ?Tipo $tipo;
    protected ?Origen $origen;


	public function buscarTodos():array{
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$arrRS=null;
		$arrRet = array();
		$oProducto=null;
			if ($oAccesoDatos->openConnection()){
				$sQuery = "SELECT t1.Llave_Producto, t1.Nombre, t1.Precio, 
								t1.Caracteristicas, t1.Fotografia, t1.Saborizante, 
								t1.Tipo, t1.Llave_Origen
					FROM productos t1
					ORDER BY t1.Llave_Producto";
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
				$sQuery = "SELECT t1.Llave_Producto, t1.Nombre, t1.Precio, 
								t1.Caracteristicas, t1.Fotografia, t1.Saborizante, 
								t1.Tipo, t1.Llave_Origen
					FROM productos t1
					WHERE t1.Tipo = :tip
					ORDER BY t1.Nombre";
				$arrParams = array(":tip"=>$this->tipo->value);
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, $arrParams);
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
	public function buscarTodosPorOrigen():array{
		$oAccesoDatos=new AccesoDatos();
		$sQuery="";
		$arrRS=null;
		$arrRet = array();
		$oProducto=null;
		$arrParams=array();
			if ($this->origen == null)
				throw new Exception("Producto->buscarTodosPorFiltro: faltan datos");
			else{
				if ($oAccesoDatos->openConnection()){
					$sQuery = "SELECT t1.Llave_Producto, t1.Nombre, t1.Precio, 
									t1.Caracteristicas, t1.Fotografia, t1.Saborizante, 
									t1.Tipo, t1.Llave_Origen
						FROM productos t1
						WHERE t1.Llave_Origen = :ori
						ORDER BY t1.Nombre";
					$arrParams = array(":ori"=>$this->origen->getIdOrigen());
					$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, $arrParams);
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
     public function setPrecio(float $valor){
        $this->Precio = $valor;
     }
     public function getPrecio():?float{
        return $this->Precio;
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
 
     public function setSaborizante(int $valor){
        $this->Saborizantes = $valor;
     }
     public function getSaborizante():?int{
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