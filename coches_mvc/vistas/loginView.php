<?php
	
	$sesion = Sesion::getInstance() ;


	if ($sesion->checkActiveSession()):
		//$sesion->redirect("./index.php") ;
	endif; 

	if (!empty($_POST)):
		$email = $_POST["email"] ;
		$password = $_POST["pass"] ;

		$ok = $sesion->login($email, $password) ;


		if ($ok): 
			$sesion->redirect("./index.php") ;
		endif;
	endif;

	include "./libs/Navbar.php" ;
?>

		<form method="post">

			<!-- email -->
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" 
						   name="email" placeholder="email@flixnet.com" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="password" 
						   name="pass" placeholder="contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($ok)) && (!$ok)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-danger w-50 mx-auto d-flex-content-center" role="alert">
					  Usuario o contraseña incorrectas.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary w-25" type="submit">Entrar</button>
				</div>
			</div>

		</form>

		<!-- acceso REGSISTRO -->
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="./vistas/registUser.php" class="btn btn-link">registrar</a>
			</div>
		</div>

<?php
include "libs/Footer.php";
?>