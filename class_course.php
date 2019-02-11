<?php
    $today = date("Y-m-d");
    // $today = "2019-01-29"; 測試用
    $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_date = '".$today."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq";
    $ro = mysqli_query($link,$sql);
    $num = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);

?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>泰山 PHP 資料庫網頁設計班 (02期) 課程查詢</h4>
</div>


<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">

            <?php 
                if($num >= 1){
                    do { ?>
                        <div class="col-8">今日　<span class="text-primary"><?=$today?></span>　課程：<span class="text-primary"><?=$row['c_n_name']?></span>　時數： <span class="text-primary"><?=$row['c_num']?></span> 小時　　授課老師：<span class="text-primary"><?=$row['c_t_name']?></span></div>
            <?php   }while($row = mysqli_fetch_assoc($ro));
                    }else{ ?>
                        <div class="col-8">今日　<span class="text-primary"><?=$today?></span>　課程：<span class="text-danger"> 無 </span></div>
            <?php   }?>

            </div>
        </div>
    </div>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <!-- 每日節次表 -->
                <table class="table table-hover col-10 offset-1 text-center">
                    <thead>
                        <tr>
                        <th scope="col">節次</th>
                        <th scope="col">一、二</th>
                        <th scope="col">休息</th>
                        <th scope="col">三、四</th>
                        <th scope="col">午休</th>
                        <th scope="col">五、六</th>
                        <th scope="col">休息</th>
                        <th scope="col">七、八</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th>時段</th>
                        <td>08:10-09:50</td>
                        <td>09:50-10:10</td>
                        <td>10:10-11:50</td>
                        <td>11:50-13:00</td>
                        <td>13:00-14:40</td>
                        <td>14:40-14:55</td>
                        <td>14:55-16:35</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container col-8 myconbg">
    <div class="row">
        <!-- 以日期查詢 -->
        <div class="col-3">
            <div class="bg-white text-dark mycol">以日期查詢
                <input type="date" name="ccheck_date" id="ccheck_date">
            </div>
        </div>
        <!-- 以月份查詢 -->
        <div class="col-3">
            <div class="bg-white text-dark mycol">以月份查詢
                <input class="col-8" type="month" name="check_month" id="check_month">
            </div>
        </div>
        <!-- 以課程查詢 -->
        <div class="col-3">
            <div class="bg-white text-dark mycol">課程查詢
                <select name="check_class" id="check_class">
                    <option value="0">選擇課程</option>
                    <?php
                        $sql = "SELECT * from class_name";
                        $roc = mysqli_query($link,$sql);
                        $rowc =mysqli_fetch_assoc($roc);
                        do{?>
                            <option value="<?=$rowc['c_n_seq'];?>"><?=$rowc['c_n_name'];?></option>
                        
                    <?php }while($rowc =mysqli_fetch_assoc($roc)); ?>

                </select>
            </div>
        </div>

        <!-- 以老師查詢課表 -->
        <div class="col-2">
            <div class="bg-white text-dark mycol">老師查詢
                <select name="check_techer" id="check_techer">
                    <option value="0">選擇老師</option>
                    <?php
                        $sql = "SELECT * from class_teacher";
                        $rot = mysqli_query($link,$sql);
                        $rowt =mysqli_fetch_assoc($rot);
                        do{?>
                            <option value="<?=$rowt['c_t_seq'];?>"><?=$rowt['c_t_name'];?></option>
                        
                    <?php }while($rowt =mysqli_fetch_assoc($rot)); ?>
                </select>
            </div>
        </div>

        <!-- 查詢全部課表 -->
        <div class="col-1">
            <div class="bg-white text-dark mycol text-center">
                <button type="button" id="allclass">全部</button>
            </div>
        </div>
    </div>
</div>


                <!-- 課程列表 -->
<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol text-center">
                <div>
                    <table  id="tb_show" class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">日期</th>
                            <th scope="col">星期</th>
                            <th scope="col">課程名稱</th>
                            <th scope="col">授課老師</th>
                            <th scope="col">節數</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $page_cnt = 10;
                            $page_now = 1;
                            $now_cnt = 0;

                            $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date";
                            $ro1 = mysqli_query($link,$sql);
                            $total1 = mysqli_num_rows($ro1);

                            $row1 = mysqli_fetch_assoc($ro1);
                            do{
                                $class['date'][]=$row1['c_date'];
                            }while($row1 = mysqli_fetch_assoc($ro1));

                            for($i=0;$i<$total1;$i++){
                                if($class['date'][$i]==$today){
                                    $now_cnt = $i; 
                                    $page_now = ceil($now_cnt / $page_cnt);
                                }
                            }

                            $page_total = ceil($total1/$page_cnt);

                            if(!empty($_GET["page"])){
                                $page_now = $_GET["page"];
                            }
                        
                            $page_open = ($page_now - 1) * $page_cnt;
                            
                            $p1 = $page_now -1;
                            $p2 = $page_now +1;
                        
                            if($p1 < 1){$p1 = $page_now;}
                            if($p2 > $page_total){$p2 = $page_total;}

                            $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date limit ".$page_open." , ".$page_cnt;
                            $ro2 = mysqli_query($link,$sql);
                            $row2 = mysqli_fetch_assoc($ro2);
                            do {
                        
                                if($row2['c_date']== $today){ ?>
                                    <tr>
                                    <td class="text-danger"><?=$row2['c_date']?></td>
                                    <td class="text-danger"><?=$row2['c_w_n']?></td>
                                    <td class="text-danger"><?=$row2['c_n_name']?></td>
                                    <td class="text-danger"><?=$row2['c_t_name']?></td>
                                    <td class="text-danger"><?=$row2['c_num']?></td>
                                    </tr>

                        <?php   }else{ ?>

                                    <tr>
                                    <td><?=$row2['c_date']?></td>
                                    <td><?=$row2['c_w_n']?></td>
                                    <td><?=$row2['c_n_name']?></td>
                                    <td><?=$row2['c_t_name']?></td>
                                    <td><?=$row2['c_num']?></td>
                                    </tr>

                        <?php   }
                                
                                }while($row2 = mysqli_fetch_assoc($ro2)); ?>

                        </tbody>
                    </table>

                    <!-- 課程列表導覽列 -->
                    <nav id="nav" aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                            <a class="page-link" href="?g=course&page=<?=$p1?>">Previous</a>
                            </li>

                            <?php for($ii = 1; $ii <= $page_total ; $ii++) { 
                                if($ii == $page_now){
                                    ?>
                                    <li class="page-item"><a class="page-link  bg-primary text-white" href="?g=course&page=<?=$ii?>"><?=$ii?></a></li>


                            <?php }else{ ?>
                                    <li class="page-item"><a class="page-link" href="?g=course&page=<?=$ii?>"><?=$ii?></a></li>

                            <?php }
                                } ?>
                            
                            <li class="page-item">
                            <a class="page-link" href="?g=course&page=<?=$p2?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
