<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 22/04/16
 * Time: 11:36 PM
 */
    include 'functions.php';

    //$position = $_GET['pos'];

    $position = 10001;
    $primes = array();

    for($i = 2; count($primes) <= 10001; $i++){
        if(isPrime($i))
            array_push($primes, $i);
    }

    echo $primes[10000];
?>