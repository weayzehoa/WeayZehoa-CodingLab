<style>

#resume_menu{
    position:fixed;
    background-color:rgb(230, 230, 230);
}

.about_box1{
    height:160px;
    border-bottom:5px solid #007afb;
}

.about_box2{
    height:160px;
    border-bottom:5px solid #dc3545;
}

.about_box3{
    height:160px;
    border-bottom:5px solid #18a1b8;
}

.about_box4{
    height:160px;
    border-bottom:5px solid #ffc107;
}
</style>

<!-- Gotop 按鈕 -->
<div id="gotop_btn" class="d-none">
	<a type="button" class="col-md-1 offset-10 btn fixed-bottom btn-dark text-white" href="#">Go Top</a>
</div>

<!-- Bootstrap Scrollspy 選單監控 -->

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

<!-- 履歷選單 -->
<div class="padding-top100 col-2 offset-2 vh-100 border-right border-primary" id="resume_menu">
	<div class="rounded-circle text-center">
		<img class="rounded-circle shadow" width="75%" src="./img/resume/resume.png">
	</div>
	<!-- <div class="wow rollIn" data-wow-duration="3s"> -->
	<div>
		<div class="text-center padding-top25">
			<h4>吳偉召 (Roger Wu)</h4>
			<!-- <h6>PHP Website Designer</h6> -->
		</div>
		<div class="text-center">
			<h6><i class="far fa-envelope text-primary"></i>：<a href="mailto:weayzehoa@gmail.com">weayzehoa@gmail.com</a></h6>
		</div>
		<div class="text-center">
			<h6><i class="fas fa-map-marker-alt text-primary"></i>：新北市, 新店區</h6>
		</div>
	</div>
	<br>
	<div>
		<nav id="myScrollspy" class="text-center">
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="#resume_about">關於我</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#resume_professional">專業</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#resume_skills">技能</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#resume_experience">經歷</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#resume_introduction">自我推薦</a>
				</li>
			</ul>
		</nav>
	</div>
	<div style=" font-size:0.5em" class="text-center padding-top150">
		<p class="padding-top25">&copy;
		<?=date("Y")?> WeayZehoa Coding Lab. All rights reserved.<br>
		請使用電腦版 <a href="https://www.google.com/chrome/">Chrome</a> 全螢幕瀏覽本網站.</p>
	</div>
</div>
<!-- 履歷-關於我 -->
<div id="resume_about" class="container padding-top col-6 offset-4 bg-white text-dark text-left">
	<h2 class="text-center padding-top25"><u>關於我</u></h2>
	<hr>
	<div class="text-center"><img width="65%" src="img/resume/about.jpg" alt=""></div>
	<br>
	<h5 class="col-10 offset-1 text-left">自從在大學時期開始接觸電腦時，我非常熱愛接觸任何與電腦相關的訊息，並學習任何與電腦相關的知識，包括:
		硬體設備、作業系統、程式語言、網路及各種應用軟體，加上自身電子電機科系，對於電子電路並不陌生，因此奠下往後在資訊產業的工作基礎。</h5>
	<br>
	<div class="col-10 offset-1">
		<div class="row">
			<div class="col-3 wow slideInLeft" data-wow-duration="3s">
				<div class="col-12 shadow about_box1"><br>
					<h1><i class="far fa-lightbulb text-primary"></i></h1><br>
					<h5>產品開發</h5>
				</div>
			</div>
			<div class="col-3 wow slideInDown" data-wow-duration="3s">
				<div class="col-12 shadow about_box2"><br>
					<h1><i class="fas fa-network-wired text-danger"></i></h1><br>
					<h5>網路管理</h5>
				</div>
			</div>
			<div class="col-3 wow slideInUp" data-wow-duration="3s">
				<div class="col-12 shadow about_box3"><br>
					<h1><i class="fab fa-php text-info"></i></h1><br>
					<h5>PHP程式設計</h5>
				</div>
			</div>
			<div class="col-3 wow slideInRight" data-wow-duration="3s">
				<div class="col-12 shadow about_box4"><br>
					<h1><i class="fas fa-code text-warning"></i></h1><br>
					<h5>網頁設計</h5>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 履歷-專業 -->
<div id="resume_professional" class="container padding-top vh-100 col-6 offset-4 bg-white text-dark">
	<h2 class="text-center padding-top25"><u>主要專業</u></h2>
	<hr>
	<h5 class="col-10 offset-1 text-left">過去我的專業主要是在電子產品企劃開發（繪圖板、數位筆記本、數位筆及電容筆相關技術），現在我的專業專注在網頁設計。</h5>
	<br>
	<div class="row vh-25">
		<div id="resume_professional_1" class="col-5 offset-1 wow heartBeat" data-wow-duration="3s">
				<ul class="list-unstyled">
					<li>
						<h4><i class="fas fa-code text-warning"></i></i>&nbsp;網頁設計</h4>
					</li>
					<ul>
						<li>
							<h5>Joomla 網站建置及管理</h5>
						</li>
						<li>
							<h5>JQuery, Bootstrap 網頁設計</h5>
						</li>
						<li>
							<h5>PHP & MySQL 資料庫程式設計</h5>
						</li>
						<li>
							<h5>AJAX 前後端串接</h5>
						</li>
					</ul>
					</li>
				</ul>
		</div>
		<div id="resume_professional_11" class="col-5">
			<img width="100%" class="shadow" src="./img/resume/professional3.jpg">
		</div>
	</div>
	<div class="row vh-25">
		<div id="resume_professional_2" class="col-5 offset-1">
			<img width="100%" class="shadow" src="./img/resume/professional2.jpg">
		</div>
		<div id="resume_professional_21" class="col-5">
			<ul class="list-unstyled  wow heartBeat" data-wow-duration="3s" data-wow-duration="3s">
				<li>
					<h4><i class="fas fa-network-wired text-danger"></i></i>&nbsp;網路管理</h4>
				</li>
				<ul>
					<li>
						<h5>機房管理</h5>
					</li>
					<li>
						<h5>網路佈建規劃及管理</h5>
					</li>
					<li>
						<h5>電腦設備維護</h5>
					</li>
					<li>
						<h5>Server建置及維護</h5>
					</li>
				</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="row vh-25">
		<div id="resume_professional_3" class="col-5 offset-1 ">
			<ul class="list-unstyled wow heartBeat" data-wow-duration="3s">
				<li>
					<h4><i class="far fa-lightbulb text-primary"></i>&nbsp;產品企劃開發</h4>
				</li>
				<ul>
					<li>
						<h5>專利分析、撰寫、商標資料管理</h5>
					</li>
					<li>
						<h5>產品開發及規劃</h5>
					</li>
					<li>
						<h5>OEM/ODM 產品開發</h5>
					</li>
					<li>
						<h5>產品行銷</h5>
					</li>
				</ul>
				</li>
			</ul>
		</div>
		<div id="resume_professional_31" class="col-5">
			<img width="100%" class="shadow" src="./img/resume/professional1.jpg">
		</div>
	</div>
</div>
<!-- 履歷-技能 -->
<div id="resume_skills" class="container padding-top vh-100 col-6 offset-4 bg-white text-dark">
	<h2 class="text-center padding-top25"><u>工具技能</u></h2>
	<hr>
	<h5 class="col-10 offset-1 text-left">工欲善其事，必先利其器，活到老學到老，除了過去工作中學習的技能，還有自身學習的技能，能讓我在工作中發揮及快速地完成事情。(註:0%為預計學習)</h5>
	<br>
	<div class="row">
		<div id="resume_skills_1" class="col-5 offset-1 vh-30">
			<h4><i class="fas fa-code text-warning"></i></i>&nbsp;網頁設計</h4>
			<div class="col-12">
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>HTML</h5>
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
							 style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>CSS</h5>
						<div class="progress">
							<div class="progress-bar color-2" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
							 style="width:85%">
								<span>85%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>Bootstrap</h5>
						<div class="progress">
							<div class="progress-bar color-3" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
							 style="width:75%">
								<span>75%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>Joomla</h5>
						<div class="progress">
							<div class="progress-bar color-4" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
							 style="width:85%">
								<span>85%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>Dreamweaver</h5>
						<div class="progress">
							<div class="progress-bar color-5" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
							 style="width:65%">
								<span>65%</span>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="animate-box" data-animate-effect="fadeInRight">
				<div class="progress-wrap">
					<h5>SEO</h5>
					<div class="progress">
					 	<div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
					  	aria-valuemin="0" aria-valuemax="100" style="width:80%">
					    <span>80%</span>
					  	</div>
					</div>
				</div>
			</div> -->
			</div>
		</div>
		<div id="resume_skills_2" class="col-5 vh-30">
			<h4><i class="fas fa-laptop-code text-info"></i></i>&nbsp;程式設計</h4>
			<div class="col-12">
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>PHP & MySQL</h5>
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
							 style="width:85%">
								<span>85%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>JavaScript</h5>
						<div class="progress">
							<div class="progress-bar color-2" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
							 style="width:75%">
								<span>75%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>jQuery</h5>
						<div class="progress">
							<div class="progress-bar color-3" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
							 style="width:80%">
								<span>80%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>Laravel</h5>
						<div class="progress">
							<div class="progress-bar color-4" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
							 style="width:0%">
								<span>0%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>Vue.js</h5>
						<div class="progress">
							<div class="progress-bar color-5" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
							 style="width:0%">
								<span>0%</span>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="animate-box" data-animate-effect="fadeInRight">
				<div class="progress-wrap">
					<h5>SEO</h5>
					<div class="progress">
					 	<div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
					  	aria-valuemin="0" aria-valuemax="100" style="width:80%">
					    <span>80%</span>
					  	</div>
					</div>
				</div>
			</div> -->
			</div>
		</div>
		<div id="resume_skills_3" class="col-5 offset-1 vh-25">
				<h4><i class="fas fa-network-wired text-danger"></i></i>&nbsp;網路管理</h4>
				<div class="col-12">
					<div class="animate-box" data-animate-effect="fadeInLeft">
						<div class="progress-wrap">
							<h5>Windows Server</h5>
							<div class="progress">
								<div class="progress-bar color-1" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
								 style="width:75%">
									<span>75%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="animate-box" data-animate-effect="fadeInRight">
						<div class="progress-wrap">
							<h5>FreBSD Server</h5>
							<div class="progress">
								<div class="progress-bar color-2" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
								 style="width:80%">
									<span>80%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="animate-box" data-animate-effect="fadeInLeft">
						<div class="progress-wrap">
							<h5>Synology NAS</h5>
							<div class="progress">
								<div class="progress-bar color-3" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
								 style="width:90%">
									<span>90%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="animate-box" data-animate-effect="fadeInRight">
						<div class="progress-wrap">
							<h5>QNAP NAS</h5>
							<div class="progress">
								<div class="progress-bar color-4" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
								 style="width:90%">
									<span>90%</span>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>WordPress</h5>
						<div class="progress">
						 	<div class="progress-bar color-5" role="progressbar" aria-valuenow="70"
						  	aria-valuemin="0" aria-valuemax="100" style="width:70%">
						    <span>70%</span>
						  	</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>SEO</h5>
						<div class="progress">
						 	<div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
						  	aria-valuemin="0" aria-valuemax="100" style="width:80%">
						    <span>80%</span>
						  	</div>
						</div>
					</div>
				</div> -->
				</div>
		</div>
		<div id="resume_skills_4" class="col-5 vh-25">
				<h4><i class="far fa-lightbulb text-primary"></i>&nbsp;產品企劃開發</h4>
				<div class="col-12">
					<div class="animate-box" data-animate-effect="fadeInLeft">
						<div class="progress-wrap">
							<h5>Microsoft Office</h5>
							<div class="progress">
								<div class="progress-bar color-1" role="progressbar" aria-valuenow="90%" aria-valuemin="0" aria-valuemax="100"
								 style="width:90%">
									<span>90%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="animate-box" data-animate-effect="fadeInRight">
						<div class="progress-wrap">
							<h5>Microsoft Project</h5>
							<div class="progress">
								<div class="progress-bar color-2" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
								 style="width:75%">
									<span>75%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="animate-box" data-animate-effect="fadeInLeft">
						<div class="progress-wrap">
							<h5>AutoCAD</h5>
							<div class="progress">
								<div class="progress-bar color-3" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
								 style="width:70%">
									<span>70%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="animate-box" data-animate-effect="fadeInRight">
						<div class="progress-wrap">
							<h5>Pro/E</h5>
							<div class="progress">
								<div class="progress-bar color-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
								 style="width:50%">
									<span>50%</span>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>WordPress</h5>
						<div class="progress">
						 	<div class="progress-bar color-5" role="progressbar" aria-valuenow="70"
						  	aria-valuemin="0" aria-valuemax="100" style="width:70%">
						    <span>70%</span>
						  	</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>SEO</h5>
						<div class="progress">
						 	<div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
						  	aria-valuemin="0" aria-valuemax="100" style="width:80%">
						    <span>80%</span>
						  	</div>
						</div>
					</div>
				</div> -->
				</div>
		</div>
		<div id="resume_skills_5" class="col-5 offset-1 vh-25">
			<h4><i class="fas fa-briefcase text-success"></i>&nbsp;其他技能</h4>
			<div class="col-12">
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>Adobe Photoshop</h5>
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" aria-valuenow="90%" aria-valuemin="0" aria-valuemax="100"
							 style="width:75%">
								<span>75%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>Adobe illustrator</h5>
						<div class="progress">
							<div class="progress-bar color-2" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
							 style="width:75%">
								<span>75%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>CyberLink PowerDirect</h5>
						<div class="progress">
							<div class="progress-bar color-3" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
							 style="width:70%">
								<span>70%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="resume_skills_6" class="col-5 vh-25">
			<h4><i class="fas fa-language"></i></i>&nbsp;語言能力</h4>
			<div class="col-12">
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>中文</h5>
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" aria-valuenow="90%" aria-valuemin="0" aria-valuemax="100"
							 style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInRight">
					<div class="progress-wrap">
						<h5>英文</h5>
						<div class="progress">
							<div class="progress-bar color-2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
							 style="width:70%">
								<span>70%</span>
							</div>
						</div>
					</div>
				</div>
				<div class="animate-box" data-animate-effect="fadeInLeft">
					<div class="progress-wrap">
						<h5>台語</h5>
						<div class="progress">
							<div class="progress-bar color-3" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
							 style="width:90%">
								<span>90%</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 履歷-經歷 -->
<div id="resume_experience" class="container padding-top col-6 offset-4 bg-white text-dark">
	<h2 class="text-center padding-top25"><u>經歷</u></h2>
	<hr>
	<div class="col-md-10 offset-1">
		<h3>勞動署北分署 - 泰山 107 PHP資料庫網頁設計班 (02期) 學員</h3>
	</div>
	<div class="row">
		<div class="col-md-10 offset-1">
			<div class="timeline-centered">
				<article class="timeline-entry">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-1">
							<i class="fas fa-code text-warning"></i>
						</div>
						<div class="timeline-label">
							<h2>學員</a> <span>Sep. 2018~Mar. 2019</span></h2>
							<ul>
								<li>網頁排版編輯 - HTML標籤、CSS樣式、Dreamweaver網頁設計</li>
								<li>視覺影像設計 - Photoshop數位影像處理、Illustrator向量繪圖設計</li>
								<li>數位媒體應用 - 視覺傳達編排設計、UI/UX設計流程</li>
								<li>網頁動態技術 - jQuery視覺效果、JQM開發應用、Bootstrap工具應用、CMS架站系統</li>
								<li>資料庫程式設計 - PHP資料庫應用、XAMPP伺服器架設、JavaScript動態功能</li>
								<li>網頁設計實務 - 網頁設計乙級檢定術科輔導</li>
							</ul>
						</div>
					</div>
				</article>
				<article class="timeline-entry begin">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-none">
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
	<div class="col-md-10 offset-1">
		<h3>億燿企業股份有限公司 (Jul. 2002 ~ Aug. 2018)</h3>
	</div>
	<div class="row">
		<div class="col-md-10 offset-1">
			<div class="timeline-centered">
				<article class="timeline-entry">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-2">
							<i class="far fa-lightbulb"></i>
						</div>
						<div class="timeline-label">
							<h2>產品部經理</a> <span>2013 ~ Aug. 2018</span></h2>
							<ul>
								<li>HP電容筆ODM開發案. (22萬支訂單)</li>
								<li>專利分析、撰寫、商標資料管理.</li>
								<li>新產品開發、設計、規劃、測試. (PenPaper)</li>
								<li>產品包裝設計及說明書撰寫、排版. (PenPaper)</li>
								<li>網路規劃及管理. (新辦公室)</li>
								<li>網站架設及管理. (改用NAS)</li>
								<li>產品行銷、網頁設計及產品影片製作.</li>
							</ul>
						</div>
					</div>
				</article>
				<article class="timeline-entry">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-3">
							<i class="far fa-lightbulb"></i>
						</div>
						<div class="timeline-label">
							<h2>產品部副理</a> <span>2006 ~ Jan. 2013</span></h2>
							<ul>
								<li>專利及商標資料管理.</li>
								<li>新產品開發、設計、規劃、測試. (DigiMemo、Speed Dial)</li>
								<li>產品包裝設計及說明書撰寫、排版.</li>
								<li>技術服務支援. (國外信件)</li>
								<li>展場支援. (DigiMemo產品)</li>
								<li>網站架設及網頁設計. (改用CMS)</li>
							</ul>
						</div>
					</div>
				</article>
				<article class="timeline-entry">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-4">
							<i class="fas fa-pen"></i>
						</div>
						<div class="timeline-label">
							<h2>產品工程師</a> <span>2004 ~ 2006</span></h2>
							<ul>
								<li>專利分析、撰寫、商標資料管理.</li>
								<li>專利舉發案處理. (舉發並撤銷競爭對手專利)</li>
								<li>兼任機構工程師.</li>
								<li>產品包裝設計、說明書排版. (DigiMemo)</li>
								<li>展場支援. (DigiMemo產品)</li>
							</ul>
						</div>
					</div>
				</article>
				<article class="timeline-entry">
						<div class="timeline-entry-inner">
							<div class="timeline-icon color-5">
								<i class="fas fa-pen"></i>
							</div>
							<div class="timeline-label">
								<h2>助理工程師</a> <span>Jul. 2002 ~ 2004</span></h2>
								<ul>
									<li>協助員工電腦操作疑難雜症.</li>
									<li>員工電腦設備維護及管理.</li>
									<li>Windows Server建置、維護及管理.</li>
									<li>網路規劃、布線及管理.</li>
									<li>Firewall, Gateway, DNS, Web, Mail base on FreeBSD Server建置及管理.</li>
									<li>網站架設及網頁設計.</li>
									<li>展場支援. (數位板產品)</li>
								</ul>
							</div>
				</article>
				<article class="timeline-entry begin">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-none">
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
	<div class="col-md-10 offset-1">
		<h3>網路家庭國際資訊股份有限公司 (Sep. 2000 ~ Jun. 2002)</h3>
	</div>
	<div class="row">
		<div class="col-md-10 offset-1">
			<div class="timeline-centered">
				<article class="timeline-entry">
						<div class="timeline-entry-inner">

							<div class="timeline-icon color-1">
								<i class="fas fa-network-wired"></i>
							</div>

							<div class="timeline-label">
								<h2>網管工程師</a> <span>Jun. 2001 ~ Jun. 2002</span></h2>
								<ul>
									<li>機房管理及設備維護.</li>
									<li>網路規劃及管理.</li>
									<li>Firewall, Gateway, DNS, Web, Mail base on FreeBSD Server建置及管理.</li>
								</ul>
							</div>
						</div>
				</article>
				<article class="timeline-entry">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-2">
							<i class="fas fa-desktop"></i>
						</div>
						<div class="timeline-label">
							<h2>MIS工程師</a> <span>Sep. 2000 ~ Jun. 2001</span></h2>
							<ul>
								<li>協助員工電腦操作疑難雜症.</li>
								<li>員工電腦設備維護及管理.</li>
								<li>Windows Server建置、維護及管理.</li>
							</ul>
						</div>
					</div>
				</article>
				<article class="timeline-entry begin">
					<div class="timeline-entry-inner">
						<div class="timeline-icon color-none">
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>
<!-- 履歷-自我推薦 -->
<div id="resume_introduction" class="container padding-top col-6 offset-4 bg-white text-dark">
	<div class="col-10 offset-1 padding-top25">
		<h2 class="text-center"><u>自我推薦</u></h2>
		<hr>
		<div>
		<p class="text-left">
			首先感謝網路家庭國際股份有限公司，在我退伍後，提供給我第一份工作，在這兩年中，我學習到網路佈建規劃管理、Server建置、網站架設及網頁設計，因緣際會在平板電腦 (早期2002年 微軟推行的) 推出時，前雇主億燿企業股份有限公司
			(電腦繪圖板製造商) 吳元亨總經理，熱情邀約，提供給我16年的工作機會至今，雖然公司停業資遣所有員工，但在這十六年工作中，我從第一份工作得到的經驗，管理公司的電腦設備至Server建置、網路規畫管理及網站皆是我一手包辦。</p>
		<p class="text-left">
			除了電腦及網路管理的工作，也開始接觸產品開發並兼任機構工程師，雖然我不會寫程式，不會電路Layout，也不會畫3D機構圖，但憑藉著對資訊產品的熱誠及大學時期學的電子工程知識，我學會如何撰寫專利及分析、規劃產品、機械結構、生產製造、品質測試、包裝設計及說明書撰寫排版、產品行銷、技術支援，及製作產品介紹影片。</p>
		<p class="text-left">
			有幸更進一步與美國半導體廠Atmel (已被MicroChip併購)
			英國團隊合作，共同為HP開發電容筆ODM案，此案子過程獲益良多，除了內部跨部門溝通，我司負責結構設計及生產製造，還需配合外部公司Atmel設計電路、控制晶片及韌體，共同一起順利完成此案，並替公司帶來往後2年共22萬隻電容筆的訂單。</p>
		<p class="text-left">
			資遣離職後，審視自己過去的工作及對網路管理與網頁設計的興趣，我決定繼續學習更多網頁設計相關技能，經過筆試及口試，得以率取了勞動署北基宜花金馬分署的PHP資料庫網頁設計班，進而學習PHP、JavaScript程式設計、MySQL資料庫、PhotoShop、Illstrator、JQuery、Bootstrap及更多的前後端網頁設計技巧，除了這些技能之外，更渴望更進一步學習Lalavel及Vue框架。</p>
		<p class="text-left">
			經過十八年工作歷練及半年來的網頁程式設計學習，本人是一個全方位的員工，不論在任何的工作職位，皆能夠完全適應團隊合作，即使在較少的資源亦能夠獨立完成工作。</p>
		<p class="text-left">　</p>
		</div>
		<h2 class="text-center"><u>未來展望</u></h2>
		<hr>
		<p class="text-left">
			感謝您付出寶貴時間撥空瀏覽我的履歷，未來希望能夠善用自己的知識技能及經驗於
			貴公司貢獻一己之力，並透過貴公司的專業訓練與文化的薰陶使我成為更為專業之人員。當然不斷的自我學習與公司一起成長也是我的心願，希望貴公司能給予我這樣的一個機會。</p>
		<p style="padding-bottom:25px">　</p>
	</div>
</div>

<div id="particles-js"></div>
<?php
    include_once("./inc/foot.php");
    include_once("./inc/js.php");
?>

<script>
(function($){
	$('#myfooter').addClass('d-none');
})($)
</script>