<?php

require_once dirname ( __FILE__ ) . '/../service/submitOrderService.class.php';

	if( ! isset( $_POST['id'] ) || ! isset( $_POST['value'] ) ) {
		echo "err";
	}

	$id = $_POST['id'];
	$value = $_POST['value'];
	
	$submitOrderService = new SubmitOrderService();

	$submitOrderService->sucOrGiveup($id, $value);
	echo "ok";
	