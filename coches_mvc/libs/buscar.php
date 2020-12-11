<?php

/**
 * AJAX searching script
 */

include_once "Database.php";
include_once($_SERVER['DOCUMENT_ROOT']."/coches_mvc/modelos/Usuario.php") ;

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'coches');

 
$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
 
$html = '';
$key = $_POST['key'];

$sql = "SELECT * FROM usuario  
WHERE NomUsu LIKE '%".strip_tags($key)."%'
ORDER BY NomUsu DESC LIMIT 0,5" ;
 
$result = $connexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<div><a class="suggest-element" data="' . utf8_encode($row['NomUsu']) . '" id="' . $row['CodUsu'] . '">' . utf8_encode($row['NomUsu']) . '</a></div>';
    }
}
echo $html;
