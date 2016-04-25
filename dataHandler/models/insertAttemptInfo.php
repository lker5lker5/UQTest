<?php

    function insertAttempInfo($conn, $pid, $num, $ans, $time){

        if(!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        $insert = "INSERT INTO problemRecords(problem_id, test_number, test_answer, exe_time) VALUES ($pid, $num, $ans, $time)";
        $result = mysqli_query($conn, $insert);
        if($result){
            return "The record [".$pid.",".$num.",".$ans.",".$time."] has been inserted.";
        }else{
            return "Error: ".$insert."<br>".mysqli_error($conn);
        }
    }

?>