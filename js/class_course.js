//=====================共用===========================
var myid = "<?=$_SESSION['id']?>";
var mypermit = "<?=$_SESSION['permit']?>";

//抓取今天日期 格式為 2019-1-1, 若月份小於10則補0 用於比對資料庫的資料 2019-01-01
var today = new Date();
var year = today.getFullYear();
var month = today.getMonth()+1;
var day = today.getDate();

if(month <10){ month = "0"+month; }
if(day <10) { day = "0"+day; }

gettoday = year+"-"+month+"-"+day;

//=====================前台用===========================

//全部列出 (重整頁面,並跳至今日頁面)
$('#allclass').click(function(){
    // window.location.reload();
    window.location.href="?g=course";
});

//以老師查詢
$('#check_techer').change(function(){
    ckt_tseq = $("#check_techer").val();
    $('#tb_show tbody').html('');
    $('#nav').html('');
    if(ckt_tseq==0){window.location.href="?g=course";}
    $.post('./api/class_course_api.php',{ckt_tseq},function(back){
        var jd = JSON.parse(back);
        for(i=0;i<jd.total;i++){
            if(jd.date[i] == gettoday ){$('#tb_show tbody').append('<tr><td class="text-danger">'+jd.date[i]+'</td><td class="text-danger">'+jd.week[i]+'</td><td class="text-danger">'+jd.clname[i]+'</td><td class="text-danger">'+jd.teacher[i]+'</td><td class="text-danger">'+jd.num[i]+'</td></tr>');
            }else{
            $('#tb_show tbody').append('<tr><td>'+jd.date[i]+'</td><td>'+jd.week[i]+'</td><td>'+jd.clname[i]+'</td><td>'+jd.teacher[i]+'</td><td>'+jd.num[i]+'</td></tr>');
            }
        }
        swal('總共'+jd.total+'筆');
    });
});

//以課程查詢
$('#check_class').change(function(){
    ckcl_seq = $("#check_class").val();
    $('#tb_show tbody').html('');
    $('#nav').html('');
    if(ckcl_seq==0){window.location.href="?g=course";}
    $.post('./api/class_course_api.php',{ckcl_seq},function(back){
        var jd = JSON.parse(back);
        for(i=0;i<jd.total;i++){
            if(jd.date[i] == gettoday ){$('#tb_show tbody').append('<tr><td class="text-danger">'+jd.date[i]+'</td><td class="text-danger">'+jd.week[i]+'</td><td class="text-danger">'+jd.clname[i]+'</td><td class="text-danger">'+jd.teacher[i]+'</td><td class="text-danger">'+jd.num[i]+'</td></tr>');
            }else{
            $('#tb_show tbody').append('<tr><td>'+jd.date[i]+'</td><td>'+jd.week[i]+'</td><td>'+jd.clname[i]+'</td><td>'+jd.teacher[i]+'</td><td>'+jd.num[i]+'</td></tr>');
            }
        }
        swal('總共'+jd.total+'筆');
    });
});

//以日期查詢
$('#ccheck_date').change(function(){
    ckd_date = $("#ccheck_date").val();
    $('#tb_show tbody').html('');
    $('#nav').html('');
    $.post('./api/class_course_api.php',{ckd_date},function(back){
        var jd = JSON.parse(back);
        for(i=0;i<jd.total;i++){
            if(jd.date[i] == gettoday ){$('#tb_show tbody').append('<tr><td class="text-danger">'+jd.date[i]+'</td><td class="text-danger">'+jd.week[i]+'</td><td class="text-danger">'+jd.clname[i]+'</td><td class="text-danger">'+jd.teacher[i]+'</td><td class="text-danger">'+jd.num[i]+'</td></tr>');
            }else{
            $('#tb_show tbody').append('<tr><td>'+jd.date[i]+'</td><td>'+jd.week[i]+'</td><td>'+jd.clname[i]+'</td><td>'+jd.teacher[i]+'</td><td>'+jd.num[i]+'</td></tr>');
            }
        }
        $('#tb_show tbody').append('<tr><td colspan="5" class="text-primary">總共'+jd.total+'筆</td></tr>');
        // swal('總共'+jd.total+'筆');
    });
});

//以月份查詢
$('#check_month').change(function(){
    ckm_date = $("#check_month").val();
    $('#tb_show tbody').html('');
    $('#nav').html('');
    $.post('./api/class_course_api.php',{ckm_date},function(back){
        var jd = JSON.parse(back);
        for(i=0;i<jd.total;i++){
            if(jd.date[i] == gettoday ){$('#tb_show tbody').append('<tr><td class="text-danger">'+jd.date[i]+'</td><td class="text-danger">'+jd.week[i]+'</td><td class="text-danger">'+jd.clname[i]+'</td><td class="text-danger">'+jd.teacher[i]+'</td><td class="text-danger">'+jd.num[i]+'</td></tr>');
            }else{
            $('#tb_show tbody').append('<tr><td>'+jd.date[i]+'</td><td>'+jd.week[i]+'</td><td>'+jd.clname[i]+'</td><td>'+jd.teacher[i]+'</td><td>'+jd.num[i]+'</td></tr>');
            }
        }
    });
});


//=====================後台用===========================

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
            $.post('./api/admin_class_course_api.php',{newteacher,myid,mypermit},function(back){

                var jd = JSON.parse(back);
                $('input[name=newteacher]').val('');
                $('tbody#tb1').append("<tr><td>"+jd.c_t_seq+"</td><td>"+jd.c_t_name+"</td><td><button class='btn btn-danger' onclick=\"modteacher("+jd.c_t_seq+",\'"+jd.c_t_name+"\')\">修改</button><button class='btn btn-danger' onclick=\"delteacher("+jd.c_t_seq+",\'"+jd.c_t_name+"\')\">刪除</button></td></tr>");
                $('select[name=newclteacher]').append("<option value=\""+jd.c_t_seq+"\">"+jd.c_t_name+"</option>");


                // alert(xx);
                // window.location.reload();
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
            $.post("./api/admin_class_course_api.php",{tseq,modtname,myid,mypermit},function(xx){
            alert(xx);
            window.location.reload();
            });
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
            $.post("./api/admin_class_course_api.php",{deltseq,myid,mypermit},function(xx){
            alert(xx);
            window.location.reload();
            });
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
            $.post('./api/admin_class_course_api.php',{newclname,myid,mypermit},function(back){
                var jd = JSON.parse(back);
                $('input[name=newclname]').val('');
                $('tbody#tb2').prepend("<tr><td>"+jd.c_n_seq+"</td><td>"+jd.c_n_name+"</td><td><button class='btn btn-danger' onclick=\"modclassname("+jd.c_n_seq+",\'"+jd.c_n_name+"\')\">修改</button><button class='btn btn-danger' onclick=\"delclassname("+jd.c_n_seq+")\">刪除</button></td></tr>");
                $('select[name=newclname]').append("'<option value=\""+jd.c_n_seq+"\">"+jd.c_n_name+"</option>");
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
            $.post("./api/admin_class_course_api.php",{cseq,modclname,myid,mypermit},function(xx){
            alert(xx);
            window.location.reload();
            });
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
            $.post("./api/admin_class_course_api.php",{delcseq,myid,mypermit},function(xx){
            alert(xx);
            window.location.reload();
            });
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
                $.post('./api/admin_class_course_api.php',{clnum,clteacher,clname,cldate,clweek,myid,mypermit},function(back){
                    var jd = JSON.parse(back);
                    $('#tb4 tbody').prepend("<tr><td>"+jd.c_date+"</td><td>"+jd.c_w_n+"</td><td>"+jd.c_n_name+"</td><td>"+jd.c_t_name+"</td><td>"+jd.c_num+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.c_seq+",\'"+jd.c_date+"\',\'"+jd.c_w_n+"\',\'"+jd.c_n_name+"\',\'"+jd.c_t_name+"\',"+jd.c_num+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.c_seq+")\">刪除</button></td></tr>");
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
            $.post("./api/admin_class_course_api.php",{delclseq,myid,mypermit},function(xx){
                alert(xx);            
                window.location.reload();
            });
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
            text: '訪客/非管理員無法修改課程',
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
            $(this).attr("selected", true); 
        }});

        $("#mod_clnum").children().each(function(){
        if ($(this).text() == cn){
            $(this).attr("selected", true); 
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
                $.post('./api/admin_class_course_api.php',{mod_cseq,mod_cld,mod_clw,mod_cln,mod_cltn,mod_clnum,myid,mypermit},function(xx){
                    alert(xx);
                    window.location.reload();
                });
            }
        });
    }
}



//以老師查詢
$('#checkbytecher').change(function(){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法操作查詢',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        ckt_tseq = $("#checkbytecher").val();
        $('#tb4 tbody').html('');
        $('#nav').html('');
        if(ckt_tseq==0){window.location.href="?menu=4&g=clm";}
        $.post('./api/admin_class_course_api.php',{ckt_tseq,myid,mypermit},function(back){
            var jd = JSON.parse(back);
            for(i=0;i<jd.total;i++){
                if(jd.date[i] == gettoday ){$('#tb4 tbody').append("<tr><td class='text-danger'>"+jd.date[i]+"</td><td class='text-danger'>"+jd.week[i]+"</td><td class='text-danger'>"+jd.clname[i]+"</td><td class='text-danger'>"+jd.teacher[i]+"</td><td class='text-danger'>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }else{
                $('#tb4 tbody').append("<tr><td>"+jd.date[i]+"</td><td>"+jd.week[i]+"</td><td>"+jd.clname[i]+"</td><td>"+jd.teacher[i]+"</td><td>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }
            }
            swal('總共'+jd.total+'筆');
        });
    }
});


//以課程查詢
$('#checkbyclass').change(function(){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法操作查詢',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        ckcl_seq = $("#checkbyclass").val();
        $('#tb4 tbody').html('');
        $('#nav').html('');
        if(ckcl_seq==0){window.location.href="?g=course";}
        $.post('./api/admin_class_course_api.php',{ckcl_seq,myid,mypermit},function(back){
            var jd = JSON.parse(back);
            for(i=0;i<jd.total;i++){
                if(jd.date[i] == gettoday ){$('#tb4 tbody').append("<tr><td class='text-danger'>"+jd.date[i]+"</td><td class='text-danger'>"+jd.week[i]+"</td><td class='text-danger'>"+jd.clname[i]+"</td><td class='text-danger'>"+jd.teacher[i]+"</td><td class='text-danger'>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }else{
                $('#tb4 tbody').append("<tr><td>"+jd.date[i]+"</td><td>"+jd.week[i]+"</td><td>"+jd.clname[i]+"</td><td>"+jd.teacher[i]+"</td><td>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }
            }
            swal('總共'+jd.total+'筆');
        });
    }
});

//以日期查詢
$('#checkbydate').change(function(){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法操作查詢',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        ckd_date = $("#checkbydate").val();
        $('#tb4 tbody').html('');
        $('#nav').html('');
        $.post('./api/admin_class_course_api.php',{ckd_date,myid,mypermit},function(back){
            var jd = JSON.parse(back);
            for(i=0;i<jd.total;i++){
                if(jd.date[i] == gettoday ){$('#tb4 tbody').append("<tr><td class='text-danger'>"+jd.date[i]+"</td><td class='text-danger'>"+jd.week[i]+"</td><td class='text-danger'>"+jd.clname[i]+"</td><td class='text-danger'>"+jd.teacher[i]+"</td><td class='text-danger'>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }else{
                $('#tb4 tbody').append("<tr><td>"+jd.date[i]+"</td><td>"+jd.week[i]+"</td><td>"+jd.clname[i]+"</td><td>"+jd.teacher[i]+"</td><td>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }
            }
            $('#tb4 tbody').append('<tr><td colspan="5" class="text-primary">總共'+jd.total+'筆</td></tr>');
            // swal('總共'+jd.total+'筆');
        });
    }
});

//以月份查詢
$('#checkbymonth').change(function(){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客/非管理員無法操作查詢',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }else{
        ckm_date = $("#checkbymonth").val();
        $('#tb4 tbody').html('');
        $('#nav').html('');
        $.post('./api/admin_class_course_api.php',{ckm_date,myid,mypermit},function(back){
            var jd = JSON.parse(back);
            for(i=0;i<jd.total;i++){
                if(jd.date[i] == gettoday ){$('#tb4 tbody').append("<tr><td class='text-danger'>"+jd.date[i]+"</td><td class='text-danger'>"+jd.week[i]+"</td><td class='text-danger'>"+jd.clname[i]+"</td><td class='text-danger'>"+jd.teacher[i]+"</td><td class='text-danger'>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }else{
                $('#tb4 tbody').append("<tr><td>"+jd.date[i]+"</td><td>"+jd.week[i]+"</td><td>"+jd.clname[i]+"</td><td>"+jd.teacher[i]+"</td><td>"+jd.num[i]+"</td><td><button class='btn btn-danger' onclick=\"modclass("+jd.seq[i]+",\'"+jd.date[i]+"\',\'"+jd.week[i]+"\',\'"+jd.clname[i]+"\',\'"+jd.teacher[i]+"\',"+jd.num[i]+")\">修改</button><button class='btn btn-danger' onclick=\"delclass("+jd.seq[i]+")\">刪除</button></td></tr>");
                }
            }
        });
    }
});