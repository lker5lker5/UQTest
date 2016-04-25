<?php

    include '../dbCfg.php';
    include 'functions.php';
    include '../models/insertAttemptInfo.php';

    $time_start = microtime(true);
    $number = $_GET['number'];
    if($number > PHP_INT_MAX){
        $result=array("largest" => "The number is too large, the maximum number is 9223372036854775807", "time" => 0);
        echo json_encode($result);
    }else {
//    $test = 600851475143;
        $primes = getPrimeNumber($number);
        $time_end = microtime(true);
        //var_dump($result);
        $execution_time = round($time_end - $time_start, 5);

        $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");
        $insertInfo = insertAttempInfo($conn, 1, $number, end($primes), $execution_time);
        mysqli_close($conn);

        $result = array("result" => end($primes), "time" => $execution_time, "insertInfo"=>$insertInfo);
        echo json_encode($result);
    }
?>
