<?php	
	/**
	 * route
	 *
	 * @param  mixed $url
	 * @param  mixed $con
	 * @param  mixed $ope
	 * @param  mixed $params
	 * @return void
	 */
	function route($url, $con, $ope, $params=[])
	{
		// we build the base route

		$ruta = "$url?con=$con&ope=$ope" ;

		// we add the parameters
		foreach($params as $key => $value)
			$ruta.="&$key=$value" ;

		// we redirect
		header('location:'.$ruta) ;
		exit;
	}
	
	/**
	 * route1
	 *
	 * @param  mixed $url
	 * @return void
	 */
	function route1($url)
	{
		
		$ruta = "$url" ;

		header('location:'.$ruta) ;
		exit;
	}

	