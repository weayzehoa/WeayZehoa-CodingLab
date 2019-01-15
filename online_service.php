
<style>
    body{margin:0;}

    #ols_btn{
        width:50px;
        height:50px;
        border-radius: 25px;
        background-image: url("./img/service_btn.gif");
        background-size: 100%;
        background-position: center center;
        background-repeat: no-repeat;
        transition: all 1s;
        position: fixed;
        top:50%;
        left:50%;
        cursor: pointer;
    }

#ols_btn_talk1{
    width:80px;
    height:100px;
    background-color:#ff9988;
    font-size:20px;
    line-height:100px;
    text-align:center;
    display:block;
    cursor: pointer;
}
#ols_btn_talk2{
    width:80px;
    height:50px;
    background-color:#92ff88;
    font-size:20px;
    line-height:50px;
    text-align:center;
    display:block;
    cursor: pointer;
}
#ols_talk_back_hidden{
    width:550px;
    height:720px;
    /* background-color:#bbfcff; */
    position: fixed;;
    top:80px;
    right:0px;
    overflow: hidden;
}
#ols_talk_back{
    width:550px;
    height:720px;
    background-color:#00f;
    padding:10px;
    position: relative;;
    right:-550px;
    border-radius: 10px;
}
#ols_talk_talk{
    width:530px;
    height:530px;
    background-color:#fff;
}
#ols_t_case{
    width:530px;
    height:30px;
    background-color:rgb(228, 241, 156);
    line-height: 30px;
    
}
#ols_t_talk_back{
    width:530px;
    height:500px;
    background-color:#FFF;
    overflow-y: auto;
}

#ols_t_talk{
    background-color:rgba(0,0,0,0.5);
    padding:5px;
}


#ols_talk_me{
    width:530px;
    height:150px;
    margin:20px auto 0 auto;
    background-color:#e8ffe2;
} 

    #ols_service{
        width:410px;
        height:620px;
        background-color: aqua;
        border: 10px solid crimson;
        position: fixed;
        right:-450px;
        bottom:-650px;
        transform: rotate(0deg);
        display:none;
    }

    #ols_con1{
        width:400px;
        height:450px;
        border:5px solid cornflowerblue;
    }

    #ols_con2{
        width:400px;
        height:150px;
        border:5px solid cornflowerblue;
    }

    #ols_close{
        width:50px;
        height:30px;
        float:right;
        position: relative;
        background-color: white;
        font-size:25px;
        line-height: 25px;
        text-align: center; 
    }
    #ols_close_talk{
        width:50px;
        height:30px;
        float:right;
        position: relative;
        background-color: white;
        font-size:25px;
        line-height: 25px;
        text-align: center; 
    }
    #ols_t_input,#ols_t_btn{
        height:150px;
        width:450px;
        float: left;
    }
    #ols_t_btn{
        width:50px;
    }
    #ols_t_in{
        min-width:430px;
        min-height:130px;
        max-width:430px;
        max-height:130px;
        padding:10px;
        font-size: 20px;
    }
    .ols_user,.ols_admin{
        width:400px;
        min-height:15px;
        position: relative;
    }
    .ols_user{
        background-color:rgb(250, 249, 167);
        left:120px;
        margin: 5px 0 0 0;
    }
    .ols_admin{
        background-color:rgb(228, 225, 225);
        margin: 5px 0 0 0;
    }
    .ols_usermsg{
        width:100%;
        text-align: right;
        color:#1100ff;
        word-wrap:break-word;
    }
    .ols_usertime{
        background-color:darkkhaki;
        text-align: right;
        color:#FF0011;
        font-size:12px;
    }
    .ols_adminmsg{
        background-color:rgb(180, 180, 180);
        width:100%;
        text-align: left;
        color:#f00;
        word-wrap:break-word;
    }
    .ols_admintime{
        background-color:rgb(202, 200, 200);
        /* text-align: right; */
        color:#00f;
        font-size:12px;
        
    }
</style>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>無會員登入線上客服系統. (此功能測試時必須搭配後台使用)</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol vh-80">
                <br>
                    <p>
                    說明：線上客服系統, 程式採用JQuery方式. <br>
                    1. 當按下客服按鈕, 該按鈕會消失, 對話框從右邊滑入.<br>
                    2. 資料庫會建立一筆服務索引(案件編號), 並顯示在後台客服系統頁面上, 通知客服人員.<br>
                    3. 輸入資料後, 會將該資料顯示在對話框中, 並等待客服回覆.<br>
                    4. 當客服回覆後, 對話框中會顯示出該回覆資料.<br>
                    5. 按下結束按鈕, 該對話將會結束, 並清除所有紀錄, 無法再繼續, 除非重新再開一次客服.<br>
                    6. 對話框每三秒更新一次.<br>
                    </p>
            </div>
        </div>
    </div>
</div>

    <button id="ols_btn"></button>
    <div id="ols_talk_back_hidden">
    <div id="ols_talk_back">
        <div id="ols_talk_talk">
            <div id="ols_t_case">案件編號</div>
            <div id="ols_t_talk_back">
                <div id="ols_t_talk">對話內容</div>
            </div>
        </div>
        <div id="ols_talk_me">
            <div id="ols_t_input">
                <textarea id="ols_t_in"></textarea>
            </div>
            <div id="ols_t_btn">
                <div id="ols_btn_talk1">送出</div>
                <div id="ols_btn_talk2">結束</div>
            </div>
        </div>
    </div>
    </div>

    <div id="ols_service">
        <div id="ols_con1">
                <div id="ols_close">關閉</div>
        </div>
        <div id="ols_con2"></div>
    </div>

    <?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php");
?>

<script>
check_talk = 0;
$("#ols_btn").click(function(){
    $.get("./api/online_service_api.php",{"open_service":1},function(data){
        check_talk = 1;
        $("#ols_t_case").html("案件編號："+data);
    });
    $("#ols_talk_back").css("display","block");
    $("#ols_btn").animate({},function(){
        $("#ols_btn").css({
        "width":"0px", 
        "height":"0px",
        "transform":"rotate(-360deg)"
        });
    $("#ols_talk_back").animate({
        right:"0px",
        "opacity":"1",
    },2000);
    setTimeout(function(){
        $("#ols_btn").css("display","none");
    },500);
    });
});

$("#ols_btn_talk2").click(function(){
    $.get("./api/online_service_api.php",{"close_service":1},function(data){
        if(data == "caseclose"){
            $("#ols_t_talk").html("");
        }
    });
    // $("#talk_talk").empty();
    $("#ols_btn").css("display","block");
    $("#ols_btn").animate({},function(){
        $("#ols_btn").css({
        "width":"50px",
        "height":"50px",
        "transform":"rotate(360deg)"
    },2000);
    $("#ols_talk_back").animate({
        right:"-550px",
        "opacity":"0",
    },2000);
    setTimeout(function(){
        $("#ols_talk_back").css("display","none");
        $("#ols_talk_back").css("right","-550px");
        check_talk = 0;
    },2000);
    });
});

$("#ols_btn_talk1").click(function(){
    b_t = $("#ols_t_in").val(); 
    // talk_input = escape(b_t);
    //在JQ抓文字方塊是使用val, 在JS抓文字是用 document.getElementById("xx").innHTML()
    $.post("./api/online_service_api.php",{"mytalk":b_t},function(){
        $("#ols_t_in").val("");
    });
});

function renew(){
    if(check_talk==1){
        $.post("./api/online_service_api.php",{"renew":1},function(data){
            if(data == "dbclose"){
                $("#ols_t_talk").html("");
                tt="";
            }
            else if(data == "dbnodata"){
                $("#ols_t_talk").html("");
                tt="";
            }
            else{
            var tt = eval("("+data+")");
            // tt = JSON.parse(data);
            // alert(tt.total);
            msg="";
            for(i=0;i<tt.total;i++){
                aa="";
                if(tt.to[i]=="0"){ aa = "<div class='ols_user'><div class='ols_usermsg'>"+tt.con[i]+"</div><div class='ols_usertime'>發送時間"+tt.time[i]+"</div></div>" ;}
                else{aa = "<div class='ols_admin'><div class='ols_adminmsg'>"+tt.con[i]+"</div><div class='ols_admintime'>發送時間"+tt.time[i]+"</div></div>";}
                msg = aa + msg;
            }
            $("#ols_t_talk").html(msg);
            }
        });
    }
    setTimeout("renew()",3000);
}

renew();

</script>
