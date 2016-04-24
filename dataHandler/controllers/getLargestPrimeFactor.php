<?php
    include 'functions.php';

    $number = $_GET['number'];
    if($number > PHP_INT_MAX){
        $result=array("largest" => "The number is too large, the maximum number is 9223372036854775807", "time" => 0);
        echo json_encode($result);
    }else {
        $time_start = microtime(true);
//    $test = 600851475143;
        $primes = getPrimeNumber($number);
        $time_end = microtime(true);
        //var_dump($result);
        $execution_time = round($time_end - $time_start, 5);
        $result = array("largest" => end($primes), "time" => $execution_time);
        echo json_encode($result);
    }
?>
