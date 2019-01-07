<?php
    //　目前進行中的資料
    $sql = "SELECT * from gbuy where g_close = 1 and g_del = 0";
    $ro = mysqli_query($link,$sql);
    $num = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);

    //　目前已結案的資料
    $sql = "SELECT * from gbuy where g_close = 2 and g_del = 0";
    $ro1 = mysqli_query($link,$sql);
    $num1 = mysqli_num_rows($ro1);
    $row1 = mysqli_fetch_assoc($ro1);
?>

<!-- 團購歡迎畫面 -->

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h2>歡迎來到 WeayZehoa Coding Lab. 程式實驗室</h2><br>
        <h4>本系統是我的期末作業, 僅供瀏覽操作參考, 並無真正的產品團購.</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <!-- 團購列表 --> 
                <h3>目前共有 <?=$num?> 個團購正在進行中, 歡迎一起加入撿便宜行列.</h3>
                <h3>想當團長造福會員們嗎?! 點+圖案創一個團購.</h3>
                <div class="row">
                <?php do { ?>

                    <div class="col-3 align-self-center">
                        <div style="border-radius:10px; margin:10px auto" class="border border-primary shadow bg-white text-center text-primary align-self-center">
                        <h5 class="font-weight-bold"><?=$row["g_name"]?></h5>
                        <div><a href="?g=gbv&seq=<?=$row['g_seq']?>"><img style="max-width:85%; max-height:85%" src="img/gbuy/<?=$row["g_pic"]?>"></a></div>
                        <p class="font-weight-bold"><?=$row["g_pname"]?></p>
                        </div>
                    </div>
                    
                <?php } while($row = mysqli_fetch_assoc($ro));?>
<!-- 
                    <div class="col-3 align-self-center">
                        <div style="border-radius:10px;" class="border border-primary shadow bg-white text-center text-primary align-self-center">
                        <h5 class="font-weight-bold">我是超讚響亮亮的團購</h5>
                        <div><a href="?g=gbv"><img style="max-width:85%; max-height:85%" src="img/test2.jpg"></a></div>
                        <p class="font-weight-bold">一二三四五六七八九十一二三</p>
                        </div>
                    </div> -->
                
                <?php
                    if(!empty($_SESSION)){
                        
                        echo '
                        <div id="gb_new" class="col-3 align-self-center">
                            <div style="border-radius:10px; max-height:300px" class="border border-primary shadow bg-white text-center text-primary align-self-center">
                                <h5 class="font-weight-bold">點我創一個新的團購</h5>
                                <div><a href="?g=gbnew&add=1"><img style="width:85%; height:85%" src="img/300px_Plus_blue.svg.png"></a></div>
                                <p class="font-weight-bold">創一個新的團購</p>
                            </div>
                        </div>
                        ';
                    }
                ?>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol-1">
                <!-- 團購列表 --> 
                <h3>目前共有 <?=$num1?> 個團購關閉中, 無法參加或修改, 只有發起人才可以開啟或修改資料.</h3>
                <div class="row">

                <?php do { ?>
                    <div class="col-3 align-self-center">
                        <div style="border-radius:10px; margin:10px auto" class="border border-primary shadow bg-white text-center text-primary align-self-center">
                        <h5 class="font-weight-bold text-danger">本團購已關閉請勿購買</h5>
                        <div><a href="?g=gbv&seq=<?=$row1['g_seq']?>"><img style="max-width:85%; max-height:85%" src="img/gbuy/<?=$row1["g_pic"]?>"></a></div>
                        <p class="font-weight-bold"><?=$row1["g_pname"]?></p>
                        </div>
                    </div>
                <?php } while($row1 = mysqli_fetch_assoc($ro1));?>                    

                </div>
            </div>
        </div>
    </div>
</div>
