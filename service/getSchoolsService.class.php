<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class GetSchoolsService {
	
	// 根据输入信息选择学校
	public function getSchools($info) {
		
		$sql = "select s.name name,c.name country,s.id id from xx_school s,xx_country c where s.country_id=c.id and s.name like '%" . $info . "%' limit 10";
		
		$sqlHelper = new SQLHelper();
		return $sqlHelper->execute_dql_array($sql);
		
	}
	
}
