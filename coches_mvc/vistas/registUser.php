<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>

	<div class="container">

		<!-- nota -->
		<div class="row">
			<div class="col-sd-12 mx-auto mb-5">
				<h4>Registro de Usuarios</h4>
			</div>
		</div>

		
		<?php
			if (isset($error)):
				echo "<div class=\"alert alert-danger w-50 mx-auto\">" ;
				echo $error ;
				echo "</div>" ;
			endif ;
		?>

		<!-- formulario de registro -->
		<form method="post" action="../index.php?con=usuario&ope=registrar" onsubmit="return validateForm()">
			
			<!-- nombre de usuario -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="email">Correo electrónico:</label>
					<input class="form-control" type="email" name="email" 
						   placeholder="email@flixnet.com" required />
				</div>
			</div>

			<!-- nombre -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>

			<!-- apellidos -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellidos">Apellidos:</label>
					<input class="form-control" type="text" name="apellidos" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="pass">Contraseña:</label>
					<input class="form-control" type="password" name="pass" 
						   required />
				</div>
			</div>

			<!-- confirmación contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="conf">Confirmación contraseña:</label>
					<input class="form-control" type="password" name="conf" 
						   required />
				</div>
			</div>

			<!-- fecha de nacimiento -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="fnac">Fecha de Nacimiento:</label>
					<input class="form-control" type="date" name="fnac" />
				</div>
			</div>

			<!-- registro -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-primary w-100" type="submit">Registrar</button>
				</div>
			</div>
		</form>

		<!-- volver atrás -->
		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<a href="../index.php" class="btn btn-link">volver atrás</a>
			</div>
		</div>

	</div> <!-- container -->

</body>
</html>