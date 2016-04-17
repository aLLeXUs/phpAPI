<?php

class user extends apiBaseClass {

	public function get() {

		$this -> initDB(); // инициализация базы данных

		$query = "SELECT ID, user_login, user_email FROM wp_users";
		$result = $this -> dbConnection -> query($query);

		while($row = $result -> fetch(PDO::FETCH_ASSOC)) { 
			$arr[] = array('id' => $row["ID"], 'login' => $row["user_login"], 'email' => $row["user_email"]);
		}
		return array("users" => $arr);
	}

}
?>