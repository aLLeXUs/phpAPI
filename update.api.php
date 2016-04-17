<?php

class update extends apiBaseClass {

	public function check() {

		$this -> initDB(); // инициализация базы данных

		if (array_key_exists('name', $this -> functionParams)) {
			$arr = '';
			$query = "SELECT * FROM apps WHERE name = :name";
			$result = $this -> dbConnection -> query($query, array('name' => $this -> functionParams['name']));

			while($row = $result -> fetch(PDO::FETCH_ASSOC)) { 
				$arr = array('name' => $row['name'], 'version' => $row['version'], 'url' => $row['url']);
			}
		} else {
			$arr = '';
		}  

		return $arr;
	}

}
?>