<?php

    $pic_cnt = 8;
    $page_now = 1;
    $pic_total = 29;
    $page_total = ceil($pic_total / $pic_cnt);

    if(!empty($_GET["page"])){
        $page_now = $_GET["page"];
    }

    $page_open = ($page_now - 1) * $pic_cnt;
    
    $p1 = $page_now -1;
    $p2 = $page_now +1;

    if($p1 < 1){$p1 = $page_now;}
    if($p2 > $page_total){$p2 = $page_total;}

?>
<Style>
img:hover{
    cursor:pointer;
    /* filter: contrast(4); */
    /* filter: brightness(3); */
    /* filter: grayscale(50%); */
    /* opacity:0.5; */
    filter: blur(3px);
  /* filter: drop-shadow(10px 10px 10px rgba(0,0,0,0.9)); */
}

#modalimg{
    background-color:rgba(0,0,0,0.9);
}

</Style>
<!-- Gotop 按鈕 -->
<div id="gotop_btn" class="d-none">
	<a type="button" class="col-md-1 offset-10 btn fixed-bottom btn-dark text-white" href="#">Go Top</a>
</div>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h4>這些是我在課程中學習 Photoshop 的作品</h4>
</div>

<div class="myconbg container col-8 ">
    <br>
    <div class="card-columns">
        <?php
            for ($i= ($page_open + 1) ; $i<= ($page_open + $pic_cnt) ; $i++){
                if($i<=$pic_total) {
                ?>
                <div class="card">
                    <img class="card-img-top shadow" src="./img/resume/photoshop/p<?=$i?>.jpg" onclick="imgshow(<?=$i?>)">
                </div>
        <?php } } ?>
    </div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="?g=pf_ps&page=<?=$p1?>">Previous</a>
    </li>

    <?php for($ii = 1; $ii <= $page_total ; $ii++) { 
        if($ii == $page_now){
            ?>
            <li class="page-item"><a class="page-link  bg-primary text-white" href="?g=pf_ps&page=<?=$ii?>"><?=$ii?></a></li>


    <?php }else{ ?>
            <li class="page-item"><a class="page-link" href="?g=pf_ps&page=<?=$ii?>"><?=$ii?></a></li>

    <?php }
          } ?>
    
    <li class="page-item">
      <a class="page-link" href="?g=pf_ps&page=<?=$p2?>">Next</a>
    </li>
  </ul>
</nav>

<div class="modal fade " id="modalimg" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div id="modal_imgshow" class="modal-body"></div>
	</div>
</div>	

<script>
    function imgshow(x){
        $('#modalimg').modal('show');
        $('#modal_imgshow').html('<img width="100%" src="./img/resume/photoshop/p'+x+'.jpg">');
    }
</script>