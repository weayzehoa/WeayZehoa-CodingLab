  function ShowTime()
  {
      var NowDate = new Date();
      var d = NowDate.getDay();
      var dayNames = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
      document.getElementById('showtime').innerHTML = '目前時間：' + NowDate.toLocaleString() + '（' + dayNames[d] + '）';
      setTimeout('ShowTime()', 1000);
  }


// 監控Window捲軸位置 超過一個範圍顯示Gotop按鈕
  $(window).scroll(function () {
	if ($(window).scrollTop() > 500) {
		$('#gotop_btn').removeClass('d-none');
	}
	if ($(window).scrollTop() < 100) {
		$('#gotop_btn').addClass('d-none');
	}
})