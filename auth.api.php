<?php

class auth extends apiBaseClass {

	public function check() {

		$this -> initDB(); // инициализация базы данных

		if (array_key_exists('hwid', $this -> functionParams)) {
			$arr = '';
			$query = "SELECT * FROM users WHERE hwid = :hwid";
			$result = $this -> dbConnection -> query($query, array('hwid' => $this -> functionParams['hwid']));

			while($row = $result -> fetch(PDO::FETCH_ASSOC)) { 
				$arr = 'ok';
			}
		} else {
			$arr = '';
		}  

		return $arr;
	}

}
?>