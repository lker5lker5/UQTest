<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 27/04/16
 * Time: 1:30 PM
 */
    include '../dbCfg.php';
    include 'functions.php';

    $username = $_POST['user'];
    $password = md5($_POST['pass']);
    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $check = "SELECT password from users WHERE username = '$username' AND userrole = 1;";
    $result = mysqli_query($conn, $check);
    if($result){
        $row = mysqli_fetch_array($result);
        if($password === $row[0]){
            clearcookies();
            setcookie("user", $username, time() + 3600, '/');
            setcookie("usertype", 1, time() + 3600, '/');
            setcookie("islogin", 1, time() + 3600, '/');
            echo 1;
        }else
            echo 0;
    }else{
        echo "Oops! Something goes wrong...Please contact the IT admin for help.";
    }

    mysqli_close($conn);
 ?>