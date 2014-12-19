<?php

require_once dirname ( __FILE__ ) . '/../service/submitOrderService.class.php';

$perPage = 10;

// 检查Session
session_start();

	if( isset ( $_POST['toPage'] ) && isset( $_SESSION['user'] ) ) {
		
		$toPage = $_POST['toPage'];
		
		$submitOrderService = new SubmitOrderService();
		
		$res = array();
		
		$res['orders'] = $submitOrderService->getOrdersByPage($toPage, $perPage);
		
		$res['total'] = $submitOrderService->getTotalPage($perPage);
		
		echo json_encode($res);
		
	}
