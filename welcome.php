<?php
    $today = date("Y-m-d");
    // $today = "2019-01-29"; 測試用
    $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_date = '".$today."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq";
    $ro = mysqli_query($link,$sql);
    $num = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);

?>

<Style>
img:hover{
    cursor:pointer;
    /* filter: contrast(4); */
    /* filter: brightness(3); */
    /* filter: grayscale(50%); */
    /* opacity:0.5; */
    /* filter: blur(3px); */
  filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.9));
}

#modalimg{
    background-color:rgba(0,0,0,0.9);
}

#movie:hover{
    cursor:pointer;
}

</Style>

<body onload="ShowTime()">

<!-- 本站歡迎畫面 -->

<div class="myheadbg text-white container col-lg-8 text-shadow-bu1 text-center">
        <h4>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h4>
</div>


<div class="container col-lg-8 myconbg">
<script async src="https://cse.google.com/cse.js?cx=006257513004862033964:umlxzsbfuk8"></script>
<div class="gcse-search"></div>
    <div class="row">
        <div class="col-lg-9">
            <div class="bg-white text-dark mycol">
                <h4>嗨! 你好，</h4>
                <h5>
                <p>我是 吳偉召 (Roger Wu)，目前正在 勞動部勞動力發展署北基宜花金馬分署－泰山職訓中心 PHP 資料庫網頁設計班 (第二期)，就讀學習 PHP 資料庫網頁設計。</p>
                <p>這個網站是我在課程中所學到的一些東西，目前用來練習設計網站的一些功能，並放置我的履歷及一些作品。</p>
                <p>整個網站設計前端主要使用 Bootstrap 及 JQuery 設計，後端使用 PHP 及 MySQL 資料庫架構。</p>
                <p>本網站尚未完全實現RWD模式，某些位置有錯位問題，請使用Chrome瀏覽器全螢幕瀏覽。</p>
                <p>歡迎您測試與瀏覽，並不吝指教。(目前尚有些驗證尚未做得很完善，請高手們指導，感謝。)</p>
                </h5>
                <br>
                <p>網站整個 Source Code 放置於 我的 <a href="https://github.com/weayzehoa/WeayZehoa-CodingLab"> GitHub </a> 上。</p>
            </div>

            <div class="row">
                <div class="col-md-6 myconbg margin_b10">
                    <div class="bg-white br10_pa10 text-center">
                        <p><i class="fas fa-images text-dark"></i>&nbsp;<a href="?g=pf_ps">Photoshop作品</a>&nbsp;<i class="fas fa-images text-dark"></i></p>
                        <div><a href="?g=pf_ps"><img width="100%" height="100%" src="img/resume/photoshop/p2.jpg"></a></div>
                    </div>
                </div>
                <div class="col-md-6 myconbg margin_b10">
                    <div class="bg-white br10_pa10 text-center">
                        <p class="text-center"><i class="fas fa-images text-dark"></i>&nbsp;<a href="?g=pf_il">illustrator作品</a>&nbsp;<i class="fas fa-images text-dark"></i></p>
                        <div><a href="?g=pf_il"><img width="100%" height="100%" src="img/resume/illustrator/i3.png"></a></div>
                    </div>
                </div>
                <div class="col-md-6 myconbg margin_b10">
                    <div class="bg-white br10_pa10 text-center">
                        <p><i class="fas fa-archive text-dark"></i>&nbsp;<a href="?g=pf_pr">產品開發作品</a>&nbsp;<i class="fas fa-archive text-dark"></i></p>
                        <div><a href="?g=pf_pr"><img width="100%" height="100%" src="img/resume/product/penpaper.jpg"></a></div>
                    </div>
                </div>
                <div class="col-md-6 myconbg margin_b10 text-center">
                    <div class="bg-white br10_pa10 text-center">
                        <p id="movie"><i class="fab fa-youtube"></i>&nbsp;<span class="text-primary">新聞採訪報導</span>&nbsp;<i class="fab fa-youtube"></i></p>
                        <div><iframe width="100%" height="315" src="https://www.youtube.com/embed/9PFhlIqJNcc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                </div>
            </div>
        </div>

<!-- 
            <div  class="bg-white text-dark mycol">第一欄第三列</div>
            
            <div  class="bg-white text-dark mycol">第一欄第四列</div>
            <div  class="bg-white text-dark mycol">第一欄第五列</div>

            
            <div class="row">
                <div class="col-6 myconbg" >
                    <div class="bg-white br10_pa10">
                        第一欄第四列第一欄
                    </div>
                </div>
                <div class="col-6 myconbg" >
                    <div class="bg-white br10_pa10">
                        第一欄第四列第二欄
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第二列第一欄
                    </div>
                </div>
                <div class="col-4 myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第二列第二欄
                    </div>
                </div>
                <div class="col-4 myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第二列第三欄
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3  myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第四列第一欄
                    </div>
                </div>
                <div class="col-3  myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第四列第二欄
                    </div>
                </div>
                <div class="col-3  myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第四列第三欄
                    </div>
                </div>
                <div class="col-3  myconbg" >
                    <div class="bg-white br10_pa10">
                    第一欄第四列第三欄
                    </div>
                </div>
            </div> -->




        <div class="col-lg-3">
            <!-- <div class="bg-white mycol" >月曆預定地</div>
            <div class="bg-white mycol" >數位時鐘預定地</div>
            <div class="bg-white mycol" >類比時鐘預定地</div>
            <div class="bg-white mycol" >第二欄第三列</div>
            <div class="bg-white mycol" >第二欄第三列</div>
            <div class="bg-white mycol" >第二欄第三列</div>
            <div class="bg-white mycol" >訪客數</div> -->
            <div class="bg-white mycol">
                <form id="form1" runat="server">
                    <div id="showtime"></div>
                </form>
            </div>
            <div class="bg-white mycol">
                    <div id="showtime"><audio class="col-12" src="./audio/ms.mp3" autoplay loop controls>您的瀏覽器不支援HTML5 Audio標籤</audio></div>
            </div>
            <div class="bg-white mycol">
                    <div class="text-center"><i class="fas fa-calendar-alt"></i><a href="?g=course">&nbsp;PHP 資料庫網頁設計班課程&nbsp;</a><i class="fas fa-calendar-alt"></i></div>
                    <hr>
                    <?php   if($num >=1){
                            do { ?>

                                <div>今日課程：<span class="text-primary"><?=$row['c_n_name']?></span></div>
                                <div>授課老師：<span class="text-primary"><?=$row['c_t_name']?></span>　時數：<span class="text-primary"><?=$row['c_num']?></span></div>
                                <hr>

                    <?php   }while ($row = mysqli_fetch_assoc($ro));
                            }else{ ?>
                                <div class="text-danger">今日放假日，無課程</div>
                    <?php   } ?>

                </form>
            </div>
            <div class="bg-white mycol" >
                <p class="text-center"><i class="fas fa-shopping-cart"></i>&nbsp;<a href="?g=gb">團購系統輪播</a>&nbsp;<i class="fas fa-shopping-cart"></i></p>
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
            <div class="bg-white mycol" ><?php $ip = getip(); echo $ip; ?></div>
            <div class="bg-white mycol" ><?php echo "你的瀏覽器資訊：<br>".$_SERVER['HTTP_USER_AGENT']; ?></div>
        </div>
    </div><br>
</div>


<div class="modal fade " id="modalimg" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div id="modal_imgshow" class="modal-body"><iframe width='720' height='480' src='' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
	</div>
</div>	
