<?php
//==========前台連結=====================================
    $url["index"]="./welcome.php";
    $url["regist"]="./member_register.php";
    $url["bootstrap-carousel"]="./bootstrap-carousel.php";
    $url["noncover-carousel"]="./noncover-carousel.php";
    $url["comingsoon"]="./inc/comingsoon.php";
    $url["gbnew"]="./groupbuy_newitem.php";
    $url["gbmod"]="./groupbuy_modify.php";
    $url["gb"]="./groupbuy.php";
    $url["gbv"]="./groupbuy_view.php";
    $url["gblist"]="./groupbuy_list.php";
    $url["login"]="./member_login.php";
    $url["memmod"]="./member_modify.php";
    $url["pwchange"]="./member_pwchange.php";
    $url["resume"]="./resume.php";
    $url["pf_ps"]="./portfolio_photoshop.php";
    $url["pf_il"]="./portfolio_illustrator.php";
    $url["pf_wb"]="./portfolio_website.php";
    $url["pf_pr"]="./portfolio_product.php";
    $url["msgboard"]="./messageboard.php";
    $url["online_service"]="./online_service.php";
    $url["clock"]="./clock.php";
    $url["course"]="./class_course.php";
    $url["out"]="./inc/logout.php";
    $url["testbg"]="./testbg.php";
    $url["test"]="./test.php";

//==========後台連結=====================================
    $url["admin"]="./admin/admin_login.php";
    $url["adminwelcome"]="./admin/admin_welcome.php";
    $url["acc"]="./admin/admin_acc.php";
    $url["acc_add"]="./admin/admin_acc_add.php";
    $url["acc_up"]="./admin/admin_acc_up.php";
    $url["acc_del"]="./admin/admin_acc_del.php";
    $url["gbuy"]="./admin/admin_gbuy.php";
    $url["gbuy_buyer"]="./admin/admin_gbuy_buyer.php";
    $url["gbmodify"]="./admin/admin_gb_modify.php";
    $url["olsv_list"]="./admin/admin_online_service_list.php";
    $url["olsv_re"]="./admin/admin_online_service_reply.php";
    $url["molsv_list"]="./admin/admin_member_online_service_list.php";
    $url["molsv_re"]="./admin/admin_member_online_service_reply.php";
    $url["clm"]="./admin/admin_class_course.php";

//==========判斷連結=====================================
    $gogo = "./welcome.php";
    if(!empty($_GET["g"])){$goto = $_GET["g"]; $gogo = $url[$goto];}

?>