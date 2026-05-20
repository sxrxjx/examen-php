<?php
require_once 'config.php';

$dsn = 'mysql:host='. DB_HOST . ';dbname='. DB_NAME . ';charset=utf8mb4';

try{
    $gbd = new PDO($dsn, DB_USER, DB_PASS);
    $gbd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $error){
    echo 'Error en la conexión:' . $error->getMessaje();
    exit;
}


?>