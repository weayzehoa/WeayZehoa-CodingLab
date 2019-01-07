<?php
    if(!empty($_SESSION)){
        if($_SESSION['permit'] == 2){
            ?><script>alert('訪客或唯讀帳號無法使用本團購系統, 請先註冊或登入一般會員.');</script><?php
            ?><script>document.location.href="?g=login";</script><?php    
        }
    }else{
        ?><script>alert('使用本團購系統, 請先登入會員');</script><?php
        ?><script>document.location.href="?g=login";</script><?php
    }

        // 取出會員的對應序號
        $sql = "SELECT * from player where p_id = '".$_SESSION['id']."' and p_del = 0";
        $ro = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($ro);
        
        // 計算會員參加的團購數與總金額
        $sql = "SELECT * from gbuy_buyer where g_b_buyer = '".$row['p_seq']."' and g_b_del = 0";
        $ro1 = mysqli_query($link,$sql);
        $num1 = mysqli_num_rows($ro1);
        $row1 = mysqli_fetch_assoc($ro1);
        $total_price ='';
        do{
            $total_price = (int)$total_price + (int)$row1['g_b_total'];
        }while($row1 = mysqli_fetch_assoc($ro1));
        
        // 計算會員發起進行中的團數
        $sql = "SELECT * from gbuy where g_p_id = '".$row['p_seq']."' and g_close = 1 and g_del = 0";
        $ro3 = mysqli_query($link,$sql);
        $num3 = mysqli_num_rows($ro3);

        // 計算會員發起關閉中的團數
        $sql = "SELECT * from gbuy where g_p_id = '".$row['p_seq']."' and g_close= 2 and g_del= 0";
        $ro4 = mysqli_query($link,$sql);
        $num4 = mysqli_num_rows($ro4);

        // 計算會員發起進行中的團總金額
        $total_incoming = '';
        $sql = "SELECT * from gbuy a, gbuy_buyer b where a.g_p_id = '".$row['p_seq']."' and a.g_seq = b.g_b_pno and b.g_b_del = 0";
        $ro5 = mysqli_query($link,$sql);
        $row5 = mysqli_fetch_assoc($ro5);
        do{
            $total_incoming = (int)$total_incoming + (int)$row5['g_b_total'];
        }while($row5 = mysqli_fetch_assoc($ro5));

        // 抓取團購參與人數
        function get_join($gseq){
            $link = mysqli_connect("localhost", "root", "", "codinglab");
            mysqli_query($link, "set names utf8");
            $sql = "SELECT * from gbuy_buyer where g_b_pno = '".$gseq."' and g_b_del = 0";
            $ro = mysqli_query($link,$sql);
            $num = mysqli_num_rows($ro);
            return $num;
        }
        
?>


<!-- 本站歡迎畫面 -->
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>會員團購列表, 本系統是我的期末作業, 僅供瀏覽操作參考, 並無真正的產品團購.</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <h4>你目前共參加 <?=$num1?> 個團購，共計 <?=$total_price?> 元。你目前共發起 <?=$num3+$num4?> 個團購，關閉中 <?=$num4?> 團，進行中 <?=$num3?> 團，預計進行中的團購收入 <?=$total_incoming?> 元。</h4>
            </div>
        </div>
    </div>
    <?php 
        // 取出會員參加團購數量及資料
        $sql = "SELECT * from gbuy a, gbuy_buyer b where b.g_b_pno = a.g_seq and b.g_b_buyer = '".$row['p_seq']."' and a.g_close = 1 and b.g_b_del=0";
        $ro2 = mysqli_query($link,$sql);
        $num = mysqli_num_rows($ro2);
        $row2 = mysqli_fetch_assoc($ro2);
        $p = get_player();
        if ($num>=1){
    do {
        ?>
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <div class="row">
                    <div class="col-3 align-self-center">
                        <div style="border-radius:10px; max-height:250px" class="shadow bg-white text-center text-primary align-self-center">
                            <div><a href="?g=gbnew&add=1"><img style="width:80%; height:80%" src="img/gbuy/<?=$row2['g_pic']; ?>"></a></div>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <table class="table table-bordered">
                            <tr>
                            <td class="table-active">團名</td>
                            <td colspan="2"><?=$row2['g_name']?></td>
                            <td class="table-active">產品名稱</td>
                            <td colspan="2"><?=$row2['g_pname']?></td>
                            </tr>
                            <tr>
                                <td class="table-active">發起人</td>
                                <td><?php for ($i = 0; $i < count($p) ;$i++) {
            if ($row2['g_p_id']==$p['seq'][$i]) {
                echo $p['name'][$i];
            }
        } ?></td>
                                <td class="table-active">起始日</td>
                                <td ><?=$row2['g_stime']?></td>
                                <td class="table-active">截止日</td>
                                <td ><?=$row2['g_endtime']?></td>
                            </tr>
                            <tr>
                            <td class="table-active">市價</th>
                            <td><?=$row2['g_oprice']?></td>
                            <td class="table-active">團購價</td>
                            <td><?=$row2['g_gprice']?></td>
                            <td class="table-active">特別價</td>
                            <td><?=$row2['g_sprice']?></td>
                            </tr>
                            <tr>
                            <td class="table-active">剩餘數量</th>
                            <td><?=$row2['g_rnum']?></td>
                            <td class="table-active">參與人數</td>
                            <td><?= get_join($row2['g_seq'])?> 人</td>
                            <td class="table-active">狀態</td>
                            <td>
                                <?php if ($row2['g_close']==1) {
            echo '進行中';
        } else {
            echo'關閉';
        } ?>
                            </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-2 align-self-center">
                        <div class="text-center">我的訂購資訊</div>
                        <hr>
                        <div class="row">
                            <div class=" col-5 ">數量</div>
                            <div class=" col-6 text-right"><?=$row2['g_b_num']?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">單價</div>
                            <div class="col-6 text-right"><?=$row2['g_b_price']?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">總計</div>
                            <div class="col-6 text-right"><?=$row2['g_b_total']?></div>
                        </div>
                        <br>
                        <div class="row">
                            <button type="button" class="col-5 offset-1 form-control bg-primary text-warning" onclick="order_change('<?=$row2['g_seq']?>','<?=$_SESSION['id']?>','<?=$row2['g_b_num']?>')">改數量</button>
                            <button id="gb_cancel" type="button" class="col-5 form-control bg-primary text-warning" onclick="order_cancel('<?=$row2['g_seq']?>','<?=$_SESSION['id']?>')">取消</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    } while($row2 = mysqli_fetch_assoc($ro2));} ?>

</div>
<br>