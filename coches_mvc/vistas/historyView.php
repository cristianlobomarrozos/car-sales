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

		//echo "<pre>".print_r($ped[0], true)."</pre>" ;

		//die() ;

 		foreach($ped[0] as $item):

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

<?php

	//echo "<pre>".print_r($ped[1], true)."</pre>" ;

	//die() ;

	$x = [] ;
	$y = [] ;
	foreach($ped[1] as $item):

		array_push($x, $item->NomMod) ;
		array_push($y, $item->cantidad) ;
	endforeach;

	//echo "<pre>".print_r($x, true)."</pre>" ;
	//echo "<pre>".print_r($y, true)."</pre>" ;
	
?>

<div>
	<canvas id="bar-chart" width="800" height="450"></canvas>
	</div>

<script>
	var x = <?php echo json_encode($x); ?>; 
	var y = <?php echo json_encode($y); ?>; 


		// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'line',
    data: {
      labels: x,
      datasets: [
        {
          data: y
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Compras realizadas'
      },
	  scales: {
            yAxes: [{
                stacked: true
            }]
	  }
    }
});

    </script>
<?php
include "libs/Footer.php";
?>