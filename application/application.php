<?php
	Class Application{

		function __construct(){
			$ctr = $this->getParam()->type."Controller";
			new $ctr;
		}

		static function getParam(){
			if (isset($_GET['param'])) $get = explode("/", $_GET['param']);
			$param['type'] = isset($get[0]) && $get[0] != "" ? $get[0] : "main";
			$param['page'] = isset($get[1]) && $get[1] != "" ? $get[1] : NULL;
			$param['idx'] = isset($get[2]) && $get[2] != "" ? $get[2] : NULL;
			$param['path'] = isset($_GET['path']) ? $_GET['path'] : "0";
			return (object)$param;
		}

		/*static :
			함수내부에서 선언되어 있는 변수는 함수 밖에서 사용할 수 없다. 
			이전 함수 호출시 가지고 있었던 변수의 값을 그대로 사용하고 싶은 경우에 사용한다.*/
	}