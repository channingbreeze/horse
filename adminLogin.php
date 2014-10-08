<!DOCTYPE html>
<head>
	<meta charset=utf-8 />
	<title>骏马留学</title>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/adminLogin.css" rel="stylesheet">
	<script src="scripts/jquery.min.js"></script>
</head>

<body>

<?php 
	include_once 'partials/header.php';
?>

<div class="main_content_div">

	<div class="login_div">
		<h1>管理员登陆</h1>
		<h3 class="tips">请牢记管理员神圣的职责</h3>
		<form action="inter/login.php" method="post">
			<input type="text" name="username" placeholder="用户名" /><br/>
			<input type="password" name="passwd" placeholder="密码" /><br/>
			<input type="submit" value="登陆" />
		</form>
	</div>
	
</div>

<?php 
	include_once 'partials/footer.php';
?>

</body>
