<?php
    session_start();
    $link = mysqli_connect("localhost:3306","medianet","QWEqwe123!@#","codinglab");
    mysqli_query($link,"set names utf8mb4") or die("資料庫GG了");
    date_default_timezone_set("Asia/Taipei");
    $time = date("Y-m-d H:i:s");
?>