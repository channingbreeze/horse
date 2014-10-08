<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class GetPinsService {
	
	// 得到所有的图钉信息
	public function getPins() {
		
		$sql = "select longitude,latitude,image_url,title,content from xx_pin";

		$sqlHelper = new SQLHelper();
		return $sqlHelper->execute_dql_array($sql);
		
	}
	
	// 根据schoolId得到对应图钉
	public function getPinBySchoolId($id) {
		
		$sql = "select longitude,latitude from xx_pin where school_id=" . $id;
		
		$sqlHelper = new SQLHelper();
		return $sqlHelper->execute_dql_array($sql);
		
	}
	
}
