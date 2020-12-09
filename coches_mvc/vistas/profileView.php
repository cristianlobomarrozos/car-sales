<?php

	$ses = Sesion::getInstance() ;

	if (!$ses->checkActiveSession())
		 $ses->redirect("index.php") ;

	$usr = $_SESSION['usuario'] ;
	//echo "<pre>".print_r($usr, true)."</pre>" ;
	//echo $usr->getCodUsu() ;

	if (!empty($_FILES)):

		$path_ini = $_FILES["img"]["tmp_name"] ;
		$path_fin = "images/avatares/".$usr->getCodUsu().".jpg" ;

		if (!move_uploaded_file($path_ini, $path_fin)):
			echo "Se ha producido un error al cargar la imagen del usuario" ;
		else:
			$usr->setAvatar($path_fin) ;
			$ses->updateUsuario($usr) ;
		endif ;

	endif ;

	require_once ("libs/Navbar.php") ;
	if(is_null($usr->getAPI_KEY())):
	    $api = "" ;
	   
    else:
        $api = $usr->getAPI_KEY() ;
      
    endif ;
?>

<div class="content">
    
    <label>Generar API key: </label><a class="btn btn-primary" href="index.php?con=usuario&ope=api&id=<?=$user->getCodUsu()?>">Generar</a>
		<form method="post" enctype="multipart/form-data">
			<div class="p-5 m-5">
				<div class="row">
					<div class="col p-4">
					    <label>API: </label><br/>
					    <h4><?php echo $api ; ?></h4>
						<label>Avatar: </label><br/>
						<?php
								//echo "<pre>".print_r($usr, true)."</pre>" ;
								$avatar = $usr->getAvatar() ;
							if (isset($avatar)):
								$id = $usr->getCodUsu() ;
								echo "<img src=\"$avatar\" class=\"perfil\">" ;
							else:
								//echo $usr->getAvatar() ;
								echo "<img src=\"./images/avatares/no-image.jpg\">" ;
							endif;
						?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Email: </label>
						<input disabled type="email" name="ema" value="<?= $usr->getEmail() ?>" />
					</div>
				</div>

				<div class="row">
					<div class="col form-group">				
					    <label for="img">Cambiar avatar: </label>
					    <input type="file" class="form-control-file" id="img" name="img" 
					    	   accept="image/jpg, image/png" />
					</div>
				</div>

				<div class="row">
					<div class="col">				
					    <button class="btn btn-primary" type="submit">Guardar datos</button>
					</div>
				</div>			
			</div>
		</form>



<?php
include "libs/Footer.php";
?>