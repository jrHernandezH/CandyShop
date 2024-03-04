<?php 
error_reporting(E_ALL);
include_once('../modelo/Conexion.php');
class Mensajeria {
    protected ?int $idMensajeria;
    protected ?string $Nombre;
    protected ?int $Precio;


    public function buscarTodos():array{
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrRet = null;
        $oMensajeria=null;
            if ($oAccesoDatos->conectar()){
                $sQuery = "SELECT t1.idMensajeria, t1.nombre, t1.Precio
                    FROM Mensajeria t1
                    ORDER BY t1.nombre";
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
                $oAccesoDatos->desconectar();
                if ($arrRS){
                    $arrRet = array();
                    foreach($arrRS as $arrLinea){
                        $oMensajeria = new Mensajeria();
                        $oMensajeria->setIdMensajeria($arrLinea[0]);
                        $oMensajeria->setNombre($arrLinea[1]);
                        $oMensajeria->setPrecio($arrLinea[2]);
                        $arrRet[] = $oMensajeria;
                    }
                }
            }
            return $arrRet;
        }
        
        public function setIdMensajeria(int $valor){
           $this->idMensajeria = $valor;
        }
        public function getIdMensajeriarigen():int{
           return $this->idMensajeria;
        }
        
        public function setNombre(string $valor){
           $this->Nombre = $valor;
        }
        public function getNombre():?string{
           return $this->Nombre;
        }
        
        public function setPrecio(int $valor){
            $this->Precio = $valor;
         }
         public function getPrecio():int{
            return $this->Precio;
         }
         
}
    ?>