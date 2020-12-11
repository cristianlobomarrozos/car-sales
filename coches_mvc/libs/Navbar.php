<?php
require_once "Sesion.php";
require_once "./modelos/Usuario.php";
include "./css/bootstrap.php";

$sesion = Sesion::getInstance();

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
	<link rel="stylesheet" href="./css/output.css">

	<script src="js/pagination.js"></script>

	<!--<script src="node_modules/chart.js/dist/Chart.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script type="text/javascript">
		/**
		 * Pagination script using AJAX
		 */
		$(document).ready(function() {
			function loadData(page) {
				$.ajax({
					url: "index.php?con=usuario&ope=listar",
					type: "POST",
					cache: false,
					data: {
						page_no: page
					},
					success: function(response) {
						$("#table-data").html(response);
					}
				});
			}
			loadData();

			// Pagination code
			$(document).on("click", ".pagination li a", function(e) {
				e.preventDefault();
				var pageId = $(this).attr("id");
				loadData(pageId);
			});
		});

		/**
		 * Buying function using modal and AJAX
		 */
		$(document).ready(function() {
			$("#buy").on("click", function(e) {
				e.preventDefault(e);
				var idu = $(this).data("codusu");
				var idma = $(this).data("codmar");
				var idm = $(this).data("codmod");


				console.log(idm);
				$("#comprando").modal("show");
				//$("#buying").attr("href", "index.php?con=pedido&ope=contiene&idm="+idm+"&idma="+idma+"&idu="+idu)

				$(".complete_buying").on('click', function(e) {
					var dni = document.getElementById('num_dni').value;
					var dniLetra = document.getElementById('letra').value;

					var b = document.forms["buyModel"]["nombre"].value;
					var n = document.forms["buyModel"]["email"].value;
					var m = document.forms["buyModel"]["num_dni"].value;
					var c = document.forms["buyModel"]["letra"].value;

					/**
					 * Validation form
					 */
					if (b == "") {
						alert("Name must be filled out");
						return false;
					} else if (n == "") {
						alert("Email must be filled out");
						return false;
					} else if (m == "" || m.toString().length != 8) {
						alert("DNI must be filled out and have 8 digits");
						return false;
					} else if (c == "") {
						alert("Letter must be filled out");
						return false;
					}

					/**
					 * DNI functions checks that the letter introduced in the buying time is correct
					 */
					function DNI(dni) {
						switch (dni % 23) {
							case 0:
								var letra = "T";
								break;
							case 1:
								var letra = "R";
								break;
							case 2:
								var letra = "W";
								break;
							case 3:
								var letra = "A";
								break;
							case 4:
								var letra = "G";
								break;
							case 5:
								var letra = "M";
								break;
							case 6:
								var letra = "Y";
								break;
							case 7:
								var letra = "F";
								break;
							case 8:
								var letra = "P";
								break;
							case 9:
								var letra = "D";
								break;
							case 10:
								var letra = "X";
								break;
							case 11:
								var letra = "B";
								break;
							case 12:
								var letra = "N";
								break;
							case 13:
								var letra = "J";
								break;
							case 14:
								var letra = "Z";
								break;
							case 15:
								var letra = "S";
								break;
							case 16:
								var letra = "Q";
								break;
							case 17:
								var letra = "V";
								break;
							case 18:
								var letra = "H";
								break;
							case 19:
								var letra = "L";
								break;
							case 20:
								var letra = "C";
								break;
							case 21:
								var letra = "K";
								break;
							case 22:
								var letra = "E";
								break;
							default:
						}

						if (!(letra === dniLetra)) {
							alert("error");
						} else {
							function ajax() {
								$.ajax({
									url: "index.php?con=pedido&ope=contiene",
									type: "POST",
									data: {
										"idm": idm,
										"idma": idma,
										"idu": idu
									},
								}).done(function() {
									window.location.reload(true);
								});
							}
							alert("¡Gracias por su compra!");
							ajax();
						}
					}

					DNI(dni);
				});


			});
		});

		/**
		 * Edit user with AJAX and modal
		 */
		$(document).on('click', '.edit_user', function(e) {
			e.preventDefault(e);

			var id = $(this).parents("tr").data("codusu");
			var nom = $(this).parents("tr").data("nomusu");
			//alert(id) ;
			var ema = $(this).parents("tr").data("ema");
			var ape = $(this).parents("tr").data("ape");
			var fecnac = $(this).parents("tr").data("fec");
			var adm = $(this).parents("tr").data("adm");

			if (adm === 0) {
				$('#modal-edit').modal('show');
				document.getElementById('nombre').value = nom;
				document.getElementById('email').value = ema;
				document.getElementById('apellidos').value = ape;
				document.getElementById('fecha').value = fecnac;
				$('#option-0').attr('selected', 'selected');
			} else {
				$('#modal-edit').modal('show');
				document.getElementById('nombre').value = nom;
				document.getElementById('email').value = ema;
				document.getElementById('apellidos').value = ape;
				document.getElementById('fecha').value = fecnac;
				$('#option-1').attr('selected', 'selected');
			};

			$('.edit_user_complete').on('click', function(e) {
				//alert("dentro" + id);

				var admin = document.getElementById('adMin').value;

				function ajax() {
					$.ajax({
						url: "index.php?con=usuario&ope=update",
						type: "POST",
						data: {
							"id": id,
							"admin": admin
						},
					}).done(function() {
						window.location.reload(true);
					});
				}
				ajax();
			});
		});


		/**@abstract
		 * Delete user with AJAX
		 */
		$(document).on('click', '.delete_user', function(e) {
			e.preventDefault(e);
			var timeDelay = 1500;
			var id = $(this).parents("tr").data("codusu");
			var nombre = $(this).parents("tr").data("nomusu");
			var col = $(this).parents("tr");

			$("#modal-delete").modal("show");
			$("#nombreUsuario").html(nombre);

			$('.delete_second').on('click', function(e) {
				e.preventDefault();
				col.fadeOut(1000);

				function ajax() {
					$.ajax({
						url: "index.php?con=usuario&ope=delete",
						type: "POST",
						data: {
							"id": id
						},
					}).done(function() {
						window.location.reload(true);
					});;
				}

				setTimeout(ajax, timeDelay);
			});
		});

		/**@abstract
		 * Delete model with AJAX
		 */
		$(document).on('click', '.delete_model', function(e) {
			e.preventDefault(e);
			var timeDelay = 1500;
			var id = $(this).parents("tr").data("codmod");
			var nombre = $(this).parents("tr").data("nommod");
			var col = $(this).parents("tr");
			$("#modal-delete-model").modal("show");
			$("#nombreModelo").html(nombre);

			$('.delete_model_second').on('click', function(e) {
				e.preventDefault();
				col.fadeOut(1000);
				//alert("dentro " + id) ;
				function ajax() {
					$.ajax({
						url: "index.php?con=modelo&ope=borrar",
						type: "POST",
						data: {
							"id": id
						},
					}).done(function() {
						window.location.reload(true);
					});;
				}

				setTimeout(ajax, timeDelay);
			});
		});

		/**
		 * Add model Validation form
		 */
		function validateModel() {
			var x = document.forms["addModel"]["modelo"].value;
			var y = document.forms["addModel"]["potencia"].value;
			var z = document.forms["addModel"]["marca"].value;
			var a = document.forms["addModel"]["año"].value;
			var img = document.forms["addModel"]["img[]"].value;

			if (x == "") {
				alert("Model must be filled out");
				return false;
			} else if (y == "") {
				alert("Power must be filled out");
				return false;
			} else if (z == 0) {
				alert("The brand must be filled out");
				return false;
			} else if (a == "") {
				alert("Year must be filled out");
				return false;
			} else if (document.getElementById("img").files.length == 0) {
				alert("You must upload atleast 1 image")
				return false;
			}
		}


		/**
		 * AJAX search with autocomplete
		 */
		$(document).ready(function() {
			$('#key').on('keyup', function() {
				var key = $(this).val();
				var dataString = 'key=' + key;

				$.ajax({
					type: "POST",
					url: "./libs/buscar.php",
					data: dataString,
					success: function(data) {
						//We write the suggestions that the query sends us
						$('#suggestions').fadeIn(1000).html(data);
						//By clicking on any of the suggestions

						$('.suggest-element').on('click', function() {
							//We obtain the unique id of the clicked suggestion
							var id = $(this).attr('id');
							var nombre = $(this).attr('data');

							//We edit the input value with data of the suggestion clicked

							$('#key').val($('#' + id).attr('data'));
							//Delete other suggestions
							$('#suggestions').fadeOut(1000);
							alert('Has seleccionado el ' + id + ' ' + nombre);
							return false;
						});
					}
				});
			});
		});

		$(document).ready(function() {
			$(".link1").on('click', function(e) {
				// prevent the default action, in this case the following of a link
				e.preventDefault();
				// capture the href attribute of the a element
				var url = $(this).attr('href');
				alert(url);
				// perform a get request using ajax to the captured href value
				$.get(url, function() {
					// success
				});
			});
		});
	</script>

</head>

<body>
	<nav>
		<div>
			<ul>
				<li><a class="logoA" href="./index.php"><img class="logo" src="images/iconos/logo2.svg"></img></a></li>
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
				if (empty($_SESSION["usuario"])) :
					//echo "<pre>".print_r($_SESSION, true)."</pre>" ;
					$admin = 0;
				//echo $admin ;	
				//echo "<pre>".print_r($usu, true)."</pre>" ;
				else :
					$usu = $_SESSION["usuario"];

					$admin = $usu->getEsAdmin();
				//echo "<pre>".print_r($usu, true)."</pre>" ;
				endif;

				if ((!empty($_SESSION["usuario"]))) :
					//echo "<pre>".print_r($_SESSION, true)."</pre>" ;
					if ($admin) :
						echo "<li>";
						echo "<a href=\"index.php?con=usuario&ope=listar\">Usuarios</a>";
						echo "<a href=\"index.php?con=modelo&ope=listar\">Gestión modelos</a>";
						echo "</li>";
						echo "<li class=\"dropdown1\">";
						echo "<a class=\"dropdown1\" href=\"javascript:void(0)\">" . $usu->getNomUsu() . "</a>";
						echo "<div class=\"dropdown1-content\">";
						echo "<a href=\"index.php?con=usuario&ope=perfil&id=" . $usu->getCodUsu() . "\">Perfil</a>";
						echo "<a href=\"index.php?con=pedido&ope=pedidos&id=" . $usu->getCodUsu() . "\">Historial compras</a>";
						//echo "<a href=\"#\">Ajustes</a>";
						echo "<a href=\"index.php?con=usuario&ope=logout\">Logout</a>";

						echo "</div>";
						echo "</li>";
					else :
						echo "<li class=\"dropdown1\">";
						echo "<a class=\"dropdown1\" href=\"javascript:void(0)\">" . $usu->getNomUsu() . "</a>";
						echo "<div class=\"dropdown1-content\">";
						echo "<a href=\"index.php?con=usuario&ope=perfil&id=" . $usu->getCodUsu() . "\">Perfil</a>";
						echo "<a href=\"index.php?con=pedido&ope=pedidos&id=" . $usu->getCodUsu() . "\">Historial compras</a>";
						//echo "<a href=\"#\">Ajustes</a>";
						echo "<a href=\"index.php?con=usuario&ope=logout\">Logout</a>";

						echo "</div>";
						echo "</li>";
					endif;

				else :
					//echo "<pre>".print_r($_SESSION, true)."</pre>" ;

					echo "<li class=\"dropdown1\">";
					echo "<a href=\"index.php?con=usuario&ope=login\">Login</a>";
					echo "</li>";

				endif;



				?>

			</ul>
		</div>
	</nav>
	<div class="wrapper">

		<script>
			function setHalfVolume() {
				var myAudio = document.getElementById("audio1");
				myAudio.volume = 0.05; //Changed this to 0.5 or 50% volume since the function is called Set Half Volume ;)
			}

			function setVideoVolume() {
				var audio = document.getElementById("video1");
				audio.volume = 0;
			}
		</script>