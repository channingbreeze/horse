<?php

require_once dirname ( __FILE__ ) . '/../tools/SQLHelper.class.php';

class GetCasesService {
	
	public function getAllCases() {
		
		$sql = "select co.name country, ca.name name, ca.school school, ca.major major, ca.content content from xx_country co, xx_case ca where ca.country_id=co.id";
		
		$sqlHelper = new SQLHelper();
		return $sqlHelper->execute_dql_array($sql);
		
	}
	
}
