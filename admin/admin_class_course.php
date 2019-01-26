<?php
    check_permission ();
    $today = date("Y-m-d",$nt);
    // $today = "2019-01-29"; 測試用
?>

<div class="myheadbg text-white container-fuild text-shadow-bu1 text-center">
        <h4>泰山 PHP 資料庫網頁設計班 (02期) 課程管理</h4>
</div>

<div class="container-fuild myconbg">
    <div class="row">
        <div class="col-3 offset-1">
            <!-- 老師管理 -->
            <div class="bg-white text-dark mycol text-center">
                <p><b><u>老師管理</u></b></p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">編號</th>
                        <th scope="col">老師名字</th>
                        <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody id="tb1">

                        <?php
                            $sql = "SELECT * from class_teacher";
                            $ro = mysqli_query($link,$sql);
                            $row = mysqli_fetch_assoc($ro);
                            do{
                        ?>
                            <tr>
                            <td><?=$row['c_t_seq']?></td>
                            <td><?=$row['c_t_name']?></td>
                            <td>
                                <button class="btn btn-danger" onclick="modteacher('<?=$row['c_t_seq']?>','<?=$row['c_t_name']?>')">修改</button>
                                <button class="btn btn-danger" onclick="delteacher('<?=$row['c_t_seq']?>','<?=$row['c_t_name']?>')">刪除</button>
                            </td>
                            </tr>
                        <?php }while($row = mysqli_fetch_assoc($ro)); ?>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control" name="newteacher" placeholder="輸入老師名字">
                    </div>
                    <button id="newteacher" class="btn btn-primary col-3">新增</button>
                </div>
            </div>
            <!-- 課程名稱管理 -->
            <div class="bg-white text-dark mycol text-center">
                <p><b>課程名稱管理</b></p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">編號</th>
                        <th scope="col">課程名稱</th>
                        <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody id="tb2">

                        <?php

                            $cnpage_cnt = 7;
                            $cnpage_now = 1;

                            $sql = "SELECT * from class_name";
                            $ro1 = mysqli_query($link,$sql);
                            $cntotal = mysqli_num_rows($ro1);

                            $cnpage_total = ceil($cntotal/$cnpage_cnt);

                            if(!empty($_GET["cnpage"])){
                                $cnpage_now = $_GET["cnpage"];
                            }

                            $cnpage_open = ($cnpage_now - 1) * $cnpage_cnt;

                            $cnp1 = $cnpage_now -1;
                            $cnp2 = $cnpage_now +1;

                            if($cnp1 < 1){$cnp1 = $cnpage_now;}
                            if($cnp2 > $cnpage_total){$cnp2 = $cnpage_total;}

                            $sql = "SELECT * from class_name limit ".$cnpage_open." , ".$cnpage_cnt;
                            $ro1 = mysqli_query($link,$sql);
                            $row1 = mysqli_fetch_assoc($ro1);
                            do{
                        ?>
                            <tr>
                            <td><?=$row1['c_n_seq']?></td>
                            <td><?=$row1['c_n_name']?></td>
                            <td>
                                <button class="btn btn-danger" onclick="modclassname('<?=$row1['c_n_seq']?>','<?=$row1['c_n_name']?>')">修改</button>
                                <button class="btn btn-danger" onclick="delclassname('<?=$row1['c_n_seq']?>','<?=$row1['c_n_name']?>')">刪除</button>
                            </td>
                            </tr>
                        <?php }while($row1 = mysqli_fetch_assoc($ro1)); ?>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control" name="newclname" placeholder="輸入課程名稱">
                    </div>
                    <button id="newclname" class="btn btn-primary col-3">新增</button>
                </div>
                <br>

                <!-- 課程名稱導覽列 -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                        <a class="page-link" href="?menu=4&g=clm&cnpage=<?=$cnp1?>">Previous</a>
                        </li>

                        <?php for($i = 1; $i <= $cnpage_total ; $i++) { 
                            if($i == $cnpage_now){
                                ?>
                                <li class="page-item"><a class="page-link  bg-primary text-white" href="?menu=4&g=clm&cnpage=<?=$i?>"><?=$i?></a></li>


                        <?php }else{ ?>
                                <li class="page-item"><a class="page-link" href="?menu=4&g=clm&cnpage=<?=$i?>"><?=$i?></a></li>

                        <?php }
                            } ?>
                        
                        <li class="page-item">
                        <a class="page-link" href="?menu=4&g=clm&cnpage=<?=$cnp2?>">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

        <div class="col-7">
            <!-- 顯示今日課程資訊 -->
            <?php
                $sqltoday = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_date = '".$today."' and a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq";
                $rotoday = mysqli_query($link,$sqltoday);
                $numtoday = mysqli_num_rows($rotoday);
                $rowtoday = mysqli_fetch_assoc($rotoday);
            ?>
                <div class="bg-white text-dark mycol">

            <?php 
                if($numtoday >= 1){
                    do { ?>
                        <div class="col-8">今日　<span class="text-primary"><?=$today?></span>　課程：<span class="text-primary"><?=$rowtoday['c_n_name']?></span>　時數： <span class="text-primary"><?=$rowtoday['c_num']?></span> 小時　　授課老師：<span class="text-primary"><?=$rowtoday['c_t_name']?></span></div>
            <?php   }while($rowtoday = mysqli_fetch_assoc($rotoday));
                    }else{ ?>
                        <div class="col-8">今日　<span class="text-primary"><?=$today?></span>　課程：<span class="text-danger"> 無 </span></div>
            <?php   } ?>

                </div>

            <!-- 課程新增 -->
            <div class="bg-white text-dark mycol text-center">
                <div>
                    <p><u><b>課程新增</b></u></p>        
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th style="width:20%" scope="col">日期</th>
                            <th style="width:15%" scope="col">星期</th>
                            <th style="width:20%" scope="col">課程名稱</th>
                            <th style="width:15%" scope="col">授課老師</th>
                            <th style="width:10%" scope="col">節數</th>
                            <th style="width:20%" scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody id="tb3">
                            <tr>
                            <td><input class="text-center" type="date" name="newdate"></td>
                            <td><input class="text-center col-10" type="text" readonly name="weekname" placeholder="自動產生"></td>
                            <td>
                                <select name="newclname">
                                
                                <?php 
                                    $clname = get_clname();
                                    for ($i= 0; $i < count($clname['seq']); $i++){
                                ?>
                                        <option value="<?=$clname['seq'][$i]?>"><?=$clname['name'][$i]?></option>
                                        
                                <?php } ?>

                                </select>
                            </td>
                            <td>
                                <select name="newclteacher">
                                
                                <?php 
                                    $clteacher = get_clteacher();
                                    for ($i= 0; $i < count($clteacher['seq']); $i++){
                                ?>
                                        <option value="<?=$clteacher['seq'][$i]?>"><?=$clteacher['name'][$i]?></option>
                                        
                                <?php } ?>

                                </select>
                            </td>
                            <td>
                                <select name="newclnum">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="8" selected>8</option>
                                </select>
                            </td>
                            <td>        
                                <button id="newclass" class="btn btn-primary">新增課程</button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 課程查詢 -->
            <div class="bg-white text-dark mycol text-center">
                <span><u><b>課程查詢</b></u></span>
                <div class="row">
                    <!-- 以日期查詢 -->
                    <div class="col-3">
                        <div class="bg-white text-dark mycol">以日期查詢
                            <input type="date" name="checkbydate" id="checkbydate">
                        </div>
                    </div>
                    <!-- 以月份查詢 -->
                    <div class="col-3">
                        <div class="bg-white text-dark mycol">以月份查詢<br>
                            <input type="month" name="checkbymonth" id="checkbymonth">
                        </div>
                    </div>
                    <!-- 以課程查詢 -->
                    <div class="col-3">
                        <div class="bg-white text-dark mycol">以課程名稱查詢<br>
                            <select name="checkbyclass" id="checkbyclass">
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
                    <div class="col-3">
                        <div class="bg-white text-dark mycol">以老師名字查詢<br>
                            <select name="checkbytecher" id="checkbytecher">
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
                </div>
            </div>

            <!-- 課程列表 -->
            <div class="bg-white text-dark mycol text-center">
                <div>
                    <p><u><b>課程列表</b></u></p>        
                    <table id="tb4" class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">日期</th>
                            <th scope="col">星期</th>
                            <th scope="col">課程名稱</th>
                            <th scope="col">授課老師</th>
                            <th scope="col">節數</th>
                            <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $page_cnt = 10;
                            $page_now = 1;
                            $now_cnt = 0;

                            $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date DESC";
                            $ro3 = mysqli_query($link,$sql);
                            $total = mysqli_num_rows($ro3);
                            $row3 = mysqli_fetch_assoc($ro3);
                            
                            do{
                                $class['date'][]=$row3['c_date'];
                            }while($row3 = mysqli_fetch_assoc($ro3));
                            
                            for($i=0;$i<$total;$i++){
                                if($class['date'][$i]==$today){
                                    $now_cnt = $i; 
                                    $page_now = ceil($now_cnt / $page_cnt);
                                }
                            }
    
                            $page_total = ceil($total/$page_cnt);

                            if(!empty($_GET["page"])){ $page_now = $_GET["page"]; }
                        
                            $page_open = ($page_now - 1) * $page_cnt;
                            
                            $p1 = $page_now -1;
                            $p2 = $page_now +1;
                        
                            if($p1 < 1){$p1 = $page_now;}
                            if($p2 > $page_total){$p2 = $page_total;}

                            $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date DESC limit ".$page_open." , ".$page_cnt;
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
                                    <td>                                
                                        <button class="btn btn-danger" onclick="modclass('<?=$row2['c_seq']?>','<?=$row2['c_date']?>','<?=$row2['c_w_n']?>','<?=$row2['c_n_name']?>','<?=$row2['c_t_name']?>','<?=$row2['c_num']?>')">修改</button>
                                        <button class="btn btn-danger" onclick="delclass('<?=$row2['c_seq']?>')">刪除</button>
                                    </td>
                                    </tr>

                        <?php   }else{ ?>

                                    <tr>
                                        <td><?=$row2['c_date']?></td>
                                        <td><?=$row2['c_w_n']?></td>
                                        <td><?=$row2['c_n_name']?></td>
                                        <td><?=$row2['c_t_name']?></td>
                                        <td><?=$row2['c_num']?></td>
                                        <td>                                
                                            <button class="btn btn-danger" onclick="modclass('<?=$row2['c_seq']?>','<?=$row2['c_date']?>','<?=$row2['c_w_n']?>','<?=$row2['c_n_name']?>','<?=$row2['c_t_name']?>','<?=$row2['c_num']?>')">修改</button>
                                            <button class="btn btn-danger" onclick="delclass('<?=$row2['c_seq']?>')">刪除</button>
                                        </td>
                                    </tr>

                        <?php   }
                                }while($row2 = mysqli_fetch_assoc($ro2)); ?>
                        </tbody>
                    </table>

                    <!-- 課程列表導覽列 -->
                    <nav id="nav" aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                            <a class="page-link" href="?menu=4&g=clm&page=<?=$p1?>">Previous</a>
                            </li>

                            <?php for($ii = 1; $ii <= $page_total ; $ii++) { 
                                if($ii == $page_now){
                                    ?>
                                    <li class="page-item"><a class="page-link  bg-primary text-white" href="?menu=4&g=clm&page=<?=$ii?>"><?=$ii?></a></li>


                            <?php }else{ ?>
                                    <li class="page-item"><a class="page-link" href="?menu=4&g=clm&page=<?=$ii?>"><?=$ii?></a></li>

                            <?php }
                                } ?>
                            
                            <li class="page-item">
                            <a class="page-link" href="?menu=4&g=clm&page=<?=$p2?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade wow lightSpeedIn" data-wow-duration="2s" id="modclass_form" role="dialog">
	<div class="modal-dialog  modal-dialog-centered">
		<div class=" modal-content">
			<div class="modal-header">
            <h3 class="modal-title">課程修改</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body form">
				<div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">日期</label>
					<div class="col-md-9">
						<div class="form-group label-floating" style="margin:0px !important">
							<input class='form-control' type='date' name='mod_cldate' id='mod_cldate'>
						</div>
					</div>
				</div>
                <div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">星期</label>
					<div class="col-md-9">
						<div class="form-group label-floating" style="margin:0px !important">
							<input class='form-control' type='text' name='mod_clweek' id='mod_clweek'>
						</div>
					</div>
				</div>
				<div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">課程名稱</label>
					<div class="col-md-9">
						<div class="form-group label-floating"  style="margin:0px !important">
                        <select class='form-control' name="mod_clname" id="mod_clname"></select>
						</div>
					</div>
                </div>
                <div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">授課老師</label>
					<div class="col-md-9">
						<div class="form-group label-floating"  style="margin:0px !important">
                        <select class='form-control' name="mod_clteacher" id="mod_clteacher"></select>
						</div>
					</div>
                </div>
                <div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">節數</label>
					<div class="col-md-9">
						<div class="form-group label-floating"  style="margin:0px !important">
                        <select class='form-control' name="mod_clnum" id="mod_clnum"></select>
						</div>
					</div>
				</div>
				<br />
			</div>
 
			<div class="modal-footer">
                <input type="button" id="mod_send" class="btn btn-primary" value="確定" />
                <input type="button" id="mod_cancel" class="btn btn-primary" value="取消" />
			</div>
		</div>
	</div>
</div>	

<?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php");
?>

<script>

var myid = "<?=$_SESSION['id']?>";
var mypermit = "<?=$_SESSION['permit']?>";

</script>
