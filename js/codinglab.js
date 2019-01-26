//顯示今日日期及時間
function ShowTime()
{
  var NowDate = new Date();
  var d = NowDate.getDay();
  var dayNames = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
  document.getElementById('showtime').innerHTML = '目前時間：' + NowDate.toLocaleString() + '（' + dayNames[d] + '）';
  setTimeout('ShowTime()', 1000);
}


//背景動畫
particlesJS.load('particles-js', './js/particles.json');

// new WOW().init(); 使用預設值 或 使用下方參數方式 來啟動 WOW.JS
wow = new WOW({
    boxClass:     'wow',      // default
    animateClass: 'animated', // default
    offset:       0,          // default
    mobile:       false,       // default is true
    live:         true,       // default
})
wow.init();

(function($){
// 監控Window捲軸位置 超過一個範圍顯示Gotop按鈕
  $(window).scroll(function () {
    if ($(window).scrollTop() > 500) {
      $('#gotop_btn').removeClass('d-none');
    }
    if ($(window).scrollTop() < 100) {
      $('#gotop_btn').addClass('d-none');
    }
  })

//首頁影片Modal
  $('#movie').click(function(){
    $('#modalimg').modal('show');
    $('#modal_imgshow iframe').attr('src','https://www.youtube.com/embed/9PFhlIqJNcc?rel=0&autoplay=1');
  });

    $('#modalimg').on('hidden.bs.modal', function () {
    $('#modal_imgshow iframe').removeAttr('src');
  })


//留言板用
  var msg_seq = "";

  $('button').on('click', function(){ 
      msg_seq = $(this).val();
      $('#reply_form').modal('show');
  });

  $('#reply_form').on('hidden.bs.modal', function () {
      msg_seq = "";
  })

  $('#reply_send').on('click', function() {
      if($('input[name=check]').val()==check){
    // get input value
    var rname = $('#modalname').val();
    var email = $('#modalemail').val();	
    var con = $('#modalcon').val();	
    
    // check empty
    if(rname && email && con)
    {
      // hide modal
      $('#reply_form').modal('hide');
        
      // send reply message to api
      $.post("./api/reply_msg_api.php",{msg_seq,rname,email,con,check},function(xx){
          alert(xx);
          window.location.reload();
      });
    }
    else
    {
      swal({
        title: '錯誤',
        text: '欄位不能為空',
        type: 'error',
        confirmButtonClass: "btn btn-info",
        buttonsStyling: false
      })
    }
      }
  });

})($)