<?php 
error_reporting(E_ALL);
include_once("AccesoDatos.php");
class Compra {
    protected ?int $idCompra;
    protected ?string $fechaEntrega;
    protected ?Mensajeria $mensajeria;
    protected ?Pago $pago;


    //FALTA HACER AMBOS METODOS DE BUSQUEDA

	public function buscarTodos():array{
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrRet = array();
        $oCompra=null;
            if ($oAccesoDatos->conectar()){
                $sQuery = "SELECT t1.idExperiencia, t1.idZona, t1.nombre, 
                                t1.descripcion, t1.duracion, t1.costo, 
                                t1.dsctoMenorEdad, t1.dsctoTerceraEdad, 
                                t1.dsctoCapaDiferente, t1.reconocimiento,
                                t1.nomImagen, t1.activa, t1.tipo 
                    FROM Experiencia t1
                    WHERE t1.tipoExp = 1
                    ORDER BY t1.nombre";
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
                $oAccesoDatos->desconectar();
                if ($arrRS){
                    foreach($arrRS as $arrLinea){
                        $oExpe = new Ecologica();
                        $oExpe->setIdExperiencia($arrLinea[0]);
                        $oExpe->setZona(new Zona());
                        $oExpe->getZona()->setIdZona($arrLinea[1]);
                        $oExpe->setNombre($arrLinea[2]);
                        $oExpe->setDescripcion($arrLinea[3]);
                        $oExpe->setDuracion($arrLinea[4]);
                        $oExpe->setCosto($arrLinea[5]);
                        $oExpe->setDsctoMenorEdad($arrLinea[6]);
                        $oExpe->setDsctoTerceraEdad($arrLinea[7]);
                        $oExpe->setDsctoCapaDiferente($arrLinea[8]);
                        $oExpe->setReconocimiento(Reconocimiento::from($arrLinea[9]));
                        $oExpe->setNomImagen($arrLinea[10]);
                        $oExpe->setActiva($arrLinea[11]);
                        $oExpe->setTipo($arrLinea[12]);
                        $arrRet[] = $oExpe;
                    }
                }
            }
            return $arrRet;
        }
        
        public function buscarTodosPorFiltro():array{
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrRet = array();
        $oExpe=null;
        $arrParams=array();
            if ($this->reconocimiento == null)
                throw new Exception("Ecologica->buscarTodosPorFiltro: faltan datos");
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
                            $oExpe = new Ecologica();
                            $oExpe->setIdExperiencia($arrLinea[0]);
                            $oExpe->setZona(new Zona());
                            $oExpe->getZona()->setIdZona($arrLinea[1]);
                            $oExpe->setNombre($arrLinea[2]);
                            $oExpe->setDescripcion($arrLinea[3]);
                            $oExpe->setDuracion($arrLinea[4]);
                            $oExpe->setCosto($arrLinea[5]);
                            $oExpe->setDsctoMenorEdad($arrLinea[6]);
                            $oExpe->setDsctoTerceraEdad($arrLinea[7]);
                            $oExpe->setDsctoCapaDiferente($arrLinea[8]);
                            $oExpe->setReconocimiento(Reconocimiento::from($arrLinea[9]));
                            $oExpe->setNomImagen($arrLinea[10]);
                            $oExpe->setActiva($arrLinea[11]);
                            $oExpe->setTipo($arrLinea[12]);
                            $arrRet[] = $oExpe;
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
    public function setIdCompra(int $valor){
        $this->idCompra = $valor;
     }
     public function getIdCompra():int{
        return $this->idCompra;
     }
     
     public function setFechaEntrega(string $valor){
        $this->fechaEntrega = $valor;
     }
     public function getFechaEntrega():?string{
        return $this->fechaEntrega;
     }
     
     public function setMensajeria(Mensajeria $valor){
        $this->mensajeria = $valor;
     }
     public function getMensajeria():?Mensajeria{
        return $this->mensajeria;
     }
     
     public function setPago(Pago $valor){
        $this->pago = $valor;
     }
     public function getPago():?Pago{
        return $this->pago;
     }
 }
 ?>


}
    ?>