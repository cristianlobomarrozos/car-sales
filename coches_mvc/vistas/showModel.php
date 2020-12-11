<?php


require_once "libs/Database.php";
require_once "libs/Sesion.php";
require_once "modelos/Modelo.php";


$sesion = Sesion::getInstance();


$usr = $_SESSION["usuario"] ?? 0;


include "libs/Navbar.php";
?>
<div class="content">
	<div class="p-5">
		<div>
			<h1><?= $mod->getNomMod() ?></h1>

		</div>
		<div class="">
			<div class="col-md-6 col-12 d-inline-block">

				<!-- CAROUSEL -->
				<?php
				// Set the current working directory 
				$directory = $_SERVER['DOCUMENT_ROOT'] . "/coches_mvc/images/coches/" . $mod->getNomMod();

				// Initialize filecount variavle 
				$filecount = 0;

				$files = glob($directory . '/*.jpg');

				if ($files !== false) {
					$filecount = count($files);
					//echo $filecount;
				} else {
					//echo 0;
				}
				?>

				<div>
					<div class="carousel col-md-6 col-12 d-inline-block">
						<ul class="slides">
							<?php
							$ficheros = 0;
							while ($ficheros < $filecount) {
								$apoyo2 = $ficheros + 2;
								$apoyo1 = $ficheros + 1;
								$apoyo3 = $ficheros + 3;
								echo '<input type="radio" name="radio-buttons" id="img-' . $apoyo1 . '" checked />';
								echo '<li class="slide-container">';
								echo '	<div class="slide-image">';
								echo '	<img class="ver" src="./images/coches/' . $mod->getNomMod() . '/' . $ficheros . '.jpg" alt="' . $mod->getNomMod() . '">';
								echo '	</div>';

								echo '</li>';

								$ficheros++;
							}
							?>

							</li>
							<div class="carousel-dots">

								<?php
								$ficheros = 1;
								while ($ficheros <= $filecount) {
									echo '<label for="img-' . $ficheros . '" class="carousel-dot" id="img-dot-' . $ficheros . '"></label>';
									$ficheros++;
								}

								?>
							</div>
						</ul>
					</div>
				</div>


			</div>
			<div class="col-p-10 d-inline-block float-right">
				<p>
					Año <?= $mod->getAño() ?> </p>
				<p> Potencia(en caballos): <?= $mod->getPotencia() ?>CV</p><br />

				<p>
					<?= $mod->getDescripcion() ?>
				</p>
			</div>
		</div>
		<div class="font-weight-bold text-right" style="font-size: 2vw;">
			<?= $mod->getPrecio() ?>€
		</div>
		<form>
			<input type="hidden" name="idm" data-codmod="<?= $mod->getCodMod() ?>" />
			<input type="hidden" name="idma" data-codmar="<?= $mod->getCodMar() ?>" />
			<input type="hidden" name="idu" data-codusu="<?= $usr->getCodUsu() ?>" />
			<input type="hidden" name="con" value="pedido" />
			<input type="hidden" name="ope" value="contiene" />
			<div class="p-1">
				<?php
				if (!empty($mod->getPrecio())) :
				?>
					<button data-codusu="<?= $usr->getCodUsu() ?>" data-codmar="<?= $mod->getCodMar() ?>" data-codmod="<?= $mod->getCodMod() ?>" id="buy" type="submit" class="btn btn-primary">Comprar</button>
				<?php
				endif;
				?>
			</div>
		</form>
	</div>

	<?php
	include "./libs/Footer.php";
	?>
	<!--
</div>
<div id="comprando" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Compra realizada</h5>
      </div>
      <div class="modal-body">
        <p>¡Su compra se ha realizado con éxito!</p>
      </div>
      <div class="modal-footer">
        <a id="buying" class="btn btn-danger" href="">Salir</a>
      </div>
    </div>
  </div>
</div>
						-->
	<div id="comprando" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Realizar Compra</h5>
				</div>
				<div class="modal-body">
					<form name="buyModel">
						<div class="form-group">
							<label>NOMBRE</br>
								<input required type="text" name="nombre" id="nombre_compra" class="form-control"></br>
						</div>

						<div class="form-group">
							<label>EMAIL</br>
								<input type="text" name="email" id="email_compra" class="form-control"></br>
						</div>

						<div class="form-group">
							<label>Número del DNI(sin la letra)</br>
								<input type="int" name="num_dni" id="num_dni" class="form-control"></br>
						</div>

						<div class="form-group">
							<label>Letra del DNI</br>
								<input type="text" name="letra" id="letra" class="form-control"></br>
						</div>

				</div>
				<div class="modal-footer btn-group">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn btn-success complete_buying">Comprar</i></button>
					<!--<a id="delete" class="btn btn-danger" href="index.php?con=usuario&ope=delete&id=">Borrar</a>-->
				</div>
				</form>
			</div>
		</div>
	</div>