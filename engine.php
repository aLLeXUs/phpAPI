<?php
class APIEngine {

	private $apiClass;
	private $apiFunction;
	private $functionParams;

	function __construct($apiClass, $apiFunction, $functionParams) {

		$this -> apiClass = $apiClass;
		$this -> apiFunction = $apiFunction;
		$this -> functionParams = $functionParams;

	}

	public function callApiFunction() {

		$apiClass = $this -> apiClass;
		$apiFunction = $this -> apiFunction;

		if (file_exists($apiClass.'.api.php')) {

			require_once('base.php');
			require_once($apiClass.'.api.php');

			if (method_exists($apiClass, $apiFunction)) {

				$instance = new $apiClass();
				$instance -> functionParams = $this -> functionParams;
				return json_encode($instance -> $apiFunction());

			} else {

				setError(NOTEXIST);
				
			}


		} else {
			
			setError(NOTEXIST);

		}
	}
	
}
?>