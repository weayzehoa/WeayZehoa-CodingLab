<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>測試用頁面</h4>
</div>
<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-8">
            <div class="bg-white text-dark mycol">
                <p>說明：</p>
                <p>1. <a href="https://wowjs.uk" target="_blank">WOW.js</a> & <a href="https://daneden.github.io/animate.css/" target="_blank">Animate.css</a> 讓網站在捲動的時候增加動畫效果. (只會顯示一次.　重整頁面才會再次啟動)</p>
                <p>2. 使用 PHP 的 Random 函數 結合 WOW.js 與 Animate.css 測試隨機載入動畫到指定的物件上.</p>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-white text-dark mycol text-center">
                <span id="animationSandbox" style="display: block;"><h1>Animate.css</h1></span>
                <span>選取下面參數, 或按測試按鈕.</span>
                <form>
                <select class="animationsOptions">
                    <optgroup label="Attention Seekers">
                    <option value="bounce">bounce</option>
                    <option value="flash">flash</option>
                    <option value="pulse">pulse</option>
                    <option value="rubberBand">rubberBand</option>
                    <option value="shake">shake</option>
                    <option value="swing">swing</option>
                    <option value="tada">tada</option>
                    <option value="wobble">wobble</option>
                    <option value="jello">jello</option>
                    <option value="heartBeat">heartBeat</option>
                    </optgroup>

                    <optgroup label="Bouncing Entrances">
                    <option value="bounceIn">bounceIn</option>
                    <option value="bounceInDown">bounceInDown</option>
                    <option value="bounceInLeft">bounceInLeft</option>
                    <option value="bounceInRight">bounceInRight</option>
                    <option value="bounceInUp">bounceInUp</option>
                    </optgroup>

                    <optgroup label="Bouncing Exits">
                    <option value="bounceOut">bounceOut</option>
                    <option value="bounceOutDown">bounceOutDown</option>
                    <option value="bounceOutLeft">bounceOutLeft</option>
                    <option value="bounceOutRight">bounceOutRight</option>
                    <option value="bounceOutUp">bounceOutUp</option>
                    </optgroup>

                    <optgroup label="Fading Entrances">
                    <option value="fadeIn">fadeIn</option>
                    <option value="fadeInDown">fadeInDown</option>
                    <option value="fadeInDownBig">fadeInDownBig</option>
                    <option value="fadeInLeft">fadeInLeft</option>
                    <option value="fadeInLeftBig">fadeInLeftBig</option>
                    <option value="fadeInRight">fadeInRight</option>
                    <option value="fadeInRightBig">fadeInRightBig</option>
                    <option value="fadeInUp">fadeInUp</option>
                    <option value="fadeInUpBig">fadeInUpBig</option>
                    </optgroup>

                    <optgroup label="Fading Exits">
                    <option value="fadeOut">fadeOut</option>
                    <option value="fadeOutDown">fadeOutDown</option>
                    <option value="fadeOutDownBig">fadeOutDownBig</option>
                    <option value="fadeOutLeft">fadeOutLeft</option>
                    <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                    <option value="fadeOutRight">fadeOutRight</option>
                    <option value="fadeOutRightBig">fadeOutRightBig</option>
                    <option value="fadeOutUp">fadeOutUp</option>
                    <option value="fadeOutUpBig">fadeOutUpBig</option>
                    </optgroup>

                    <optgroup label="Flippers">
                    <option value="flip">flip</option>
                    <option value="flipInX">flipInX</option>
                    <option value="flipInY">flipInY</option>
                    <option value="flipOutX">flipOutX</option>
                    <option value="flipOutY">flipOutY</option>
                    </optgroup>

                    <optgroup label="Lightspeed">
                    <option value="lightSpeedIn">lightSpeedIn</option>
                    <option value="lightSpeedOut">lightSpeedOut</option>
                    </optgroup>

                    <optgroup label="Rotating Entrances">
                    <option value="rotateIn">rotateIn</option>
                    <option value="rotateInDownLeft">rotateInDownLeft</option>
                    <option value="rotateInDownRight">rotateInDownRight</option>
                    <option value="rotateInUpLeft">rotateInUpLeft</option>
                    <option value="rotateInUpRight">rotateInUpRight</option>
                    </optgroup>

                    <optgroup label="Rotating Exits">
                    <option value="rotateOut">rotateOut</option>
                    <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                    <option value="rotateOutDownRight">rotateOutDownRight</option>
                    <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                    <option value="rotateOutUpRight">rotateOutUpRight</option>
                    </optgroup>

                    <optgroup label="Sliding Entrances">
                    <option value="slideInUp">slideInUp</option>
                    <option value="slideInDown">slideInDown</option>
                    <option value="slideInLeft">slideInLeft</option>
                    <option value="slideInRight">slideInRight</option>

                    </optgroup>
                    <optgroup label="Sliding Exits">
                    <option value="slideOutUp">slideOutUp</option>
                    <option value="slideOutDown">slideOutDown</option>
                    <option value="slideOutLeft">slideOutLeft</option>
                    <option value="slideOutRight">slideOutRight</option>
                    
                    </optgroup>
                    
                    <optgroup label="Zoom Entrances">
                    <option value="zoomIn">zoomIn</option>
                    <option value="zoomInDown">zoomInDown</option>
                    <option value="zoomInLeft">zoomInLeft</option>
                    <option value="zoomInRight">zoomInRight</option>
                    <option value="zoomInUp">zoomInUp</option>
                    </optgroup>
                    
                    <optgroup label="Zoom Exits">
                    <option value="zoomOut">zoomOut</option>
                    <option value="zoomOutDown">zoomOutDown</option>
                    <option value="zoomOutLeft">zoomOutLeft</option>
                    <option value="zoomOutRight">zoomOutRight</option>
                    <option value="zoomOutUp">zoomOutUp</option>
                    </optgroup>

                    <optgroup label="Specials">
                    <option value="hinge">hinge</option>
                    <option value="jackInTheBox">jackInTheBox</option>
                    <option value="rollIn">rollIn</option>
                    <option value="rollOut">rollOut</option>
                    </optgroup>
                </select>

                <button class="triggerAnimation">測試</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-4">
            <div class="bg-white text-dark mycol">
            <div>類別 : In, 參數： XXXX</div>
                <span id="animationSandbox" style="display: block;"><h1>Animate.css</h1></span>
                <span>選取下面參數, 或按測試按鈕.</span>
                <form>
                <select>
                    <option value="bounce">bounce</option>
                </select>
                </form>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-white text-dark mycol">
                <div>類別 : Out</div>
                <div>123</div>
            </div>
        </div>
        
        <div class="col-4">
            <div class="bg-white text-dark mycol">
                <div>類別 : Other</div>
                <div>123</div>
            </div>
        </div>
    </div>
</div>






  <?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php");
?>

<script>
  function testAnim(x) {
    $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(this).removeClass();
    });
  };

  $(document).ready(function(){
    $('.triggerAnimation').click(function(e){
      e.preventDefault();
      var anim = $('.animationsOptions').val();
      testAnim(anim);
    });

    $('.animationsOptions').change(function(){
      var anim = $(this).val();
      testAnim(anim);
    });
  });

</script>

<?php
    $ani_in = ['bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','flipInX','flipInY','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','slideInUp','slideInDown','slideInLeft','slideInRight','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','rollIn','jackInTheBox'];
    33;
    $ani_out = ['bounceOut','bounceOutDown','bounceOutLeft','bounceOutRight','bounceOutUp','fadeOut','fadeOutDown','fadeOutDownBig','fadeOutLeft','fadeOutLeftBig','fadeOutRight','fadeOutRightBig','fadeOutUp','fadeOutUpBig','flipOutX','flipOutY','lightSpeedOut','rotateOut','rotateOutDownLeft','rotateOutDownRight','rotateOutUpLeft','rotateOutUpRight','slideOutUp','slideOutDown','slideOutLeft','slideOutRight','zoomOut','zoomOutDown','zoomOutLeft','zoomOutRight','zoomOutUp','rollOut'];
    32;
    $ani_other = ['bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','jello','heartBeat','flip','hinge'];
    12;
?>
