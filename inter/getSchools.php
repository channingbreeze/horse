<?php

require_once dirname ( __FILE__ ) . '/../service/getSchoolsService.class.php';

	if( ! isset( $_POST['info'] ) ) {
		
		$info = '';
		
	} else {

		$info = $_POST['info'];
	
	}

	$getSchoolsService = new GetSchoolsService();
	$arr = $getSchoolsService->getSchools($info);

	echo json_encode($arr);
	