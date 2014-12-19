<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class GetTeamMembersService {
	
	// 获得所有的团队成员
	public function getTeamMembers() {
		
		$sql = "select content,head_image,name from xx_team";
		
		$sqlHelper = new SQLHelper();
		return $sqlHelper->execute_dql_array($sql);
		
	}
	
}
