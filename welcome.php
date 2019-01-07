<body onload="ShowTime()">

<!-- 本站歡迎畫面 -->

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <form id="form1" runat="server">
            <div id="showtime"></div>
        </form>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-9">
            <div class="bg-white text-dark mycol-1">

            <h4>嗨! 你好，</h4>
            <h5>
            <p>我是 吳偉召 (Roger Wu)，目前正在 勞動部勞動力發展署北基宜花金馬分署－泰山職訓中心 PHP 資料庫網頁設計班 (第二期)，就讀學習 PHP 資料庫網頁設計。</p>
            <p>這個網站是我在課程中所學到的一些東西，目前用來練習設計網站的一些功能，並放置我的履歷及一些作品。</p>
            <p>整個網站設計前端主要使用 Bootstrap 及 JQuery 設計，後端使用 PHP 及 MySQL 資料庫架構。</p>
            <p>歡迎您測試與瀏覽，並不吝指教。(目前尚有些驗證尚未做得很完善，請高手們指導，感謝。)</p>
            </h5>
            <br>
            <p>目前進度：個人履歷.</p>
            <br>
            <p>網站整個 Source Code 放置於 我的 <a href="https://github.com/weayzehoa/WeayZehoa-CodingLab"> GitHub </a> 上。有興趣的朋友可以自行參考。</p>
            <br>
            <p></p>
            <br>
            
            </div>
            <!-- <div class="bg-white text-dark mycol-1">第一欄第二列</div>
            <div  class="bg-white text-dark mycol-1">第一欄第三列</div>
            <div  class="bg-white text-dark mycol-1">第一欄第四列</div>
            <div  class="bg-white text-dark mycol-1">第一欄第五列</div> -->

        </div>



        <div class="col-3">
            <!-- <div class="bg-white mycol-2" >月曆預定地</div>
            <div class="bg-white mycol-2" >數位時鐘預定地</div>
            <div class="bg-white mycol-2" >類比時鐘預定地</div>
            <div class="bg-white mycol-2" >第二欄第三列</div>
            <div class="bg-white mycol-2" >第二欄第三列</div>
            <div class="bg-white mycol-2" >第二欄第三列</div>
            <div class="bg-white mycol-2" >訪客數</div> -->

            <div class="bg-white mycol-2" >
                <p class="text-center">團購系統輪播</p>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <a href="?g=gb"><img class="d-block w-100 " src="./img/gbuy/gbuy.png?auto=yes" alt="Demo Pictures"></a>
                            </div>
                        <?php
                            $sql = "SELECT * from gbuy where g_del = 0 and g_close = 1";
                            $ro5 = mysqli_query($link,$sql);
                            $row5 = mysqli_fetch_assoc($ro5);
                            do{
                                ?>
                            <div class="carousel-item">
                                <a href="?g=gbv&seq=<?=$row5['g_seq']?>"> <img class="d-block w-100 " src="./img/gbuy/<?=$row5['g_pic']?>" alt="Demo Pictures"> </a>
                            </div>
                        <?php
                            }while($row5 = mysqli_fetch_assoc($ro5)); ?>
                        </div>
                    </div>
            </div>


            <div class="bg-white mycol-2" ><?php $ip = getip(); echo $ip; ?></div>
            <div class="bg-white mycol-2" ><?php echo "你的瀏覽器資訊：<br>".$_SERVER['HTTP_USER_AGENT']; ?></div>
        </div>
    </div><br>
</div>
