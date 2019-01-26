<?php
    
    if (!empty($_POST['check'])) {
        if ($_POST['check']==$_SESSION['check']) {
            $sql = "INSERT into msgboard value(null,'".$_POST['name']."','".$_POST['email']."','".$_POST['title']."','".$_POST['con']."','".$time."',0)";
            mysqli_query($link, $sql) or die("資料庫語法錯誤".$sql);
            unset($_SESSION['check']);
            echo '<script>window.location.href="?g=msgboard"</script>';
        }
    }

    $_SESSION['check'] = rand(1000,9999);
    
    $sql = "SELECT * from msgboard  order by m_seq DESC";
    $ro = mysqli_query($link,$sql);
    $num = mysqli_num_rows($ro);
    $row = mysqli_fetch_assoc($ro);

?>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>練習撰寫簡易留言板功能.　本功能任何人都可以留言或回覆留言, 不檢查是否登入會員.</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <!-- 團購列表 --> 
                <h3>目前共有 <?=$num?> 筆留言.</h3>
            </div>
        </div>
    </div>
</div>

<?php 

    $i = $num;
do{ ?>


<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <div class="row">
                    <div class="col-2">第 <?php echo$i; $i--;?> 篇</div><div class="col-10">主題：<?=$row['m_title']?></div>
                    <div class="col-2">發文者：<?=$row['m_name']?></div><div class="col-3">發文時間：<?=$row['m_time']?></div>
                    <div  class="col-1 offset-6"><button class="btn-sm btn-primary" type="button" value="<?=$row['m_seq']?>">回覆</button></div>
                </div>
                <div style="min-height:80px" class="border border-primary"><?=$row['m_con']?></div>

                <?php
                    $sql = "SELECT * from msgboard_reply where m_r_no ='".$row['m_seq']."'";
                    $ro1 = mysqli_query($link,$sql);
                    $num1 = mysqli_num_rows($ro1);
                    $row1 = mysqli_fetch_assoc($ro1);

                        if ($num1>=1) {
                            do { ?>
                                <div class="row">
                                    <div class="col-2 offset-2">回覆者：<?=$row1['m_r_name']?></div><div class="col-3">回覆時間：<?=$row1['m_r_time']?></div>
                                </div>
                                <div style="min-height:80px" class="col-10 offset-2 border border-primary"><?=$row1['m_r_con']?></div>

                <?php } while ($row1 = mysqli_fetch_assoc($ro1)); } ?>

            </div>
        </div>
    </div>
</div>

<?php }while($row = mysqli_fetch_assoc($ro)); ?>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol">
                <div class="col-8 offset-2">
                    <h4>發表新的留言</h4>
                    <h6>你的電子郵件位址並不會被公開。</h6>
                </div>
                <form method="post">
                    <label class="col-2 offset-2 col-form-label">名字或暱稱</label>
                    <div class="col-8 offset-2">
                        <input type="text" class="form-control" name="name" placeholder="請輸入名字或暱稱" required>
                    </div>
                    <label class="col-2 offset-2 col-form-label">電子郵件</label>
                    <div class="col-8 offset-2">
                        <input type="email" class="form-control" name="email" placeholder="請輸入電子郵件" required>
                    </div>
                    <label class="col-2 offset-2 col-form-label">主題</label>
                    <div class="col-8 offset-2">
                        <input type="text" class="form-control" name="title" placeholder="請輸入留言主題" required>
                    </div>
                    <label class="col-2 offset-2 col-form-label">留言內容</label>
                    <div class="col-8 offset-2">
                        <textarea style="min-height:150px" class="form-control" name="con" placeholder="請輸入留言內容" required></textarea>
                    </div>
                    <div class="form-check col-8 offset-2">
                        <input class="form-check-input" type="checkbox" name="check" value="<?=$_SESSION['check']?>" required>
                        <label class="form-check-label" for="gridCheck">請勾選同意確認. (Agree)</label>
                    </div>
                    <br>
                    <div class="col-8 offset-2">
                    <button type="submit" class="btn btn-primary">送出</button>
                    <button type="reset" class="btn btn-primary">清除</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reply_form" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class=" modal-content">
			<div class="modal-header">
            <h3 class="modal-title">回覆留言</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body form">
				<div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">名字或暱稱</label>
					<div class="col-md-9">
						<div class="form-group label-floating" style="margin:0px !important">
							<input class='form-control' type='text' name='modalname' id='modalname' required='true'>
						</div>
					</div>
				</div>
                <div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">電子郵件</label>
					<div class="col-md-9">
						<div class="form-group label-floating" style="margin:0px !important">
							<input class='form-control' type='text' name='modalemail' id='modalemail' required='true'>
						</div>
					</div>
				</div>
				<div class="row">
					<label class="col-3 label-on-left" style="padding:15px 5px 0 0;text-align: right;">留言內容</label>
					<div class="col-md-9">
						<div class="form-group label-floating"  style="margin:0px !important">
							<textarea class='form-control' type='text' id='modalcon' name='modalcon' required='true'></textarea>
						</div>
					</div>
				</div>
				<br />
			</div>
 
			<div class="modal-footer">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check" value="<?=$_SESSION['check']?>" required>
                <label class="form-check-label" for="gridCheck">請勾選同意確認. (Agree)</label>
            </div>
				<input type="button" id="reply_send" class="btn btn-primary" value="確定" />
			</div>
		</div>
	</div>
</div>	

<script>check = <?=$_SESSION['check']?>;</script>