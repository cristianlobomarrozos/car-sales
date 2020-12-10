<?php
	$sesion = Sesion::getInstance() ;
	if (!$sesion->checkActiveSession())
		 $sesion->redirect("index.php") ;

	$usr = $_SESSION["usuario"] ;

	$idUsu = $usr->getCodUsu() ;

	require_once("./libs/Navbar.php") ;
	?>
		<table class="table">
		  <thead>
		    <tr>
					<th width="15%" scope="col">Numero de pedido</th>
					<th width="15%" scope="col">Marca</th>
					<th width="15%" scope="col">Modelo</th>
					<th width="15%" scope="col">Potencia</th>
					<th width="15%" scope="col">Año</th>
					<th width="15%" scope="col">Precio</th>
					<th width="15%" scope="col">Fecha del pedido</th>
				</tr>
		  </thead>

 <?php	



 		foreach($ped as $item):

 		//echo "<pre>".print_r($ped, true)."</pre>" ;

?>
		  <tbody>
		    <tr>
					<td><?= $item->numeroPedido ?></td>
					<td><?= $item->NomMar ?></td>
					<td><?= $item->NomMod ?></td>
					<td><?= $item->Potencia ?></td>
					<td><?= $item->año ?></td>
					<td><?= $item->Precio ?></td>
					<td><?= $item->fecPedido ?></td>
				</tr>
		  </tbody>
		

		<?php
		endforeach;



?>
</table>

<div>
	<canvas id="bar-chart" width="800" height="450"></canvas>
	</div>

<script>
		// Bar chart
		let x = [] ;
		let y = [] ;
new Chart(document.getElementById("bar-chart"), {
    type: 'line',
    data: {
      labels: x,
      datasets: [
        {
         
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: y
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Compras realizadas'
      }
    }
});

    </script>



<?php
include "libs/Footer.php";
?>