<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 27/04/16
 * Time: 5:15 PM
 */
    include '../controllers/functions.php';
    include '../dbCfg.php';

    $username = $_POST['user'];
    $password = md5($_POST['pass']);
    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $check = "INSERT INTO users VALUES ('$username', '$password', 0);";
    $result = mysqli_query($conn, $check);
    if($result){
        echo 1;
    }else{
        echo "Error: " . $check . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>