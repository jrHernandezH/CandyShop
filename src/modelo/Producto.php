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
		if ($oAccesoDatos->conectar()){
			$sQuery = "SELECT t1.idProducto, t1.Nombre, t1.Precio, 
							t1.Caracteristicas, t1.Fotografia, t1.Saborizantes, 
							t1.tipo, t1.origen
				FROM Producto t1
				ORDER BY t1.idProducto";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
			$oAccesoDatos->desconectar();
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



	//FALTA MODIFICAR ESTE
	
	public function buscarTodosPorFiltro():array{
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrRet = array();
	$oProducto=null;
	$arrParams=array();
		if ($this->tipo == null)
			throw new Exception("Producto->buscarTodosPorFiltro: faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
				$sQuery = "SELECT t1.idExperiencia, t1.idZona, t1.nombre, 
								t1.descripcion, t1.duracion, t1.costo, 
								t1.dsctoMenorEdad, t1.dsctoTerceraEdad, 
								t1.dsctoCapaDiferente, t1.reconocimiento,
								t1.nomImagen, t1.activa, t1.tipo 
					FROM Experiencia t1
					WHERE t1.tipoExp = 1
					AND t1.reconocimiento = :reco
					ORDER BY t1.nombre";
				$arrParams = array(":reco"=>$this->reconocimiento->value);
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, $arrParams);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					foreach($arrRS as $arrLinea){
						$oProducto = new Ecologica();
						$oProducto->setIdExperiencia($arrLinea[0]);
						$oProducto->setZona(new Zona());
						$oProducto->getZona()->setIdZona($arrLinea[1]);
						$oProducto->setNombre($arrLinea[2]);
						$oProducto->setDescripcion($arrLinea[3]);
						$oProducto->setDuracion($arrLinea[4]);
						$oProducto->setCosto($arrLinea[5]);
						$oProducto->setDsctoMenorEdad($arrLinea[6]);
						$oProducto->setDsctoTerceraEdad($arrLinea[7]);
						$oProducto->setDsctoCapaDiferente($arrLinea[8]);
						$oProducto->setReconocimiento(Reconocimiento::from($arrLinea[9]));
						$oProducto->setNomImagen($arrLinea[10]);
						$oProducto->setActiva($arrLinea[11]);
						$oProducto->setTipo($arrLinea[12]);
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
		$this->reconocimiento = $valor;
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

	
	//No existe en el modelo, es para simplificar la lectura del código
	public function getDescripTipo():string{
	$sRet="";
		if ($this->tipo >0 &&
			array_key_exists($this->tipo."", self::$arrTipos))
			$sRet = self::$arrTipos[$this->tipo.""];
		return $sRet;
	}
	
	//No existe set porque la información es fija
	public function getTipos():array{
		return self::$arrTipos;
	}
}
?>