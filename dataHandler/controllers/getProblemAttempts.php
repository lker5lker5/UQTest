<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 24/04/16
 * Time: 11:18 PM
 */
    require '../dbCfg.php';

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $pid = $_GET['pid'];

    $count = "SELECT count(*) from problemRecords WHERE problem_id = '$pid'";
    $result = mysqli_query($conn, $count);
    if($result){
        $row = mysqli_fetch_array($result);
        if($row[0])
            echo  $row[0];
        else
            echo 0;
    }else{
        echo "Error: ".$count."<br>".mysqli_error($conn);
    }

    mysqli_close($conn);
?>