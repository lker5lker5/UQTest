<?php
    include 'functions.php';

    $reqNum = 600851475143;
    //$number = $_POST['number'];
    $result = getPrimeNumber($reqNum);
    //var_dump($result);
    echo end($result);

?>
