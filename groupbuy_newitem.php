
<?php
    if (empty($_SESSION["id"])){
            ?><script>alert("抱歉, 您不是本站一般會員, 請先登入");</script><?php
            ?><script>document.location.href="?g=login"</script><?php
        }
?>

<!-- 團購歡迎畫面 -->
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>本系統是我的期末作業, 僅供瀏覽操作參考, 並無真正的產品團購.</h4>
</div>

<!-- 新增團購表單 -->
<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4 bg-primary offset-1">
                            <div class="form-group text-center">
                                <br>
                                <img style="width:95%" id="preview_img" src="./img/upload_720.png" alt="照片預覽框" /><br>
                                <input class='btn btn-round btn-file' type="file" name="gbpic" id="up_pic" accept="image/jpeg, image/png" required><br>
                                <span>檔案限制: 500x500 (長寬需相等), 小於1Mb, 格式: JPG/PNG</span>
                            </div>
                        </div>
                        <div class="col-6 bg-info">
                            <div class="form-group text-left">
                                <label class="text-dark">團購名稱</label>
                                <input type="text" name="gbname" class="form-control"  maxlength="10" placeholder="團購名稱 (取個響亮的團購名稱吧, ex: 超級讚!!)" required>
                            </div>
        
                            <div class="form-row">
                                <div class="form-group col-6 text-left">
                                    <label class="text-dark">起始日</label>
                                    <input type="date" name="starttime" class="form-control" required>
                                </div>
                                <div class="form-group col-6 text-left">
                                    <label class="text-dark">截止日</label>
                                    <input type="date" name="endtime" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 text-left">
                                    <label class="text-dark">產品名稱</label>
                                    <input type="text" name="pname" class="form-control" maxlength="16" placeholder="產品名稱" required>
                                </div>
                                <div class="form-group col-3 text-left">
                                    <label class="text-dark">總數量</label>
                                    <input type="number" name="onum" class="form-control" placeholder="總數量" required>
                                </div>
                                <div class="form-group col-3 text-left">
                                    <label class="text-dark">剩餘數量</label>
                                    <input type="number" name="rnum" class="form-control" readonly placeholder="免填寫" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">市價</label>
                                    <input type="number" name="oprice" class="form-control" placeholder="市價" required>
                                </div>
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">團購價</label>
                                    <input type="number" name="gprice" class="form-control" placeholder="團購價" required>
                                </div>
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">超過3人訂購特別價</label>
                                    <input type="number" name="sprice" class="form-control" placeholder="特別價" required>
                                </div>
                            </div>

                            <div class="form-group text-left">
                                <label class="text-dark">說明</label>
                                <textarea style="height:100px" type="text" name="gbcon" id="gbcon" class="form-control" placeholder="請輸入產品說明" required></textarea>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group text-left col-4 offset-3">
                                    <input type="hidden" name="myid" value="<?=$_SESSION["id"];?>">
                                    <input type="hidden" name="mypermit" value="<?=$_SESSION["permit"];?>">
                                    <button id="gbnew" type="submit" class="form-control bg-primary text-warning">新增</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
