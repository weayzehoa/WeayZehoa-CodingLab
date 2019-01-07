
<style>
body{
    /* background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),url(img/bg.jpg);  */
}

#resume_menu{
    position:fixed;
    background-color:rgb(242, 243, 247);
}

#resume_about{
}

.resume_padding{
    padding-top:70px;
}

.about_box1{
    height:160px;
    border-bottom:5px solid #007afb;
}
.about_box2{
    height:160px;
    border-bottom:5px solid #dc3545;
}
.about_box3{
    height:160px;
    border-bottom:5px solid #18a1b8;
}
.about_box4{
    height:160px;
    border-bottom:5px solid #ffc107;
}


</style>

<div id="gotop_btn" class="d-none">
    <a type="button" class="col-md-1 offset-10 btn fixed-bottom btn-primary" href="#">Go Top</a>
</div>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

<div class="col-2 offset-2 vh-100 border-right border-primary" id="resume_menu" >
<a href="index.php"><img src="img/logo.png"></a><a type="button" class="btn-primary offset-1" href="index.php">回首頁</a></a><a type="button" class="btn-primary offset-1" href="?menu=admin&g=admin">後台管理</a>
    <br><br>
    <div class="rounded-circle text-center">
        <img class="rounded-circle shadow"  width="75%" src="./img/resume/resume.png">
    </div>
    <br>
    <div>
        <h4 class="text-center">吳偉召 (Roger Wu)</h4>
        <h6 class="text-center text-dark">PHP Website Designer</h6>
    </div>
    <br>
    <div>
    <nav  id="myScrollspy" class="text-center">
      <ul class="nav nav-pills flex-column">

         <li class="nav-item">
          <a class="nav-link active" href="#resume_about">關於我</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#resume_professional">專業</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#resume_skills">技能</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#resume_experience">經歷</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#resume_portfolio">作品</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#resume_introduction">自我推薦</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Section 4</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
          </div>
        </li> -->
      </ul>
    </nav>
    </div>
    <br><br><br>
    <div style=" font-size:0.5em" class="text-center">
    &copy; <?=date("Y")?> WeayZehoa Coding Lab. All rights reserved.<br>
    請使用電腦版 <a href="https://www.google.com/chrome/">Chrome</a> 全螢幕瀏覽本網站.</p>
    </div>
</div>



<div id="resume_about" class="container resume_padding vh-100 col-6 offset-4 bg-white text-dark text-center">
        <div><img width="70%" src="img/resume/about.jpg" alt=""></div>
        <div><h3><i class="far fa-envelope text-primary"></i>：<a href="mailto:weayzehoa@gmail.com">weayzehoa@gmail.com</a></h3></div>
        <div><h3><i class="fas fa-map-marker-alt text-primary"></i>：新北市, 新店區</h3></div>
        <br>
        <p class="col-10 offset-1 text-left">自從在大學時期開始接觸電腦時，我非常熱愛接觸任何與電腦相關的訊息，並學習任何與電腦相關的知識，包括: 硬體設備、作業系統、程式語言、網路及各種應用軟體，加上自身電子電機科系，對於電子電路並不陌生，因此奠下往後在資訊產業的工作基礎。</p>
        <br>
        <div class="col-10 offset-1">
        <div class="row">
            <div  class="col-3">
                <div class="col-12 shadow about_box1"><br><h1><i class="far fa-lightbulb text-primary"></i></h1><br><h5>產品開發</h5></div>
            </div>
            <div class="col-3">
                <div class="col-12 shadow about_box2"><br><h1><i class="fas fa-network-wired text-danger"></i></h1><br><h5>網路管理</h5></div>
            </div>
            <div class="col-3">
                <div class="col-12 shadow about_box3"><br><h1><i class="fab fa-php text-info"></i></h1><br><h5>PHP程式設計</h5></div>
            </div>
            <div class="col-3">
                <div class="col-12 shadow about_box4"><br><h1><i class="fas fa-code text-warning"></i></h1><br><h5>網頁設計</h5></div>
            </div>
            </div>
        </div>
    </div>
    <br>
</div>


<div id="resume_professional" class="container vh-100 col-6 offset-4 bg-white text-dark">
    <div id="resume_professional_1" class="vh-40 bg-white">
        <h1>professional_1 Section</h1>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
    </div>      
    <div id="resume_professional_2" class="vh-40 bg-danger">         
        <h1>professional_2 Section</h1>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
    </div>      
    <div id="resume_professional_3" class="vh-40 bg-warning">         
        <h1>professional_3 Section</h1>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
    </div>      
</div>


<div id="resume_skills" class="container vh-100 col-6 offset-4 bg-white text-dark">
    <div>
    <div class="row">
        <div id="resume_skills_1" class="col-6 vh-50 bg-info">         
            <h1>resume_skills_1 Section</h1>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        </div>      

        <div id="resume_skills_2" class="col-6 vh-50 bg-primary">         
            <h1>resume_skills_2 Section</h1>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        </div>      

        <div id="resume_skills_3" class="col-6 vh-50 bg-danger">         
            <h1>resume_skills_3 Section</h1>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        </div>      

        <div id="resume_skills_4" class="col-6 vh-50 bg-warning">         
            <h1>resume_skills_4 Section</h1>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
            <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        </div>
    </div>
    </div>
</div>


<div id="resume_experience" class="container vh-100 col-6 offset-4 bg-white text-dark">
<div id="resume_experience_1" class="bg-danger vh-100">         
        <h2>經歷</h2>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
      </div>      
</div>

<div id="resume_portfolio" class="container vh-100 col-6 offset-4 bg-white text-dark">
<div id="resume_portfolio_1" class="vh-40 bg-primary">         
        <h2>產品開發</h2>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
    </div>      
    <div id="resume_portfolio_2" class="vh-30 bg-danger">         
        <h2>網站管理</h2>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
    </div>      
    <div id="resume_portfolio_3" class="vh-30 bg-warning">         
        <h2>網站設計</h2>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
        <p>Try to scroll this section and look at the navigation list while scrolling!</p>
    </div>      
</div>

<div id="resume_introduction" class="container vh-100 col-6 offset-4 bg-white text-dark">
    <div class="col-10 offset-1">
        <div style="margin:40px">　</div>
        <h2 class="text-center"><u>自我推薦</u></h2>
          <hr>
          <p class="text-left">
            自從在大學時期開始接觸電腦時，我非常熱愛接觸任何與電腦相關的訊息，並學習任何與電腦相關的知識，包括: 硬體設備、作業系統、程式語言、網路及各種應用軟體，加上自身電子電機科系，對於電子電路並不陌生，因此奠下往後在資訊產業的工作基礎。</p>
          <p class="text-left">
            首先感謝網路家庭國際股份有限公司，在我退伍後，提供給我第一份工作，在這兩年中，我學習到網路佈建規劃管理、Server建置、網站架設及網頁設計，因緣際會在平板電腦 (早期2002年 微軟推行的) 推出時，前雇主億燿企業股份有限公司 (電腦繪圖板製造商) 吳元亨總經理，熱情邀約，提供給我16年的工作機會至今，雖然公司停業資遣所有員工，但在這十六年工作中，我從第一份工作得到的經驗，管理公司的電腦設備至Server建置、網路規畫管理及網站皆是我一手包辦。</p>
          <p class="text-left">
            除了電腦及網路管理的工作，也開始接觸產品開發並兼任機構工程師，雖然我不會寫程式，不會電路Layout，也不會畫3D機構圖，但憑藉著對資訊產品的熱誠及大學時期學的電子工程知識，我學會如何撰寫專利及分析、規劃產品、機械結構、生產製造、品質測試、包裝設計及說明書撰寫排版、產品行銷、技術支援，及製作產品介紹影片。</p>
          <p class="text-left">
            有幸更進一步與美國半導體廠Atmel (已被MicroChip併購) 英國團隊合作，共同為HP開發電容筆ODM案，此案子過程獲益良多，除了內部跨部門溝通，我司負責結構設計及生產製造，還需配合外部公司Atmel設計電路、控制晶片及韌體，共同一起順利完成此案，並替公司帶來往後2年共22萬隻電容筆的訂單。</p>
          <p class="text-left">
            資遣離職後，審視自己過去的工作及對網路管理與網頁設計的興趣，我決定繼續學習更多網頁設計相關技能，經過筆試及口試，得以率取了勞動署北基宜花金馬分署的PHP資料庫網頁設計班，進而學習PHP、JavaScript程式設計、MySQL資料庫、PhotoShop、Illstrator、JQuery、Bootstrap及更多的前後端網頁設計技巧。</p>
          <p class="text-left">
            經過十八年工作歷練及半年來的網頁程式設計學習，本人是一個全方位的員工，不論在任何的工作職位，皆能夠完全適應團隊合作，即使在較少的資源亦能夠獨立完成工作。</p>
          <p class="text-left">　</p>
          <h2 class="text-center"><u>未來展望</u></h2>
          <hr>
          <p class="text-left">
            感謝您付出寶貴時間撥空瀏覽我的履歷，未來希望能夠善用自己的知識技能及經驗於 貴公司貢獻一己之力，並透過貴公司的專業訓練與文化的薰陶使我成為更為專業之人員。當然不斷的自我學習與公司一起成長也是我的心願，希望貴公司能給予我這樣的一個機會。</p>
    </div>
</div>


      





<?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php");
?>

<script>
$('#myfooter').addClass('d-none');


// 監控Window捲軸位置 超過一個範圍顯示某個按鈕
$(window).scroll(function(){
    if($(window).scrollTop()>500){
        $('#gotop_btn').removeClass('d-none');
    }
    if($(window).scrollTop()<100){
        $('#gotop_btn').addClass('d-none');
    }
})

</script>
