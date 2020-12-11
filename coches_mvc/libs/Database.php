<?php 
		
	/**
	 * Database
	 */
	class Database {

		private $host = '' ;
	 	private $user = 'root' ;
	 	private $pass = '' ;

	 	private $pdo ;
	 	private $sqlp ;
	 	private static $instance = null ;
	 	private $parameters;


	 	/**
	 	 * Database conection
	 	 */	 	
	 	/**
	 	 * __construct
	 	 *
	 	 * @return void
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
	 	 * Returns an instance of the class, since the constructor is private (Pattern singletone).
	 	 * @return
	 	 */	 	
	 	/**
	 	 * getInstance
	 	 *
	 	 * @return void
	 	 */
	 	public static function getInstance() {
	 		if (self::$instance==null) 
	 			self::$instance = new Database() ;

	 		return self::$instance ;
	 	}

	 	/**
	 	 * Closes database conection
	 	 */	 	
	 	/**
	 	 * __destruct
	 	 *
	 	 * @return void
	 	 */
	 	public function __destruct(){
			$this->pdo = null ;
		}
	    
	    /**
	     * bindAll
	     *
	     * @param  mixed $sql
	     * @param  mixed $parray
	     * @return void
	     */
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
		 * Makes the query to the Database and returns a result
		 *
		 * @param $sql
		 * @return
		 */
		public function query(string $sql){
			$this->res = $this->pdo->query($sql) ;
			return $this ;
		}

		/**
		 * Returns a record as an object
		 * 
		 * @param $cls
		 * @return
		 */
		public function getObject(string $cls = "StdClass"){
			return $this->res->fetchObject($cls) ;
		}
		
		/**
		 * lastId
		 *
		 * @return void
		 */
		public function lastId()
		{
			return $this->pdo->lastInsertId() ;
		}
	}

 ?>