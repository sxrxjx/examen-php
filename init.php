<?php

if(isset($_COOKIE['recuerdame'])){
    $sesionId = $_COOKIE['recuerdame'];
    session_id($sesionId);
}
session_start();

?>