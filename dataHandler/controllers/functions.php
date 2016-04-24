<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 22/04/16
 * Time: 1:29 PM
 */

/**
 * @param $number: a number needs to be analyzed
 * @return array: an array contains all prime factors of that number
 */
function getPrimeNumber($number) {
    $primeArray = array();
    $number = abs($number);
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

/**
 * @param $number: the number needs to be parsed
 * @return array: an associative array contains prime factors and corresponding occurrences
 */
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

/**
 * @param $num: the number needs to be tested
 * @return bool: to indicate whether it is a prime or not
 */
function isPrime($num){
    $sqrt = floor(sqrt($num));
    $isPrime = true;
    for($i = 2; $i <= $sqrt; $i++){
        if($num % $i == 0){
            $isPrime = false;
            return $isPrime;
        }
    }
    return $isPrime;
}

?>