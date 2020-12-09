<?php

  require_once("./libs/Navbar.php") ;

  //echo "<pre>".print_r($mod, true)."</pre>" ;
	foreach($mod as $item):
?>
<div class="card mb-3 my-3" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <a href="index.php?con=modelo&ope=info&id=<?= $item->getCodMod() ?>"><img src="./images/coches/<?=$item->getNomMod()?>.jpg" class="card-img" alt="<?= $item->getNomMod() ?>" style="max-height: 300px";></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="index.php?con=modelo&ope=info&id=<?= $item->getCodMod() ?>"><?= $item->getNomMod() ?></a>
        <p class="card-text">Año <?= $item->getAño() ?>, potencia <?= $item->getPotencia() ?>CV</p>
        <p class="card-text"><?= $item->getDescripcion() ?></p>
        <p class="card-text"><?= $item->getPrecio() ?>€</p>
      </div>
    </div>
  </div>
</div>

<?php 
    endforeach;
?> 


<?php
include "libs/Footer.php";
?>
