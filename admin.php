<?php 

	// 检查Session
	session_start();
	
	if( !isset( $_SESSION['user'] ) ) {
		header("Location: index.php");
	}
	
?>

<!DOCTYPE html>
<head>
	<meta charset=utf-8 />
	<title>骏马留学</title>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/admin.css" rel="stylesheet">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/handlebars.js"></script>
</head>

<body>

<?php 
	include_once 'partials/header.php';
?>

<script id="orders-template" type="text/x-handlebars-template">
<div class="user_table_div">
<table border="1px" cellspacing="0px">
<tr><th width="70px">类别</th><th>姓名</th><th>学校</th><th>手机</th><th>邮箱</th><th>qq</th><th>目标学校</th><th>gpa</th><th>雅思</th><th>gmat</th><th width="60px">进度</th><th width="150px">备注</th><th width="30px">文书</th><th width="60px">状态</th></tr>
{{#each orders}}
	{{#compare type 1}}
		<tr><td>免费修改文书</td><td>{{name}}</td><td>{{school}}</td><td>{{mobile}}</td><td>{{email}}</td><td>{{qq}}</td><td>{{target}}</td><td>{{gpa}}</td><td>{{ielts}}</td><td>{{gmat}}</td><td>{{#compare process 0}}未找中介{{else}}已找中介{{/compare}}</td><td>{{remark}}</td><td><a href="uploads/{{doc_url}}">下载</a></td>
	{{else}}
		{{#compare type 2}}
			<tr><td>VIP文书精修</td>
		{{else}}
			<tr><td>全套留学方案策划</td>
		{{/compare}}
		<td>{{name}}</td><td>{{school}}</td><td>{{mobile}}</td><td>{{email}}</td><td>{{qq}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	{{/compare}}
	<td>
	{{#compare status 1}}
		<a href="#" id="success" data-dir={{id}}>成功</a> <a href="#" id="giveup" data-dir={{id}}>放弃</a>
	{{else}}
		{{#compare status 2}}
			已成功
		{{else}}
			已放弃
		{{/compare}}
	{{/compare}}
	</td></tr>
{{/each}}
</table>
</div>
<div class="user_page_div" id="pages">
{{#footer total}}
{{/footer}}
</div>
</script>

<div class="main_content_div">
	<div class="button_div">
		<button id="userManagerBtn">用户管理</button>
		<button id="schoolManagerBtn">学校管理</button>
		<button id="caseManagerBtn">案例管理</button>
		<button id="teamManagerBtn">团队管理</button>
	</div>
	<div class="panel_div" id="userManager">
	</div>
	<div class="panel_div" id="schoolManager">schoolManager</div>
	<div class="panel_div" id="caseManager">caseManager</div>
	<div class="panel_div" id="teamManager">teamManager</div>
</div>

<?php 
	include_once 'partials/footer.php';
?>

<script src="scripts/admin.js"></script>

</body>
