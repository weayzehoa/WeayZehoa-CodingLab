<?php

$link = mysqli_connect("localhost", "root", "", "codinglab");
mysqli_query($link, "set names utf8mb4") or die("資料庫GG了");

if(!empty($_GET['userid']) && !empty($_GET['gseq']) && !empty($_GET['new_order'])){
    $sql = "SELECT * from player where p_id ='".$_GET['userid']."' and p_del = 0 ";
    $ro = mysqli_query($link,$sql);
    $check = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);
    if ($check == 1) {
        //撈出該物品資料
        $sql = "SELECT * from gbuy where g_seq = '".$_GET['gseq']."' and g_close = 1 and g_del = 0 ";
        $ro1 = mysqli_query($link,$sql);
        $row1 = mysqli_fetch_assoc($ro1);

        //撈出舊的訂購資料
        $sql = "SELECT * from gbuy_buyer where g_b_buyer = '".$row['p_seq']."' and g_b_pno = '".$_GET['gseq']."' and g_b_del = 0";
        $ro2 = mysqli_query($link,$sql);
        $row2 = mysqli_fetch_assoc($ro2);

        // //撈出目前該物品參加的人數
        $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$_GET['gseq']."' and g_b_del = 0";
        $ro3 = mysqli_query($link,$sql);
        $num3 = mysqli_num_rows($ro3);

        $new_rnum ="";  //新的庫存
        $total_price =""; //新的總價
        $new_price =""; //新的訂購價

        if($num3 >=3){ $new_price = $row1['g_sprice'];}
        else{$new_price = $row1['g_gprice'];}
        

        if($_GET['new_order'] > $row2['g_b_num'] ){
            $new_rnum = $row1['g_rnum'] - ($_GET['new_order'] - $row2['g_b_num']);
        }else{
            $new_rnum = $row1['g_rnum'] + ($row2['g_b_num'] - $_GET['new_order']);
        }

        $total_price = $_GET['new_order'] * $new_price;

        $sql = "UPDATE gbuy set g_rnum = '".$new_rnum."' where g_seq = '".$_GET['gseq']."' and g_del = 0 ";
        mysqli_query($link,$sql);

        $sql = "UPDATE gbuy_buyer set g_b_num = '".$_GET['new_order']."', g_b_price ='".$new_price."', g_b_total= '".$total_price."' where g_b_pno = '".$row1['g_seq']."' and g_b_buyer ='".$row['p_seq']."' and g_b_del = 0";
        mysqli_query($link,$sql);
        echo "數量修改成功";
    }else{
        echo "會員檢驗失敗";
    }
}


if (!empty($_POST['gseq']) && !empty($_POST['userid'])) {
    $sql = "SELECT * from player where p_id ='".$_POST['userid']."' and p_del = 0 ";
    $ro = mysqli_query($link, $sql);
    $check = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);
    if ($check == 1) {

        //撈出該物品資料
        $sql = "SELECT * from gbuy where g_seq = '".$_POST['gseq']."' and g_close = 1 and g_del = 0 ";
        $ro1 = mysqli_query($link,$sql);
        $row1 = mysqli_fetch_assoc($ro1);

        //撈出舊的訂購資料
        $sql = "SELECT * from gbuy_buyer where g_b_buyer = '".$row['p_seq']."' and g_b_pno = '".$_POST['gseq']."' and g_b_del = 0";
        $ro2 = mysqli_query($link,$sql);
        $row2 = mysqli_fetch_assoc($ro2);

        $new_rnum ="";  //新的庫存
        $new_rnum = $row1['g_rnum'] + $row2['g_b_num'];

        $sql = "UPDATE gbuy set g_rnum = '".$new_rnum."' where g_seq = '".$_POST['gseq']."' and g_del = 0 ";
        mysqli_query($link,$sql);

        $sql = "UPDATE gbuy_buyer set g_b_del = 1 where g_b_pno ='".$_POST['gseq']."' and g_b_buyer ='".$row['p_seq']."' and g_b_del = 0";
        mysqli_query($link,$sql);

        echo "已取消會員參加該團購";
    } else {
        echo "會員驗證失敗";
    }
}

?>