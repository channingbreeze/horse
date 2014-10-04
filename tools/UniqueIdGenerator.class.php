<?php 

class UniqueIdGenerator {
	
	public function getUniqueId() {
		$data = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'] . time() . rand();
		return sha1($data);
	}
	
	public function getPicDir( $bugId, $groupId ) {
		$data = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'] . $bugId . $groupId. time() . rand();
		return sha1($data);
	}
	
}

?>