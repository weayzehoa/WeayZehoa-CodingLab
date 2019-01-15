<?php
    include_once("../inc/setdb.php");
    $sql = "INSERT into service_log value(null,'".$_POST["case_no"]."','".$_SESSION["id"]."','".nl2br(htmlentities($_POST["case_word"]))."','".$time."');";
    mysqli_query($link, $sql);
    $sql = "UPDATE service set s_time = '".$time."', s_id = '".$_SESSION["id"]."' where s_no = '".$_POST["case_no"]."';";
    mysqli_query($link, $sql);
?>