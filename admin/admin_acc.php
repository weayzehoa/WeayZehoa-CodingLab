<?php
check_permission ();

if(!empty($_POST["cseq"])){
  if($_SESSION["permit"]==1){
  $sql = "UPDATE player set p_id = '".$_POST["cid"]."', p_name = '".$_POST["cname"]."', p_nick ='".$_POST["cnick"]."', p_sex ='".$_POST["csex"]."', p_email ='".$_POST["cmail"]."', p_permit ='".$_POST["cmit"]."' where p_seq = '".$_POST["cseq"]."'";
  mysqli_query($link,$sql);
  echo "<script>document.location.href='?g=acc';</script>";
  }
  else{
    echo "<script>alert('抱歉, 你的權限無法做修改動作');</script>";
    echo "<script>document.location.href = '?g=acc';</script>";
  }
}

if (!empty($_POST["myname"][0])) {
  for ($i = 0; $i < count($_POST["myname"]); $i++) {
    $sql = "UPDATE player SET p_name='" . $_POST["myname"][$i] . "' WHERE p_seq='" . $_POST["myid"][$i] . "'";
    mysqli_query($link, $sql);
            // web_log(str_replace("'", "\'", "$sql"));
  }
}

    // 跨三個資料表查詢 性別 及 權限. 可以直接使用 性別 與 權限 的資料表欄位, 不需要跑兩次及比對迴圈.
$sql = "SELECT * FROM player a, player_sex b, player_permission c WHERE a.p_del = 0 and a.p_sex = b.p_s_seq and a.p_permit = c.p_p_seq";
$ro = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($ro);
?>

<!-- 後台管理系統歡迎畫面 -->
<div class="myheadbg text-white container-fiuld text-shadow-bu1 text-center">
    <h4>本頁面僅限有管理者權限才能登入. (guest帳號可以唯讀方式進入)</h4>
</div>
<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <div class="row">
                    <div class="col-10 offset-1">
                        <br>
                        <p>新增帳號 (直接使用表格方式操作)</p>
                        <form method="get">
                        <div class="form-row">
                            <div class="col-2">
                                帳號<input type="text" name="pid" class="form-control" placeholder="ID" required>
                            </div>
                            <div class="col-2">
                                密碼<input type="password" name="ppw" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-2">
                                姓名<input type="text" name="pname" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-1">
                                暱稱<input type="text" name="pnick" class="form-control" placeholder="Nick Name" required>
                            </div>
                            <div class="col-1">
                                性別<select name="psex" class="form-control">
                                <option value="1" selected>男</option>
                                <option value="2">女</option>
                                <option value="3">未知</option>
                                </select></div>
                            <div class="col-2">
                                電子郵件<input type="text" name="pmail" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="col-1">
                                權限<select name="pmit" class="form-control">
                                <option value="2" selected>唯讀</option>
                                <option value="1">完整</option>
                                <option value="3">一般會員</option>
                                <option value="4">修改</option>
                                <option value="5">刪除</option>
                                </select>
                            </div>
                            <div class="col-1">
                                　<input type="hidden" name="g" value="acc_add"><button type="submit" class="btn btn-primary form-control">新增</button>
                            </div>
                        </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fiuld myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <div class="row">
                    <div class="col-12">
                        說明:<br>
                        1. 使用跨資料表查詢目前所有帳號並用表格列出.<br>
                        2. 直接在表格內修改資料, 按下右側修改按鈕即可將該筆帳號所有資料修改.<br>
                        3. 按下修改密碼則跳至修改密碼頁面. (須提供舊密碼, 新密碼至少8-16位數)<br>
                        4. 按下刪除, 則會檢查權限是否足夠, 不足時將會彈出錯誤訊息並跳回原頁面.<br>
                        註:資料列表時需要向資料庫查詢性別與權限的資料表, 若在do迴圈裡使用了查詢兩次資料庫, 資料龐大時會造成資料庫很大負擔.<br>
                        所以這邊將兩次查詢的動作修改成在列表時, 先至function裡面將 性別 與 權限 先一次性將資料載入變數中.<br>

                        待完成.<br>
                        改用JQuery方式直接呼叫API方式, 透過JSON傳遞修改值.<br>
                        <table class="table table-hover table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">帳號</th>
                                <th scope="col">姓名</th>
                                <th scope="col">暱稱</th>
                                <th scope="col">性別</th>
                                <th scope="col">電子郵件</th>
                                <th scope="col">權限</th>
                                <th scope="col">創建時間</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php 
                                $c = 1; //利用 $i變數來計數do迴圈的次數, 並當作編號顯示
                                $sex=get_sex(); //資料列表前 先將 性別 的代號載入節省搜尋資料庫的動作
                                $pmit=get_permit(); //資料列表前 先將 權限 的代號載入節省搜尋資料庫的動作
                                do { ?>
                                <form method="post">
                                    <tr>
                                    <th scope="row">
                                        <?php echo $c;
                                            $c++; ?>
                                    </th>
                                    <input type="hidden" name="cseq" class="form-control" value="<?= $row["p_seq"] ?>">
                                    <td><input type="text" name="cid" class="form-control" value="<?= $row["p_id"] ?>"></td>
                                    <td><input type="text" name="cname" class="form-control" value="<?= $row["p_name"] ?>"></td>
                                    <td><input type="text" name="cnick" class="form-control" value="<?= $row["p_nick"] ?>"></td>
                                    <td><select name="csex" class="form-control">

                                    <?php
                                        //利用for迴圈將資料載入
                                        for ($i=0; $i < count($sex["seq"]); $i++) { 
                                           $select ="";
                                            //下拉式選單預設值的變數為空值
                                            if ($row["p_sex"] == $sex["seq"][$i]) {
                                                $select="selected='selected'";
                                            } ?>
                                
                                    <option value="<?=$sex["seq"][$i]?>" <?=$select?> > <?=$sex["sex"][$i]?></option>
                                
                                    <?php } ?>

                                        </select></td>

                                    <td><input type="text" name="cmail" class="form-control" value="<?= $row["p_email"] ?>"></td>

                                    <td><select name="cmit" class="form-control">

                                    <?php
                                        //利用for迴圈將資料載入
                                        for ($i=0; $i < count($pmit["seq"]); $i++) { 
                                            $select ="";
                                            //下拉式選單預設值的變數為空值
                                            if ($row["p_permit"] == $pmit["seq"][$i]) {
                                                $select="selected='selected'";
                                            } ?>
                                    
                                    <option value="<?=$pmit["seq"][$i]?>" <?=$select?> > <?=$pmit["permit"][$i]?></option>
                                
                                    <?php } ?>
                                        </select></td>

                                    <td>
                                        <?= $row["p_ctime"] ?>
                                    </td>
                                    <td><input type="submit" value="修改">&nbsp;
                                    </form>
                                        <a href="?g=acc_up&seq=<?= $row["p_seq"] ?>">&nbsp;修改密碼&nbsp;</a>&nbsp;
                                        <a class="text-danger" href="?g=acc_del&no=<?= $row["p_seq"] ?>">刪除</a></td>
                                <?php } while ($row = mysqli_fetch_assoc($ro)) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>