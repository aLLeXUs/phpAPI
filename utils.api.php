<?php
class utils extends apiBaseClass {

	function random() {
		if (array_key_exists('length', $this -> functionParams)) {
			$length = $this -> functionParams['length'] < 1 ? 16 : $this -> functionParams['length'];
		} else {
			$length = 16;
		}
		
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$result = '';
 		for ($i = 0; $i <= $length - 1; $i++) {
			$result .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		
		return $result;
	}

}
?>