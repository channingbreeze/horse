<?php

require_once dirname ( __FILE__ ) . '/../service/getCasesService.class.php';

	$getCasesService = new GetCasesService();
	
	$arr = $getCasesService->getAllCases();
	
	for($i=0; $i < count($arr); $i++) {
		$arr[$i]['content'] = json_decode($arr[$i]['content']);
	}
	
	echo json_encode($arr);
