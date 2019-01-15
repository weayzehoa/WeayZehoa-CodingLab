
<?php
check_permission ();

if($_SESSION["permit"]!=1){
    echo "<script>alert('抱歉, 你的權限無法修改密碼動作');</script>";
    echo "<script>document.location.href='?menu=1&g=acc';</script>";
}

if (!empty($_POST["oldpw"])) {
    $sql = "SELECT * from player where p_seq = '".$_GET["seq"]."' and p_pw = '".md5($_POST["oldpw"])."'";
    $ro = mysqli_query($link, $sql);
    $check = mysqli_num_rows($ro);
    if ($check==1) {
        if($_POST["newpw"]==$_POST["again"]){
            if(strlen($_POST["newpw"]) < 8){ 
                echo "<script>alert('新密碼請輸入8個字以上');</script>";
            }
            elseif (strlen($_POST["newpw"])>16) { 
                echo "<script>alert('新密碼請輸入16個字以下');</script>";
            }
            else{
                if($_SESSION["permit"]==1 || $_SESSION["permit"]==3){
                    $sql = "UPDATE player SET p_pw = '".md5($_POST["newpw"])."' WHERE p_seq = '".$_GET["seq"]."'";
                    mysqli_query($link,$sql) or die ("更新失敗".$sql);
                    // web_log(str_replace("'", "\'", "$sql"));
                    echo "<script>alert('密碼已修改完成.');</script>";
                    echo "<script>document.location.href='?menu=1&g=acc';</script>";
                }  
                else{
                    echo "<script>alert('抱歉, 你的權限無法做修改密碼動作');</script>";
                    echo "<script>document.location.href='?menu=1&g=acc';</script>";
                }
            }
        }
        else{
            echo "<script>alert('兩次新密碼輸入錯誤!!');</script>";
        }
    }
    else{
        echo "<script>alert('輸入舊密碼錯誤!!');</script>";
    }
}

?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h4>本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入)</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol vh-90">
                <div class="col-8 offset-3">
                    <form method="post">
                        <div class="form-group col-8">
                            <p>新密碼長度限制8-16字元.</p>
                            <br>
                            舊密碼
                            <input type="password" name="oldpw" class="form-control" placeholder="請輸入舊密碼.">
                        </div>
                        <div class="form-group col-8">
                            <br>
                            新密碼
                            <input type="password" name="newpw" class="form-control" placeholder="請輸入新密碼.">
                            <br>
                        </div>
                        <div class="form-group  col-8">
                            再次輸入<input type="password" name="again" class="form-control"placeholder="請再次輸入新密碼.">
                        </div>  
                            <p></p>
                            <br>
                            <button type="submit" class="col-2 offset-1 btn btn-primary">送出</button>
                            <button type="reset" class="col-2 offset-1 btn btn-primary">清除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
