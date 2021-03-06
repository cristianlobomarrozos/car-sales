<?php
require_once("./modelos/Usuario.php");


$ses = Sesion::getInstance();

if (!$ses->checkActiveSession())
  $ses->redirect("index.php");

$usr = $_SESSION['usuario'];

//echo "<pre>".print_r($usr, true)."</pre>" ;

$esAdmin = $usr->getEsAdmin();
//echo $esAdmin ;

if (!$esAdmin) :
  $ses->redirect("index.php");
else :


  if ($usr->getEsAdmin()) :

    include("libs/Navbar.php");
?>
    <form class="form-inline" method="post" action="#">
      <div class="input-group input-group-sm">
        <input class="search_query form-control" type="text" name="key" id="key" placeholder="Buscar...">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <div id="suggestions"></div>
    <table class="table table-striped table-dark">

      <div class="form-group">
        <thead>
          <tr>

            <th scope="col">Nombre</td>
            <th scope="col">Email</td>
            <th scope="col">Apellidos</td>
            <th scope="col">Fecha de nacimiento</td>
            <th scope="col">esAdmin</td>
          </tr>
        </thead>

      </div>


      <form class="form-inline" method="get">
        <div class="form-group">
          <tbody>

            <?php


            //$total_records = $user[10] ;
            //unset($user[10]) ;
            //$total_pages = $user[11] ;
            //unset($user[11]) ;
            //$page = $user[12] ;
            //unset($user[12]) ;

            foreach ($user as $item) :
            ?>
              <tr data-codusu="<?= $item->getCodUsu() ?>" class="id" data-nomusu="<?= $item->getNomUsu() ?>" data-ema="<?= $item->getEmail() ?>" data-ape="<?= $item->getApeUsu() ?>" data-fec="<?= $item->getFecNacUsu() ?>" data-adm="<?= $item->getEsAdmin() ?>">
                <input type="hidden" name="id">
                <td><input type="text" disabled name="nombre" value="<?= $item->getNomUsu() ?>"></td>
                <td><input type="int" disabled name="email" value="<?= $item->getEmail() ?>"></td>
                <td><input type="int" disabled name="apellidos" value="<?= $item->getApeUsu() ?>"></td>
                <td><input type="int" disabled name="fecNac" value="<?= $item->getFecNacUsu() ?>"></td>
                <td>
                  <input type="text" disabled name="admin" value="<?php if ($item->getEsAdmin()) :
                                                                    echo "Si";
                                                                  else :
                                                                    echo "No";
                                                                  endif;  ?>">
                </td>
                <td>
                  <!--<button id="delete" class="btn-sm btn-danger">Borrar</button>-->
                  <!--<button id="edit" class="btn-sm btn-warning">Editar</button>-->
                  <button class="btn btn-lg btn-danger delete_user boton"><i class="fas fa-trash"></i></button>
                  <button class="btn btn-lg btn-warning edit_user boton"><i class="far fa-edit"></i></button>
                </td>
              </tr>

          </tbody>


    <?php

            endforeach;

          else :
            $ses->redirect("index.php");
          endif;
        endif;
    ?>
    </table>
    <?php
    /*
    
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link link1' href='index.php?con=usuario&ope=listar&page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
*/
    ?>
    </div>
    </form>


    <div id="modal-delete" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Eliminar usuario</h5>
          </div>
          <div class="modal-body">
            <p>¿Está seguro que desea eliminar a este usuario?</p>
            <strong id="nombreUsuario"></strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger delete_second" data-dismiss="modal">Delete</button>
            <!--<a id="delete" class="btn btn-danger" href="index.php?con=usuario&ope=delete&id=">Borrar</a>-->
          </div>
        </div>
      </div>
    </div>

    <div id="modal-edit" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Usuario</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>NOMBRE</br>
                <input type="text" disabled name="nombre" id="nombre" class="form-control"></br>
            </div>

            <div class="form-group">
              <label>EMAIL</br>
                <input type="text" disabled name="email" id="email" class="form-control"></br>
            </div>

            <div class="form-group">
              <label>APELLIDOS</br>
                <input type="text" disabled name="apellidos" id="apellidos" class="form-control"></br>
            </div>

            <div class="form-group">
              <label>FECHA DE NACIMIENTO</br>
                <input type="int" disabled name="fecNac" id="fecha" class="form-control"></br>
            </div>

            <div class="form-group">
              <label>ADMIN</br>
                <select name="esAdmin" id="adMin" class="form-control">
                  <option id="option-0" value="0">NO</option>
                  <option id="option-1" value="1">SI</option>
                </select>
            </div>

          </div>
          <div class="modal-footer btn-group">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-lg btn-primary edit_user_complete"><i class="far fa-edit"></i></button>
            <!--<a id="delete" class="btn btn-danger" href="index.php?con=usuario&ope=delete&id=">Borrar</a>-->
          </div>
        </div>
      </div>
    </div>

    <?php
    include "libs/Footer.php";
    ?>