<?php
if (!empty($_SESSION["id"])) {
    $register = "";
    $member = ' <div class="offset-2">ID&nbsp:&nbsp;'.ucfirst($_SESSION['id']).'&nbsp;</div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?menu=mod&g=memmod"><i class="fas fa-money-check text-dark"></i>&nbsp;會員資料修改</a>
                <a class="dropdown-item" href="?menu=change&g=pwchange"><i class="fas fa-key text-dark"></i>&nbsp;變更密碼</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?g=gblist"><i class="fas fa-shopping-cart text-dark"></i>&nbsp;團購列表</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?g=out"><i class="fas fa-sign-out-alt text-dark"></i>&nbsp;登出</a>';
} else {
    $register = '<a class="dropdown-item" href="?menu=reg&g=regist"><i class="fas fa-registered text-dark"></i>&nbsp;註冊</a><div class="dropdown-divider"></div>';
    $member = '<a class="dropdown-item" href="?menu=log&g=admin"><i class="fas fa-sign-in-alt text-dark"></i>&nbsp;登入</a>';
}
?>


<!-- <body class="bg-info"> -->
<!-- <body style="background-color: rgba(0, 255, 255, 0.7)"> -->
<!-- <body style="background-image: url(img/bg.jpg)"> -->

<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),url(img/bg.jpg);">

<nav class="navbar navbar-expand-xl navbar-dark bg-black border-bottom fixed-top">
    <a class=" offset-1 col-2 navbar-brand" href="index.php">
        <img src="img/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menunavbar" aria-controls="menunavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse col-7" id="menunavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="?g=index"><i class="fas fa-home text-white"></i>&nbsp;前台首頁</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?menu=1&g=acc"><i class="fas fa-tools text-white"></i>&nbsp;帳號管理</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-shopping-cart text-white"></i>&nbsp;團購管理</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?menu=2&g=gbuy"><i class="fas fa-shopping-cart text-dark"></i>&nbsp;新增與變更</a>
                    <a class="dropdown-item" href="?menu=2&g=gbuy_buyer"><i class="far fa-handshake text-dark"></i>&nbsp;參與者管理</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=2&g=olsv_list"><i class="fas fa-comments text-white"></i>&nbsp;無登入線上客服系統</a>
            </li>                
            <li class="nav-item">
                <a class="nav-link" href="?menu=4&g=clm"><i class="fas fa-calendar-alt text-white"></i>&nbsp;課程管理</a>
            </li>
            <!-- 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-comments text-white"></i>&nbsp;線上客服系統</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?menu=2&g=olsv_list"><i class="fas fa-comments text-dark"></i>&nbsp;無登入線上客服系統</a>
                    <a class="dropdown-item" href="?menu=2&g=molsv_list"><i class="fas fa-comments text-dark"></i>&nbsp;會員線上客服系統</a>
                </div>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="?menu=3&g=comingsoon"><i class="fas fa-images text-white"></i>&nbsp;相簿管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?menu=4&g=clm"><i class="fas fa-calendar-alt text-white"></i>&nbsp;課程管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?menu=5&g=olsv_list"><i class="fas fa-comments text-white"></i>&nbsp;客服系統</a>
            </li>                
            <li class="nav-item">
                <a class="nav-link" href="?menu=6&g=comingsoon"><i class="fas fa-chalkboard-teacher text-white"></i>&nbsp;作品管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?menu=7&g=comingsoon">留言板管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?menu=8&g=comingsoon">遊戲紀錄</a>
            </li> -->
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-address-card text-white"></i>&nbsp;會員功能</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?= $register ?>
                    <?= $member ?>
                </div>
            </li>
        </ul>
    </div>
</nav>