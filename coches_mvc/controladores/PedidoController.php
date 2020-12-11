<?php
	//Cristian Lobo Marrozos    
	
	define('CWD', getcwd());
	
	/**
	 * Import the files we will use
	 */
	require_once "./modelos/Pedido.php" ;
	require_once "./modelos/Marca.php" ;
	require_once "./modelos/Modelo.php" ;
	require_once "./libs/Sesion.php" ;
	require_once "./libs/Routing.php" ;
	
	/**
	 * PedidoController
	 */
	class PedidoController {
		
		/**
		 * __construct
		 *
		 * @return void
		 */
		public function __construct() {}

		/**
		 * List of the user's orders
		 */		
		/**
		 * pedidos
		 *
		 * @return void
		 */
		public function pedidos() {
			$idu = $_GET["id"] ;

			$ped = Pedido::mostrarPedidos($idu) ;
			
			require_once "./vistas/historyView.php" ;
		}

		/**
		 * Creating the new row in the "contiene" table
		 */		
		/**
		 * contiene
		 *
		 * @return void
		 */
		public function contiene() {
			$idu = $_POST["idu"] ;
			$idm = $_POST["idm"] ;
			$idma = $_POST["idma"] ;

			/**
			 * Creating the TOKEN that will be used as the Order Number
			 */
			$fecha = date('Y-m-d') ;

			echo $fecha ;

			$token = "$idu".time()."$idma";

			echo $token."<br/>" ;
			echo "<pre>".print_r($_GET, true)."</pre>" ;

			$ped = new Pedido() ;
			$ped->setCodUsu($idu) ;
			$ped->setFecPedido($fecha) ;
			$ped->setNumeroPedido($token) ;
			$ped->save() ;

			$ped->contiene($idm) ;

			echo '<script type="text/javascript">';
        	echo 'window.location.href="./index.php"' ;
        	echo '</script>';
        	echo '<noscript>';
        	echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        	echo '</noscript>';

		}
		
	}