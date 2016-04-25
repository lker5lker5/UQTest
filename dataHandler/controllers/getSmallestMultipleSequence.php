<?php

    include 'functions.php';

//    $start = $_GET['start'];
//    $end = $_GET['end'];

    $result = array(); //used for testing the highest occurrence of every prime number
    for($i = 2; $i <=20; $i++){ // for($i = $start; $i <= $end; $i++){
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

    echo $smallestMultiple;
?>
