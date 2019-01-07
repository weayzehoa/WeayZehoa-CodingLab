<?php

if(!empty($_SESSION["id"]) && !empty($_SESSION["permit"])){
    $sql ="SELECT * FROM player a, player_sex b, player_permission c WHERE a.p_del = 0 and a.p_sex = b.p_s_seq and a.p_permit = c.p_p_seq and a.p_id ='".$_SESSION['id']."'";
    $ro = mysqli_query($link,$sql);
    $check = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);
    $r = "";
    if($_SESSION["permit"]==2){$r = "readonly";}
}else{
    ?><script>alert("抱歉, 尚未登入無法變更會員資料");</script><?php
    ?><script>document.location.href="index.php";</script><?php
}

if(!empty($_POST["id"]) && $_SESSION["id"]==$_POST["id"]){
    if($_SESSION["permit"]==2){echo "<script>alert('抱歉, 你的權限無法修改會員資料')</script>";}
    else{
        $sql = "UPDATE player set p_name ='".$_POST["name"]."', p_nick='".$_POST["nick"]."', p_sex='".$_POST["sex"]."', p_email='".$_POST["email"]."' where p_id='".$_POST["id"]."' and p_del = 0 ";
        mysqli_query($link,$sql);
        // header("location:member.php");
    }
}
?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>網站的會員資料修改</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <form method="post">
                    <div class="form-group col-6 offset-3">
                        <label>帳號 (ID)</label>
                        <input type="text" name="id" class="form-control" readonly required value="<?=$row["p_id"]?>">
                    </div>
                    <!-- <div class="form-group col-6 offset-3">
                        <label>密碼 (Password)</label>
                        <input type="password" name="pw" class="form-control" required>
                    </div> -->
                    <div class="form-group col-6 offset-3">
                        <label>姓名 (Name)</label>
                        <input type="text" name="name" class="form-control" <?=$r?> required value="<?=$row["p_name"]?>">
                    </div>
                        <div class="form-group col-6 offset-3">
                        <label>暱稱 (Nick Name)</label>
                        <input type="text" name="nick" class="form-control" <?=$r?> required value="<?=$row["p_nick"]?>">
                    </div>
                    <div class="form-group col-4 offset-3">
                        <label>性別 (Sex)　</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sex" value="1" <?php if($row["p_sex"]==1){echo "checked";}?>>
                            <label class="form-check-label">男</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sex" value="2" <?php if($row["p_sex"]==2){echo "checked";}?>>
                            <label class="form-check-label">女</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sex" value="3" <?php if($row["p_sex"]==3){echo "checked";}?>>
                            <label class="form-check-label">未知</label>
                        </div>
                    </div>
                    <div class="form-group col-6 offset-3">
                        <label>電子郵件 (E-Mail Address)</label>
                        <input type="email" name="email" class="form-control" <?=$r?> required value="<?=$row["p_email"]?>">
                    </div>
                    <div class="form-group col-6 offset-3">
                        <label>權限 (Permission)</label>
                        <input type="email" name="permit" class="form-control" readonly value="<?=$row["p_p_permit"]?>">
                    </div>
                    <div class="form-group col-3 offset-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check" value="1" required>
                            <label class="form-check-label">請勾選同意確認. (Agree)</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-1 offset-4">修改</button><a href="pwchange.php" class="btn btn-primary col-1 offset-1">變更密碼</a>
                </form>
            </div>
        </div>
    </div>
</div>
