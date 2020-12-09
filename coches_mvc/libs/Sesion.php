<?php
	require_once "Database.php";
	require_once "./modelos/Usuario.php";
	
	class Sesion {

		private $usuario ;
		private $expire = 6000 ;

		private static $instancia = null ;

		private function __construct() {}

		public function getUsuario() {
			return $this->usuario ;
		}

		public function updateUsuario(Usuario $usr) 
		{

			
			$db = Database::getInstance() ;
			$email = $usr->getEmail();
			$id = $usr->getCodUsu() ;
			$foto = $usr->getAvatar() ;
			$sql = "UPDATE usuario set email='$email', Avatar='$foto' WHERE CodUsu='$id'" ;

			$db->query($sql) ;

			//echo $sql;

			
			$this->usuario = $usr ;


		}

		public function close() {
			$_SESSION = [] ;

			session_destroy() ;
		}

		public static function getInstance() {
			if(!isset($_SESSION)):
				session_start() ;
			endif;

			if (isset($_SESSION["_session"])):
				self::$instancia = unserialize($_SESSION["_session"]) ;
			else:
				if (self::$instancia===null):
					self::$instancia = new Sesion() ;
				endif;
			endif;

			return self::$instancia ;
		}

		public function login(string $email, string $password) {
			$db = Database::getInstance() ;

			$sql = "SELECT * FROM usuario WHERE email='$email' AND pass=MD5('$password')" ;

			if ($db->query($sql)):
				//$_SESSION["usuario"] = $db->getObject("Usuario") ;

				$_SESSION["usuario"] = $db->getObject("Usuario") ;

				$_SESSION["time"]    = time() ;
				$_SESSION["_sesion"] = serialize(self::$instancia) ;

				return true;
			endif;

			return false;
		}

		public function isExpired() {
			return (time() - $_SESSION["time"] > $this->expire) ;
		}

		public function isLogged() {
			return !empty($_SESSION) ;
		}

		public function checkActiveSession() {
			if ($this->isLogged()):
				if (!$this->isExpired()): return true;
				endif;
			endif;

			return false;
		}

		public function redirect(string $url) {
			header("Location: $url") ;
			die() ;
		}

		public function __sleep()
		{
			return ["usuario", "instancia"] ;
		}

	}



?>