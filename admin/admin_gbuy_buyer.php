<?php
check_permission ();

?>

<!-- 後台管理系統歡迎畫面 -->
<div class="myheadbg text-white container-fiuld text-shadow-bu1 text-center">
    <h4>本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入)</h4>
</div>

<?php

    $sql = "SELECT * from player a, gbuy b, gbuy_buyer c where c.g_b_buyer = a.p_seq and c.g_b_pno = b.g_seq and c.g_b_del = 0 ";
    $ro3 = mysqli_query($link,$sql);
    $total = mysqli_num_rows($ro3);

    $page_cnt = 10;
    $page_total = ceil($total / $page_cnt);
    $page_now = 1;
    if(!empty($_GET["page"])){
        $page_now = $_GET["page"];
    }
    $page_open = ($page_now - 1) * $page_cnt;
    
    $p1 = $page_now -1;
    $p2 = $page_now +1;

    if($p1 < 1){$p1 = $page_now;}
    if($p2 > $page_total){$p2 = $page_total;}
    
    $sql = "SELECT * from player a, gbuy b, gbuy_buyer c where c.g_b_buyer = a.p_seq and c.g_b_pno = b.g_seq and c.g_b_del = 0 limit ".$page_open.",".$page_cnt;
    $ro2 = mysqli_query($link, $sql);
    $row2 = mysqli_fetch_assoc($ro2);
    
    



    // $row2 = mysqli_fetch_assoc($ro2);
    $no = 1;
?>

<!-- 團購參加者列表 -->
<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
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
                        <div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="?menu=2&g=gbuy_buyer&page=<?=$p1?>">上一頁</a></li>
                                <?php for ($i=1;$i<=$page_total;$i++){
                                        if ($i == $page_now) {
                                            echo'<li class="page-item"><a class="page-link text-white bg-primary" href="?menu=2&g=gbuy_buyer&page='.$i.'">'.$i.'</a></li>';
                                        }else{
                                            echo'<li class="page-item"><a class="page-link" href="?menu=2&g=gbuy_buyer&page='.$i.'">'.$i.'</a></li>';
                                        }
                                    }?>
                                <li class="page-item"><a class="page-link" href="?menu=2&g=gbuy_buyer&page=<?=$p2?>">下一頁</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
