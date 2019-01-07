//================ 全域宣告 =======================================
//建立Form表單用的變數
var formData = new FormData; 

//================ 預覽上傳圖片 ===================================

//檢查 照片是否小於1MB
$('input#up_pic').change(function () {
    var files = $(this)[0].files;
    var size = 0;
    var ext = $('#up_pic').val().split('.').pop().toLowerCase();
    for (var i = 0; i < files.length; i++) { //多檔案用
            size = size + this.files[i].size;
        }
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            // alert('您選擇上傳的檔案格式並非jpg/png，請重新選擇！');
            Swal({
                title: '錯誤!',
                text: '您選擇上傳的檔案格式並非jpg/png，請重新選擇！',
                type: 'error',
                confirmButtonText: '確認'
                })
            $("#up_pic").val("");
            $("#preview_img").attr("src","./img/upload_720.png"); //顯示預設圖片
        }
        if (size > 1024 * 1024) {
            // alert('您選擇上傳的檔案大小大於1MB，請重新選擇！');
            Swal({
                title: '錯誤!',
                text: '您選擇上傳的檔案大小大於1MB，請重新選擇！',
                type: 'error',
                confirmButtonText: '確認'
                })
            $("#up_pic").val("");
            $("#preview_img").attr("src","./img/upload_720.png"); //顯示預設圖片
        }
    });


//檢查 選擇小於1Mb的jpg/png圖片時, 將該檔案顯示於預覽窗
$("#up_pic").change(function(){
    readURL(this);
});

function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        var img = new Image();
        reader.onload = function (e) {
            img.src = e.target.result;
            img.onload = function() {
                // console.log(this.width);
                // console.log(this.height);
                // if(this.width>500){alert("寬度大於500");}
                // if(this.height>500){alert("高度大於500");}
                //　檢查檔案寬度與高度是否相等
                if(this.width != this.height){
                    // alert("您選擇上傳的檔案寬度不等於高度，請重新選擇！");
                    Swal({
                        title: '錯誤!',
                        text: '您選擇上傳的檔案寬度不等於高度，請重新選擇！',
                        type: 'error',
                        confirmButtonText: '確認'
                        })                    
                    $("#up_pic").val("");
                    $("#preview_img").attr("src","./img/upload_720.png");
                }else{
                    $("#preview_img").attr('src', e.target.result);
                }
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}


//================ 新增團購資料 ==========================================
//================ 計算總數量與剩餘數量 ===================================

$('input[name=onum').change(function(){
    o = $('input[name=onum]').val();
    if(o<=0){
        Swal({
            title: '錯誤!',
            html: '數量不可以小於1, 請重新輸入',
            type: 'error',
            confirmButtonText: '確認'
            })
    }
    $('input[name=rnum]').val(o);
});

//================ 新增團購資料傳送至API ==========================================
$('#gbnew').click(function(){
    myid = $('input[name=myid]').val();
    mypermit = $('input[name=mypermit]').val();
    if(myid=="guest" || mypermit == 2){
        Swal({
            title: '警告',
            text: '訪客無法參加, 請註冊或登入一般會員',
            type: 'warning',
            confirmButtonText: '確認',
            });
        }else{
            error = "";
            formData.append('id', $('input[name=myid]').val());
            formData.append('permit', $('input[name=mypermit]').val());
            if($('input[name=gbpic]').val().length >= 1){ formData.append('gbpic', $('input[name=gbpic]')[0].files[0]); }else{error = error+"請選擇上傳檔案!<br>";}
            if($('input[name=gbname]').val().length >=1 ){formData.append('gbname', $('input[name=gbname]').val()); }else{error = error+"請輸入團購名稱!<br>";}
            if($('input[name=starttime]').val().length >=1 ){formData.append('starttime', $('input[name=starttime]').val()); }else{error = error+"請輸入起始日!<br>";}
            if($('input[name=endtime]').val().length >=1 ){formData.append('endtime', $('input[name=endtime]').val()); }else{error = error+"請輸入截止日!<br>";}
            if($('input[name=pname]').val().length >=1 ){formData.append('pname', $('input[name=pname]').val()); }else{error = error+"請輸入產品名稱!<br>";}
            if($('input[name=onum]').val().length >=1 ){formData.append('onum', $('input[name=onum]').val()); }else{error = error+"請輸入總數量!<br>";}
            if($('input[name=oprice]').val().length >=1 ){formData.append('oprice', $('input[name=oprice]').val()); }else{error = error+"請輸入市價!<br>";}
            if($('input[name=gprice]').val().length >=1 ){formData.append('gprice', $('input[name=gprice]').val()); }else{error = error+"請輸入團購價!<br>";}
            if($('input[name=sprice]').val().length >=1 ){formData.append('sprice', $('input[name=sprice]').val()); }else{error = error+"請輸入特別價!<br>";}
            if($('textarea[name=gbcon]').val().length >=1 ){formData.append('gbcon', $('textarea[name=gbcon]').val()); }else{error = error+"請輸入說明!<br>";}
            if(error.length >=1){
            Swal({
                title: '錯誤!',
                html: error,
                type: 'error',
                confirmButtonText: '確認'
                })
            }else{
                $.ajax({
                url: './api/gb_new_api.php',
                method: 'POST',
                data: formData,
                contentType: false,
                // 注意這裡應設為false
                processData: false,
                cache: false,
                success: function(data){
                    if(data==1){
                        // Swal({
                        //     title: '成功',
                        //     text: '新增',
                        //     type: 'success',
                        //     confirmButtonText: '確認'
                        // });
                        alert("新增成功");
                        location.replace("?g=gb");
                    }
                        
                    if(data==2){
                        // Swal({
                        //     title: '警告',
                        //     text: '非本站會員不得新增團購',
                        //     type: 'warning',
                        //     confirmButtonText: '確認'
                        // });
                        alert("非本站一般會員不得新增");
                        location.replace("?g=gb");
                    }
                    
                    if(data==4){
                        // Swal({
                        //     title: '警告',
                        //     text: '非本站會員不得新增團購',
                        //     type: 'warning',
                        //     confirmButtonText: '確認'
                        // });
                        alert("圖片檔案格式驗證失敗");
                    }
                    
                    if(data==3){
                        // Swal({
                        //     title: '警告',
                        //     text: '非本站會員不得新增團購',
                        //     type: 'warning',
                        //     confirmButtonText: '確認'
                        // });
                        alert("會員驗證失敗, 請先登入");
                        location.replace("?g=login");
                    }
                }
            });
        }
    }
});

//================ 修改團購資料按鈕 ==========================================

$('#gbmodify').click(function(){
    $s = $('input[name=gseq').val();
    $cid = $('input[name=creater_id').val();
    location.replace('?g=gbmod&gseq='+$s+'&cid='+$cid);
});

//================ 計算總數量與剩餘數量 ===================================

old_onum = parseInt($('input[name=mod_onum').val());
old_rnum = parseInt($('input[name=mod_rnum').val());
$('input[name=mod_onum').change(function(e){
    if(new_onum <=0){
            Swal({
                title: '錯誤!',
                html: '數量不可以小於1, 請重新輸入',
                type: 'error',
                confirmButtonText: '確認'
                })
    }
    new_onum = parseInt($('input[name=mod_onum]').val());
    new_rnum = parseInt(new_onum) - parseInt(old_onum) + parseInt(old_rnum);
    $('input[name=mod_rnum]').val(new_rnum);
});

// ============== 關閉團購 ===============================================
$('#gbclose').click(function(){
    gseq = $('input[name=gseq]').val();
    id = $('input[name=myid]').val();
    permit = $('input[name=mypermit]').val();
    gclose = $('input[name=gclose]').val();
    if(id=="guest" || permit == 2 ){
        alert('訪客或會員權限不足, 不能關閉團購');
    }else{
        $.get("./api/gb_mod_api.php",{gseq, id, permit, gclose}, function(xx){
            alert("團購已被關閉");
            window.location.reload();
        });
    }
});

//============== 開啟團購 ================================================

$('#gbopen').click(function(){
    gseq = $('input[name=gseq]').val();
    id = $('input[name=myid]').val();
    permit = $('input[name=mypermit]').val();
    gopen = $('input[name=gopen]').val();
    if(id=="guest" || permit == 2 ){
        alert('訪客或會員權限不足, 不能開啟團購');

    }else{
        $.get("./api/gb_mod_api.php",{gseq, id, permit, gopen}, function(xx){
            alert("團購已被開啟");
            window.location.reload();
        });
    }
});

//============= 修改團購資料傳送至api =====================================
$('#gbmod').click(function(){
    gseq = $('input[name=gseq]').val();
    id = $('input[name=myid]').val();
    permit = $('input[name=mypermit]').val();
    if(id=="guest" || permit == 2 ){
        alert('訪客或會員權限不足, 不能修改團購');
    }else{
        error = "";
        formData.append('gseq', $('input[name=gseq]').val());
        formData.append('id', $('input[name=myid]').val());
        formData.append('permit', $('input[name=mypermit]').val());
        formData.append('rnum', $('input[name=mod_rnum]').val());
        if($('input[name=gbpic]').val().length >= 1){ formData.append('gbpic', $('input[name=gbpic]')[0].files[0]); }
        if($('input[name=gbname]').val().length >=1 ){formData.append('gbname', $('input[name=gbname]').val()); }
        if($('input[name=starttime]').val().length >=1 ){formData.append('starttime', $('input[name=starttime]').val()); }
        if($('input[name=endtime]').val().length >=1 ){formData.append('endtime', $('input[name=endtime]').val()); }
        if($('input[name=pname]').val().length >=1 ){formData.append('pname', $('input[name=pname]').val()); }
        if($('input[name=mod_onum]').val().length >=1 ){formData.append('onum', $('input[name=mod_onum]').val()); }
        if($('input[name=oprice]').val().length >=1 ){formData.append('oprice', $('input[name=oprice]').val()); }
        if($('input[name=gprice]').val().length >=1 ){formData.append('gprice', $('input[name=gprice]').val()); }
        if($('input[name=sprice]').val().length >=1 ){formData.append('sprice', $('input[name=sprice]').val()); }
        if($('textarea[name=gbcon]').val().length >=1 ){formData.append('gbcon', $('textarea[name=gbcon]').val()); }
            $.ajax({
            url: './api/gb_mod_api.php',
            method: 'POST',
            data: formData,
            contentType: false,
            // 注意這裡應設為false
            processData: false,
            cache: false,
            success: function(data){
                if(data==1){
                    // Swal({
                    //     title: '成功',
                    //     text: '新增',
                    //     type: 'success',
                    //     confirmButtonText: '確認'
                    // });
                    alert("修改成功");
                    window.location.reload();
                }
                if(data==2){
                    // Swal({
                    //     title: '警告',
                    //     text: '非本站會員不得新增團購',
                    //     type: 'warning',
                    //     confirmButtonText: '確認'
                    // });
                    alert("圖片更新成功");
                }
                
                if(data==3){
                    // Swal({
                    //     title: '警告',
                    //     text: '非本站會員不得新增團購',
                    //     type: 'warning',
                    //     confirmButtonText: '確認'
                    // });
                    alert("會員驗證失敗, 請先登入");
                    location.replace("?g=login");
                }

                if(data==4){
                    // Swal({
                    //     title: '警告',
                    //     text: '非本站會員不得新增團購',
                    //     type: 'warning',
                    //     confirmButtonText: '確認'
                    // });
                    alert("圖片驗證失敗, 請重新選擇");
                }
            }
        });
    }
});

//================= 會員參加團購 =============================

old_order_num = $('input[name=order_num]').val();
$('input[name=order_num]').change(function(){
    order_num = $('input[name=order_num]').val();    
    join_num = $('input[name=join_num]').val();
    order_num = $('input[name=order_num]').val();
    sprice = $('input[name=sprice]').val();
    gprice = $('input[name=gprice]').val();
    if(join_num>=3){
        total_price = order_num * sprice;
        $('input[name=total_price]').val(total_price);
    }
    else{
        total_price = order_num * gprice;
        $('input[name=total_price]').val(total_price);
    }
});



$('#gb_join_cancel').click(function(){
    gseq = $('input[name=gseq]').val();
    myid = $('input[name=myid]').val();
    join_num = $('input[name=join_num]').val();
    order_num = $('input[name=order_num]').val();
    sprice = $('input[name=sprice]').val();
    gprice = $('input[name=gprice]').val();

    if(myid=="guest"){
        Swal({
            title: '警告',
            text: '訪客無法參加, 請註冊或登入一般會員',
            type: 'warning',
            confirmButtonText: '確認',
            });

    }else{
        if(order_num==""){
            Swal({
            title: '警告',
            text: '請先選擇訂購數量才能參加',
            type: 'warning',
            confirmButtonText: '確認'
            });
        }else{
            if(join_num>=3){
                order_price = sprice;
            }else{ 
                order_price = gprice;
            }
            $.post("./api/gb_order_api.php",{gseq,myid,order_num,order_price}, function(xx){
                if(xx==1){
                    alert("參加成功");
                    window.location.reload();
                }
                if(xx==2){
                    alert("取消成功");
                    window.location.reload();
                }
                if(xx==3){
                    alert("會員驗證失敗");
                    location.replace("?g=login");
                }
            });
        }
    }
});

// ================= 更改訂單數量 ====================================

$('#change_order').click(function(){
    gseq = $('input[name=gseq]').val();
    myid = $('input[name=myid]').val();
    join_num = $('input[name=join_num]').val();
    order_num = $('input[name=order_num]').val();
    sprice = $('input[name=sprice]').val();
    gprice = $('input[name=gprice]').val();

    if(myid=="guest"){
        Swal({
            title: '警告',
            text: '訪客無法參加, 請註冊或登入一般會員',
            type: 'warning',
            confirmButtonText: '確認',
            });
        }else{

            if(old_order_num == order_num){
                alert("數量未變動");
                window.location.reload();
            }else{
                if(join_num>=3){
                    order_price = sprice;
                }else{ 
                    order_price = gprice;
                }
                $.get("./api/gb_order_api.php",{gseq,myid,order_num,order_price}, function(xx){
                        alert(xx);
                        window.location.reload();
                });
            }
        }
});

// ================= 會員團購列表 更改訂單數量 =========================

function order_change(gseq,myid,old_order){
    if(myid=="guest"){
        Swal({
            title: '警告',
            text: '訪客無法參加, 請註冊或登入一般會員',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }
    else{
        if(new_order = prompt('請輸入要修改的數量',old_order));
        if(new_order == old_order){
            alert('你輸入的數量未改變');
        }
        else{
            $.get("./api/gb_change_api.php",{gseq,myid,new_order},function(xx){
            alert(xx);
            });
            window.location.reload();
            // alert(new_order);
        }
    }
}

// ================= 會員團購列表 取消參加此團購 =========================

function order_cancel(gseq,myid){
    if(myid=="guest"){
        Swal({
            title: '警告',
            text: '訪客無法參加, 請註冊或登入一般會員',
            type: 'warning',
            confirmButtonText: '確認',
            });
    }
    else{
        if(confirm('確認是否取消參與此團購')){
            $.post("./api/gb_change_api.php",{gseq,myid},function(xx){
                alert(xx);
                });
                window.location.reload();
        }
    }
}

//================ 後台管理介面 新增團購資料 ==========================================
$('#admin_gbnew').click(function(){
    myid = $('input[name=myid]').val();
    mypermit = $('input[name=mypermit]').val();
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客或非管理員無法新增, 請改用有管理權限的帳號',
            type: 'warning',
            confirmButtonText: '確認',
            });
        }else{
            error = "";
            formData.append('id', $('input[name=myid]').val());
            formData.append('permit', $('input[name=mypermit]').val());
            if($('input[name=gbpic]').val().length >= 1){ formData.append('gbpic', $('input[name=gbpic]')[0].files[0]); }else{error = error+"請選擇上傳檔案!<br>";}
            if($('input[name=gbname]').val().length >=1 ){formData.append('gbname', $('input[name=gbname]').val()); }else{error = error+"請輸入團購名稱!<br>";}
            if($('input[name=starttime]').val().length >=1 ){formData.append('starttime', $('input[name=starttime]').val()); }else{error = error+"請輸入起始日!<br>";}
            if($('input[name=endtime]').val().length >=1 ){formData.append('endtime', $('input[name=endtime]').val()); }else{error = error+"請輸入截止日!<br>";}
            if($('input[name=pname]').val().length >=1 ){formData.append('pname', $('input[name=pname]').val()); }else{error = error+"請輸入產品名稱!<br>";}
            if($('input[name=onum]').val().length >=1 ){formData.append('onum', $('input[name=onum]').val()); }else{error = error+"請輸入總數量!<br>";}
            if($('input[name=oprice]').val().length >=1 ){formData.append('oprice', $('input[name=oprice]').val()); }else{error = error+"請輸入市價!<br>";}
            if($('input[name=gprice]').val().length >=1 ){formData.append('gprice', $('input[name=gprice]').val()); }else{error = error+"請輸入團購價!<br>";}
            if($('input[name=sprice]').val().length >=1 ){formData.append('sprice', $('input[name=sprice]').val()); }else{error = error+"請輸入特別價!<br>";}
            if($('textarea[name=gbcon]').val().length >=1 ){formData.append('gbcon', $('textarea[name=gbcon]').val()); }else{error = error+"請輸入說明!<br>";}
            if(error.length >=1){
            Swal({
                title: '錯誤!',
                html: error,
                type: 'error',
                confirmButtonText: '確認'
                })
            }else{
                $.ajax({
                url: './api/admin_gb_new_api.php',
                method: 'POST',
                data: formData,
                contentType: false,
                // 注意這裡應設為false
                processData: false,
                cache: false,
                success: function(data){
                    if(data==1){
                        // Swal({
                        //     title: '成功',
                        //     text: '新增',
                        //     type: 'success',
                        //     confirmButtonText: '確認'
                        // });
                        alert("新增成功");
                        window.location.reload();
                    }
                        
                    if(data==2){
                        // Swal({
                        //     title: '警告',
                        //     text: '非本站會員不得新增團購',
                        //     type: 'warning',
                        //     confirmButtonText: '確認'
                        // });
                        alert("非本站一般會員不得新增");
                        location.replace("?g=gb");
                    }
                    
                    if(data==4){
                        // Swal({
                        //     title: '警告',
                        //     text: '非本站會員不得新增團購',
                        //     type: 'warning',
                        //     confirmButtonText: '確認'
                        // });
                        alert("圖片檔案格式驗證失敗");
                    }
                    
                    if(data==3){
                        // Swal({
                        //     title: '警告',
                        //     text: '非本站會員不得新增團購',
                        //     type: 'warning',
                        //     confirmButtonText: '確認'
                        // });
                        alert("會員驗證失敗, 請先登入");
                        location.replace("?g=login");
                    }
                }
            });
        }
    }
});


//================ 後台管理介面 修改會員團購數量 ==========================================
function admin_gb_change(myid,mypermit,userid,gseq,old_order){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客或非管理員無法修改, 請改用有管理權限的帳號',
            type: 'warning',
            confirmButtonText: '確認',
            });
        }else{
    if(new_order = prompt('請輸入要修改的數量',old_order)){
        if(new_order == old_order){
            Swal({
                title: '警告',
                text: '你輸入的數量未改變',
                type: 'warning',
                confirmButtonText: '確認',
                });
        }else{
            $.get("./api/admin_gb_change_api.php",{userid,gseq,new_order},function(xx){
                alert(xx);
                window.location.reload();
            });
        }
    }else{
        alert("取消!!數量未修改!!");
    }   
}}


// ================= 後台管理介面 取消會員參加的團購 =========================

function admin_order_cancel(myid,mypermit,userid,gseq){
    if(myid=="guest" || mypermit != 1){
        Swal({
            title: '警告',
            text: '訪客或非管理員無法取消, 請改用有管理權限的帳號',
            type: 'warning',
            confirmButtonText: '確認',
            });
        }else{
        if(confirm('確認是否取消參與此團購?')){
        $.post("./api/admin_gb_change_api.php",{userid,gseq},function(xx){
            alert(xx);
            });
            window.location.reload();
    }else{
        alert("取消!!該會員參加的團購未被取消!!");
    }
        }
}

//================ 後台管理介面 刪除團購 ======================================
$('#gbdel').click(function(){
    gseq = $('input[name=gseq]').val();
    myid = $('input[name=myid]').val();
    mypermit = $('input[name=mypermit]').val();
    gdel = $('input[name=gdel]').val();
    if(myid=="guest" || mypermit != 1){
        alert('訪客或非管理員無法取消, 請改用有管理權限的帳號');
    }
    else{
        $.post("./api/admin_gb_del_api.php",{gseq, myid, mypermit, gdel}, function(xx){
            window.location.reload();
            // alert("團購已被刪除");
        });
        window.location.reload();
    }
});

//============== 開啟團購 ================================================
$('#gbundel').click(function(){
    gseq = $('input[name=gseq]').val();
    myid = $('input[name=myid]').val();
    mypermit = $('input[name=mypermit]').val();
    gundel = $('input[name=gundel]').val();
    if(myid=="guest" || mypermit != 1){
        alert('訪客或非管理員無法取消, 請改用有管理權限的帳號');
    }
    else{
        $.post("./api/admin_gb_del_api.php",{gseq, myid, mypermit, gundel}, function(xx){
            window.location.reload();
        // alert("團購已被開啟");
        });
        
    }
});