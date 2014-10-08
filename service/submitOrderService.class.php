<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class SubmitOrderService {
	
	// 插入一条订单记录
	public function insertSubmitOrder( $arr ) {
		
		$sql = "insert into xx_order (name,school,mobile,email,qq,target,gpa,ielts,gmat,process,remark,doc_url,type) values ('" . $arr['name'] . "','" . $arr['school'] . "','" . $arr['mobile'] . "','" . $arr['email'] . "','" . $arr['qq'] . "','" . $arr['target'] . "','" . $arr['gpa'] . "','" . $arr['ielts'] . "','" . $arr['gmat'] . "'," . $arr['process'] . ",'" . $arr['remark'] . "','" . $arr['doc_url'] . "'," . $arr['type'] . ")";
		
		$sqlHelper = new SQLHelper();
		$sqlHelper->execute_dqm($sql);
		
	}
	
}
