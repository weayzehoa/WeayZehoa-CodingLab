<?php
   if(!empty($_SESSION["id"]) && !empty($_SESSION["permit"]) ){
        ?><script>document.location.href="index.php";</script><?php
        exit();
    }

    if( !empty($_POST["myid"]) ){
        if( !empty($_POST["mypw"]) ){
            $sql = "SELECT * from player where p_del = 0 and p_id = '".$_POST["myid"]."' and p_pw = '".md5($_POST["mypw"])."'";
            //$sql = "SELECT * from player where p_id = '".$_POST["myid"]."' and p_pw = '".$_POST["mypw"]."'";
            $ro = mysqli_query($link,$sql);
            $check = mysqli_num_rows($ro);
            $row = mysqli_fetch_assoc($ro);
            if( $check == 1 ){
                $_SESSION["id"] = $_POST["myid"];
                $_SESSION["nick"] = $row["p_nick"];
                $_SESSION["permit"] = $row["p_permit"];
                // $_SESSION["mem_login"] = '<a href="admin.php">後台管理</a><br><br>(嗨,'.$_SESSION["nick"].') <a href="logout.php">登出</a><br><a href="member.php">會員資料修改</a>';
            }
        }
        ?><script>document.location.href="index.php";</script><?php
        exit();    
    }

?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>網站的會員登入</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <div class="col-8 offset-2 text-center">
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
