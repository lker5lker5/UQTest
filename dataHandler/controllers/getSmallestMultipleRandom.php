<?php

    include 'functions.php';

    $random = trim($_GET['input']);
    $numbers = explode("-", $random);
    $result = array(); //used for testing the highest occurrence of every prime number
    $time_start = microtime(true);
    for($i = 0; $i < count($numbers); $i++){ // for($i = $start; $i <= $end; $i++){
        if(!$numbers[$i]){
            continue;
        } else {
            $current = getPrimeAndOccurrence(trim($numbers[$i]));
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
    $return = array('result'=>$smallestMultiple, 'time'=>$time);
    echo json_encode($return);
?>
