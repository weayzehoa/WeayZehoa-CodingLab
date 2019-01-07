<?php
    if(empty($_SESSION)){
        ?><script>alert('使用本團購系統, 請先登入會員');</script><?php
        ?><script>document.location.href="?g=login";</script><?php
    }

    if (!empty($_GET['seq'])) {
        // 取出該筆團購資料
        $sql = "SELECT * from gbuy where g_seq ='".$_GET['seq']."' and g_del = 0";
        $ro = mysqli_query($link, $sql);
        $num = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);

        // 目前參與人數
        $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$_GET['seq']."' and g_b_del = 0";
        $ro1 = mysqli_query($link,$sql);
        $num1 = mysqli_num_rows($ro1);
        $row1 = mysqli_fetch_assoc($ro1);

        // 對應發起人名字
        $sql ="SELECT * from player where p_seq = '".$row['g_p_id']."' and p_del = 0 ";
        $ro2 = mysqli_query($link,$sql);
        $row2 = mysqli_fetch_assoc($ro2);

        // 取出目前使用者訂購數量及參加狀態
        $sql = "SELECT * from player a, gbuy b, gbuy_buyer c where a.p_id = '".$_SESSION['id']."' and b.g_seq = '".$_GET['seq']."' and c.g_b_buyer = a.p_seq and c.g_b_pno = '".$_GET['seq']."' and b.g_close =1 and a.p_del = 0 and b.g_del=0 and c.g_b_del=0";
        $ro3 = mysqli_query($link,$sql);
        $num3 = mysqli_num_rows($ro3);
        $row3 = mysqli_fetch_assoc($ro3);

        // 判斷是否已經超過3人參與, 若是, 則目前團購價改為特別價並更新目前使用者的訂單總價
        $new_total_price = "";
        if($num1>=3){
            $new_total_price = $row3['g_b_num'] * $row['g_sprice'];
            $sql = "UPDATE gbuy_buyer set g_b_num = '".$row3['g_b_num']."' , g_b_price ='".$row['g_sprice']."', g_b_total='".$new_total_price."' where g_b_pno = '".$row['g_seq']."' and g_b_buyer = '".$row3['p_seq']."' and g_b_del = 0";
            mysqli_query($link,$sql);
        }else{
            $new_total_price = $row3['g_b_num'] * $row['g_gprice'];
            $sql = "UPDATE gbuy_buyer set g_b_num = '".$row3['g_b_num']."' , g_b_price ='".$row['g_gprice']."', g_b_total='".$new_total_price."' where g_b_pno = '".$row['g_seq']."' and g_b_buyer = '".$row3['p_seq']."' and g_b_del = 0";
            mysqli_query($link,$sql);
        }

        // 重新取出目前使用者訂購數量及參加狀態
        $sql = "SELECT * from player a, gbuy b, gbuy_buyer c where a.p_id = '".$_SESSION['id']."' and b.g_seq = '".$_GET['seq']."' and c.g_b_buyer = a.p_seq and c.g_b_pno = '".$_GET['seq']."' and b.g_close =1 and a.p_del = 0 and b.g_del=0 and c.g_b_del=0";
        $ro4 = mysqli_query($link,$sql);
        $num4 = mysqli_num_rows($ro4);
        $row4 = mysqli_fetch_assoc($ro4);
    }
    $join_cancel = "參加";
    $change_num = "　";
    if($num3==1){ $join_cancel = "取消"; $change_num = '<button type="button" id="change_order" class="form-control bg-primary text-warning">修改數量</button>';}

?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>本系統是我的期末作業, 僅供瀏覽操作參考, 並無真正的產品團購.</h4>
</div>

<!-- 會員瀏覽 表單 -->
<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <form>
                    <div class="row">
                        <div class="col-4 bg-primary offset-1 ">
                            <div class="form-group text-center">
                                <img style="width:80%; margin:20px" id="preview_img" src="./img/gbuy/<?=$row['g_pic']?>" alt="照片預覽框" /><br>
                                <!-- <input type="file" id="up_pic" accept="image/gif, image/jpeg, image/png" /> -->
                            </div>
                            <div class="border-bottom"></div>
                            <div class="form-group text-left">
                            <label class="text-dark">產品說明</label>
                            <textarea style="height:160px" type="text" class="form-control" readonly placeholder="請輸入產品說明"><?=$row['g_con']?></textarea>
                            </div>
                        </div>

                        <div class="col-6 bg-info">
                            <div style="height:20px"></div>
                            <div class="form-row">
                                <div class="form-group col-8 text-left">
                                    <label class="text-dark">團購名稱</label>
                                    <input type="text" class="form-control" readonly placeholder="團購名稱 (取個響亮的團購名稱吧, ex: 超級讚!!)" value="<?=$row['g_name']?>">
                                </div>
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">發起人</label>
                                    <input type="text" class="form-control" readonly placeholder="發起人" value="<?=$row2['p_name']?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 text-left">
                                    <label class="text-dark">起始日</label>
                                    <input type="date" class="form-control" readonly value="<?=$row['g_stime']?>">
                                </div>
                                <div class="form-group col-6 text-left">
                                    <label class="text-dark">截止日</label>
                                    <input type="date" class="form-control" readonly value="<?=$row['g_endtime']?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6 text-left">
                                <label class="text-dark">產品名稱</label>
                                <input type="text" class="form-control" readonly placeholder="產品名稱" value="<?=$row['g_pname']?>">
                                </div>
                                <div class="form-group col-3 text-left">
                                    <label class="text-dark">總數量</label>
                                    <input type="text" name="onum" class="form-control" readonly placeholder="總數量" value="<?=$row['g_onum']?>">
                                </div>
                                <div class="form-group col-3 text-left">
                                    <label class="text-dark">剩餘數量</label>
                                    <input type="text" name="rnum" class="form-control" readonly placeholder="剩餘數量" value="<?=$row['g_rnum']?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">市價</label>
                                    <input type="text" class="form-control" readonly placeholder="市價" value="<?=$row['g_oprice']?>">
                                </div>
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">團購價</label>
                                    <input type="text" name="gprice" class="form-control" readonly placeholder="團購價" value="<?=$row['g_gprice']?>">
                                </div>
                                <div class="form-group col-4 text-left">
                                    <label class="text-dark">超過3人特別價</label>
                                    <input type="text" name="sprice" class="form-control" readonly placeholder="特別價" value="<?=$row['g_sprice']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-3 text-left">
                                    <label class="text-dark">訂購數量</label>
                                    <input type="number" name="order_num" class="form-control border border-danger" <?php if($row['g_close']==2){echo 'readonly';}?> placeholder="請輸入訂購數量" value="<?=$row4['g_b_num'];?>">
                                </div>
                                <div class="form-group col-3 text-left">
                                    <label class="text-dark">共計費用</label>
                                    <input type="number" name="total_price" class="form-control border border-danger"  readonly placeholder="新台幣" value="<?=$row4['g_b_total']?>">
                                </div>
                                <div class="col-6 text-center align-self-center">
                                    <?php
                                        if($row['g_close']==1){echo '<h3 class="text-white">進行中</h3>';}else{echo '<h3 class="text-danger">本團購已關閉</h3>';}
                                    ?>
                                    <h4 class="text-white">目前共 <?=$num1?> 人參與</h4>
                                </div>
                            </div>
                            <p></p>
                            <div class="form-row">
                                <?php
                                    if($row['g_close']==1){
                                        if(!empty($_SESSION)){
                                            echo '
                                            <input type="hidden" name="myid" value='.$_SESSION["id"].'>
                                            <input type="hidden" name="gseq" value='.$row["g_seq"].'>
                                            <input type="hidden" name="join_num" value='.$num1.'>
                                            <div class="form-group text-left col-4">
                                                '.$change_num.'
                                            </div>
                                            
                                            <div class="form-group text-left col-4">
                                                <button type="button" id="gb_join_cancel" class="form-control bg-primary text-warning">'.$join_cancel.'</button>
                                            </div>';
                                    
                                        }else{
                                            echo '
                                            <div class="form-group text-left col-8">
                                                <h5 class="text-white">本團購僅限會員, 請先登入。</h5>
                                            </div>
                                            ';                                            
                                        }
                                    }else{
                                        echo '
                                            <div class="form-group text-left col-8">
                                                <h5 class="text-white">本團購已關閉, 您已經無法修改訂單數量或取消參與。除非發起人重新開啟。</h5>
                                            </div>
                                            ';}
                                ?>

                                <?php  //若登入者是發起人則顯示修改資料按鈕
                                    if(!empty($_SESSION)){  //判斷SESSION是否存在
                                        if(!empty($_SESSION['id'])){  //判斷是否有登入
                                            if($_SESSION['id']==$row2['p_id']){ //判斷登入者是否為發起人
                                                echo '
                                                <input type="hidden" name="creater_id" value='.$row2["p_id"].'>
                                                <input type="hidden" name="gseq" value='.$row["g_seq"].'>
                                                <div class="form-group text-left col-4">
                                                    <button id="gbmodify" type="button" class="form-control bg-primary text-warning">修改資料</button>
                                                </div>                        
                                                ';   
                                            }
                                        }
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
