<?php
// 更新資料成功 echo 1;
// 更新圖片成功 echo 2;
// 非本站會員 echo 3;   防止造假POST資料.
// 圖片驗證失敗 echo 4; 防止造假圖片資料.
// 關閉團購 echo 5;
// 開啟團購 echo 6;

$link = mysqli_connect("localhost", "root", "", "codinglab");
mysqli_query($link, "set names utf8mb4") or die("資料庫GG了");

$s =""; //利用參數判斷更新圖片或文字資料

if (!empty($_POST['id']) && !empty($_POST['permit'])) {
    $sql = "SELECT * from player where p_id ='".$_POST['id']."' and p_permit ='".$_POST['permit']."' and p_del = 0 ";
    $ro = mysqli_query($link, $sql);
    $check = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);
    if ($check==0) {
        $s = 3; //驗證會員錯誤代碼
    }
    if ($check == 1) {
        if (!empty($_POST)) {
            $sql = "UPDATE gbuy set g_name = '".$_POST["gbname"]."', g_pname = '".$_POST["pname"]."', g_con = '".$_POST["gbcon"]."', g_oprice = '".$_POST["oprice"]."', g_gprice = '".$_POST["gprice"]."', g_sprice = '".$_POST["sprice"]."', g_onum = '".$_POST["onum"]."', g_rnum = '".$_POST["rnum"]."', g_stime = '".$_POST["starttime"]."', g_endtime = '".$_POST["endtime"]."' where g_seq ='".$_POST['gseq']."' and g_del = 0 ";
            mysqli_query($link, $sql) or die("資料庫語法錯誤".$sql);
            $s=1; //只更新文字內容
            }
        if (!empty($_FILES)) {
            $sql = "SELECT * from gbuy where g_seq = '".$_POST['gseq']."' and g_del = 0 ";
            $ro1 = mysqli_query($link, $sql);
            $row1 = mysqli_fetch_assoc($ro1);

            $nt=strtotime("+7hour");
            $time = date("YmdHis", $nt);
            $new_name="gbuy".$time;
            $ext_name =1;
            if ($_FILES['gbpic']["type"] == "image/jpeg") {
                $ext_name=".jpg";
            }//如果符合JPG格式,修改附檔名
            if ($_FILES['gbpic']["type"] == "image/png") {
                $ext_name=".png";
            }//如果符合PNG格式,修改附檔名
            if ($ext_name==1) {//驗證回傳結果圖片格式是否正確
                $s = 4;
            } else {
                $sql = "UPDATE gbuy set g_pic = '".$new_name.$ext_name."' where g_seq ='".$_POST['gseq']."' and g_del = 0 "; //將圖片名稱寫入資料庫
                mysqli_query($link, $sql) or die("資料庫語法錯誤".$sql);
                copy($_FILES['gbpic']['tmp_name'], "../img/gbuy/".$new_name.$ext_name); //複製新的圖片
                unlink("../img/gbuy/".$row1["g_pic"]); //刪除舊的圖片資料
                $s= 2; //更新圖片代碼
            }
        }            
    }
    echo $s; //回傳代碼
}

if (!empty($_GET['id']) && !empty($_GET['permit'])) {
    $sql = "SELECT * from player where p_id ='".$_GET['id']."' and p_permit ='".$_GET['permit']."' and p_del = 0 ";
    $ro = mysqli_query($link, $sql);
    $check = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);
    if ($check==0) {
        $s = 3; //驗證會員錯誤代碼
    }
    if ($check == 1) {
        if (!empty($_GET['gclose'])) {
            $sql = "UPDATE gbuy set g_close = '".$_GET["gclose"]."' where g_seq ='".$_GET['gseq']."' and g_del = 0 ";
            mysqli_query($link, $sql) or die("資料庫語法錯誤".$sql);
            $s=5; //關閉團購
        }
        if (!empty($_GET['gopen'])) {
            $sql = "UPDATE gbuy set g_close = '".$_GET["gopen"]."' where g_seq ='".$_GET['gseq']."' and g_del = 0 ";
            mysqli_query($link, $sql) or die("資料庫語法錯誤".$sql);
            $s=6; //開啟團購
        }
    }
    echo  $s;
}


?>