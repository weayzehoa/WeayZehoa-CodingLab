(function($){

  // ==================== 宣告所有照片位置並放入陣列中 ==============================
var pic200 = [];
var pic920 = [];
    for(i=0;i<=15;i++){
        pic200[i] = "./img/carousel/2m-"+(i+1)+".jpg";
        pic920[i] = "./img/carousel/92m-"+(i+1)+".jpg";
    }

// ====================== 亂數隨機功能 ================================
function Random(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
}

// ==================== 載入所有照片的按鈕在中間選單區域 ==========================
btn_list="";
    for(i=1;i<=16;i++){
        btn_list = btn_list + "<div class='btn_list'><div class='bcover'>"+i+"</div></div>";
    }
    $("#mmenu_btn").html(btn_list);

// ==================== 載入所有小照片在下方圖片選單區域 ==========================
pic_list="";
    for(i=0;i<=15;i++){
        pic_list = pic_list + "<div class='pic_btn' style='background-image: url("+pic200[i]+")'><div class='pcover'></div></div>";
    }
    $("#btmenu_pic").html(pic_list);

// ==================== 隨機載入一張照片 ==============================
now_pic = Random(0,15);
$("#p1").css("backgroundImage","url('"+pic920[now_pic]+"')");
// $("#p1").html("<img src="+pic920[now_pic]+">");
$(".btn_list:eq("+now_pic+")").css("backgroundColor","#F00");
$(".pic_btn:eq("+now_pic+")").css("box-shadow","5px 5px #F00");

// ==================== 按中間選單按鈕照片從右邊滑入 ================================
$(".btn_list").click(function(){
    if(a==0){
        x=$(this).index();
        a = 1;
        $(".btn_list:eq("+now_pic+")").css("backgroundColor","#00F");
        $(".btn_list:eq("+x+")").css("backgroundColor","#F00");
        $(".pic_btn:eq("+now_pic+")").css("box-shadow","5px 5px #000");
        $(".pic_btn:eq("+x+")").css("box-shadow","5px 5px #F00");
        $("#p2").css({"backgroundImage":"url('"+pic920[x]+"')","display":"block","left":"1000px"});
        $("#p2").animate({left:"0px"},3000);
        setTimeout(function(){
            $("#p1").css("backgroundImage","url('"+pic920[x]+"')");
            $("#p2").css("display","none");
            now_pic = x;
            a = 0;
        },3000);
    }
});

// ==================== 點擊下方圖片選單區域主顯示照片從左邊滑入 ==========================
$(".pic_btn").click(function(){
    if(a==0){
        x=$(this).index();
        a = 1;
        $(".btn_list:eq("+now_pic+")").css("backgroundColor","#00F");
        $(".btn_list:eq("+x+")").css("backgroundColor","#F00");
        $(".pic_btn:eq("+now_pic+")").css("box-shadow","5px 5px #000");
        $(".pic_btn:eq("+x+")").css("box-shadow","5px 5px #F00");
        $("#p2").css({"backgroundImage":"url('"+pic920[x]+"')","display":"block","left":"-1000px"});
        $("#p2").animate({left:"0px"},3000);
        setTimeout(function(){
            $("#p1").css("backgroundImage","url('"+pic920[x]+"')");
            $("#p2").css("display","none");
            now_pic = x;
            a = 0;
        },3000);
    }
});

// ==================== 按左邊區域 ==============================
var a = 0; //避免重複按的變數
$("#l_btn").click(function(){
    if(a==0){
    a = 1;
    aa = now_pic + 1;
    if(aa >= 16){ aa = 0 ;}
        $("#p2").css({"backgroundImage":"url('"+pic920[aa]+"')","display":"block","left":"920px"});
        $(".btn_list:eq("+now_pic+")").css("backgroundColor","#00F");
        $(".btn_list:eq("+aa+")").css("backgroundColor","#F00");
        $(".pic_btn:eq("+now_pic+")").css("box-shadow","5px 5px #000");
        $(".pic_btn:eq("+aa+")").css("box-shadow","5px 5px #F00");
        $("#p2").animate({left:"0px"},3000);
        setTimeout(function(){
        $("#p1").css("backgroundImage","url('"+pic920[aa]+"')");
        $("#p2").css("display","none");
        now_pic = aa;
        a = 0;
    },3000);
    }
});

// ==================== 按右邊區域 ==============================
$("#r_btn").click(function(){
    if(a==0){
    a = 1;
    aa = now_pic - 1;
    if(aa <= 0){ aa = 15 ;}
        $("#p2").css({"backgroundImage":"url('"+pic920[aa]+"')","display":"block","left":"-920px"});
        $(".btn_list:eq("+now_pic+")").css("backgroundColor","#00F");
        $(".btn_list:eq("+aa+")").css("backgroundColor","#F00");
        $(".pic_btn:eq("+now_pic+")").css("box-shadow","5px 5px #000");
        $(".pic_btn:eq("+aa+")").css("box-shadow","5px 5px #F0F");
        $("#p2").animate({left:"0px"},3000);
        setTimeout(function(){
        $("#p1").css("backgroundImage","url('"+pic920[aa]+"')");
        $("#p2").css("display","none");
        now_pic = aa;
        a = 0;
    },3000);
    }
});

// ==================== 自動按左邊區域 =========================
function auto(){
    setInterval(() => {
        $('#l_btn').trigger("click");
    }, 5000);
}
auto();

// ==================== 載入所有照片及標題在P3主顯示區域 ==============================
p3_list="";
for(i=0;i<=15;i++){
    p3_list = p3_list + "<div class='p3_list' style='background-image: url("+pic200[i]+")'><div class='pcover'></div></div>";
}
$("#p3").html(p3_list);

// ==================== 偵測點擊哪一張照片並開啟覆蓋區域並顯示大張的圖片 =============
$(".p3_list").click(function(){
    x=$(this).index();
    $("#cover").css("display","block");
    $("#show").css("display","block");
    $("#show").css("backgroundImage","url("+pic920[x]+")");
});

// ==================== 關閉覆蓋區及照片 ==============================
$("#cover").click(function(){
    $("#cover").css("display","none");
    $("#show").css("display","none");
});

})($)