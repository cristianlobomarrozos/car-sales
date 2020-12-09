<?php


	require_once "libs/Database.php" ;
	require_once "libs/Sesion.php" ;
	require_once "modelos/Modelo.php" ;

	$sesion = Sesion::getInstance() ;


	$usr = $_SESSION["usuario"]??0 ;


	include "libs/Navbar.php" ;
?>
		<div class="content">
			<div class="p-5">
				<div>
					<h1><?= $mod->getNomMod() ?></h1>
					
				</div>
				<div class="col-md-3">
					  <img src="./images/coches/<?=$mod->getNomMod()?>.jpg" alt="<?= $mod->getNomMod() ?>">
					</div>
				</div>
				<div>
					<p>
						Año <?=	$mod->getAño() ?> </p>
					<p>	Potencia(en caballos): <?= $mod->getPotencia() ?>CV</p><br/> 

					<p>
						<?= $mod->getDescripcion() ?>
					</p>
				</div>
				<div class="font-weight-bold text-right" style="font-size: 2vw;">
					<?= $mod->getPrecio() ?>€
				</div>
				<form>
					<input type="hidden" name="idm"  data-codmod="<?= $mod->getCodMod() ?>" />
					<input type="hidden" name="idma" data-codmar="<?= $mod->getCodMar() ?>" />
					<input type="hidden" name="idu"  data-codusu="<?= $usr->getCodUsu() ?>" />
					<input type="hidden" name="con" value="pedido" />
					<input type="hidden" name="ope" value="contiene" />
					<div class="p-1">
						<?php
							if(!empty($mod->getPrecio())):
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
</div>
<div id="comprado" class="modal" tabindex="-1" role="dialog">
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
