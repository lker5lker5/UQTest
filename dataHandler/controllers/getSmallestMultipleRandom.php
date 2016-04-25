<?php

    include '../dbCfg.php';
    include 'functions.php';
    include '../models/insertAttemptInfo.php';

    $time_start = microtime(true);
    $random = trim($_GET['input']);
    $numbers = explode("-", $random);
    $result = array(); //used for testing the highest occurrence of every prime number
    for($i = 0; $i < count($numbers); $i++){
        if(!intval($numbers[$i])){
            continue;
        } else {
            $current = getPrimeAndOccurrence(trim(intval($numbers[$i])));
            foreach ($current as $key => $value) {
                if (array_key_exists($key, $result)) {
                    if ($result[$key] < $value)
                        $result[$key] = $value;
                } else {
                    $result[$key] = 1;
                }
            }
        }
    }

    $smallestMultiple = 1;
    foreach($result as $key => $value){
        $smallestMultiple *= pow($key, $value);
    }
    $time_end = microtime(true);
    $time = round($time_end - $time_start, 5);

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");
    $insertInfo = insertAttempInfo($conn, 2, $random, $smallestMultiple, $time);
    mysqli_close($conn);

    $return = array('result'=>$smallestMultiple, 'time'=>$time, 'insertInfo'=>$insertInfo);
    echo json_encode($return);
?>
