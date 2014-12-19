<?php

require_once dirname ( __FILE__ ) . '/../service/getPinsService.class.php';

	if( isset ($_POST['id']) ) {
		
		$id = $_POST['id'];
		
		$getPinsService = new GetPinsService();
		$arr = $getPinsService->getPinBySchoolId($id);
		
		echo json_encode($arr);
		
	}
