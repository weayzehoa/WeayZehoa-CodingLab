<?php
check_permission ();

?>

<!-- 後台管理系統歡迎畫面 -->
<div class="myheadbg text-white container-fiuld text-shadow-bu1 text-center">
    <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
    <h4>本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入)</h4>
</div>
<!-- 說明 -->
<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <div class="row">
                    <div class="col-12">
                        說明:<br>
                        1. 團購系統撰寫方法與帳號管理不同, 帳號管理採用表單與連結操作, 團購系統則採用JQuery方式透過AJAX傳遞資料來操作.<br>
                        2. 團購系統後台管理. 與前台相同, 皆使用JQuery來做新增修改刪除關閉等相關動作.<br>
                        3. 前台只有團購發起人可以做修改或關閉. 後台管理者除了可以修改團購資料, 還多了刪除動作, 直接將該團購刪除, 消失於列表上.<br>
                        4. 按下刪除, 則會檢查權限是否足夠, 不足時將會彈出錯誤訊息並跳回原頁面.<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 新增團購表單 -->

<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1"><br>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-7 offset-1">
                            <table class="table table-bordered">
                                <tr>
                                    <td style="width:10%" class="table-active">團名</td>
                                    <td style="width:25%" colspan="2">
                                        <input type="text" name="gbname" class="form-control"  maxlength="10" placeholder="取個響亮的團購名稱吧!!" required>
                                    </td>
                                    <td style="width:10%" class="table-active">產品名稱</td>
                                    <td style="width:25%" colspan="2">
                                        <input type="text" name="pname" class="form-control" maxlength="16" placeholder="產品名稱" required>
                                    </td>
                                    <td style="width:30%" class="table-active">說明</td>
                                </tr>
                                    <tr>
                                    <td class="table-active">起始日</td>
                                    <td colspan="2">
                                        <input type="date" name="starttime" class="form-control" required>
                                    </td>
                                    <td class="table-active">截止日</td>
                                    <td colspan="2">
                                    <input type="date" name="endtime" class="form-control" required>
                                    </td>
                                    <td rowspan="3">
                                        <textarea style="height:190px" type="text" name="gbcon" id="gbcon" class="form-control" placeholder="請輸入產品說明" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-active">市價</td>
                                    <td colspan="2">
                                        <input type="number" name="oprice" class="form-control" placeholder="市價" required>
                                    </td>
                                    <td class="table-active">團購價</td>
                                    <td colspan="2">
                                        <input type="number" name="gprice" class="form-control" placeholder="團購價" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-active">特別價</td>
                                    <td colspan="2">
                                        <input type="number" name="sprice" class="form-control" placeholder="特別價" required>
                                    </td>
                                    <td class="table-active">總數量</td>
                                    <td colspan="2">
                                        <input type="number" name="onum" class="form-control" placeholder="總數量" required>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-2">
                            <div class="form-group text-center">
                                <br>
                                <img style="max-width:65%" id="preview_img" src="./img/upload_720.png" alt="照片預覽框" /><br>
                                <input class='btn btn-round btn-file' type="file" name="gbpic" id="up_pic" accept="image/jpeg, image/png" required><br>
                                長寬需相等, 小於1Mb, 格式: JPG/PNG
                            </div>
                        </div>
                        <div class="col-1  align-self-center ">
                            <div class="form-group text-center">
                                <input type="hidden" name="myid" value="<?=$_SESSION["id"];?>">
                                <input type="hidden" name="mypermit" value="<?=$_SESSION["permit"];?>">
                                <button id="admin_gbnew" type="submit" class="form-control bg-primary text-warning">新增</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    $sql = "SELECT * from player a, gbuy b where b.g_p_id = a.p_seq";
    $ro1 = mysqli_query($link,$sql);
    $num1 = mysqli_num_rows($ro1);
    $row1 = mysqli_fetch_assoc($ro1);
    $c = 1;
 
?>

<!-- 團購列表 -->
<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <div class="row">
                    <div class="col-12">
                    <p>說明：<br>
                            1. 團購查詢及操作.<br>
                            2. 按詳細資料及修改按鈕, 帶入團購編號跳至修改頁面, 並將所有資料列出, 提供修改、關閉或刪除.<br>
                    <table class="table table-hover ">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">編號</th>
                            <th scope="col">照片</th>
                            <th scope="col">發起人</th>
                            <th scope="col">團購名稱</th>
                            <th scope="col">產品名稱</th>
                            <th scope="col" class="text-right">原市價</th>
                            <th scope="col" class="text-right">團購價</th>
                            <th scope="col" class="text-right">特別價</th>
                            <th scope="col" class="text-right">數量</th>
                            <th scope="col" class="text-right">剩餘</th>
                            <th scope="col" class="text-center">起始日</th>
                            <th scope="col" class="text-center">截止日</th>
                            <th scope="col" class="text-center">狀態</th>
                            <th scope="col" class="text-center">刪除否</th>
                            <th scope="col" class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php do { ?>
                            <tr>
                            <th class="align-middle" scope="row"><?php echo $c; $c++; ?></th>
                            <td class="align-middle"><img style="max-height:60px" src="./img/gbuy/<?=$row1['g_pic']?>" alt="照片預覽框" /></td>
                            <td class="align-middle"><?=$row1['p_name']?></td>
                            <td class="align-middle"><?=$row1['g_name']?></td>
                            <td class="align-middle"><?=$row1['g_pname']?></td>
                            <td class="align-middle text-right"><?=$row1['g_oprice']?></td>
                            <td class="align-middle text-right"><?=$row1['g_gprice']?></td>
                            <td class="align-middle text-right"><?=$row1['g_sprice']?></td>
                            <td class="align-middle text-right"><?=$row1['g_onum']?></td>
                            <td class="align-middle text-right"><?=$row1['g_rnum']?></td>
                            <td class="align-middle text-center"><?=$row1['g_stime']?></td>
                            <td class="align-middle text-center"><?=$row1['g_endtime']?></td>
                            <td class="align-middle text-center"><?php if($row1['g_close']==1){ echo "進行中";}else{echo "<span class='text-danger'>關閉中</span>";}?></td>
                            <td class="align-middle text-center"><?php if($row1['g_del']==1){ echo "<span class='text-danger'>是</span>";}else{echo "否";}?></td>
                            <td class="align-middle text-center">
                            <div class="row">
                            <div class="col-12"><a class="bg-primary text-center text-warning btn" href="?menu=2&g=gbmodify&gseq=<?=$row1['g_seq']?>">詳細資料及變更</a></div>
                            </div>
                            </td>
                            </tr>
                        <?php }while($row1 = mysqli_fetch_assoc($ro1))?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $sql = "SELECT * from player a, gbuy b, gbuy_buyer c where c.g_b_buyer = a.p_seq and c.g_b_pno = b.g_seq and c.g_b_del = 0";
    $ro2 = mysqli_query($link,$sql);
    $num2 = mysqli_num_rows($ro2);
    $row2 = mysqli_fetch_assoc($ro2);
    $no = 1;
?>

<!-- 團購參加者列表 -->
<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <div class="row">
                    <div class="col-12">
                    <p>說明：<br>
                        1. 會員訂購查詢及操作.<br>
                        2. 按改數量按鈕, 跳出修改數量視窗, 並帶入原始訂購數量, 當數量改變, 透過Ajax傳遞修改, 並變更當前欄位的數值及相關變動.<br>
                        3. 按取消按鈕, 跳出確認視窗, 確認後, 則刪除該筆資料(加註於資料庫中的g_b_del欄位,　實際資料庫並未刪除), 並變更當前欄位.<br>
                    </p>
                        <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">帳號ID</th>
                            <th scope="col">會員名字</th>
                            <th scope="col">會員暱稱</th>
                            <th scope="col">會員權限</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">團購名稱</th>
                            <th scope="col">產品名稱</th>
                            <th scope="col">團購價</th>
                            <th scope="col">特別價</th>
                            <th scope="col">參加時間</th>
                            <th scope="col" class="text-center">購買數量</th>
                            <th scope="col" class="text-right">購買單價</th>
                            <th scope="col" class="text-right">小計</th>
                            <th scope="col" class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do{ ?>
                            <tr>
                            <th scope="row"><?php  echo $no; $no++ ;?></th>
                            <td><?=$row2['p_id']?></td>
                            <td><?=$row2['p_name']?></td>
                            <td><?=$row2['p_nick']?></td>
                            <td><?=$row2['p_permit']?></td>
                            <td><?=$row2['p_email']?></td>
                            <td><?=$row2['g_name']?></td>
                            <td><?=$row2['g_pname']?></td>
                            <td><?=$row2['g_gprice']?></td>
                            <td><?=$row2['g_sprice']?></td>
                            <td><?=$row2['g_b_time']?></td>
                            <td class="text-center"><?=$row2['g_b_num']?></td>
                            <td class="text-right"><?=$row2['g_b_price']?></td>
                            <td class="text-right"><?=$row2['g_b_total']?></td>
                            <td>
                            <div class="row">
                            <button onclick="admin_gb_change('<?=$_SESSION['id']?>','<?=$_SESSION['permit']?>','<?=$row2['p_id']?>','<?=$row2['g_seq']?>','<?=$row2['g_b_num']?>')" type="button" class="col-6 form-control bg-primary text-warning btn-sm">改數量</button>
                            <button onclick="admin_order_cancel('<?=$_SESSION['id']?>','<?=$_SESSION['permit']?>','<?=$row2['p_id']?>','<?=$row2['g_seq']?>')" type="button" class="col-6 form-control bg-primary text-warning btn-sm">取消</button>
                            </div>
                            </td>
                            </tr>
                            <?php }while($row2 = mysqli_fetch_assoc($ro2)); ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
