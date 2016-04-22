<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 22/04/16
 * Time: 1:29 PM
 */

function getPrimeNumber($number) {
    $primeArray = array();
    for($i = 2; $i <= $number; $i++){
        while($number != $i) {
            if (($number % $i)!= 0 )
                break;
            array_push($primeArray, $i);
            $number = $number/$i;
        }
    }
    array_push($primeArray, $number);
    return $primeArray;
}

function getPrimeAndOccurrence($number){
    $return = getPrimeNumber($number);
    $result = array();
    for($i = 0; $i < count($return); $i++){
        if (array_key_exists($return[$i],$result)){
            $result[$return[$i]] += 1;
        }else{
            $result[$return[$i]] = 1;
        }
    }
    return $result;
}

?>