<?php
   if(!empty($_SESSION["id"]) && !empty($_SESSION["permit"]) ){
        ?><script>document.location.href="index.php";</script><?php
        exit();
    }

    if( !empty($_POST["myid"]) && !empty($_POST["mypw"]) ){

        $sql = "SELECT * from player where p_id = '".$_POST['myid']."'";
        $ro = mysqli_query($link,$sql);
        $check_id = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);

        if($check_id==0){
            echo '<script>alert("抱歉, 該帳號不存在, 請重新輸入 或 註冊一個新的.");</script>';
        }else{
            if($row['p_del']==1){
                echo '<script>alert("抱歉該帳號已被停權");</script>';
            }else{
                if( $row['p_pw'] == md5($_POST['mypw']) ){
                    $_SESSION["id"] = $_POST["myid"];
                    $_SESSION["nick"] = $row["p_nick"];
                    $_SESSION["permit"] = $row["p_permit"];
                    ?><script>document.location.href="index.php";</script><?php
                }else{
                    echo '<script>alert("抱歉, 密碼錯誤, 請重新輸入.");</script>';
                    ?><script>document.location.href="?g=login";</script><?php
                }
            }
        }
    }

?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>網站的會員登入</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark vh-90 mycol">
                <div class="col-8 offset-2 padding-top50 text-center">
                    <p></p>
                    <br>
                    <h5>訪客可使用 帳號 : guest  密碼: guest (權限已設定唯讀) 登入參觀.<br><br>
                        或直接按下方 訪客登入 按鈕, 直接使用 guest 帳號登入.<br><br>
                        該帳號限制較多, 可註冊一個一般會員來操作網站各項功能.
                    </h5>
                </div>
                <div class="col-6 offset-4">
                    <form method="post">
                        <div class="form-group col-8">
                            <p></p>
                            <br>
                            帳號 (ID)
                            <input name="myid" type="text" class="form-control" placeholder="請輸入您註冊的帳號." required>
                            <br>
                        </div>
                        <div class="form-group  col-8">
                            密碼 (Password)<input name="mypw" type="password" class="form-control"placeholder="請輸入您註冊的密碼." required>
                        </div>  
                            <p></p>
                            <br>
                            <button type="submit" class="col-2 offset-3 btn btn-primary">登入</button>
                            <br>
                            <br>
                    </form>
                    <form method="post">
                    <input name="myid" type="hidden" class="form-control" value="guest">
                    <input name="mypw" type="hidden" class="form-control" value="guest">
                    <button type="submit" class="col-2 offset-3 btn btn-block btn-primary">訪客登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
