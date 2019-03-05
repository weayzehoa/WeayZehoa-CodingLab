
<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>泰山 PHP 資料庫網頁設計班 (02期) 課程</h4>
</div>


<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol text-center">
            <div id="calendar">
            </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once("./inc/js.php"); 
?>

<script>
	$("#calendar").fullCalendar({
		locale: "zh-tw",
		//bootstrap 4 需要有 Font awesome
		themeSystem: "bootstrap4",
		//活動太多時變成 "顯示更多"
		eventLimit: true,
		events:[
            <?php
                $sql = "SELECT * from class a, class_week b, class_name c, class_teacher d where a.c_week = b.c_w_seq and a.c_name = c.c_n_seq and a.c_teacher = d.c_t_seq";
                $ro = mysqli_query($link,$sql);
                $row = mysqli_fetch_assoc($ro);
                do{
                    ?>
                {
				title: "<?=$row['c_n_name']?>",
				start: "<?=$row['c_date']?>",
				url: "?g=class_search",
				//外框顏色
				color: "#66aaeee0",
				//背景顏色
				backgroundColor: "#66aaeee0",
				//文字顏色
				textColor:"#FFF",
                },
            <?php
                } while($row = mysqli_fetch_assoc($ro)); ?>
		]
	});
</script>