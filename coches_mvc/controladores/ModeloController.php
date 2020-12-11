<?php
//Cristian Lobo Marrozos

require_once "./modelos/Modelo.php";
require_once "./libs/Routing.php";
//require_once "./vendor/autoload.php" ;

/**
 * [Description ModeloController]
 */
/**
 * ModeloController
 */
class ModeloController
{

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Showing every Classic model
	 */
	/**
	 * @return [type]
	 */
	/**
	 * clasico
	 *
	 * @return void
	 */
	public function clasico()
	{

		$mod = Modelo::mostrarClasicos();



		require_once "./vistas/classicView.php";
	}

	/**
	 * Showing every Modern model
	 */
	/**
	 * @return [type]
	 */
	/**
	 * moderno
	 *
	 * @return void
	 */
	public function moderno()
	{

		$mod = Modelo::mostrarModernos();



		require_once "./vistas/modernView.php";
	}

	/**
	 * Showing every model in the admin view.
	 */
	/**
	 * @return [type]
	 */
	/**
	 * listar
	 *
	 * @return void
	 */
	public function listar()
	{
		$mod = Modelo::mostrarTodos();



		require_once "./vistas/adminModelView.php";
	}

	/**
	 * Showing model given the ID
	 */

	/**
	 * info
	 *
	 * @return void
	 */
	public function info()
	{
		$idm = $_GET["id"];
		$mod = Modelo::mostrarModelo($idm);

		require_once "./vistas/showModel.php";
	}

	/**
	 * We add the new Model into the Database
	 */
	/**
	 * anyadir
	 *
	 * @return void
	 */
	public function anyadir()
	{
		/**
		 * Checking if the model name has been passed
		 */
		if (isset($_POST["modelo"])) :
			/**
			 * We get every field needed
			 */
			$NomMod = $_POST["modelo"];
			$Potencia = $_POST["potencia"];
			$año = $_POST["año"];
			$marca = $_POST["marca"];
			$descripcion = $_POST["descripcion"] ?? null;
			$precio = $_POST["precio"] ?? null;
			$esClasico = $_POST["esClasico"];

			/**
			 * Creating the new Model
			 */
			$mod = new Modelo();
			$mod->setNomMod($NomMod);
			$mod->setPotencia($Potencia);
			$mod->setAño($año);
			$mod->setCodMar($marca);
			$mod->setDescripcion($descripcion);
			$mod->setPrecio($precio);
			$mod->setEsClasico($esClasico);

			/**
			 * Creating the folder where the images will be
			 */
			if (!empty($_FILES)) :
				$x = 0;

				$y = count($_FILES["img"]["name"], COUNT_RECURSIVE);

				while ($x < $y) {
					if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/coches_mvc/images/coches/" . $NomMod . "/")) :
						mkdir($_SERVER['DOCUMENT_ROOT'] . "/coches_mvc/images/coches/" . $NomMod . "/");
					endif;

					$path_ini = $_FILES["img"]["tmp_name"][$x];
					$path_fin = $_SERVER['DOCUMENT_ROOT'] . "/coches_mvc/images/coches/" . $NomMod . "/" . $x . ".jpg";

					$x++;
					if (move_uploaded_file($path_ini, $path_fin)) :
						echo "Exito";
					else :
						echo "Error";
					endif;
				}

			endif;
			/**
			 * Submiting the new model into the database
			 */
			$mod->anadir();

			route('index.php', 'modelo', 'listar');
		else :
			require_once "./vistas/newModel.php";
		endif;
	}

	/**
	 * Delete function to delete a Model from the Database
	 */
	/**
	 * borrar
	 *
	 * @return void
	 */
	public function borrar()
	{
		/**
		 * Getting the ID
		 */
		$idm = $_POST["id"];

		/**
		 * Searching and deleting the exact model
		 */
		$mod = new Modelo();
		$mod->delete($idm);

		/**
		 * Redirect
		 */
		route('index.php', 'modelo', 'listar');
	}

	/**
	 * editar
	 *
	 * @return void
	 */
	public function editar()
	{
		$idm = $_GET["id"];
		$mod = Modelo::mostrarModelo($idm);


		if (!isset($_GET["nom"])) :

			// Show the edit form 
			require_once "vistas/editModel.php";
		else :

			// Refresh databse info.
			$nom = $_GET["modelo"];
			$pot = $_GET["potencia"];
			$año = $_GET["año"];
			$mar = $_GET["marca"];
			$des = $_GET["descripcion"];
			$pre = $_GET["precio"];
			$cla = $_GET["esClasico"];
			// Refresh data
			$mod->setNomMod($nom);
			$mod->setPotencia($pot);
			$mod->setAño($año);
			$mod->setCodMar($mar);
			$mod->setDescripcion($des);
			$mod->setPrecio($pre);
			$mod->setEsClasico($cla);

			// Refresh the object in the database
			$mod->editar($idm);
			//die() ;
			// Redirecting to the previous page
			route('index.php', 'modelo', 'listar');
		endif;
	}
}
