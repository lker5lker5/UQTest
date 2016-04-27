<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 27/04/16
 * Time: 6:54 PM
 */

    include '../controllers/functions.php';
    include '../dbCfg.php';

    $user = $_COOKIE['user'];
    $new = md5($_POST['newPass']);

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $checkOld = "SELECT password FROM users WHERE username='$user'";
    if(!mysqli_query($conn, $checkOld)){
        echo 0;
    }else{
        $check = "UPDATE users SET password='$new' WHERE username='$user'";
        $result = mysqli_query($conn, $check);
        if($result){
            echo 1;
        }else{
            echo "Error: " . $check . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>