<?php
    include '../dbCfg.php';
    include 'functions.php';
    include '../models/insertAttemptInfo.php';

    $time_start = microtime(true);
    $start = intval($_GET['start']);
    $quan = intval($_GET['quan']);
    $increment = intval($_GET['inc']);

    $last = $start + $increment * ($quan - 1);
    $result = array(); //used for testing the highest occurrence of every prime number
    for($i = $start; $i <= $last; $i += $increment){
        $current = getPrimeAndOccurrence($i);
        foreach ($current as $key => $value) {
            if(array_key_exists($key, $result)){
                if($result[$key] < $value)
                    $result[$key] = $value;
            }else{
                $result[$key] = 1;
            }
        }
    }

    $smallestMultiple = 1;
    foreach($result as $key => $value){
        $smallestMultiple *= pow($key, $value);
    }

    $time_end = microtime(true);
    $time = round($time_end-$time_start,5);

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");
    $insertInfo = insertAttempInfo($conn, 2,"$start+$quan+$increment", $smallestMultiple, $time);
    mysqli_close($conn);

    $return = array('result'=>$smallestMultiple, 'time'=>$time, 'insertInfo'=>$insertInfo);
    echo json_encode($return);
?>
