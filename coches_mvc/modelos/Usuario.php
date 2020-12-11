<?php

/**
 * Usuario
 */
class Usuario
{

	private $CodUsu;
	private $email;
	private $NomUsu;
	private $ApeUsu;
	private $FecNacUsu;
	private $Avatar;
	private $esAdmin;
	private $pass;
	private $API_KEY;
	//private function __construct() {}

	/**
	 * @return mixed
	 */
	public function getCodUsu()
	{
		return $this->CodUsu;
	}

	/**
	 * @param mixed $CodUsu
	 *
	 * @return self
	 */
	public function setCodUsu($CodUsu)
	{
		$this->CodUsu = $CodUsu;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 *
	 * @return self
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNomUsu()
	{
		return $this->NomUsu;
	}

	/**
	 * @param mixed $NomUsu
	 *
	 * @return self
	 */
	public function setNomUsu($NomUsu)
	{
		$this->NomUsu = $NomUsu;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getApeUsu()
	{
		return $this->ApeUsu;
	}

	/**
	 * @param mixed $ApeUsu
	 *
	 * @return self
	 */
	public function setApeUsu($ApeUsu)
	{
		$this->ApeUsu = $ApeUsu;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFecNacUsu()
	{
		return $this->FecNacUsu;
	}

	/**
	 * @param mixed $FecNacUsu
	 *
	 * @return self
	 */
	public function setFecNacUsu($FecNacUsu)
	{
		$this->FecNacUsu = $FecNacUsu;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAvatar()
	{
		return $this->Avatar;
	}

	/**
	 * @param mixed $Avatar
	 *
	 * @return self
	 */
	public function setAvatar($Avatar)
	{
		$this->Avatar = $Avatar;

		return $this;
	}

	public function __toString()
	{
		return $this->NomUsu . " " . $this->ApeUsu;
	}


	/**
	 * @return mixed
	 */
	public function getEsAdmin()
	{
		return $this->esAdmin;
	}
	/**
	 * @param mixed $esAdmin
	 *
	 * @return self
	 */
	public function setEsAdmin($esAdmin)
	{
		$this->esAdmin = $esAdmin;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPass()
	{
		return $this->pass;
	}

	/**
	 * @param mixed $pass
	 *
	 * @return self
	 */
	public function setPass($pass)
	{
		$this->pass = $pass;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAPI_KEY()
	{
		return $this->API_KEY;
	}
	/**
	 * @param mixed $API_KEY
	 * 
	 * @return self 
	 */
	public function setAPI_KEY($api)
	{
		$this->API_KEY = $api;

		return $this;
	}

	/**
	 * Login function and redirect
	 */
	/**
	 * login
	 *
	 * @return void
	 */
	public static function login()
	{
		require_once "./vistas/loginView.php";
	}

	/**
	 * Logout function and redirect
	 */
	/**
	 * logout
	 *
	 * @return void
	 */
	public static function logout()
	{
		$sesion = Sesion::getInstance();

		$sesion->close();

		$sesion->redirect("index.php");
	}

	/**
	 * Showing every registered user(only seen as and admin)
	 */
	/**
	 * mostrarTodos
	 *
	 * @return void
	 */
	public static function mostrarTodos()
	{
		$db = Database::getInstance();

		$sql = "SELECT * FROM usuario";

		$db->query($sql);

		$data = [];


		while ($row = $db->getObject("Usuario")) :
			array_push($data, $row);
		endwhile;

		return $data;
	}

	/* Prueba de paginación
	public static function mostrarTodos()
	{
		$db = Database::getInstance() ;
		$limit = 10;
		if (isset($_GET["page"])) {
			$page  = $_GET["page"];
		} else {
			$page = 1;
		};
		$start_from = ($page - 1) * $limit;

		$sql = "SELECT * FROM usuario LIMIT $start_from, $limit";

		$db->query($sql);

		$data = [];

		
		while ($row = $db->getObject("Usuario")) :
			array_push($data, $row) ;
		endwhile;

		$sql = "SELECT count(*) as total FROM usuario LIMIT $start_from, $limit" ;

		$db->query($sql) ;

		$row = $db->getObject("Usuario") ;

		//echo "<pre>".print_r($row, true)."</pre>" ;
		$total_records = $row->total ;  
		
		$total_pages = ceil($total_records / $limit); 
		//echo  $total_pages; 
		
		 

		array_push($data, $total_records) ;
		array_push($data, $total_pages) ;
		array_push($data, $page) ;
		
		return $data;
	}
	*/

	/**
	 * mostrarUsuario
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public static function mostrarUsuario($id)
	{
		$db = Database::getInstance();

		$db->query("SELECT * FROM usuario WHERE codUsu=$id");

		$data = $db->getObject("Usuario");
		//echo "<pre>".print_r($data, true)."</pre>" ;
		//die() ;
		return $data;
	}

	/**
	 * Showing user's order (only seen by the user)
	 */
	/**
	 * mostrarPedidos
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public static function mostrarPedidos($id)
	{
		$db = Database::getInstance();

		$db->query("SELECT * FROM modelo mo LEFT JOIN marca ma on (mo.CodMar=ma.CodMar) LEFT JOIN contiene c on (mo.CodMod=c.CodMod) RIGHT JOIN pedido p on (c.CodPed=p.Codped) LEFT JOIN usuario u on (p.CodUsu=u.CodUsu) WHERE u.CodUsu=$id");

		$data = $db->getObject();

		//echo "<pre>".print_r($data, true)."</pre>" ;
		//die() ;
		return $data;
	}

	/**
	 * Delete registered user (only as an admin)
	 */
	/**
	 * borraUsuario
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public static function borraUsuario($id)
	{
		$db = Database::getInstance();
		$sql = "DELETE FROM usuario WHERE CodUsu=$id";
		//echo $sql ;
		//die() ;
		$db->query($sql);
	}

	/**
	 * Updating user's role 
	 */
	/**
	 * updateUsuario
	 *
	 * @return void
	 */
	public function updateUsuario()
	{
		$db = Database::getInstance();

		$idu = $this->CodUsu;

		//echo $this->esAdmin ;
		//die() ;

		$data = [
			":esa" => "{$this->esAdmin}"
		];

		$sql = "UPDATE usuario SET esAdmin=:esa WHERE CodUsu=$idu";

		$db->bindAll($sql, $data);
	}

	/**
	 * Adding the new user into the database
	 */
	/**
	 * save
	 *
	 * @return void
	 */
	public function save()
	{
		$db = Database::getInstance();

		$data = [
			":nom" => "{$this->NomUsu}",
			":ema" => "{$this->email}",
			":pas" => "{$this->pass}",
			":ape" => "{$this->ApeUsu}",
			":fec" => "{$this->FecNacUsu}"
		];

		//echo "<pre>".print_r($data, true)."</pre>" ;
		//die() ;


		$sql = "INSERT INTO usuario (NomUsu, email, pass, ApeUsu, FecNacUsu) VALUES (:nom, :ema, md5(:pas), :ape, :fec) ";

		$db->bindAll($sql, $data);
		//die() ;
	}

	/**
	 * Insert the generated api into the database with md5 codification
	 */
	/**
	 * generateApi
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public function generateApi($id)
	{
		$db = Database::getInstance();

		$sql = "SELECT * FROM usuario WHERE CodUsu = $id";
		$db->query($sql);
		$result = $db->getObject("Usuario");

		$id = $result->getCodUsu();
		$email = $result->getEmail();
		$api = "$email" . time();
		$md5 = md5($api);

		$data = [
			":api" => $md5
		];

		$sql1 = "UPDATE usuario SET API_KEY=:api WHERE CodUsu=$id ;";
		$db->bindAll($sql1, $data);
	}
}
