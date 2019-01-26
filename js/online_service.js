//無登入客服系統用

check_talk = 0;

(function($){
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

})($)

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
                msg = msg + aa;
            }
            $("#ols_t_talk").html(msg);
            }
        });
    }
    setTimeout("renew()",3000);
}

renew();