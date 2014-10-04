<!DOCTYPE html>
<head>
	<meta charset=utf-8 />
	<title>骏马留学</title>
	<link href="css/main.css" rel="stylesheet">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bing.map.js"></script>
	<script src="scripts/horse.map.js"></script>
</head>

<body onload="GetMap();">

<?php 
	include_once 'partials/header.php';
?>

<div class="main_content_div">
	<div class="left_div">
		<div class="search_div">
			<input type="text" class="search_input" id="searchInput" placeholder="请输入学校名称">
			<div class="school" id="schools">
				<ul>
					<li><span>美国 | 哈佛大学</span></li><hr>
					<li><span>美国 | 麻省理工学院</span></li><hr>
					<li><span>美国 | 哥伦比亚大学</span></li><hr>
					<li><span>美国 | 普林斯顿大学</span></li><hr>
					<li><span>美国 | 耶鲁大学</span></li><hr>
					<li><span>美国 | 宾夕法尼亚大学</span></li><hr>
					<li><span>美国 | 西点军校</span></li><hr>
					<li><span>美国 | 斯坦福大学</span></li><hr>
					<li><span>美国 | 加州大学伯克利分校</span></li><hr>
					<li><span>美国 | 加州大学洛杉矶分校</span></li>
				</ul>
			</div>
			
		</div>
		<div class="map_div">
			<div class="map_content" id="myMap"></div>
		</div>
	</div>
	<div class="right_div">
		<div class="right_readme">
			<div class="readme_div">
				<p>我们的服务：</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;我们提供免费的修改文书服务和付费的文书精修服务。XXXXXXXX</p>
			</div>
		</div>
		<div class="right_button_div">
			<button class="pop_button free_button" id="freeModify">免费修改文书</button>
		</div>
		<div class="right_button_div" style="margin-top:40px;">
			<button class="pop_button charge_button" id="VIPModify">VIP文书精修</button>
		</div>
		<div class="right_button_div">
			<button class="pop_button charge_button" id="allService">全套留学方案策划</button>
		</div>
	</div>
</div>

<?php 
	include_once 'partials/footer.php';
?>

<div id="back" class="back_overlay"></div>

<div id="freeDialog" class="free_dialog_div">
	<div class="close_button"><a href="#" id='closeFreeModifyButton'>X</a></div>
	<h1 style="margin-top:10px;">免费修改文书</h1>
	<div class="dialog_form_div">
	<form action="#" method="post">
		<table>
			<tr><td><span>姓名：</span></td><td><input type="text" name="username" placeholder="请输入您的真实姓名"></input></td></tr>
			<tr><td><span>学校：</span></td><td><input type="text" name="school" placeholder="请输入您所在的学校"></input></td></tr>
			<tr><td><span>手机：</span></td><td><input type="text" name="mobile" placeholder="请输入您的手机号码"></input></td></tr>
			<tr><td><span>Email：</span></td><td><input type="text" name="email" placeholder="请输入您的Email地址"></input></td></tr>
			<tr><td><span>QQ：</span></td><td><input type="text" name="qq" placeholder="请输入您的QQ号码"></input></td></tr>
			<tr><td><span>目标学校：</span></td><td><input type="text" name="target" placeholder="请输入您的目标学校"></input></td></tr>
			<tr><td><span>GPA：</span></td><td><input type="text" name="gpa" placeholder="请输入您的GPA成绩"></input></td></tr>
			<tr><td><span>雅思：</span></td><td><input type="text" name="ielts" placeholder="请输入您的雅思成绩"></input></td></tr>
			<tr><td><span>GMAT：</span></td><td><input type="text" name="gmat" placeholder="请输入您的GMAT成绩"></input></td></tr>
			<tr><td><span>目前进度：</span></td><td><input type="radio" name="process">已找中介</input><input type="radio" name="process" checked>未找中介</input></td></tr>
			<tr><td><span>备注：</span></td><td><textarea name="remark" rows=5 cols=60 placeholder="请输入您的文书修改要求"></textarea></td></tr>
			<tr><td><span>上传文书：</span></td><td><input type="file" name="docfile"></input></td></tr>
			<input type="hidden" name="type" value="1"/>
			<tr><td colspan=2 align=center><input type="submit" value="提交"></input></td></tr>
		</table>
	</form>
	</div>
</div>

<div id="VIPDialog" class="vip_dialog_div">
	<div class="close_button"><a href="#" id='closeVIPModifyButton'>X</a></div>
	<h1 style="margin-top:10px;">VIP文书精修</h1>
	<h3 style="margin-top:10px;">请留下您的联系方式，我们的工作人员会及时与您取得联系！</h3>
	<div class="dialog_form_div">
	<form action="#" method="post">
		<table>
			<tr><td><span>姓名：</span></td><td><input type="text" name="username" placeholder="请输入您的真实姓名"></input></td></tr>
			<tr><td><span>学校：</span></td><td><input type="text" name="school" placeholder="请输入您所在的学校"></input></td></tr>
			<tr><td><span>手机：</span></td><td><input type="text" name="mobile" placeholder="请输入您的手机号码"></input></td></tr>
			<tr><td><span>Email：</span></td><td><input type="text" name="email" placeholder="请输入您的Email地址"></input></td></tr>
			<tr><td><span>QQ：</span></td><td><input type="text" name="qq" placeholder="请输入您的QQ号码"></input></td></tr>
			<input type="hidden" name="type" value="2"/>
			<tr><td colspan=2 align=center><input type="submit" value="提交"></input></td></tr>
		</table>
	</form>
	</div>
</div>

<div id="AllDialog" class="all_dialog_div">
	<div class="close_button"><a href="#" id='closeAllServiceButton'>X</a></div>
	<h1 style="margin-top:10px;">全套留学方案策划</h1>
	<h3 style="margin-top:10px;">请留下您的联系方式，我们的工作人员会及时与您取得联系！</h3>
	<div class="dialog_form_div">
	<form action="#" method="post">
		<table>
			<tr><td><span>姓名：</span></td><td><input type="text" name="username" placeholder="请输入您的真实姓名"></input></td></tr>
			<tr><td><span>学校：</span></td><td><input type="text" name="school" placeholder="请输入您所在的学校"></input></td></tr>
			<tr><td><span>手机：</span></td><td><input type="text" name="mobile" placeholder="请输入您的手机号码"></input></td></tr>
			<tr><td><span>Email：</span></td><td><input type="text" name="email" placeholder="请输入您的Email地址"></input></td></tr>
			<tr><td><span>QQ：</span></td><td><input type="text" name="qq" placeholder="请输入您的QQ号码"></input></td></tr>
			<input type="hidden" name="type" value="3"/>
			<tr><td colspan=2 align=center><input type="submit" value="提交"></input></td></tr>
		</table>
	</form>
	</div>
</div>

<script src="scripts/main.js"></script>
	
</body>
