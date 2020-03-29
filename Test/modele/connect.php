<?php
		
	$hostname = "localhost";	//ou localhost
	$base= "test";//nom de la base 
	$loginBD= "root";
	$passBD="";
	//$pdo = null;

try {


	$pdo = new PDO ("mysql:server=$hostname; dbname=$base; charset=utf8", "$loginBD", "$passBD");
}

catch (PDOException $e) {
	die  ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
}

?>