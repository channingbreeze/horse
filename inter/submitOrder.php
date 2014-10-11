<?php

require_once dirname ( __FILE__ ) . '/../service/submitOrderService.class.php';
require_once dirname ( __FILE__ ) . '/../service/mailService.class.php';
require_once dirname ( __FILE__ ) . '/../tools/UniqueIdGenerator.class.php';

	if( ! isset( $_POST['username'] ) ||
		! isset( $_POST['school'] ) ||
		! isset( $_POST['mobile'] ) ||
		! isset( $_POST['email'] ) ||
		! isset( $_POST['qq'] ) ||
		! isset( $_POST['type'] )) {
		echo "err";
	} else {
		
		$type = $_POST['type'];
		
		if($type == 1) {
			if( ! isset( $_POST['target'] ) ||
				! isset( $_POST['gpa'] ) ||
				! isset( $_POST['ielts'] ) ||
				! isset( $_POST['gmat'] ) ||
				! isset( $_POST['process'] ) ||
				! isset( $_POST['remark'] ) ) {
				echo "err";
			} else {
				
				// type = 1
				
				// 先接收文件
				$base_path = "../uploads/";
				$uniqueIdGenerator = new UniqueIdGenerator();
				$uniqueId = $uniqueIdGenerator->getUniqueId();
				$dot = strrpos ( $_FILES['docfile']['name'] ,  "." );
				$subfix = substr ( $_FILES['docfile']['name'] ,  $dot,  strlen ( $_FILES['docfile']['name'] ) -  $dot + 1 );
				$target = $base_path . $uniqueId . $subfix;
				move_uploaded_file($_FILES['docfile']['tmp_name'], $target);
				
				$arr = array();
				$arr['name'] = $_POST['username'];
				$arr['school'] = $_POST['school'];
				$arr['mobile'] = $_POST['mobile'];
				$arr['email'] = $_POST['email'];
				$arr['qq'] = $_POST['qq'];
				$arr['type'] = $_POST['type'];
				$arr['target'] = $_POST['target'];
				$arr['gpa'] = $_POST['gpa'];
				$arr['ielts'] = $_POST['ielts'];
				$arr['gmat'] = $_POST['gmat'];
				$arr['process'] = $_POST['process'];
				$arr['remark'] = $_POST['remark'];
				$arr['doc_url'] = $uniqueId . $subfix;
				
				$submitOrderService = new SubmitOrderService();
				$submitOrderService->insertSubmitOrder($arr);
				
				// 发送邮件
				$mailService = new MailService();
				$mailService->sendOrderEmail($arr);
				
				echo "ok";
				
			}
		} else {
			
			// type = 2 or 3
			$arr = array();
			$arr['name'] = $_POST['username'];
			$arr['school'] = $_POST['school'];
			$arr['mobile'] = $_POST['mobile'];
			$arr['email'] = $_POST['email'];
			$arr['qq'] = $_POST['qq'];
			$arr['type'] = $_POST['type'];
			$arr['target'] = '';
			$arr['gpa'] = '';
			$arr['ielts'] = '';
			$arr['gmat'] = '';
			$arr['process'] = 0;
			$arr['remark'] = '';
			$arr['doc_url'] = '';
			
			$submitOrderService = new SubmitOrderService();
			$submitOrderService->insertSubmitOrder($arr);
			
			// 发送邮件
			$mailService = new MailService();
			$mailService->sendOrderEmail($arr);
			
			echo "ok";
			
		}
		
	}
	
?>
