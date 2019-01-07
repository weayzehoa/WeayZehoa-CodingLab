<?php 
check_permission ();

//md5()函式, 將密碼資料用md5加密
if (!empty($_GET["pid"])) {
    if($_SESSION["permit"]==1){
        $sql0="SELECT * FROM player where p_id = '".$_GET["pid"]."'";
        $ro0 = mysqli_query($link,$sql0);
        $check = mysqli_num_rows($ro0);
            if ($check==1) {
                echo "<script>alert('該帳戶ID已存在, 請重新輸入.');</script>";
                echo "<script>document.location.href='?menu=1&g=acc';</script>";
            } 
            else{
                $sql="INSERT into player value(null,'".$_GET["pid"]."','".md5($_GET["ppw"])."','".$_GET["pname"]."','".$_GET["pnick"]."','".$_GET["psex"]."','".$_GET["pmail"]."','".$_GET["pmit"]."','".$time."','0')";
                mysqli_query($link, $sql) or die("新增失敗，語法:".$sql);
                // web_log(str_replace("'", "\'", "$sql"));
                echo "<script>alert('新增成功!!');</script>";
                echo "<script>document.location.href='?menu=1&g=acc';</script>";
            }
    }else{
        echo "<script>alert('抱歉, 你的權限無法做新增帳號動作');</script>";
        echo "<script>document.location.href='?menu=1&g=acc';</script>";
    }
}
?>