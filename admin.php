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
</head>

<body>

<?php 
	include_once 'partials/header.php';
?>

<div class="main_content_div">
	<div class="button_div">
		<button>用户管理</button>
		<button>学校管理</button>
		<button>案例管理</button>
		<button>团队管理</button>
	</div>
	<div class="panel_div" id="userManager">
		
	</div>
	<div class="panel_div" id="schoolManager"></div>
	<div class="panel_div" id="caseManager"></div>
	<div class="panel_div" id="teamManager"></div>
</div>

<?php 
	include_once 'partials/footer.php';
?>

</body>
