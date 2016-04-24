<?php
    // header("Content-Type: text/html; charset=utf-8");

    $dbcfg = array(
        'dbhost'  =>  'localhost:8889', //db's host
        'dbuser'  =>  'root', // db's username 
        'dbpwd'   =>  'root', // db's
        'dbname'  =>  'pro_sol', //the db we want to use
    );

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

?>
