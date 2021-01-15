<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    //Load secretos.
    include(__DIR__.'/secret.php');
    //Load classes.
    include(__DIR__.'/src/_load.php');

    header('Content-Type: application/json');

    use httpMysql\tunel;

    $t = new tunel();
    
    echo json_encode($t->recv());

    exit();