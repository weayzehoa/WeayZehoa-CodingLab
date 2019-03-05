<?php
$sql ="SELECT * FROM player a, player_sex b, player_permission c WHERE a.p_del = 0 and a.p_sex = b.p_s_seq and a.p_permit = c.p_p_seq and p_id = '".$_SESSION["id"]."'";
// $sql = "SELECT * from player where p_id = '".$_SESSION["id"]."'";
$ro = mysqli_query($link,$sql) or die("查詢語法錯誤".$sql);
$row = mysqli_fetch_assoc($ro);
?>
<body onload="ShowTime()">
<!-- 後台管理系統歡迎畫面 -->
    <div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>歡迎來到 WeayZehoa Coding Lab. 後台管理，本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入參觀)</h4>
    </div>

    <div class="container col-8 myconbg">
        <div class="row">
            <div class="col-9">
                <div class="bg-white text-dark mycol">
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
                    <br>
                </div>

            
                <div class="row">
                <div class="col-6 myconbg margin_b10" >
                    <div class="bg-white br10_pa10">
                        <p>網站誌事一：</p>
                        <p>2019/1/12：作品-illustrator作品.</p>
                        <p>2019/1/12：作品-Photoshop作品.</p>
                        <p>2019/1/12：調整版型.</p>
                        <p>2019/1/11：作品-產品企劃開發.</p>
                        <p>2019/1/10：實驗室-留言板.</p>
                        <p>2019/1/9：履歷完成.</p>
                        <p>2019/1/6：履歷建置.</p>
                        <p>2019/1/6：調整版型.</p>
                        <p>2019/1/5：期末作業-團購系統完成.</p>
                        <p>2018/12/29：期末作業-團購系統開始.</p>
                        <p>2018/12/27：實驗室-輪播頁面.</p>
                        <p>2018/12/26：網站前後台整合在一起.</p>
                        <p>2018/12/23：修改網站版型架構.</p>
                        <p>2018/12/22：會員管理系統建立.</p>
                        <p>2018/12/16：網站開始構建, 前後台各自獨立.</p>
                    </div>
                </div>
                <div class="col-6 myconbg margin_b10" >
                    <div class="bg-white br10_pa10">
                        <p>網站誌事二：</p>
                        <p>2019/2/12：修正時差問題</p>
                        <p>2019/2/12：更新課程資料</p>
                        <p>2019/1/26：修正後台團購管理-參與者管理分頁位置</p>
                        <p>2019/1/26：修正首頁-照片尺寸</p>
                        <p>2019/1/26：修正實驗室-留言板重複資料BUG</p>
                        <p>2019/1/22：首頁-新增課程資料及預訂作品版面</p>
                        <p>2019/1/21：實驗室-新增 背景動畫測試</p>
                        <p>2019/1/19：履歷-新增 WOW.JS 動畫</p>
                        <p>2019/1/19：期末作業-課程查詢系統修正(假日無課程BUG)</p>
                        <p>2019/1/18：期末作業-課程查詢系統前台功能完成</p>
                        <p>2019/1/14：期末作業-課程查詢系統後台功能</p>
                        <p>2019/1/13：期末作業-課程查詢系統開始</p>
                        <p>2019/1/13：實驗室-無登入線上客服系統.</p>
                        <p>2019/1/12：期末作業-建置參與者管理分頁及選單調整</p>
                        <p>2019/1/12：實驗室-時鐘</p>
                    </div>
                </div>
            </div>

                <!-- <div class="bg-white text-dark mycol">第一欄第二列</div>
                <div class="bg-white text-dark mycol">第一欄第三列</div>
                <div class="bg-white text-dark mycol">第一欄第四列</div>
                <div class="bg-white text-dark mycol">第一欄第五列</div> -->
            </div>

            <div class="col-3">
                <!-- <div class="bg-white mycol">月曆預定地</div>
                <div class="bg-white mycol">數位時鐘預定地</div>
                <div class="bg-white mycol">類比時鐘預定地</div>
                <div class="bg-white mycol">第二欄第三列</div>
                <div class="bg-white mycol">第二欄第三列</div>
                <div class="bg-white mycol">第二欄第三列</div>
                <div class="bg-white mycol">訪客數</div> -->
                <div class="bg-white mycol">
                    <form id="form1" runat="server">
                        <div id="showtime"></div>
                    </form>
                </div>
                <div class="bg-white mycol">
                    <?php $ip = getip(); echo $ip; ?>
                </div>
                <div class="bg-white mycol">
                    <?php echo "你的瀏覽器資訊：<br>".$_SERVER['HTTP_USER_AGENT']; ?>
                </div>
            </div>
        </div><br>
    </div>