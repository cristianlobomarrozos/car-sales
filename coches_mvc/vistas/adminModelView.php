<?php
require_once "./modelos/Marca.php";

$despl = Database::getInstance();

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

        include "libs/Navbar.php";
?>

        <table class="table table-striped table-dark">
            <form id="add_model_form" class="form-inline" method="get" action="index.php">
                <!--<input id="cop" type="hidden" name="cop"/>-->
                <input type="hidden" name="con" id="con" value="modelo">
                <input type="hidden" name="ope" id="ope" value="anyadir">
                <div class="form-group">
                    <thead>
                        <tr>

                            <th scope="col">Modelo</td>
                            <th scope="col">Potencia</td>
                            <th scope="col">Año</td>
                            <th scope="col">Marca</td>
                            <th scope="col">Descripción</td>
                            <th scope="col">Precio</td>
                            <th scope="col">Clásico</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!--
                    <td><input type="text" name="modelo" id="modelo"></td>  
                    <td><input type="int" name="potencia" id="potencia"></td>  
                    <td><input type="int" name="año" id="año"></td>  
                    <td><select name="marca" id="marca">
                        <option selected value="0"> -- Elija una opción -- </option>
                        <?php/*
                            $despl->query("SELECT * FROM marca") ;
                            $item = $despl->getObject("Marca");

                            do {

                                echo "<option value=\"".$item->getCodMar()."\">".$item->getNomMar()."</option>" ;
                                
                                //echo "<pre>".print_r($item->getNomMar(), true)."</pre>" ;

                                $item = $despl->getObject("Marca") ;

                            }while($item) ;*/
                        ?>
                    </select></td>
                    <td><input type="text" name="descripcion" id="descripcion"></td>
                    <td><input type="float" name="precio" id="precio"></td>
                    <td>
                        <select name="esClasico" id="esClasico">
                            <option selected value="10"> -- Elija una opción -- </option>
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </td>-->
                            <td>
                                <button id="add_model" class="btn-sm btn-primary"><i class="fas fa-plus-square"></i></button>
                            </td>
                        </tr>
                    </thead>

                </div>
            </form>

            <form class="form-inline" method="get">
                <!--<input id="cop" type="hidden" name="cop"/>-->

                <div class="form-group">


                    <tbody>

                        <?php
                        foreach ($mod as $item1) :

                            //echo "<pre>".print_r($item1, true)."</pre>" ;
                            $clas = $item1->getEsClasico();
                            $mar  = $item1->NomMar;
                            //echo $clas ;
                        ?>
                            <tr data-codmod="<?= $item1->getCodMod() ?>" data-nommod="<?= $item1->getNomMod() ?>">

                                <td><input type="text" disabled name="modelo" value="<?= $item1->getNomMod() ?>"></td>
                                <td><input type="int" disabled name="potencia" value="<?= $item1->getPotencia() ?>"></td>
                                <td><input type="int" disabled name="año" value="<?= $item1->getAño() ?>"></td>
                                <td><input type="int" disabled name="marca" value="<?= $mar ?>"></td>
                                <td><input type="text" disabled name="descripcion" value="<?= $item1->getDescripcion() ?>"></td>
                                <td><input type="float" disabled name="precio" value="<?= $item1->getPrecio() ?>"></td>
                                <td>
                                    <?php

                                    //echo "<pre>".print_r($modelo->esClasico, true)."</pre>" ;

                                    if ($clas) :
                                        echo "Si";
                                    else :
                                        echo "No";
                                    endif;
                                    ?>
                                </td>
                                <td>

                                    <button class="btn btn-lg btn-danger delete_model boton"><i class="fas fa-trash"></i></button>
                                    <a class="btn btn-warning" href="index.php?con=modelo&ope=editar&id=<?= $item1->getCodMod() ?>" id="modal"><i class="far fa-edit"></i></a>
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

        </form>



        <div id="modal-delete-model" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Eliminar usuario</h5>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro que desea eliminar este modelo?</p>
                        <strong id="nombreModelo"></strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger delete_model_second" data-dismiss="modal">Delete</button>
                        <!--<a id="delete" class="btn btn-danger" href="index.php?con=usuario&ope=delete&id=">Borrar</a>-->
                    </div>
                </div>
            </div>
        </div>


        <?php
        include "libs/Footer.php";
        ?>