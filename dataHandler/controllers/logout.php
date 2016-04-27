<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 27/04/16
 * Time: 4:36 PM
 */
    header("Content-Type: text/html; charset=utf-8");
    require('functions.php');
    clearcookies();
    header("refresh:3;url:../../index.php");
//    echo "<div style='margin: 0 auto; text-align:center'>Logged out! It will redirect to the home page in 1 sec.</div>";
?>