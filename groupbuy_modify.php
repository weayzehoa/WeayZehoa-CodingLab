<?php
if(empty($_SESSION['id'])){
    ?><script>alert('抱歉, 您尚未登入, 無法變更團購資料');</script><?php
    ?><script>document.location.href="?g=gb"</script><?php
}else{
    if ($_SESSION['id']!=$_GET['cid']) {
        ?><script>alert('抱歉, 您並非本團購發起人本人, 無法變更團購資料');</script><?php
        ?><script>document.location.href="?g=gb"</script><?php
    } else {
        // 取出該筆團購資料
        $sql = "SELECT * from gbuy where g_seq ='".$_GET['gseq']."' and g_del = 0";
        $ro = mysqli_query($link,$sql);
        $num = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);

        // 目前參與人數
        $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$_GET['gseq']."' and g_b_del = 0 ";
        $ro1 = mysqli_query($link,$sql);
        $num1 = mysqli_num_rows($ro1);
    }
}

?>
<!-- 團購歡迎畫面 -->
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>本系統是我的期末作業, 僅供瀏覽操作參考, 並無真正的產品團購.</h4>
</div>

<!-- 修改團購 表單 -->
<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <form method="POST" enctype="multipart/form-data">
                <div class="row">
                
                    <div class="col-4 bg-primary offset-1">
                        <div class="form-group text-center">
                            <img style="width:85%; margin:10px" id="preview_img" src="./img/gbuy/<?=$row['g_pic']?>" alt="照片預覽框" /><br>
                            <input class='btn btn-round btn-file' type="file" name="gbpic" id="up_pic" accept="image/jpeg, image/png"><br>
                            <span>檔案限制: 500x500 (長寬需相等), 小於1Mb, 格式: JPG/PNG</span>
                        </div>

                        <div class="border-bottom"></div>
                        <div style="max-height:350px">
                            <h4>目前參加人 共 <?=$num1?> 人</h4>
                        </div>
                    </div>
                    
                    <div class="col-6 bg-info">
                        <div class="form-group text-left">
                            <label class="text-dark">團購名稱</label>
                            <input type="text" name="gbname" class="form-control" maxlength="10" placeholder="團購名稱 (取個響亮的團購名稱吧, ex: 超級讚!!)" value="<?=$row['g_name']?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 text-left">
                            <label class="text-dark">起始日</label>
                            <input type="date" name="starttime" class="form-control" value="<?=$row['g_stime']?>">
                            </div>
                            <div class="form-group col-6 text-left">
                            <label class="text-dark">截止日</label>
                            <input type="date" name="endtime" class="form-control" value="<?=$row['g_endtime']?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6 text-left">
                            <label class="text-dark">產品名稱</label>
                            <input type="text" name="pname" class="form-control" maxlength="16" placeholder="產品名稱" value="<?=$row['g_pname']?>">
                            </div>
                            <div class="form-group col-3 text-left">
                            <label class="text-dark">總數量</label>
                            <input type="number" name="mod_onum" class="form-control" placeholder="總數量" value="<?=$row['g_onum']?>">
                            </div>
                            <div class="form-group col-3 text-left">
                            <label class="text-dark">剩餘數量</label>
                            <input type="number" name="mod_rnum" class="form-control" readonly placeholder="免填寫" value="<?=$row['g_rnum']?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-4 text-left">
                            <label class="text-dark">市價</label>
                            <input type="number" name="oprice" class="form-control" placeholder="市價" value="<?=$row['g_oprice']?>">
                            </div>
                            <div class="form-group col-4 text-left">
                            <label class="text-dark">團購價</label>
                            <input type="number" name="gprice" class="form-control" placeholder="團購價" value="<?=$row['g_gprice']?>">
                            </div>
                            <div class="form-group col-4 text-left">
                            <label class="text-dark">超過3人訂購特別價</label>
                            <input type="number" name="sprice" class="form-control" placeholder="特別價" value="<?=$row['g_sprice']?>">
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <label class="text-dark">說明</label>
                            <textarea style="height:100px" type="text" name="gbcon" class="form-control" placeholder="請輸入產品說明"><?=$row['g_con']?>"</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group text-left col-4 offset-2">
                            <input type="hidden" name="gseq" value="<?=$row["g_seq"];?>">
                            <input type="hidden" name="myid" value="<?=$_SESSION["id"];?>">
                            <input type="hidden" name="mypermit" value="<?=$_SESSION["permit"];?>">
                            <button id="gbmod" type="submit" class="form-control bg-primary text-warning">修改</button>
                            </div>
                            <div class="form-group text-left col-4">
                            <?php 
                                if($row['g_close']==2){
                                    echo '<input type="hidden" name="gopen" value="1">';
                                    echo '<button id="gbopen" type="submit" class="form-control bg-primary text-warning">開啟團購</button>';
                                }else{
                                    echo '<input type="hidden" name="gclose" value="2">';
                                    echo '<button id="gbclose" type="submit" class="form-control bg-primary text-warning">關閉團購</button>';
                                }
                            ?>                            
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>