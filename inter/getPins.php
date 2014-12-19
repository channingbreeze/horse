<?php

require_once dirname ( __FILE__ ) . '/../service/getPinsService.class.php';

	$getPinsService = new GetPinsService();
	$arr = $getPinsService->getPins();

	echo json_encode($arr);
