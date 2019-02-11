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
        }
        echo $_SESSION["qa"];
    }

    if (!empty($_GET["close_service"])) {
        if (!empty($_SESSION["qa"])) {
            unset($_SESSION["qa"]);
            echo "caseclose";
        }
    }

    if (!empty($_POST["mytalk"])) {
        $sql = "INSERT into service_log value(null,'".$_SESSION["qa"]."','0','".nl2br(htmlentities($_POST["mytalk"]))."','".$time."');";
        mysqli_query($link, $sql);
        $sql = "UPDATE service set s_time = '".$time."', s_id = 0 where s_no = '".$_SESSION["qa"]."';";
        mysqli_query($link, $sql);
    }

    if (!empty($_POST["renew"])) {
        if(!empty($_SESSION["qa"])){
        $sql = "SELECT * from service_log where s_l_no ='".$_SESSION["qa"]."' order by s_l_time desc";
        $ro = mysqli_query($link, $sql);
        $aa["total"] = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro); 
        do{
            $aa["to"][] = $row["s_l_to"];
            $aa["con"][] = $row["s_l_con"];
            $aa["time"][] = $row["s_l_time"];
            // $aa["to"][] = htmlentities( $row["s_l_to"] );
            // $aa["con"][] = htmlentities( $row["s_l_con"] );
            // $aa["time"][] = htmlentities( $row["s_l_time"] );
        }while($row = mysqli_fetch_assoc($ro));
        // $to="";
        // $con="";
        // $tt="";
        // for ($i=1; $i<$aa["total"] ; $i++) { 
        //     $to = $to.',"'.$aa["to"][$i].'"';
        //     $con = $con.',"'.$aa["con"][$i].'"';
        //     $tt = $tt.',"'.$aa["time"][$i].'"';
        //     $total = $aa["total"];
        // }
        //     $to = '"'.$aa["to"][0].'"'.$to;
        //     $con = '"'.$aa["to"][0].'"'.$con;
        //     $tt = '"'.$aa["to"][0].'"'.$tt;

        //     echo "'{\"total\":".$total.", \"to\":[".$to."],\"con\":[".$con."],\"time\":[".$tt."]}'";
            if($aa["total"]==0){ 
                echo "dbnodata";}
            else{
                echo json_encode($aa);
            }
        }
    else {echo "dbclose";}
}


if (!empty($_POST["老師的"])) {
    if(!empty($_SESSION["qa"])){
        $sql = "SELECT * from service_log where s_l_no ='".$_SESSION["qa"]."' order by s_l_time desc";
        $ro = mysqli_query($link, $sql);
        $aa["total"] = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro); 
        do{
            $talk = "q";
            if($row["s_l_to"] == "0"){ $talk = "a";}
            echo '<div class="'.$talk.'">'.nl2br($row["s_l_con"]).'</div><div class="t'.$talk.'">'.$row["s_l_time"].'</div>';
        }while($row = mysqli_fetch_assoc($ro));
    }
}
?>