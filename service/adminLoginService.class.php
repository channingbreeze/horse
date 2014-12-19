<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class AdminLoginService {
	
	public function checkUser($username, $passwd) {
		
		$sql = "select passwd from xx_admin where username='" . $username . "'";
		
		$sqlHelper = new SQLHelper();
		$arr = $sqlHelper->execute_dql_array($sql);
		
		if(md5($passwd) == $arr[0]['passwd']) {
			
			// 存Session
			session_start();
			
			$_SESSION['user'] = $username;
			
			return true;
			
		} else {
			return false;
		}
		
	}
	
}
