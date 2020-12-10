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
			
			if (isset($_POST["modelo"])):

				$NomMod = $_POST["modelo"] ;
				$Potencia = $_POST["potencia"] ;
				$año = $_POST["año"] ;
				$marca = $_POST["marca"] ;
				$descripcion = $_POST["descripcion"]??null ;
				$precio = $_POST["precio"]??null ;
				$esClasico = $_POST["esClasico"] ;

				$mod = new Modelo() ;
				$mod->setNomMod($NomMod) ;
				$mod->setPotencia($Potencia) ;
				$mod->setAño($año) ;
				$mod->setCodMar($marca) ;
				$mod->setDescripcion($descripcion) ;
				$mod->setPrecio($precio) ;
				$mod->setEsClasico($esClasico) ;

				$mod->anadir() ;
				if (!empty($_FILES)):
					$x = 0 ;
					
					$y = count($_FILES["img"]["name"], COUNT_RECURSIVE) ;

					while($x < $y) {
						if(!is_dir($_SERVER['DOCUMENT_ROOT']."/coches_mvc/images/coches/".$NomMod."/")):
							mkdir($_SERVER['DOCUMENT_ROOT']."/coches_mvc/images/coches/".$NomMod."/");
						endif;
						
						$path_ini = $_FILES["img"]["tmp_name"][$x] ;
						$path_fin = $_SERVER['DOCUMENT_ROOT']."/coches_mvc/images/coches/".$NomMod."/".$x.".jpg" ;
						//echo "fin" ;
						//echo "<pre>".print_r($path_fin,true)."</pre>" ;
						//echo "ini" ;
						//echo "<pre>".print_r($path_ini,true)."</pre>" ;
						$x++ ;
						if (move_uploaded_file($path_ini, $path_fin)):
							echo "Exito" ;
						else:
							echo "Error" ;
						endif;
					}

				endif ;

				route('index.php', 'modelo', 'listar') ;
			else:
				require_once "./vistas/newModel.php" ;
			endif;
		}

		public function borrar() {
			$idm = $_POST["id"] ;

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