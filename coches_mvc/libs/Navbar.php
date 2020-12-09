<?php
	require_once "Sesion.php" ;
	require_once "./modelos/Usuario.php" ;
	include "./css/bootstrap.php" ;

	$sesion = Sesion::getInstance() ;
	
?>

<!DOCTYPE html>
<html>
<head>
	<title> Coches </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<link href="./fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/style.css">	

	<script type="text/javascript">
		$(document).ready(function(){
			$("#buy").on("click", function(e){
				e.preventDefault(e) ;
				var idu = $(this).data("codusu") ;
				var idma = $(this).data("codmar") ;
				var idm = $(this).data("codmod") ;
				console.log(idu) ;
				$("#comprado").modal("show") ;
				$("#buying").attr("href", "index.php?con=pedido&ope=contiene&idm="+idm+"&idma="+idma+"&idu="+idu)

			}) ;
		}) ;
		$(document).on('click', '.edit_user', function(e){
			e.preventDefault(e) ;
			var nom = $(this).parents("tr").data("nomusu") ;
			//alert(nom) ;
			var ema = $(this).parents("tr").data("ema") ;
			var ape = $(this).parents("tr").data("ape") ;
			var fecnac = $(this).parents("tr").data("fec") ;
			var adm = $(this).parents("tr").data("adm") ;

			if (adm === 0) {
				$('#modal-edit').modal('show') ;
				document.getElementById('nombre').value = nom ;
				document.getElementById('email').value = ema ;
				document.getElementById('apellidos').value = ape ;
				document.getElementById('fecha').value = fecnac ;
				$('#option-0').attr('selected', 'selected') ;
			} else {
				$('#modal-edit').modal('show') ;
				document.getElementById('nombre').value = nom ;
				document.getElementById('email').value = ema ;
				document.getElementById('apellidos').value = ape ;
				document.getElementById('fecha').value = fecnac ;
				$('#option-1').attr('selected', 'selected') ;
			}
			
		}) ;

		$(document).on('click', '.delete_user', function(e){
			e.preventDefault(e) ;
			var timeDelay = 1500;
			var id = $(this).parents("tr").data("codusu");
			var nombre = $(this).parents("tr").data("nomusu") ;
			var col = $(this).parents("tr") ;
			
			$("#modal-delete").modal("show") ;
			$("#nombreUsuario").html(nombre) ;

			$('.delete_second').on('click', function(e) {
				e.preventDefault() ;
				col.fadeOut(1000);
				//alert("dentro " + id) ;
				function ajax() {
					$.ajax({
						url: "index.php?con=usuario&ope=delete",
						type: "POST",
						data: {"id":id},
					}).done(function() {
						window.location.reload(true);
					}); ;
				}
				
				setTimeout(ajax, timeDelay);
			}) ;
		}) ;
		
	</script>
</head>
<body>
	<nav >
		<div>
		<ul>
		  <li><a href="./index.php">Inicio</a></li>
		  <li class="dropdown1">
		  	<a class="dropdown1" href="javascript:void(0)">Modelos</a>
		  	<div class="dropdown1-content">
		  		<a href="index.php?con=modelo&ope=clasico">Clásicos</a>
		  		<a href="index.php?con=modelo&ope=moderno">Modernos</a>
		  	</div>
		  </li>
		  <?php

		
						//echo "<pre>".print_r($sesion, true)."</pre>" ;
						//echo $usu;
						if(empty($_SESSION["usuario"])):
							//echo "<pre>".print_r($_SESSION, true)."</pre>" ;
							$admin = 0 ;
							//echo $admin ;	
							//echo "<pre>".print_r($usu, true)."</pre>" ;
						else:
							$usu = $_SESSION["usuario"];

							$admin = $usu->getEsAdmin() ;
							//echo "<pre>".print_r($usu, true)."</pre>" ;
						endif;
						
					if ((!empty($_SESSION["usuario"]))):
							//echo "<pre>".print_r($_SESSION, true)."</pre>" ;
						if($admin):
							echo "<li>" ;
							echo "<a href=\"index.php?con=usuario&ope=listar\">Usuarios</a>" ;
							echo "<a href=\"index.php?con=modelo&ope=listar\">Gestión modelos</a>" ;
							echo "</li>" ;
							echo "<li class=\"dropdown1\">" ;
							echo "<a class=\"dropdown1\" href=\"javascript:void(0)\">".$usu->getNomUsu()."</a>" ;
							echo "<div class=\"dropdown1-content\">"; 
							echo "<a href=\"index.php?con=usuario&ope=perfil&id=".$usu->getCodUsu()."\">Perfil</a>";
							echo "<a href=\"index.php?con=pedido&ope=pedidos&id=".$usu->getCodUsu()."\">Historial compras</a>";
							//echo "<a href=\"#\">Ajustes</a>";
							echo "<a href=\"index.php?con=usuario&ope=logout\">Logout</a>" ;

							echo "</div>" ;
							echo "</li>" ;
						else:
							echo "<li class=\"dropdown1\">" ;
							echo "<a class=\"dropdown1\" href=\"javascript:void(0)\">".$usu->getNomUsu()."</a>" ;
							echo "<div class=\"dropdown1-content\">"; 
							echo "<a href=\"index.php?con=usuario&ope=perfil&id=".$usu->getCodUsu()."\">Perfil</a>";
							echo "<a href=\"index.php?con=pedido&ope=pedidos&id=".$usu->getCodUsu()."\">Historial compras</a>";
							//echo "<a href=\"#\">Ajustes</a>";
							echo "<a href=\"index.php?con=usuario&ope=logout\">Logout</a>" ;

							echo "</div>" ;
							echo "</li>" ;
						endif;

					else:
							//echo "<pre>".print_r($_SESSION, true)."</pre>" ;

						echo "<li class=\"dropdown1\">" ;
						echo "<a href=\"index.php?con=usuario&ope=login\">Login</a>" ;
						echo "</li>" ;

					endif;



				?>
		  
		</ul>
	</div>
	</nav>
	<div class="wrapper">
	
