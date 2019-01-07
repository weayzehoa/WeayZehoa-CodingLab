<?php
    if(!empty($_POST["id"])){
        $sql = "select * from player where p_id ='".$_POST["id"]."' and p_del = 0 ";
        $ro = mysqli_query($link,$sql);
        $check = mysqli_num_rows($ro);
        if($check == 0){
            $sql = "INSERT into player value(null,'".$_POST["id"]."','".md5($_POST["pw"])."','".$_POST["name"]."','".$_POST["nick"]."','".$_POST["sex"]."','".$_POST["email"]."',3,'".$time."',0)";
            mysqli_query($link,$sql);
        }else{
            echo "<script>alert('抱歉, 該帳號已有人使用');</script>";
        }
    }
?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>網站的會員註冊頁面, 預設權限 一般會員</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <form method="POST">
                    <div class="form-group col-6 offset-3">
                        <label>帳號 (ID)</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>
                    <div class="form-group col-6 offset-3">
                        <label>密碼 (Password)</label>
                        <input type="password" name="pw" class="form-control" required>
                    </div>
                    <div class="form-group col-6 offset-3">
                        <label>姓名 (Name)</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                        <div class="form-group col-6 offset-3">
                        <label>暱稱 (Nick Name)</label>
                        <input type="text" name="nick" class="form-control" required>
                    </div>
                    <div class="form-group col-4 offset-3">
                        <label>性別 (Sex)　</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sex" value="1" checked required>
                            <label class="form-check-label">男</label>
                            
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sex" value="2">
                            <label class="form-check-label">女</label>
                        </div>
                    </div>
                    <div class="form-group col-6 offset-3">
                        <label>電子郵件 (E-Mail Address)</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group col-3 offset-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check" value="1" required>
                            <label class="form-check-label" for="gridCheck">請勾選同意確認. (Agree)</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-2 offset-5">註冊</button>
                </form>
            </div>
        </div>
    </div>
</div>
