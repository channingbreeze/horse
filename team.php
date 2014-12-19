<!DOCTYPE html>
<head>
	<meta charset=utf-8 />
	<title>骏马留学</title>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/team.css" rel="stylesheet">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/handlebars.js"></script>
</head>

<body>

<?php 
	include_once 'partials/header.php';
?>

<script id="teamMembers-template" type="text/x-handlebars-template">
{{#each this}}
<li>
	<img src="images/{{head_image}}"/>
	<div class="name_div">{{name}}</div>
	<div class="content_div">&nbsp;&nbsp;&nbsp;&nbsp;{{content}}</div>
</li>
{{/each}}
</script>

<div class="main_content_div">
	<div class="team_div">
		<div class="team_title">
			业内最精英顾问团队<br/>
			我们的足迹踏遍美国、英国、加拿大、香港等国家和地区<br/>
			我们的专业横跨理科，工科，文科，商科，法律，艺术等等<br/>
			我们涉足金融、IT、法律、咨询、快消等主流行业并担任过重要职务<br/>
			我们追求完美，提供最优质的服务，与每个勇敢逐梦的留学生并肩同行！<br/>
		</div>
		<ul id="team_ul">
		</ul>
	</div>
</div>

<?php 
	include_once 'partials/footer.php';
?>

<script src="scripts/team.js"></script>

</body>
