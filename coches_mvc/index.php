<?php

	require_once "libs/Database.php" ;
	require_once "modelos/Marca.php" ;
	require_once "libs/Sesion.php" ;
	
	//echo "<pre>".print_r($_GET, true)."</pre>" ;
	if(isset($_GET["con"])):

		$nom = $_GET["con"] ;
		$ope = $_GET["ope"] ;

		$controller = $nom."Controller" ;
 
		ucfirst($controller);

		//echo "<h1>".ucfirst($controller)."</h1>" ; 
		//die() ;
		require_once "./controladores/".ucfirst($controller).".php" ;
		//echo $controller ;
		//echo ucfirst($controller) ;

		$controlador = new $controller() ;

		$controlador->$ope() ;

	else:
	include("libs/Navbar.php");

	include "./vistas/firstView.php" ;
?>
	
<?php
include "libs/Footer.php";
?>
<?php endif; ?>

