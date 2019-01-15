<?php
    include_once("../inc/setdb.php");

    if(!empty($_POST)){
        $sql = "INSERT into msgboard_reply value(null,'".$_POST['msg_seq']."','".$_POST['rname']."','".$_POST['email']."','".$_POST['con']."','".$time."',0)";
        mysqli_query($link,$sql);
        echo "回覆成功";
    }else{
        echo "資料錯誤";
    }


?>