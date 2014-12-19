<?php

require_once dirname ( __FILE__ ) . '/../service/adminLoginService.class.php';

	if( ! isset($_POST['username']) ||
		! isset($_POST['passwd']) ) {
		
		header("Location: ../index.php");
		
	} else {
		
		$username = $_POST['username'];
		$passwd = $_POST['passwd'];
		
		$adminLoginService = new AdminLoginService();
		$res = $adminLoginService->checkUser($username, $passwd);
		
		if($res) {
			
			
			header("Location: ../admin.php");
		} else {
			header("Location: ../index.php");
		}
		
	}
