<?php
function conectar(){
	define("server","mysql:host=localhost;dbname=contratos");
	define("user","root");
	define("pass","");
	try{
	$conn = new PDO(server,user,pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->exec("set names UTF8");
	}catch(PDOException $ex){
		echo "Sem acesso ao sistema:". $ex->getMessage();
		die;
	}
	return $conn;
}
?>