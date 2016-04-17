<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('constants.php');

header('Content-Type: ' . TYPE_JSON);

function setError($text) {

	$json = array('error' => $text);
	echo json_encode($json);

}


if (count($_REQUEST) > 0) {

	foreach ($_REQUEST as $key => $param) {

		if ($key != null) {

			list($apiClass, $apiFunc) = explode("_", $key);
			unset($_REQUEST[$key]);

			require_once('engine.php');
			$APIEngine = new APIEngine($apiClass, $apiFunc, $_REQUEST);
			echo $APIEngine -> callApiFunction();

		} else {

			setError(BADMETHOD);

		}

		break;

	}

} else {

	setError(NOFUNC);

}

?>