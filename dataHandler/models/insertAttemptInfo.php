<?php
    require '../dbCfg.php';

    $conn = new mysqli($dbcfg['dbhost'], $dbcfg['dbuser'], $dbcfg['dbpwd'], $dbcfg['dbname']) or die ("Cannot connect to the DB!");

    if(!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $pid = $_GET['pid'];
    $num = $_GET['num'];
    $ans = $_GET['ans'];
    $time = $_GET['time'];

    $insert = "INSERT INTO problemRecords(problem_id, test_number, test_answer, exe_time) VALUES ($pid, $num, $ans, $time)";
    $result = mysqli_query($conn, $insert);
    if($result){
        echo "The record [".$pid.",".$num.",".$ans.",".$time."] has been inserted.";
    }else{
        echo "Error: ".$insert."<br>".mysqli_error($conn);
    }

    mysqli_close($conn);
?>