<Style>
img:hover{
    cursor:pointer;
    /* filter: contrast(4); */
    /* filter: brightness(3); */
    /* filter: grayscale(50%); */
    /* opacity:0.5; */
    /* filter: blur(3px); */
  filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.9));
}

#modalimg{
    background-color:rgba(0,0,0,0.9);
}
</Style>

<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
    <h4>產品開發作品 及 專利發明</h4>
</div>

<!-- 履歷-作品 -->
<div class="container col-8 padding-top25 myconbg">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/a5.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">DigiMemo – Digital Note with Memory</h5>
                <a href="./img/resume/product/a5.pdf" target="_blank" class="btn btn-primary">產品型錄</a>
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/l2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">DigiMemo – Digital Note with Memory and Tablet Combo</h5>
                <a href="./img/resume/product/l2.pdf" target="_blank" class="btn btn-primary">產品型錄</a>
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/acedialer.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">AceDialer – Bluetooth Speed Dial Controller</h5>
                <a href="./img/resume/product/acedialer.pdf" target="_blank" class="btn btn-primary">產品型錄</a>
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/penpaper.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">PenPaper – Bluetooth Digital Notepad and Pen Tablet for Windows</h5>
                <a href="./img/resume/product/penpaper.pdf" target="_blank" class="btn btn-primary">產品型錄</a>
            </div>
            </div>
        </div>
            <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/flair2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Flair II - GT-504 & GT-302 Pen & Graphic Tablet</h5>
                <a href="./img/resume/product/flair2.pdf" target="_blank" class="btn btn-primary">產品型錄</a>
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/hppen.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">HP Executive Tablet Pen R2 ODM Project</h5>
            </div>
            </div>
        </div>  
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/p1.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">專利發明</h5>
                <a href="./img/resume/product/p1-t.pdf" target="_blank" class="btn btn-primary">台灣證書</a>　<a href="./img/resume/product/p1-u.pdf" target="_blank" class="btn btn-primary">美國證書</a>
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <img class="card-img-top" src="./img/resume/product/p2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">專利發明</h5>
                <a href="./img/resume/product/p2-t.pdf" target="_blank" class="btn btn-primary">台灣證書</a>　<a href="./img/resume/product/p2-c.pdf" target="_blank" class="btn btn-primary">大陸證書</a>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="modalimg" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div id="modal_imgshow" class="modal-body"></div>
	</div>
</div>	

<?php include_once("./inc/js.php"); ?>

<script>
(function($){
    $('img').on('click', function(){
        $('#modalimg').modal('show');
        $('#modal_imgshow').html("<img width='100%' src='"+this.src+"'>");
    });
})($)
</script>