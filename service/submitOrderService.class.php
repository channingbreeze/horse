<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class SubmitOrderService {
	
	// 插入一条订单记录
	public function insertSubmitOrder( $arr ) {
		
		$sql = "insert into xx_order (name,school,mobile,email,qq,target,gpa,ielts,gmat,process,remark,doc_url,type) values ('" . $arr['name'] . "','" . $arr['school'] . "','" . $arr['mobile'] . "','" . $arr['email'] . "','" . $arr['qq'] . "','" . $arr['target'] . "','" . $arr['gpa'] . "','" . $arr['ielts'] . "','" . $arr['gmat'] . "'," . $arr['process'] . ",'" . $arr['remark'] . "','" . $arr['doc_url'] . "'," . $arr['type'] . ")";
		
		$sqlHelper = new SQLHelper();
		$sqlHelper->execute_dqm($sql);
		
	}
	
	public function getOrdersByPage($toPage, $perPage) {
		
		$sql = "select id,name,school,mobile,email,qq,target,gpa,ielts,gmat,process,remark,doc_url,type,status from xx_order limit " . ($toPage-1) * $perPage . "," . $perPage;
		
		$sqlHelper = new SQLHelper();
		return $sqlHelper->execute_dql_array($sql);
		
	}
	
	// 得到记录的总页数
	public function getTotalPage($perPage) {
		
		$sql = "select count(id) total from xx_order";
		
		$sqlHelper = new SQLHelper();
		$res = $sqlHelper->execute_dql_array($sql);
		
		return ceil($res[0]['total'] / $perPage);
		
	}
	
	// 设置成已成功或者已放弃
	public function sucOrGiveup($id, $value) {
		
		$sql = "update xx_order set status=" . $value . " where id=" . $id;
		
		$sqlHelper = new SQLHelper();
		$sqlHelper->execute_dqm($sql);
		
	}
	
}
