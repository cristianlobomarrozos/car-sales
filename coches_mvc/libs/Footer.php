		</div>


		<footer class="page-footer footer-classic context-dark bg-image">
		  <div class="container-fluid">
		    <div class="row row-30">
		      <div class="col-md-4 col-xl-5">
		        <div class="pr-xl-4"><a class="brand" href="index.php"><img class="brand-logo-light"></a>
		          <p class="rights text-white"><span>©  </span><span class="copyright-year">2020</span><span> </span><span>Cristian Lobo Marrozos</span><span>. </span><span>All Rights Reserved.</span></p>
		        </div>
		      </div>
		      <div class="col-md-4 text-white">
		        <h5>Contacts</h5>
		        <dl class="contact-list text-white">
		          <dt>Address:</dt>
		          <dd>c/ Marie Curie 10</dd>
		        </dl>
		        <dl class="contact-list">
		          <dt>email:</dt>
		          <dd><a href="mailto:#">cristian.lobo.marrozos@gmail.com</a></dd>
		        </dl>
		        <dl class="contact-list">
		          <dt>phones:</dt>
		          <dd><a href="tel:#">666666666</a> <span>
		          </dd>
		        </dl>
		      </div>

		    </div>
		  </div>

		</footer>
		</body>


		<script>
		  var ctx = document.getElementById('myChart').getContext('2d');
		  var stackedBar = new Chart(ctx, {
		    type: 'bar',
		    data: data,
		    options: {
		      scales: {
		        xAxes: [{
		          stacked: true
		        }],
		        yAxes: [{
		          stacked: true
		        }]
		      }
		    }
		  });
		</script>

		</html>