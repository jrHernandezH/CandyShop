
<?php


require_once ("../modelo/Administrador.php");
require_once ("../modelo/Cliente.php");
require_once ("../utils/ErroresAplic.php");

session_start();
$nErr=-1;
$cuenta = "";
$password = "";
$user = new Administrador();


if (
	isset($_REQUEST["cuenta"]) && !empty($_REQUEST["cuenta"]) &&
	isset($_REQUEST["password"]) && !empty($_REQUEST["password"])
) {
	$cuenta = $_REQUEST["cuenta"]; 
	$password = $_REQUEST["password"]; 
	$user->setCuenta($cuenta);
	$user->setContrasenia($password);
	try {
	

		if ($user->existeCuentaAdministrador()) { 
			$_SESSION["usuario"] = $user;
			$_SESSION["tipo"] = "admin";
			
		} else { 
		
			$user = new Cliente();
			$user->setCuenta($cuenta);
			$user->setContrasenia($password);

			if ($user->existeCuentaCliente()) { 
				$_SESSION["usuario"] = $user;
				$_SESSION["tipo"] = "cliente";            
			} else {
				$nErr = ErroresAplic::USR_DESCONOCIDO;         
			}
		}
		
		

	} catch (Exception $e) {
		error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
		$nErr = ErroresAplic::ERROR_EN_BD;
	}
} else
$nErr = ErroresAplic::FALTAN_DATOS;


	if ($nErr==-1){
		$sJsonRet = 
		'{
			"success":true,
			"status": "ok",
			"data":{
				"nombre":"'.$user->getNombreCompleto().'",
				"tipo": "'.(is_a($user, 'Administrador')?'Administrador':'Cliente').'",
				"token": "'.session_id().'"
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