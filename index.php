<?php
require_once "config.php";
require_once "libs/Model.php";
require_once "libs/Controller.php";
// echo base_url();
	$url=$_GET['url'];
	$urla=explode('/', $url);
	// print_r($urla);
	$cn=ucfirst($urla[0]).'Controller';
	$cf='controller/'.$cn.'.php';
	if (file_exists($cf)) {
		require_once "$cf";
		$obj=new $cn();
		// print_r($obj);
		if (class_exists($cn)) {
			if (isset($urla[1])&& !empty($urla[1])&& isset($urla[2])&& !empty($urla[2])) {
				if (method_exists($obj, $urla[1])) {
				$method=$urla[1];
				$obj->$method($urla[2]);
			}else{
				echo "method $urla[1] not found";
			}
			}else if (isset($urla[1])&& !empty($urla[1])) {
				if (method_exists($obj, $urla[1])) {
				$method=$urla[1];
				$obj->$method();
				}else{
					echo "method $urla[1] not found";
				}
			}
			
			
		}else{
			require_once("controller/UserController.php");
			$obj=new UserController();
			$obj->register();
			// echo "$cn not found";
		}
	}else{
		require_once("controller/UserController.php");
		$obj=new UserController();
		$obj->register();
		// die($cf.' not found');
	}
?>