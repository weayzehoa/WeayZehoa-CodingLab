<?php
        $sql = "SELECT * from service order by s_seq desc";
        $ro = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($ro);
        
    // header("refresh:5"); //刷新頁面 (目前網站架構無法使用此方法)
    // header('location: '.$_SERVER['HTTP_REFERER']);

?>
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h4>無登入客服系統列表</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <p>
                說明：無登入線上客服系統列表. <br>
                1. 用PHP將資料庫資料撈出, 並用表格顯示. <br>
                2. 按下回覆按鈕, 會跳至該筆案件對話框. 與客戶做對話.<br>
                3. 此列表使用JS function, 每5秒更新一次. (目前網站架構無法使用php header()方法)<br>
                </p>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover text-center table-dark">
                            <thead>
                            <tr>
                                <th scope="col">資料序號</th>
                                <th scope="col">案件編號</th>
                                <th scope="col">最後時間</th>
                                <th scope="col">最後回覆帳號</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php do { 
                                if ($row["s_time"] == "0000-00-00 00:00:00"){}else{?>
                                <tr>
                                    <td><?=$row["s_seq"]?></td>
                                    <td><?=$row["s_no"]?></td>
                                    <td><?=$row["s_time"]?></td>
                                    <td><?php if($row["s_id"]=='0'){echo "客戶";}else{echo $row["s_id"];}?></td>
                                    <td><a href="?menu=2&g=olsv_re&to=<?=$row["s_no"]?>">回覆</a></td>
                                </tr>

                            <?php }} while ($row = mysqli_fetch_assoc($ro)); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function fresh_page()
{
window.location.reload();
}
setTimeout('fresh_page()',5000);


</script>