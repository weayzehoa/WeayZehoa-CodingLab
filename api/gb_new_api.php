<?php
// 新增成功 echo 1;
// 新增失敗 echo 2;     訪客不得新增.
// 非本站會員 echo 3;   防止造假POST資料.
// 圖片格式錯誤 echo 4; 防止上傳偽造的圖片.
// 驗證會員失敗 echo 5; 防止造假POST資料.

$link = mysqli_connect("localhost", "root", "", "codinglab");
mysqli_query($link, "set names utf8mb4") or die("資料庫GG了");


if (!empty($_POST['id']) && !empty($_POST['permit'])) {
    $sql = "SELECT * from player where p_id ='".$_POST['id']."' and p_permit ='".$_POST['permit']."' and p_del = 0 ";
    $ro = mysqli_query($link, $sql);
    $check = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);
    if ($check==0) {
        echo 3;
    }
    if ($check == 1) {
        if ($row['p_permit']==2) {
            echo 2;
        }
        if ($row['p_permit']==1 || $row['p_permit']==3) {
            if (!empty($_FILES)) {
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
                    echo 4;
                } else {
                    $sql= "INSERT into gbuy value(null,'".$row['p_seq']."','".$_POST["gbname"]."','".$_POST["pname"]."','".$new_name.$ext_name."','".$_POST["gbcon"]."','".$_POST["oprice"]."','".$_POST["gprice"]."','".$_POST["sprice"]."','".$_POST["onum"]."','".$_POST["onum"]."','".$_POST["starttime"]."','".$_POST["endtime"]."',1,0)";
                    mysqli_query($link, $sql) or die("資料庫語法錯誤".$sql);
                    copy($_FILES['gbpic']['tmp_name'], "../img/gbuy/".$new_name.$ext_name);
                    echo 1;
                }
            }
        }
    }
}
?>