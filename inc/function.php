<?php

//使用後台管理系統時先檢驗權限, 若權限與ID都符合管理員及特別訪客身分則通過驗證.
function check_permission (){
    if(empty($_SESSION["id"]) || empty($_SESSION["permit"])){
        //如果SESSION["id"] 與 SESSION["permit"] 不存在則導到登入畫面
        ?><script>document.location.href="?menu=login&g=admin";</script><?php
        exit();
    }

    if( !empty($_SESSION["id"]) && !empty($_SESSION["permit"])){
        if($_SESSION["permit"]==1 || $_SESSION["permit"]==2){
            //PASS
        }
        else{ //將會員踢回首頁
            ?><script>
                Swal({
                title: '錯誤!',
                text: error,
                type: '抱歉, 您不具有管理員權限, 無法使用後台管理系統功能',
                confirmButtonText: '確認'
                });
            </script><?php
            ?><script>document.location.href="?g=index";</script><?php
            exit();
        }
    }
}

//檢驗一般會員登入後台狀態, 若權限不對則踢回首頁.
function check_login()
{
    if (!empty($_SESSION["id"])){
        if($_SESSION["permit"]==1 || $_SESSION["permit"]==2){
            ?><script>document.location.href="?menu=admin&g=adminwelcome"</script><?php
        }
        else{
            ?><script>alert("抱歉, 您不具有管理員權限, 請改登入有管理權限的帳號");</script><?php
            ?><script>document.location.href="?g=index"</script><?php
        }
    }
}

//紀錄資料庫操作
function web_log($log)
{
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link, "set names utf8");
    date_default_timezone_set("Asia/Taipei");
    $time = date("Y-m-d H:i:s");
    $sql = "INSERT into web_log value(null,'".$_SESSION["id"]."','".$log."','".$time."')";
    mysqli_query($link, $sql) or die("新增失敗，語法錯誤".$sql);
}

//上傳檔案功能
function new_file($fname)
{
    date_default_timezone_set("Asia/Taipei");
    $new_file_name=date("YmdHis");
    $f_file_name =1;
    if ($_FILES[$fname]["type"] == "image/jpeg") {
        $f_file_name=".jpg";
    }//如果符合JPG格式,修改附檔名
    if ($_FILES[$fname]["type"] == "image/png") {
        $f_file_name=".png";
    }//如果符合PNG格式,修改附檔名

    return array($new_file_name.$f_file_name,$f_file_name); //如果不符合JPG or PNG格式, $f_file_name的回傳直會是1
}

//檢驗使用者
function check_player($ckpl)
{
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link, "set names utf8");
    $sql = "SELECT * from player where p_seq = '".$ckpl."'  and p_del = 0 ";
    $ro = mysqli_query($link, $sql);
    $player = mysqli_fetch_assoc($ro);
    return $player["p_id"];
}

//抓取性別資料表
function get_sex(){
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link, "set names utf8");
    $sql = "select * from player_sex";
    $ro = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($ro);
    do{
        $s["seq"][]=$row["p_s_seq"];
        $s["sex"][]=$row["p_s_sex"];
    }while ($row = mysqli_fetch_assoc($ro));
    return $s;
  }

//抓取權限資料表
  function get_permit(){
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link, "set names utf8");
    $sql = "select * from player_permission";
    $ro = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($ro);
    do{
        $p["seq"][]=$row["p_p_seq"];
        $p["permit"][]=$row["p_p_permit"];
    }while ($row = mysqli_fetch_assoc($ro));
    return $p;
  }

//抓取會員資料表
function get_player(){
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link, "set names utf8");
    $sql = "SELECT * from player where p_del = 0";
    $ro6 = mysqli_query($link,$sql);
    $row6 = mysqli_fetch_assoc($ro6);
    do{
        $player['seq'][] = $row6['p_seq'];
        $player['id'][] = $row6['p_id'];
        $player['name'][] = $row6['p_name'];
        $player['nick'][] = $row6['p_nick'];
    }while($row6 = mysqli_fetch_assoc($ro6));
        return $player;    
}

//抓取課程老師名字資料表
function get_clteacher(){
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link, "set names utf8");
    $sql = "SELECT * from class_teacher";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
    do{
        $teacher['seq'][] = $row['c_t_seq'];
        $teacher['name'][] = $row['c_t_name'];
    }while($row = mysqli_fetch_assoc($ro));
        return $teacher;
}

//抓取課程名稱資料表
function get_clname(){
    $link = mysqli_connect("localhost", "medianet", "Media&net&admin", "codinglab");
    mysqli_query($link,"set names utf8");
    $sql = "SELECT * from class_name";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
    do{
        $clname['seq'][] = $row['c_n_seq'];
        $clname['name'][] = $row['c_n_name'];
    }while($row = mysqli_fetch_assoc($ro));
        return $clname;
}


//抓取會員IP
  function getip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $myip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $myip= $_SERVER['REMOTE_ADDR'];
    }
    $ip = "你目前的 IP 位置：<br>".$myip;
    return $ip;
}
?>
