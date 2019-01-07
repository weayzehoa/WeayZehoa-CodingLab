<?php
    unset($_SESSION["id"]); //取消登入
    unset($_SESSION["nick"]); //取消暱稱
    unset($_SESSION["permit"]); //取消權限
    ?><script>document.location.href="?g=index";</script><?php //回到首頁
?>
