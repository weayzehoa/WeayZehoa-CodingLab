<?php
    include_once("../inc/setdb.php");

    if (!empty($_GET["open_service"])) {
        if (empty($_SESSION["qa"])) {
            $nqa = date("YmdHis");
            $nqa1 = rand(1000000, 9999999);
            // echo $nqa.$nqa1;
            $_SESSION["qa"] = $nqa.$nqa1;
            $sql = "INSERT into service value(null,'".$nqa.$nqa1."','0000-00-00 00:00:00','0')";
            mysqli_query($link, $sql) or die("語法錯誤".$sql);
            echo $sql;
        }
        echo $_SESSION["qa"];
    }

    if (!empty($_GET["close_service"])) {
        if (!empty($_SESSION["qa"])) {
            unset($_SESSION["qa"]);
        }
    }

    if (!empty($_POST["mytalk"])) {
        $sql = "INSERT into service_log value(null,'".$_SESSION["qa"]."','0','".nl2br(htmlentities($_POST["mytalk"]))."','".$time."');";
        mysqli_query($link, $sql);
        $sql = "UPDATE service set s_time = '".$time."', s_id = 0 where s_no = '".$_SESSION["qa"]."';";
        mysqli_query($link, $sql);
    }

    if (!empty($_POST["renew"])) {
    $sql = "SELECT * from service_log where s_l_no ='".$_SESSION["qa"]."'";
    $ro = mysqli_query($link, $sql);
    $aa["total"] = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro); 
    do{
    $aa["to"][] = $row["s_l_to"];
    $aa["con"][] = $row["s_l_con"];
    $aa["time"][] = $row["s_l_time"];
    }while($row = mysqli_fetch_assoc($ro));
    
    echo json_encode($aa);
    }
?>