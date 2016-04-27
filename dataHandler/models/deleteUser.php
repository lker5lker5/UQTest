<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 27/04/16
 * Time: 7:09 PM
 */
    include '../controllers/functions.php';
    include '../dbCfg.php';

    $user = $_POST['username'];

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $deletion = "DELETE FROM users WHERE username = '$user'";
    if(mysqli_query($conn, $deletion)){
        echo 1;
    }else{
        echo "Error: " . $deletion . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);