<?php
		
	/**
	 * Pedido
	 */
	class Pedido {		
		/**
		 * CodPed
		 *
		 * @var mixed
		 */
		private $CodPed ;		
		/**
		 * CodUsu
		 *
		 * @var mixed
		 */
		private $CodUsu ;		
		/**
		 * fecPedido
		 *
		 * @var mixed
		 */
		private $fecPedido ;		
		/**
		 * numeroPedido
		 *
		 * @var mixed
		 */
		private $numeroPedido ;


	
	    /**
	     * @return mixed
	     */
	    public function getCodPed()
	    {
	        return $this->CodPed;
	    }

	    /**
	     * @param mixed $CodPed
	     *
	     * @return self
	     */
	    public function setCodPed($CodPed)
	    {
	        $this->CodPed = $CodPed;

	        return $this;
	    }

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
	    public function getFecPedido()
	    {
	        return $this->fecPedido;
	    }

	    /**
	     * @param mixed $fecPedido
	     *
	     * @return self
	     */
	    public function setFecPedido($fecPedido)
	    {
	        $this->fecPedido = $fecPedido;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNumeroPedido()
	    {
	        return $this->numeroPedido;
	    }

	    /**
	     * @param mixed $numeroPedido
	     *
	     * @return self
	     */	    
	    /**
	     * setNumeroPedido
	     *
	     * @param  mixed $numeroPedido
	     * @return void
	     */
	    public function setNumeroPedido($numeroPedido)
	    {
	        $this->numeroPedido = $numeroPedido;

	        return $this;
	    }

		/**
		 * Show user's order (only seen by the user)
		 */	    
	    /**
	     * mostrarPedidos
	     *
	     * @param  mixed $id
	     * @return void
	     */
	    public static function mostrarPedidos($id) {
	    	$db = Database::getInstance() ;

            $db->query("SELECT * FROM modelo mo LEFT JOIN marca ma on (mo.CodMar=ma.CodMar) LEFT JOIN contiene c on (mo.CodMod=c.CodMod) RIGHT JOIN pedido p on (c.CodPed=p.Codped) LEFT JOIN usuario u on (p.CodUsu=u.CodUsu) WHERE u.CodUsu=$id") ;

            $data1 = [] ;

            while($row = $db->getObject()):
            	array_push($data1, $row) ;
            endwhile;
			
			$db->query("SELECT *, count(NomMod) as cantidad FROM modelo mo LEFT JOIN marca ma on (mo.CodMar=ma.CodMar) LEFT JOIN contiene c on (mo.CodMod=c.CodMod) RIGHT JOIN pedido p on (c.CodPed=p.Codped) LEFT JOIN usuario u on (p.CodUsu=u.CodUsu) WHERE u.CodUsu=$id GROUP BY NomMod") ;
			
            $data2 = [] ;

			while($row = $db->getObject()):
            	array_push($data2, $row) ;
			endwhile;

			$data = [$data1, $data2] ;

			
			//echo "<pre>".print_r($data, true)."</pre>" ;
			//die() ;

            return $data ;
	    }

		/**
		 * Insert into 'pedido' table the new row
		 */	    
	    /**
	     * save
	     *
	     * @return void
	     */
	    public function save() {
	    	$db = Database::getInstance() ;
	    	$sql = "INSERT INTO pedido(CodUsu, fecPedido, numeroPedido) values (:idu, :fec, :tok)" ;

	    	$data = [
	    		":idu" => "{$this->CodUsu}",
	    		":fec" => "{$this->fecPedido}",
	    		":tok" => "{$this->numeroPedido}"
	    	] ;

	    	echo "<pre>".print_r($data, true)."</pre>" ;
	    	//die() ;

	    	$db->bindAll($sql, $data) ;
	    	
	    }

		/**
		 * Insert into 'contiene' table the new row
		 */	    
	    /**
	     * contiene
	     *
	     * @param  mixed $idm
	     * @return void
	     */
	    public function contiene($idm) {
	    	$db = Database::getInstance() ;

	    	$idp = $db->lastId() ;

	    	$sql = "INSERT INTO contiene(CodMod, CodPed) VALUES (:mod, :ped)" ;
	    	
	    	$data = [
	    		":mod" => $idm,
	    		":ped" => $idp,
	    	] ;

	    	$db->bindAll($sql, $data) ;
		}
		
}


?>