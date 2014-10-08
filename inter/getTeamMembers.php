<?php

require_once dirname ( __FILE__ ) . '/../service/getTeamMembersService.class.php';

	$getTeamMembersService = new GetTeamMembersService();
	
	$arr = $getTeamMembersService->getTeamMembers();
	
	echo json_encode($arr);
