<?php
	//Cristian Lobo Marrozos
	
	require_once "./modelos/Modelo.php" ;
	require_once "./libs/Routing.php" ;
	//require_once "./vendor/autoload.php" ;

	class ModeloController {

		public function __construct() {}

		public function clasico() {

			$mod = Modelo::mostrarClasicos() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;

			require_once "./vistas/classicView.php" ;
		}

		public function moderno() {

			$mod = Modelo::mostrarModernos() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;

			require_once "./vistas/modernView.php" ;
		}

		public function listar() {
			$mod = Modelo::mostrarTodos() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;

			require_once "./vistas/adminModelView.php" ;
		}

		public function info() {
			$idm = $_GET["id"] ;
			$mod = Modelo::mostrarModelo($idm) ;

			require_once "./vistas/showModel.php" ;
		}

		public function anyadir() {
			//echo "<pre>".print_r($_GET, true)."</pre>" ;
			//die() ;
			$NomMod = $_GET["modelo"] ;
			$Potencia = $_GET["potencia"] ;
			$año = $_GET["año"] ;
			$marca = $_GET["marca"] ;
			$descripcion = $_GET["descripcion"]??null ;
			$precio = $_GET["precio"]??null ;
			$esClasico = $_GET["esClasico"] ;

			$mod = new Modelo() ;
			$mod->setNomMod($NomMod) ;
			$mod->setPotencia($Potencia) ;
			$mod->setAño($año) ;
			$mod->setCodMar($marca) ;
			$mod->setDescripcion($descripcion) ;
			$mod->setPrecio($precio) ;
			$mod->setEsClasico($esClasico) ;

			//echo "<pre>".print_r($mod, true)."</pre>" ;
			//die() ;

			$mod->anadir() ;
			//die() ;	

			route('index.php', 'modelo', 'listar') ;
		}

		public function borrar() {
			$idm = $_GET["id"] ;

			$mod = new Modelo() ;
			$mod->delete($idm) ;

			route('index.php', 'modelo', 'listar') ;

		}

		public function editar(){
			$idm = $_GET["id"] ;
			$mod = Modelo::mostrarModelo($idm) ;

			//echo "<pre>".print_r($mod, true)."</pre>" ;
			//echo "<pre>".print_r($_GET, true)."</pre>" ;
			//die() ;
			if (!isset($_GET["nom"])):

				// mostramos el formulario de edición
				require_once "vistas/editModel.php" ;
			else:
				//echo "<pre>".print_r($mod, true)."</pre>" ;
				//echo "<pre>".print_r($_GET, true)."</pre>" ;
				//die();
				// actualizar la información en la 
				// base de datos.
				$nom = $_GET["modelo"] ;
				$pot = $_GET["potencia"] ;
				$año = $_GET["año"] ;
				$mar = $_GET["marca"] ;
				$des = $_GET["descripcion"] ;
				$pre = $_GET["precio"] ;
				$cla = $_GET["esClasico"] ;
				// actualizar los datos
				$mod->setNomMod($nom) ;
				$mod->setPotencia($pot) ;
				$mod->setAño($año) ;
				$mod->setCodMar($mar) ;
				$mod->setDescripcion($des) ;
				$mod->setPrecio($pre) ;
				$mod->setEsClasico($cla) ;

				// refrescar el objeto en la base de datos
				$mod->editar($idm) ;
				//die() ;
				// redirigimos a la página de procedencia
				route('index.php', 'modelo', 'listar') ;				
			endif ;
		}
	}