<?php
if(!defined('IN_PLAY')) {
	exit('Access Denied');
}
class control {
	function __call($name,$args) {
		return null;
	}
	protected function success($object,$url='') {
		return $this->_out($object,$url,1);
	}
	protected function error($object,$url='') {
		return $this->_out($object,$url,0);
	}
	private function _out($object,$url='',$code=1) {
		$data['data'] = $object;
		$data['url'] = $url;
		$data['code'] = $code;
		echo json_encode($data);
		die();
	}
}


?>