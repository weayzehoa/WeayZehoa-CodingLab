<?php
    include_once("./inc/setdb.php");
    include_once("./inc/function.php"); 
    include_once("./inc/url.php");
    include_once("./inc/head.php");

    // ===========選單切換==================

    //預設使用前台選單
    $menu = "menu.php";
    
    //判斷使用哪個選單
    if(!empty($_GET["menu"])){

        //預設使用後台管理選單
        $menu = "./admin/admin_menu.php";    

        //空選單(關閉選單)
        if($_GET["menu"]=="no"){
            $menu = "./nomenu.php";
        }    
    }

    include_once($menu);
    include_once($gogo);

?>

    <div id="particles-js"></div>
    
<?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php"); 
?>
</body>
</html>
<?php // <!-- 金鑰 --> ?>
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LeVFbQUAAAAAFlrX2_9W0As3lPsAuMyrgqUruN1"></script> -->
<?php // <!-- 密鑰 --> ?>
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LeVFbQUAAAAAL_4GAtz7dI4eJOVduL47Cg3N_XA"></script>
  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('reCAPTCHA_site_key', {action: 'homepage'}).then(function(token) {
         ...
      });
  });
  </script> -->
