<?php
    //選單變換功能, 如果SESSION["id]不存在, 則只出現 註冊 及 登入 功能, 若存在則變換成 會員資料修改 、 修改密碼 及 登出 功能
    if (!empty($_SESSION["id"])) {
        $register = "";
        $member = ' <div class="offset-2">ID&nbsp:&nbsp;'.ucfirst($_SESSION['id']).'&nbsp;</div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?g=memmod"><i class="fas fa-money-check text-dark"></i>&nbsp;資料修改</a>
                    <a class="dropdown-item" href="?g=pwchange"><i class="fas fa-key text-dark"></i>&nbsp;變更密碼</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?g=gblist"><i class="fas fa-shopping-cart text-dark"></i>&nbsp;團購列表</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?g=out"><i class="fas fa-sign-out-alt text-dark"></i>&nbsp;登出</a>';
    } else {
        $register = '<a class="dropdown-item" href="?g=regist"><i class="fas fa-registered text-dark"></i>&nbsp;註冊</a><div class="dropdown-divider"></div>';
        $member = '<a class="dropdown-item" href="?g=login"><i class="fas fa-sign-in-alt text-dark"></i>&nbsp;登入</a>';
    }
?>

<!-- <body class="bg-info"> -->
<!-- <body style="background-color: rgb(0, 0, 0)"> -->
<!-- <body style="background-image: url(img/bg.jpg);"> -->
<!-- <body style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(img/bg.jpg);"> -->
<!-- <body style="background-image: url(img/bg2.jpg); background-size:cover"> -->

    <!-- <nav style="background-color:transparent;" class="navbar navbar-expand-xl navbar-dark bg-black border-bottom fixed-top"> -->
    <nav class="navbar navbar-expand-xl navbar-dark bg-black border-bottom fixed-top">
        <!-- <a class=" offset-1 col-1 navbar-brand" href="index.php"><img src="img/logo2.png"></a> -->
        <a style="font-size:0.95em" class="col-1 offset-1 navbar-brand font-weight-bold" href="index.php">WeayZehoa<br>Coding Lab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menunavbar" aria-controls="menunavbar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-8" id="menunavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i>&nbsp;首頁</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?menu=admin&g=admin"><i class="fas fa-tools"></i>&nbsp;後台管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?g=gb"><i class="fas fa-shopping-cart"></i>&nbsp;團購系統</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?g=course"><i class="fas fa-calendar-alt"></i>&nbsp;課程查詢系統</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-place-of-worship"></i>&nbsp;期末作業</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?menu=1&g=acc"><i class="fas fa-address-card text-dark"></i>&nbsp;會員管理系統<span class="text-danger">&nbsp;(後臺)</span></a>
                        <a class="dropdown-item" href="?g=course"><i class="fas fa-calendar-alt text-dark"></i>&nbsp;課程查詢系統</a>
                        <a class="dropdown-item" href="?g=gb"><i class="fas fa-shopping-cart text-dark"></i>&nbsp;團購系統<span class="text-danger">&nbsp;(需登入)</span></a>
                        <!-- <a class="dropdown-item" href="?g=member_service"><i class="fas fa-comments text-dark"></i>&nbsp;會員線上客服</a> -->
                        <!-- <div class="dropdown-divider"></div>
                        <div class="text-danger text-center">請先登入</div> -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-code"></i>&nbsp;實驗室</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?g=bootstrap-carousel"><i class="fas fa-images text-dark"></i>&nbsp;Bootstrap相片輪播</a>
                        <a class="dropdown-item" href="?g=noncover-carousel"><i class="fas fa-images text-dark"></i>&nbsp;非覆蓋式相片輪播</a>
                        <!-- <a class="dropdown-item" href="?g=comingsoon"><i class="fas fa-images text-dark"></i>&nbsp;覆蓋式相片輪播</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?g=comingsoon"><i class="fas fa-sort-numeric-down text-dark"></i>&nbsp;猜數字遊戲</a>
                        <a class="dropdown-item" href="?g=comingsoon"><i class="fas fa-images text-dark"></i></i>&nbsp;相片動畫</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?g=msgboard"><i class="fas fa-comment-alt text-dark"></i>&nbsp;留言板</a>
                        <a class="dropdown-item" href="?g=online_service"><i class="fas fa-comments text-dark"></i>&nbsp;無登入線上客服</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?g=clock"><i class="far fa-clock text-dark"></i>&nbsp;時鐘</a>
                        <a class="dropdown-item" href="?g=testbg"><i class="fas fa-images text-dark"></i></i>&nbsp;背景動畫測試</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?g=resume"><i class="fas fa-address-book"></i>&nbsp;履歷</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-chalkboard-teacher"></i>&nbsp;作品</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?g=pf_pr"><i class="fas fa-archive text-dark"></i>&nbsp;產品企劃開發</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?g=pf_ps"><i class="fas fa-images text-dark"></i>&nbsp;Photoshop 作品</a>
                        <a class="dropdown-item" href="?g=pf_il"><i class="fas fa-images text-dark"></i>&nbsp;illustrator 作品</a>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?g=pf_wb"><i class="fas fa-code text-dark"></i>&nbsp;網站作品</a> -->
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-address-card"></i>&nbsp;會員功能</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?= $register ?>
                        <?= $member ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>