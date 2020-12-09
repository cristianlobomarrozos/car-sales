<?php 
	
	class Database {

		private $host = '' ;
	 	private $user = 'root' ;
	 	private $pass = '' ;

	 	private $pdo ;
	 	private $sqlp ;
	 	private static $instance = null ;
	 	private $parameters;


	 	/**
	 	 * Conexión a la base de datos
	 	 */
	 	private function __construct() {

	 		$dsn = 'mysql:charset=UTF8;host=localhost;dbname=coches';

	 		try {
	 			$this->pdo = new PDO($dsn, 
	 								 $this->user, 
	 								 $this->pass) ;
	 		} catch (PDOException $e) {
	 			die ('**ERROR: se ha producido un error en la conexión con la base de datos.') ;
	 		}
	 	}


	 	/**
	 	 * Devuelve una instancia de la clase, ya que el constructor es privado (Patrón singletone).
	 	 * @return
	 	 */
	 	public static function getInstance() {
	 		if (self::$instance==null) 
	 			self::$instance = new Database() ;

	 		return self::$instance ;
	 	}

	 	/**
	 	 * Cierra la conexión a la base de datos
	 	 */
	 	public function __destruct(){
			$this->pdo = null ;
		}

	    public function bindAll($sql, $parray = ""){
		   	//echo "<br/>".$sql ;
		    //echo "<pre>".print_r($parray,true)."</pre><br/>" ;
		   	//die() ;
		   	$this->sqlp = $this->pdo->prepare($sql) ;
	    	//echo "<pre>".print_r($this->sqlp, true)."</pre>" ;
		   	foreach($parray as $param => $value):
	    		$this->sqlp->bindValue($param, $value) ;
	    		//echo $param." => ".$value."<br/>" ;
	    	endforeach;
	    	//echo "<pre>".print_r($this->sqlp, true)."</pre>" ;
	    	//die() ;
	    	$this->sqlp->execute() ;
	    	//echo "<pre>".print_r($this->sqlp, true)."</pre>" ;
		   	//die() ;
	    //
	    }
		/**
		 * Realiza la consulta a la base de datos y devuelve un resultado
		 *
		 * @param $sql
		 * @return
		 */
		public function query(string $sql){
			$this->res = $this->pdo->query($sql) ;
			return $this ;
		}

		/**
		 * Devuelve un registro en formato de objeto
		 *
		 * @param $cls
		 * @return
		 */
		public function getObject(string $cls = "StdClass"){
			return $this->res->fetchObject($cls) ;
		}

		public function lastId()
		{
			return $this->pdo->lastInsertId() ;
		}
	}

 ?>