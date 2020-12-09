<?php
	//Cristian Lobo Marrozos
	
	//require_once "modelos/Usuario.php" ;
	include_once($_SERVER['DOCUMENT_ROOT']."/coches_mvc/modelos/Usuario.php") ;
	//echo "<pre>".print_r($_SERVER, true)."</pre>" ;
	//die();
	//require_once "libs/Routing.php" ;
	include_once($_SERVER['DOCUMENT_ROOT']."/coches_mvc/libs/Routing.php") ;

	class UsuarioController {

		public function __construct() {}

		public function login() {

			$usu = Usuario::login() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;
		}

		public function logout() {

			$usu = Usuario::logout() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;
		}

		public function listar() {
			$user = Usuario::mostrarTodos() ;
            //echo "<pre>".print_r($user, true)."</pre>" ;
			require_once "./vistas/adminUserView.php" ;

		}

		public function perfil() {
			$idu = $_GET["id"] ;

			$user = Usuario::mostrarUsuario($idu) ;

			require_once "./vistas/profileView.php" ;
		}

		public function pedidos() {

			$idu = $_GET["id"] ;

			$user = Usuario::mostrarPedidos($idu) ;

			require_once "./vistas/historyView.php" ;
		}

		public function delete() {
			//echo "<pre>".print_r($_POST, true)."</pre>" ;
			//die();
			$idu = $_POST["id"] ;
			//echo $idu ;
			//die();
			$user = Usuario::borraUsuario($idu) ;

			route('index.php', 'usuario', 'listar') ;
		}

		public function edit() {
			$idu = $_GET["id"] ;

			$user = Usuario::mostrarUsuario($idu) ;

			require_once "./vistas/editUser.php" ;

		}

		public function update() {
			$idu = $_GET["id"] ;

			$user = Usuario::mostrarUsuario($idu) ;
			//echo "<pre>".print_r($user, true)."</pre>" ;
			//echo "<pre>".print_r($_GET, true)."</pre>" ;
			$adm = $_GET["esAdmin"] ;

			//echo $adm ;
			//die() ;
			$user->setEsAdmin($adm) ;
			$user->updateUsuario() ;
			//echo $adm ;
			//die() ;
			
			route("index.php", "usuario", "listar") ;

		}

		public function registrar() {
			echo "<pre>".print_r($_POST,true)."</pre>" ;
			$NomUsu = $_POST["nombre"] ;
			$email = $_POST["email"] ;
			$ApeUsu = $_POST["apellidos"] ;
			$pass = $_POST["pass"] ;
			$conf = $_POST["conf"] ;
			$FecNacUsu = $_POST["fnac"]??null ;

			if($pass === $conf):
				$user = new Usuario() ;
				$user->setNomUsu($NomUsu) ;
				$user->setEmail($email) ;
				$user->setApeUsu($ApeUsu) ;
				$user->setPass($pass) ;
				$user->setFecNacUsu($FecNacUsu) ;
				$user->save() ;
			endif;
            //echo "Hola" ;
            $dir = getcwd();
            //echo $dir ;
            //die() ;
			require_once "vistas/loginView.php" ;
		}

		public function api() {
		    $idu = $_GET["id"] ;
		    //echo $idu ;
		    //die();
		    $user = new Usuario() ;
		    $user->generateApi($idu) ;
		    
		    header("Location: index.php?con=usuario&ope=listar&id=".$idu) ;
		    exit ;
		}
		
	}