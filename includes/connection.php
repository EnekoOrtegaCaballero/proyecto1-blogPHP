<?php



    $server = '82.223.113.64';
    $username = 'qafq585';
    $database = 'qafq585';
    $password = '**********';

    $db = mysqli_connect($server, $username, $password, $database);

    mysqli_query($db, "SET NAMES 'utf8'");

    if(!isset($_SESSION)){
        session_start();
    }


?>
