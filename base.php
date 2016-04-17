<?php

require_once('db.php');

abstract class apiBaseClass {

	public $dbConnection = null;
	public $resultType = TYPE_JSON;
	
	function __construct() {
	}

	function __destruct() {
		if (isset($dbConnection)) {
			$this -> dbConnection -> closeConnection();
		}
	}

	function initDB() {
		$this -> dbConnection = db::GetInstance();
		$this -> dbConnection -> openConnection();
	}
}
?>