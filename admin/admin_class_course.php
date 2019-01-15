<?php
    check_permission ();
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

                            $cnpage_cnt = 5;
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

        <div class="col-7 ">
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
            <!-- 課程列表 -->
            <div class="bg-white text-dark mycol text-center">
                <div>
                    <p><u><b>課程列表</b></u></p>        
                    <table class="table table-hover">
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
                        <tbody id="tb4">
                        <?php

                            $page_cnt = 10;
                            $page_now = 1;

                            $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date DESC";
                            $ro = mysqli_query($link,$sql);
                            $total = mysqli_num_rows($ro);

                            $page_total = ceil($total/$page_cnt);

                            if(!empty($_GET["page"])){
                                $page_now = $_GET["page"];
                            }
                        
                            $page_open = ($page_now - 1) * $page_cnt;
                            
                            $p1 = $page_now -1;
                            $p2 = $page_now +1;
                        
                            if($p1 < 1){$p1 = $page_now;}
                            if($p2 > $page_total){$p2 = $page_total;}

                            $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq order by a.c_date DESC limit ".$page_open." , ".$page_cnt;
                            $ro = mysqli_query($link,$sql);
                            $row2 = mysqli_fetch_assoc($ro);
                            do {
                        ?>
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
                        <?php
                            }while($row2 = mysqli_fetch_assoc($ro));
                        ?>

                        </tbody>
                    </table>

                    <!-- 課程列表導覽列 -->
                    <nav aria-label="Page navigation example">
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

<div class="modal fade" id="modclass_form" role="dialog">
	<div class="modal-dialog">
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
                        <!-- <input class='form-control' type='text' name='mod_clname' id='mod_clname'> -->
                        <select class='form-control' name="mod_clname" id="mod_clname"></select>
						</div>
					</div>
                </div>
                <div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">授課老師</label>
					<div class="col-md-9">
						<div class="form-group label-floating"  style="margin:0px !important">
                        <!-- <input class='form-control' type='text' name='mod_clteacher' id='mod_clteacher'> -->
                        <select class='form-control' name="mod_clteacher" id="mod_clteacher"></select>
						</div>
					</div>
                </div>
                <div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">節數</label>
					<div class="col-md-9">
						<div class="form-group label-floating"  style="margin:0px !important">
                        <!-- <input class='form-control' type='text' name='mod_clnum' id='mod_clnum'> -->
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

var myid = '<?=$_SESSION['id']?>';
var mypermit = '<?=$_SESSION['permit']?>';

// 新增老師名字
$('#newteacher').click(function(){
    if(myid=="guest" || mypermit != 1){
    Swal({
        title: '警告',
        text: '訪客/非管理員無法新增',
        type: 'warning',
        confirmButtonText: '確認',
        });
    }else{
        var newteacher = $('input[name=newteacher]').val();
        if(newteacher){
            $.post('./api/admin_class_api.php',{newteacher,myid,mypermit},function(back){
                var jd = JSON.parse(back);
                $('input[name=newteacher]').val('');
                $('tbody#tb1').append('<tr><td>'+jd.c_t_seq+'</td><td>'+jd.c_t_name+'</td><td><button class="btn btn-danger" onclick="modteacher('+jd.c_t_seq+','+jd.c_t_name+')">修改</button><button class="btn btn-danger" onclick="delclassname('+jd.c_t_seq+','+jd.c_t_name+')">刪除</button></td></tr>');
                $('select[name=newclteacher]').append('<option value="'+jd.c_t_seq+'">'+jd.c_t_name+'</option>');
            });
        }else{
            swal({
			  title: '錯誤',
			  text: '欄位不能為空,請輸入老師名字',
			  type: 'error',
			  confirmButtonClass: "btn btn-info",
			  buttonsStyling: false
			})
        }
    }
});

// 修改老師名字
function modteacher(tseq,oldtname){
    if(myid=="guest" || mypermit != 1){
    Swal({
        title: '警告',
        text: '訪客/非管理員無法修改老師名字',
        type: 'warning',
        confirmButtonText: '確認',
        });
    }else{
        if(modtname = prompt('請輸入要修改的名字',oldtname)){
        if(modtname == oldtname){
            alert('你輸入的名字未改變');
        }
        else{
            $.post("./api/admin_class_api.php",{tseq,modtname,myid,mypermit},function(xx){
            alert(xx);
            });
            window.location.reload();
        }
        }else{
            alert('取消修改');
        }
    }
}

// 刪除老師名字
function delteacher(deltseq,oldtname){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法刪除老師名字',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        if(confirm('注意!!刪除老師名字將會一併刪除已存在的課程!!')){
            $.post("./api/admin_class_api.php",{deltseq,myid,mypermit},function(xx){
            alert(xx);
            });
            window.location.reload();
        }else{
            alert('取消刪除');
        }
    }
}

// 日期改變則顯示星期
$('input[name=newdate]').change(function(){
    var dayname = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
    newdate = $('input[name=newdate]').val();
    weekName = dayname[new Date(newdate).getDay()];
    $('input[name=weekname]').val(weekName);
});

// 新增課程名稱
$('#newclname').click(function(){
    if(myid=="guest" || mypermit != 1){
    Swal({
        title: '警告',
        text: '訪客/非管理員無法新增',
        type: 'warning',
        confirmButtonText: '確認',
        });
    }else{
        var newclname = $('input[name=newclname]').val();
        if(newclname){
            $.post('./api/admin_class_api.php',{newclname,myid,mypermit},function(back){
                var jd = JSON.parse(back);
                $('input[name=newclname]').val('');
                $('tbody#tb2').append('<tr><td>'+jd.c_n_seq+'</td><td>'+jd.c_n_name+'</td><td><button class="btn btn-danger" onclick="modclassname('+jd.c_n_seq+','+jd.c_n_name+')">修改</button><button class="btn btn-danger" onclick="delclassname('+jd.c_n_seq+')">刪除</button></td></tr>');
                $('select[name=newclname]').append('<option value="'+jd.c_n_seq+'">'+jd.c_n_name+'</option>');
            });
        }else{
            swal({
			  title: '錯誤',
			  text: '欄位不能為空,請輸入課程名稱',
			  type: 'error',
			  confirmButtonClass: "btn btn-info",
			  buttonsStyling: false
			})
        }
    }
});

// 修改課程名稱
function modclassname(cseq,oldclname){
    if(myid=="guest" || mypermit != 1){
    Swal({
        title: '警告',
        text: '訪客/非管理員無法修改課程名稱',
        type: 'warning',
        confirmButtonText: '確認',
        });
    }else{
        if(modclname = prompt('請輸入要修改的課程名稱',oldclname)){
        if(modclname == oldclname){
            alert('你輸入的課程名稱未改變');
        }
        else{
            $.post("./api/admin_class_api.php",{cseq,modclname,myid,mypermit},function(xx){
            alert(xx);
            });
            window.location.reload();
        }
        }else{
            alert('取消修改');
        }
    }
}

// 刪除課程名稱
function delclassname(delcseq,oldclname){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法刪除課程名稱',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        if(confirm('注意!!刪除課程名稱將會一併刪除已存在的課程!!')){
            $.post("./api/admin_class_api.php",{delcseq,myid,mypermit},function(xx){
            alert(xx);
            });
            window.location.reload();
        }else{
            alert('取消刪除');
        }
    }
}

// 新增課程
$('#newclass').click(function(){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法新增',
            type: 'warning',
            confirmButtonText: '確認',
            });
        }else{
            clweek = new Date($('input[name=newdate]').val()).getDay();
            cldate = $('input[name=newdate]').val();
            clname = $('select[name=newclname]').val();
            clteacher = $('select[name=newclteacher]').val();
            clnum = $('select[name=newclnum]').val();
            if(clweek && cldate){
                $.post('./api/admin_class_api.php',{clnum,clteacher,clname,cldate,clweek,myid,mypermit},function(back){
                    var jd = JSON.parse(back);
                        $("#tb4").prepend('<tr><td>'+jd.c_date+'</td><td>'+jd.c_w_n+'</td><td>'+jd.c_n_name+'</td><td>'+jd.c_t_name+'</td><td>'+jd.c_num+'</td><td><button class="btn btn-danger" onclick="modclass('+jd.c_seq+','+jd.c_date+','+jd.c_w_n+','+jd.c_n_name+','+jd.c_t_name+','+jd.c_num+')">修改</button><button class="btn btn-danger" onclick="delclass('+jd.c_seq+')">刪除</button></td></tr>');
                        swal({
                            title: '成功',
                            text: '新增成功',
                            type: 'success',
                            confirmButtonClass: "btn btn-info",
                            buttonsStyling: false
                        });
                    });
            }else{
                swal({
                title: '錯誤',
                text: '日期欄位不能為空,請輸入日期',
                type: 'error',
                confirmButtonClass: "btn btn-info",
                buttonsStyling: false
                });
            }
        }
});

// 刪除課程
function delclass(delclseq){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法刪除課程名稱',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        if(confirm('確定要刪除該筆課程??')){
            $.post("./api/admin_class_api.php",{delclseq,myid,mypermit},function(xx){
            alert(xx);
            });
            window.location.reload();
        }else{
            alert('取消刪除');
        }
    }
}

// 修改課程
function modclass(mod_cseq,cld,clw,cln,cltn,cn){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法刪除課程名稱',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        $('#mod_cancel').click(function(){
            Swal({
            title: '訊息',
            text: '取消修改',
            type: 'info',
            confirmButtonText: '確認',
            });
            $('#modclass_form').modal('hide');
        });

        $('input[name=mod_cldate]').change(function(){
        var dayname = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
        newdate = $('input[name=mod_cldate]').val();
        weekName = dayname[new Date(newdate).getDay()];
        $('input[name=mod_clweek]').val(weekName);
        });

        $('#modclass_form').modal('show');
        $('#mod_cldate').val(cld);
        $('#mod_clweek').val(clw);

        $('#mod_clname').html($('select[name=newclname').html());
        $('#mod_clteacher').html($('select[name=newclteacher').html());
        $('#mod_clnum').html($('select[name=newclnum').html());

        $("#mod_clname").children().each(function(){
        if ($(this).text() == cln){
            //jQuery給法
            $(this).attr("selected", true); //或是給"selected"也可
            //javascript給法
            // this.selected = true; 
        }});

        $("#mod_clteacher").children().each(function(){
        if ($(this).text() == cltn){
            //jQuery給法
            $(this).attr("selected", true); //或是給"selected"也可
            //javascript給法
            // this.selected = true; 
        }});

        $("#mod_clnum").children().each(function(){
        if ($(this).text() == cn){
            //jQuery給法
            $(this).attr("selected", true); //或是給"selected"也可
            //javascript給法
            // this.selected = true; 
        }});

        $('#mod_send').click(function(){
            mod_cld = $("#mod_cldate").val();
            mod_clw = new Date(mod_cld).getDay();
            mod_cln = $("#mod_clname").val();
            mod_cln_text = $('select#mod_clname option:selected').text();
            mod_cltn = $("#mod_clteacher").val();
            mod_cltn_text = $('select#mod_clteacher option:selected').text();
            mod_clnum = $("#mod_clnum").val();
            mod_clnum_text = $('select#mod_clnum option:selected').text();

            if( mod_cld == cld && mod_cln_text == cln && mod_cltn_text == cltn && mod_clnum_text == cn){
                Swal({
                    title: '警告',
                    text: '所有資料未改變, 取消修改.',
                    type: 'warning',
                    confirmButtonText: '確認',
                });
            }else{
                $('#modclass_form').modal('hide');
                $.post('./api/admin_class_api.php',{mod_cseq,mod_cld,mod_clw,mod_cln,mod_cltn,mod_clnum,myid,mypermit},function(back){
                    Swal({
                    title: '成功',
                    text: '課程修改成功.',
                    type: 'success',
                    confirmButtonText: '確認',
                    });
                });
            }
        });
    }
}



// $("#tb4 td button:button").click(function(){
//     var td = $(this).parent();
//     td.parents("tbody:first").find("td");
//     //取得td的父層(tr)
//     var tr = td.parent();
//     //取得欄位index，不需解釋為什要加1吧?…
//     var nthChild = tr.children().index(td) +1;
//     var Str="";
//     //迴圈
//     for(i=0;i<nthChild-1;i++){
//     Str=Str+" "+tr.children().eq(i).text();
//     //alert(tr.children().eq(i).text());
//     }
    
//     console.log(Str);
// });
</script>
