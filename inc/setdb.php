<?php
    session_start();
    $link = mysqli_connect("localhost","root","","codinglab");
    mysqli_query($link,"set names utf8mb4") or die("資料庫GG了");
    $nt=strtotime("+7hour");
    $time = date("Y-m-d H:i:s",$nt);
?>