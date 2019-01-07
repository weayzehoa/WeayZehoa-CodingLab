<?php
$link = mysqli_connect('localhost','root','','codinglab');
mysqli_query($link, 'set names utf8mb4');

if(!empty($_POST['gdel'])){
    $sql = "SELECT * from player where p_id = '".$_POST['myid']."' and p_permit = '".$_POST['mypermit']."' and p_del = 0";
    $ro = mysqli_query($link,$sql);
    $check = mysqli_num_rows($ro);
    if($check ==1){
        $sql = "UPDATE gbuy set g_del = 1 where g_seq = '".$_POST['gseq']."'";
        mysqli_query($link,$sql);
        echo "該團購已被刪除";
    }else{
        echo "管理員驗證失敗";
    }
}

if(!empty($_POST['gundel'])){
    $sql = "SELECT * from player where p_id = '".$_POST['myid']."' and p_permit = '".$_POST['mypermit']."' and p_del = 0";
    $ro = mysqli_query($link,$sql);
    $check = mysqli_num_rows($ro);
    if($check ==1){
        $sql = "UPDATE gbuy set g_del = 0 where g_seq = '".$_POST['gseq']."'";
        mysqli_query($link,$sql);
        echo "該團購已被找回";
    }else{
        echo "管理員驗證失敗";
    }
}   echo "沒有收到資料";


?>