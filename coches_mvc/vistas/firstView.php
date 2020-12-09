
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>	<div class="row">
		<div class="col-md-6">
			<h2>
				Modernos
			</h2>
			<a href="index.php?con=modelo&ope=moderno"><img src="./images/iconos/moderno.svg" alt="coche moderno" class="svg-img"></a>
			<div class="inicio">
				<p>
					Aquí podrás encontrar una variedad de distintas marcas de coches modernos, es decir, coches salidos al mercado a partir de 2005. Pueden ser coches nuevos, coches de segunda mano o de km 0. Puede haber coches tanto utilitarios como deportivos.
				</p>
				<p>
					<a class="btn btn-primary" href="index.php?con=modelo&ope=moderno">Modernos»</a>
				</p>
			</div>
		</div>
		<div class="col-md-6">
			<h2>
				Clásicos
			</h2>
			<a href="index.php?con=modelo&ope=clasico"><img src="./images/iconos/clasico.svg" alt="coche clasico" class="svg-img"></a>
			<div class="inicio">
				<p>
					Aquí podrás encontrar una variedad de coches clásicos, todos ellos revisados para garantizar un correcto funcionamiento de los mismos.
				</p>
				<p>
					<a class="btn btn-primary" href="index.php?con=modelo&ope=clasico">Clásicos»</a>
				</p>
			</div>
		</div>
	</div>

	<div>
	<canvas id="bar-chart" width="800" height="450"></canvas>
	</div>
    <script>
		// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});

    </script>
