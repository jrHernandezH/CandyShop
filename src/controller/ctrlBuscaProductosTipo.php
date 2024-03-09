<?php
/*Archivo:  ctrlBuscaTodosFiltroProeriencias.php
Objetivo: control para buscar todas las experiencias por filtro, no requiere sesión
Autor:    BAOZ
*/
require_once("../modelo/Producto.php");
include_once("../utils/ErroresAplic.php");
$nErr=-1;
$oPro=new Producto();
$arrEncontrados=array();
$sJsonRet = "";
$oErr = null;
$nFiltro=-1;
	/*Verifica que haya llegado el filtro de reconocimiento*/
	if (isset($_REQUEST["cmbTipo"]) && !empty($_REQUEST["cmbTipo"])){
		//Verifica que sea entero
		if (is_numeric($_REQUEST["cmbTipo"])){
			try{				
				$nFiltro = (int)$_REQUEST["cmbTipo"];
				//Si el tipo es -1, está buscando todos, sin filtro
				if ($nFiltro == -1){
					$arrEncontrados = $oPro->buscarTodos();
				}else{
					//Verificar que el valor sea válido en el enumerado
					if (array_search($nFiltro, 
									array_column(tipo::cases(),"value"))
						!==false){
						$oPro->setTipo(Tipo::from($nFiltro));
						//$arrEncontrados = array_merge($oPro->buscarTodosPorTipo());
						$arrEncontrados = $oPro->buscarTodosPorTipo();
					}else
						$nErr = ErroresAplic::ERROR_DATOS;
				}				
			}catch(Exception $e){
				//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
				error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
				$nErr = ErroresAplic::ERROR_EN_BD;
			}
		}else
			$nErr = ErroresAplic::ERROR_DATOS;
	}
	else
		$nErr = ErroresAplic::FALTAN_DATOS;
	
	if ($nErr==-1){
		$sJsonRet = 
		'{
			"success":true,
			"status": "ok",
			"data":{
				"arrProductos": [
		';
		//Recorrer arreglo para llenar objetos
		foreach($arrEncontrados as $oPro){
<<<<<<< HEAD
		
			
			$sJsonRet = $sJsonRet.'{
					"nombre":"'.$oPro->getNombre().'",
					"tipo":"'.str_replace('_', ' ', $oPro->getTipo()->name).'",
=======
			$Origen = $oPro->getOrigen();
			
			$sJsonRet = $sJsonRet.'{
					"nombre":"'.$oPro->getNombre().'",
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
					"precio":'.$oPro->getPrecio().',
					"caracteristicas":"'.$oPro->getCaracteristicas().'",
					"fotografia":"'.$oPro->getFotografia().'",
					"saborizantes":'.$oPro->getSaborizante().',
<<<<<<< HEAD
					"existencias":'.$oPro->getExistencia().',
					"origen":"'.$oPro->getOrigen()->getNombre().'"
=======
					"origen":"'.$Origen->getNombre().'"
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
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