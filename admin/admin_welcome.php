<?php
$sql ="SELECT * FROM player a, player_sex b, player_permission c WHERE a.p_del = 0 and a.p_sex = b.p_s_seq and a.p_permit = c.p_p_seq and p_id = '".$_SESSION["id"]."'";
// $sql = "SELECT * from player where p_id = '".$_SESSION["id"]."'";
$ro = mysqli_query($link,$sql) or die("查詢語法錯誤".$sql);
$row = mysqli_fetch_assoc($ro);
?>
<body onload="ShowTime()">
<!-- 後台管理系統歡迎畫面 -->
    <div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入)</h4>
        <form id="form1" runat="server">
            <div id="showtime"></div>
        </form>
    </div>

    <div class="container col-8 myconbg">
        <div class="row">
            <div class="col-9">
                <div class="bg-white text-dark mycol-1">
                    <h4>嗨!
                        <?=$row["p_nick"]?>，你好</h4>
                    <h5>
                        目前您的權限：
                        <?=$row["p_p_permit"]?>，
                        <?php if($row["p_permit"]==1){echo "可以做任何的新增修改刪除的動作.";} if($row["p_permit"]==2){echo "不能做任何的新增修改刪除的動作.";} ?>
                        <p>後臺主要用來控制前台的資料庫功能（除了新增、修改、搜尋比前台多了刪除功能）</p>
                        <p>歡迎您測試與瀏覽，並不吝指教。(目前尚有些驗證尚未做得很完善，請高手們指導，感謝。)</p>
                    </h5>
                    <br>
                    <p>目前進度：期末作業－團購系統。</p>
                    <br>
                    <p>網站整個 Source Code 放置於 我的 <a href="https://github.com/weayzehoa/WeayZehoa-CodingLab"> GitHub </a>
                        上。有興趣的朋友可以自行參考。</p>
                    <br>
                    <p></p>
                    <br>
                </div>
                <!-- <div class="bg-white text-dark mycol-1">第一欄第二列</div>
                <div class="bg-white text-dark mycol-1">第一欄第三列</div>
                <div class="bg-white text-dark mycol-1">第一欄第四列</div>
                <div class="bg-white text-dark mycol-1">第一欄第五列</div> -->
            </div>

            <div class="col-3">
                <!-- <div class="bg-white mycol-2">月曆預定地</div>
                <div class="bg-white mycol-2">數位時鐘預定地</div>
                <div class="bg-white mycol-2">類比時鐘預定地</div>
                <div class="bg-white mycol-2">第二欄第三列</div>
                <div class="bg-white mycol-2">第二欄第三列</div>
                <div class="bg-white mycol-2">第二欄第三列</div>
                <div class="bg-white mycol-2">訪客數</div> -->
                <div class="bg-white mycol-2">
                    <?php $ip = getip(); echo $ip; ?>
                </div>
                <div class="bg-white mycol-2">
                    <?php echo "你的瀏覽器資訊：<br>".$_SERVER['HTTP_USER_AGENT']; ?>
                </div>
            </div>
        </div><br>
    </div>