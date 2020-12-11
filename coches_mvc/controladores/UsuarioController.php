<?php
//Cristian Lobo Marrozos

//require_once "modelos/Usuario.php" ;
include_once($_SERVER['DOCUMENT_ROOT'] . "/coches_mvc/modelos/Usuario.php");
//echo "<pre>".print_r($_SERVER, true)."</pre>" ;
//die();
//require_once "libs/Routing.php" ;
include_once($_SERVER['DOCUMENT_ROOT'] . "/coches_mvc/libs/Routing.php");

/**
 * UsuarioController
 */
class UsuarioController
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
	 * Login function
	 */
	/**
	 * login
	 *
	 * @return void
	 */
	public function login()
	{

		$usu = Usuario::login();

		//echo "<pre>".print_r($lec, true)."</pre>" ;
	}
	/**
	 * Logout function
	 */
	/**
	 * logout
	 *
	 * @return void
	 */
	public function logout()
	{

		$usu = Usuario::logout();

		//echo "<pre>".print_r($lec, true)."</pre>" ;
	}

	/**
	 * List of all users Registered in our App, will be only seen by the ADMINS
	 */
	/**
	 * listar
	 *
	 * @return void
	 */
	public function listar()
	{

		$user = Usuario::mostrarTodos();
		//echo "<pre>".print_r($user, true)."</pre>" ;
		require_once "./vistas/adminUserView.php";
	}

	/**
	 * Our own profile (only seen by the user)
	 */
	/**
	 * perfil
	 *
	 * @return void
	 */
	public function perfil()
	{
		$idu = $_GET["id"];

		$user = Usuario::mostrarUsuario($idu);

		require_once "./vistas/profileView.php";
	}

	/**
	 * Our orders (only seen by the user)
	 */
	/**
	 * pedidos
	 *
	 * @return void
	 */
	public function pedidos()
	{

		$idu = $_GET["id"];

		$user = Usuario::mostrarPedidos($idu);

		require_once "./vistas/historyView.php";
	}

	/**
	 * Delete user from the Database(only admin role can do it)
	 */
	/**
	 * delete
	 *
	 * @return void
	 */
	public function delete()
	{
		//echo "<pre>".print_r($_POST, true)."</pre>" ;
		//die();
		$idu = $_POST["id"];
		//echo $idu ;
		//die();
		$user = Usuario::borraUsuario($idu);

		route('index.php', 'usuario', 'listar');
	}

	/**
	 * Function used to promote users to admin role (only admin role can do it)
	 */
	/**
	 * update
	 *
	 * @return void
	 */
	public function update()
	{
		$idu = $_POST["id"];

		$user = Usuario::mostrarUsuario($idu);
		//echo "<pre>".print_r($user, true)."</pre>" ;
		//echo "<pre>".print_r($_GET, true)."</pre>" ;
		$adm = $_POST["admin"];

		//echo $adm ;
		//die() ;
		$user->setEsAdmin($adm);
		$user->updateUsuario();
		//echo $adm ;
		//die() ;

		route("index.php", "usuario", "listar");
	}

	/**
	 * Sign Up function
	 */
	/**
	 * registrar
	 *
	 * @return void
	 */
	public function registrar()
	{
		echo "<pre>" . print_r($_POST, true) . "</pre>";
		$NomUsu = $_POST["nombre"];
		$email = $_POST["email"];
		$ApeUsu = $_POST["apellidos"];
		$pass = $_POST["pass"];
		$conf = $_POST["conf"];
		$FecNacUsu = $_POST["fnac"] ?? null;

		if ($pass === $conf) :
			$user = new Usuario();
			$user->setNomUsu($NomUsu);
			$user->setEmail($email);
			$user->setApeUsu($ApeUsu);
			$user->setPass($pass);
			$user->setFecNacUsu($FecNacUsu);
			$user->save();
		endif;
		//echo "Hola" ;
		$dir = getcwd();
		//echo $dir ;
		//die() ;
		require_once "vistas/loginView.php";
	}

	/**
	 * Function used to generate API_KEY, so the user will be able to use our API
	 */
	/**
	 * api
	 *
	 * @return void
	 */
	public function api()
	{
		$idu = $_GET["id"];
		//echo $idu ;
		//die();
		$user = new Usuario();
		$user->generateApi($idu);

		header("Location: index.php?con=usuario&ope=listar&id=" . $idu);
		exit;
	}
}
