<?php
require_once "../libs/Database.php";
require_once "../modelos/Usuario.php";
require_once "../modelos/Marca.php";
require_once "../modelos/Modelo.php";

function Marca($id)
{
    if (empty($id)) :
        return [
            "cod" => 6,
            "mensaje" => "Falta identificador de la marca.",
        ];
    else :
        $db = Database::getInstance("root", "", "coches");
        $db->query("SELECT * FROM marca WHERE CodMar=$id ; ");
        $marca = $db->getObject("Marca");

        //echo "<pre>".print_r($marca, true)."</pre>" ;

        // Generating the wanted result
        return [
            "id"       => $marca->getCodMar(),
            "name"     => $marca->getNomMar(),
            "country"     => $marca->getPaisMar(),
        ];
    endif;
}

function Modelo($id)
{

    $db = Database::getInstance("root", "", "coches");
    if (!empty($id)) :
        $db->query("SELECT * FROM modelo WHERE CodMod=$id ; ");
        $modelo = $db->getObject("Modelo");

        return [
            "id"       => $modelo->getCodMod(),
            "name"     => $modelo->getNomMod(),
            "horse_power"     => $modelo->getPotencia(),
            "year"     => $modelo->getAño(),
            "classic"     => $modelo->getClasico(),
            "prize"     => $modelo->getPrecio(),
            "description" => $modelo->getDescripcion()
        ];
    else :

        $db->query("SELECT * FROM modelo; ");
        //$modelo = $db->getObject("Modelo");

        $data = [] ;

        while($modelo = $db->getObject("Modelo")) {

            $data = [
                "id"       => $modelo->getCodMod(),
                "name"     => $modelo->getNomMod(),
                "horse_power"     => $modelo->getPotencia(),
                "year"     => $modelo->getAño(),
                "classic"     => $modelo->getesClasico(),
                "prize"     => $modelo->getPrecio(),
                "description" => $modelo->getDescripcion()
            ];

            $json = json_encode($data, JSON_PRETTY_PRINT) ;

            echo "<pre>".print_r($json, true)."</pre>" ;
        }     

    endif;
}

function Usuario($id)
{
    $db = Database::getInstance("root", "", "coches");
    if (!empty($id)) :
        $db->query("SELECT * FROM usuario WHERE CodUsu=$id ; ");
        $usr = $db->getObject("Usuario");

        //echo "<pre>".print_r($usr, true)."</pre>" ;

        // Generating the wanted result
        $data = [
            "id"       => $usr->getCodUsu(),
            "name"     => $usr->getNomUsu(),
            "surname"     => $usr->getApeUsu(),
            "email"     => $usr->getEmail(),
            "birth-date"     => $usr->getFecNacUsu(),
        ];

        $json = json_encode($data, JSON_PRETTY_PRINT) ;

            echo "<pre>".print_r($json, true)."</pre>" ;
    else :
        $db->query("SELECT * FROM usuario; ");
        //$modelo = $db->getObject("Modelo");

        $data = [] ;

        while($usuario = $db->getObject("Usuario")) {

            $data = [
                "id"       => $usuario->getCodUsu(),
            "name"     => $usuario->getNomUsu(),
            "surname"     => $usuario->getApeUsu(),
            "birth-date"     => $usuario->getFecNacUsu(),
            ];

            $json = json_encode($data, JSON_PRETTY_PRINT) ;

            echo "<pre>".print_r($json, true)."</pre>" ;
        }     

    endif;
}


//echo "<pre>".print_r($_GET, true)."</pre>" ;
$api = $_GET["api"] ?? "";


$db = Database::getInstance("root", "", "coches");

if (!$db->query("SELECT * FROM usuario WHERE API_KEY='$api' ; ")) :
    echo $api;
    $data = [

        "cod" => 0,
        "mensaje" => "Api key no válida.",
    ];

else :

    $op = $_GET["op"] ?? "";

    switch ($op) {
        case 'marca':
            $id   = $_GET["id"] ?? "";
            $data = Marca($id);
            break;

        case 'modelo':
            $id = $_GET["id"] ?? "";
            $data = Modelo($id);
            break;

        case 'usuario':
            $id = $_GET["id"] ?? "";
            $data = Usuario($id);
            break;
        default:
            $data = [
                "cod" => 666,
                "mensaje" => "Código de operación incorrecto.",
            ];
            break;
    }

endif;


