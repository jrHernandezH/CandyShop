<?php
require_once("../modelo/Origen.php");
include_once("../utils/ErroresAplic.php");
$nErr=-1;
$arrEncontrados=array();
$sJsonRet = "";
$oErr = null;
$sUrl = "";
$oOri=null;
	
	try{				
		//Como se trata de un enumerado, ya tiene ciertos métodos por omisión
        $oOri=new Origen();
		$arrEncontrados = $oOri->buscarTodos();
	}catch(Exception $e){
		//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
		error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
		$nErr = ErroresAplic::ERROR_EN_BD;
	}
	
	if ($nErr==-1){
		$sJsonRet = 
		'{
			"success":true,
			"status": "ok",
			"data":{
				"arrOrigenes": [
		';
		//Recorrer arreglo para llenar objetos
		foreach($arrEncontrados as $oOrigen){
			$sJsonRet = $sJsonRet.'{
					"clave":'.$oOrigen->getIdOrigen().',
					"descripcion":"'.$oOrigen->getNombre().'"
					},';
		}
		//Sobra una coma, eliminarla
		$sJsonRet = substr($sJsonRet,0, strlen($sJsonRet)-1);
		
		//Colocar cierre de arreglo y de objeto
		$sJsonRet = $sJsonRet.'
				]
			}
		}';
	}else{
		$oErr = new ErroresAplic();
		$oErr->setError($nErr);
		$sJsonRet = 
		'{
			"success":false,
			"status": "'.$oErr->getTextoError().'",
			"data":{}
		}';
	}
	
	//Retornar JSON a quien hizo la llamada
	header('Content-type: application/json');
	echo $sJsonRet;
?>