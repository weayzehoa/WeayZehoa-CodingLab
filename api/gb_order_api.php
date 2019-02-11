<?php
    $link = mysqli_connect("localhost","root","","codinglab");
    mysqli_query($link,"set names utf8mb4") or die("資料庫GG了");
    date_default_timezone_set("Asia/Taipei");
    $time = date("Y-m-d H:i:s");

    $s = "";
    if(!empty($_POST['gseq']) && !empty($_POST['myid'])){
        $sql = "SELECT * from player where p_id ='".$_POST['myid']."' and p_del = 0 ";
        $ro = mysqli_query($link,$sql);
        $check = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);
        if ($check == 1){
            $sql = "SELECT * from gbuy_buyer where g_b_buyer ='".$row['p_seq']."' and g_b_pno ='".$_POST['gseq']."' and g_b_del = 0";
            $ro1 = mysqli_query($link,$sql);
            $check1 = mysqli_num_rows($ro1);
            $row1 = mysqli_fetch_assoc($ro1);
            if ($check1==0) {
                $new_rnum ="";                            
                $total_price ="";
                $total_price = $_POST['order_num'] * $_POST['order_price'];
                $sql = "INSERT into gbuy_buyer values(null,'".$_POST['gseq']."','".$row['p_seq']."','".$_POST['order_num']."','".$_POST['order_price']."','".$total_price."','".$time."',0)";
                mysqli_query($link,$sql);
                $sql = "SELECT * from gbuy where g_seq ='".$_POST['gseq']."' and g_del = 0 ";
                $ro2 = mysqli_query($link,$sql);
                $row2 = mysqli_fetch_assoc($ro2);
                $new_rnum = $row2['g_rnum'] - $_POST['order_num'];
                $sql = "UPDATE gbuy set g_rnum ='".$new_rnum."' where g_seq = '".$_POST['gseq']."' and g_del = 0 ";
                mysqli_query($link,$sql);
                $s =1;
            }else{
                $new_rnum1 = "";
                $sql = "SELECT * from gbuy where g_seq ='".$_POST['gseq']."' and g_del = 0 ";
                $ro3 = mysqli_query($link,$sql);
                $row3 = mysqli_fetch_assoc($ro3);
                $new_rnum1 = $row3['g_rnum'] + $row1['g_b_num'];
                $sql = "UPDATE gbuy set g_rnum ='".$new_rnum1."' where g_seq = '".$_POST['gseq']."' and g_del = 0 ";
                mysqli_query($link,$sql);
                $sql = "UPDATE gbuy_buyer set g_b_del = 1 where g_b_pno ='".$_POST['gseq']."' and g_b_buyer ='".$row['p_seq']."' and g_b_del = 0";
                mysqli_query($link,$sql);
                $s = 2;
            }
        }else{
            $s=3;
        }
        echo $s;
    }

    if(!empty($_GET['gseq']) && !empty($_GET['myid'])){
        $sql = "SELECT * from player where p_id ='".$_GET['myid']."' and p_del = 0";
        $ro = mysqli_query($link,$sql);
        $check = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);
        if ($check == 1) {
            // 檢查該會員是否有參加此團購
            $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$_GET['gseq']."' and g_b_buyer ='".$row['p_seq']."' and g_b_del = 0";
            $ro3 = mysqli_query($link,$sql);
            $check1 = mysqli_num_rows($ro3);
            if($check1 == 0){
                echo "你尚未參加本團購, 無法修改數量";
            }else{
                $new_rnum ="";
                $total_price ="";
                $total_price = $_GET['order_num'] * $_GET['order_price'];
                $sql = "SELECT * from gbuy where g_seq = '".$_GET["gseq"]."' and g_close = 1 and g_del = 0";
                $ro1 = mysqli_query($link, $sql);
                $row1 = mysqli_fetch_assoc($ro1);
                $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$row1['g_seq']."' and g_b_buyer ='".$row['p_seq']."' and g_b_del=0";
                $ro2 = mysqli_query($link, $sql);
                $row2 = mysqli_fetch_assoc($ro2);
                if ($_GET['order_num'] > $row2['g_b_num']) {
                    $new_rnum = $row1['g_rnum'] - ($_GET['order_num'] - $row2['g_b_num']);
                } else {
                    $new_rnum = $row1['g_rnum'] + ($row2['g_b_num'] - $_GET['order_num']);
                }
                $sql = "UPDATE gbuy set g_rnum = '".$new_rnum."' where g_seq = '".$_GET['gseq']."' and g_del = 0 ";
                mysqli_query($link, $sql);
                $sql = "UPDATE gbuy_buyer set g_b_num = '".$_GET['order_num']."', g_b_price ='".$_GET['order_price']."', g_b_total= '".$total_price."' where g_b_pno = '".$row1['g_seq']."' and g_b_buyer ='".$row['p_seq']."' and g_b_del = 0";
                mysqli_query($link, $sql);
                echo "數量修改成功";
            }
        }else{
            echo "會員檢驗失敗";
        }
    }

?>
