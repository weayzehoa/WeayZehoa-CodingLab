<?php 
check_permission ();

if(!empty($_SESSION["permit"])){
    if($_SESSION["permit"]!=1){
        echo "<script>alert('抱歉, 你沒有權限進行刪除動作');</script>";
        echo "<script>document.location.href='?menu=1&g=acc';</script>";
    }
}else{
    echo "<script>alert('抱歉, 你沒有權限進入');</script>";
    echo "<script>document.location.href='index.php';</script>";
}

if (!empty($_GET["no"])) {
    if($_SESSION["permit"]==1){
        $sql="UPDATE player SET p_del = 1 WHERE p_seq = '".$_GET["no"]."'";
        mysqli_query($link, $sql);
    // web_log(str_replace("'", "\'", "$sql"));
        echo "<script>alert('該筆帳號已被刪除.');</script>";
        echo "<script>document.location.href='?menu=1&g=acc';</script>";
    }else{
        echo "<script>alert('抱歉, 你沒有刪除資料的權限.');</script>";
        echo "<script>document.location.href='?menu=1&g=acc';</script>";
    }
}

?>
