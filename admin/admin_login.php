<?php
check_login();

    if( !empty($_POST["myid"]) && !empty($_POST["mypw"]) ){
        $sql = "SELECT * from player where p_del = 0 and p_id = '".$_POST["myid"]."' and p_pw = '".md5($_POST["mypw"])."'";
        $ro = mysqli_query($link,$sql);
        $check = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);
        if( $check == 1 ){
            if($row["p_permit"]==1 || $row["p_id"]=="guest"){
                $_SESSION["id"] = $_POST["myid"];
                $_SESSION["nick"] = $row["p_nick"];
                $_SESSION["permit"] = $row["p_permit"];
                ?><script>document.location.href="?menu=login&g=adminwelcome";</script><?php
            }else{
                ?><script>alert("抱歉, 您不具有管理員權限, 無法使用後台管理系統功能");</script><?php
                ?><script>document.location.href="?menu=login&g=admin";</script><?php
            }
        }else{
            ?><script>alert("抱歉, 該帳號不存在或密碼錯誤");</script><?php
            ?><script>document.location.href="?menu=login&g=admin";</script><?php
        }
    }
?>
<!-- 後台管理系統歡迎畫面 -->
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h4>本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入)</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol vh-90">
                <div class="col-8 offset-2 text-center padding-top100">

                <!-- <div class="col-10 offset-1"> -->
                    <br>
                    <h5>訪客可使用 帳號 : guest  密碼: guest (權限已設定唯讀) 登入參觀.<br><br>
                        或直接按下方 訪客登入 按鈕, 直接使用 guest 帳號登入.
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
                        <div class="form-group col-8">
                            密碼 (Password)<input name="mypw" type="password" class="form-control"placeholder="請輸入您註冊的密碼."  required>
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