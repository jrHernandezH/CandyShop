<?php 
error_reporting(E_ALL);
include_once("AccesoDatos.php");

class Pago {
    protected ?int $Notarjeta;
    protected ?string $FechaVencimiento;
    protected ?int $CVV;


    public function buscarTodos():array{
        $oAccesoDatos=new AccesoDatos();
        $sQuery="";
        $arrRS=null;
        $arrRet = null;
        $oPago=null;
            if ($oAccesoDatos->conectar()){
                $sQuery = "SELECT t1.Notarjeta, t1.FechaVencimiento, t1.CVV
                    FROM Pago t1
                    ORDER BY t1.Notarjeta";
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery, array());
                $oAccesoDatos->desconectar();
                if ($arrRS){
                    $arrRet = array();
                    foreach($arrRS as $arrLinea){
                        $oPago = new Pago();
                        $oPago->setNotarjeta($arrLinea[0]);
                        $oPago->setFechaVencimiento($arrLinea[1]);
                        $oPago->setCVV($arrLinea[2]);
                        $arrRet[] = $oPago;
                    }
                }
            }
            return $arrRet;
        }
        
        public function setNotarjeta(int $valor){
           $this->Notarjeta = $valor;
        }
        public function getNotarjeta():int{
           return $this->Notarjeta;
        }
        
        public function setFechaVencimiento(string $valor){
           $this->FechaVencimiento = $valor;
        }
        public function getFechaVencimiento():?string{
           return $this->FechaVencimiento;
        }
        
        public function setCVV(int $valor){
            $this->CVV = $valor;
         }
         public function getCVV():int{
            return $this->CVV;
         }
         
}
    ?>