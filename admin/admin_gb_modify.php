<?php
        // 取出該筆團購資料
        $sql = "SELECT * from gbuy where g_seq ='".$_GET['gseq']."'";
        $ro = mysqli_query($link,$sql);
        $num = mysqli_num_rows($ro);
        $row = mysqli_fetch_assoc($ro);

        // 目前參與人數
        $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$_GET['gseq']."' and g_b_del = 0 ";
        $ro1 = mysqli_query($link,$sql);
        $num1 = mysqli_num_rows($ro1);

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
                        <div style="max-height:350px" class="text-white">
                            <h4 class="border-bottom">目前共 <?=$num1?> 人參加此團購</h4>

                            <?php
                                if($num1>=1){ ?>
                                    <table width="100%" class="border-bottom">

                                    <tr class="border-bottom">
                                        <td class="text-center">參加人</td>
                                        <td class="text-center">訂購數量</td>
                                        <td class="text-center">改數量</td>
                                        <td class="text-center">取消</td>
                                    </tr>

                                    <?php   $sql = "SELECT * from player a, gbuy b, gbuy_buyer c where b.g_seq = '".$_GET["gseq"]."' and c.g_b_buyer = a.p_seq and c.g_b_pno = b.g_seq and a.p_del = 0 and b.g_del = 0 and c.g_b_del = 0";
                                            $ro2 = mysqli_query($link,$sql);
                                            $row2 = mysqli_fetch_assoc($ro2);
                                        
                                        do { ?>
                                    
                                    <tr>
                                        <td class="text-center"><?=$row2['p_name'];?></td>
                                        <td class="text-center"><?=$row2['g_b_num'];?></td>
                                        
                                        <td class="text-center"><button onclick="admin_gb_change('<?=$_SESSION['id']?>','<?=$_SESSION['permit']?>','<?=$row2['p_id']?>','<?=$row2['g_seq']?>','<?=$row2['g_b_num']?>')" type="button" class="form-control bg-primary text-warning btn-sm">改數量</button></td>
                                        <td class="text-center"><button onclick="admin_order_cancel('<?=$_SESSION['id']?>','<?=$_SESSION['permit']?>','<?=$row2['p_id']?>','<?=$row2['g_seq']?>')" type="button" class="form-control bg-primary text-warning btn-sm">取消</button></td>
                                    </tr>

                                    <?php  } while($row2 = mysqli_fetch_assoc($ro2));?>
    
                                    </table>
                            <?php } ?>

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
                            <div class="form-group text-left col-4">
                            <input type="hidden" name="gseq" value="<?=$row["g_seq"];?>">
                            <input type="hidden" name="myid" value="<?=$_SESSION["id"];?>">
                            <input type="hidden" name="mypermit" value="<?=$_SESSION["permit"];?>">
                            <button id="gbmod" type="submit" class="form-control bg-primary text-warning">修改資料</button>
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
                            <div class="form-group text-left col-4">
                            <?php 
                                if($row['g_del']==0){
                                    echo '<input type="hidden" name="gdel" value="1">';
                                    echo '<button id="gbdel" type="submit" class="form-control bg-primary text-warning">刪除團購</button>';
                                }else{
                                    echo '<input type="hidden" name="gundel" value="2">';
                                    echo '<button id="gbundel" type="submit" class="form-control bg-primary text-warning">找回團購</button>';
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