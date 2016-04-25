<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 22/04/16
 * Time: 11:36 PM
 */
    include 'functions.php';
    include '../models/insertAttemptInfo.php';
    include '../dbCfg.php';

    $time_start = microtime(true);
    $position = intval($_GET['pos']);

    $primes = array(2);

    for($i = 3; count($primes) <= $position; $i++){
        if(isPrime($i))
            array_push($primes, $i);
    }
    $nth = $primes[$position - 1];
    $time_end = microtime(true);
    $time = round($time_end - $time_start, 5);

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");
    $insertInfo = insertAttempInfo($conn, 3, $position, $nth, $time);
    mysqli_close($conn);

    $result = array('result'=>$nth, 'time'=>$time, 'insertInfo'=>$insertInfo);
    echo json_encode($result);
var_dump($primes);
?>