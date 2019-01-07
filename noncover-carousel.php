
<style>


#l_btn{
    height:690px;
    /* position: relative; */
}
#r_btn{
    height:690px;
    /* position: relative; */
}
#showpic{
    height:690px;
    overflow:hidden;
    /* position:relative; */
    /* border-radius: 40px; */
}
#btmenu_pic{
    margin:0 auto;
}
#p1,#p2{
    height:690px;
    /* background-color: rgb(157, 226, 148); */
    position: relative;
    background-repeat:no-repeat;
    background-position: center;
}
#p2{
    top:-690px;
    left:880px;
    display: none;
}
#cover{
    width:100%;
    height:100%;
    background-color: rgba(0,0,0,0.9);
    position: fixed;
    top: 0;
    left:0;
    display: none;
}
#show{
    width:800px;
    height: 600px;
    background-color:#FFF;
    background-repeat: no-repeat;
    margin: 50px auto;
    position:fixed;
    left:50%;
    top: 100px;
    margin: 0 0 0 -400px;
    display:none;
}
.p_list{
    /* width:180px; */
    height:120px;
    display: inline-block;
    margin: 2.5% 0px 0px 15px;
    box-shadow: 5px 5px #000;
}
.p3_list{
    width:180px;
    height:120px;
    display: inline-block;
    margin: 2.5% 0px 0px 15px;
    box-shadow: 5px 5px #000;
}
.pic_btn{
    width:80px;
    height:60px;
    display: inline-block;
    background-size: 100%;
    background-repeat: no-repeat;
    margin: 12px 10px 0 8px;
    position: relative;
    left: 8px;
    box-shadow: 5px 5px #000;
}
.pcover{
    width:100%;
    height:100%;
    cursor: pointer;
}
.pcover:hover{
    background-color: rgba(0,0,0,0.8);
    box-shadow: 5px 5px #00F;
}
#mmenu_btn{
    height:30px;
    margin:0 auto;
}
.btn_list{
    width:30px;
    height:30px;
    background-color:#00F;
    display: inline-block;
    margin: 0 15px 0 0;
    text-align: center;
    line-height: 30px;
    position: relative;
    left: 40px;
    border-radius: 5px;
    cursor: pointer;
}
.btn_list:hover{
    background-color: blue;
}
.bcover{
    border-radius: 5px;
    cursor: pointer;
}
.bcover:hover{
    background-color: #0F0;
}
</style>
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室 作品集</h2><br>
    <h4>這頁面是 我自己使用 JQuery 撰寫的 照片輪播功能</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <br>
                    <p>
                    說明：此輪播頁面, 程式採用JQuery方式. <br>
                    1. 一開始直接隨機顯示一張照片, 每五秒自動顯示下一張照片, 從右邊滑動進來.<br>
                    2. 按左邊粉紅色區域, 下一張照片會從右邊滑動進來. 按右邊粉紅色區域, 上一張照片從左邊滑動進來.<br>
                    3. 中間按鈕選單, 按了按鈕顯示區選定的圖片會從右邊滑入.<br>
                    4. 這頁面加上下方圖片選單, 按了圖片顯示區會從左邊滑入.
                    </p>
                <div class="row">
                    <div id="l_btn" class="col-1 bg-primary rounded">按這區域可以更換下一張圖案</div>
                    <div id="showpic" class="col-10 ">
                        <div id="p1"></div>
                        <div id="p2"></div>
                    </div>
                    <div id="r_btn" class="col-1 bg-primary rounded">按這區域可以更換上一張圖案</div>
                </div>
                <br>
                <div id="mmenu"  class="col-10 offset-1 align-self-center">
                        <div id="mmenu_btn"></div>
                    </div>
                    <div id="btmenu" class="col-10 offset-1">
                        <div id="btmenu_pic"></div>
                    </div>
            </div>
        </div>
    </div>
</div>