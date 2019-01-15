<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h4>無登入客服系統回覆介面</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <p>
                說明：無登入線上客服系統列表. <br>
                1. 用PHP將資料庫資料撈出, 並用表格顯示. <br>
                2. 按下回覆按鈕, 會跳至該筆案件對話框. 與客戶做對話.<br>繼續, 除非重新再開一次客服.<br>
                3. 此列表使用JS function, 每5秒更新一次. (目前網站架構無法使用php header()方法)<br>
                </p>
                <div class="row">
                    <div class="col-12">
                        <table width="100%" align="center" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                                <td align="center" colspan="2"><textarea style="width:95%;height:100px;" id="qa"></textarea></td>
                                <td width="100" align="center"><button onclick="post_qa()">回復</button></td>
                            </tr>
                            <tr>
                                <td width="100" align="center">發文者</td>
                                <td align="center">內容</td>
                                <td width="200" align="center">時間</td>
                            </tr>

                            <tr>
                                <td align="center" colspan="3" id="in_talk">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php");
?>

<script>
function post_qa(){
    case_no = '<?=$_GET["to"]?>';
    case_word = $("#qa").val();
    $.post("./api/admin_service_reply_api.php",{case_no, case_word},function(x){$("#qa").val("");});
}

function in_read(){
    $.get("./api/admin_service_reply_read_api.php",{'to':'<?=$_GET["to"]?>'},function(o){
        $("#in_talk").html(o);
    });
    setTimeout("in_read()",5000);
}

in_read();
</script>