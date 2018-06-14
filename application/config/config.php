<?php
	session_start();

	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}

	function move($url = false){
		echo "<script>";
			echo $url ? "location.replace('{$url}');" : "history.back();";
		echo "</script>";
		exit;
	}

	function access($bool,$msg,$url = false){
		if ($bool) {
			alert($msg);
			move($url);
		}
	}

	function loginChk(){
		access(!isset($_SESSION['member']),"비회원은 접근할 수 없습니다.");
	}

	function memberChk(){
		access(isset($_SESSION['member']),"이미 로그인 하셨습니다.","/file/file");
	}

	function adminChk(){
		access(!isset($_SESSION['member']) || $_SESSION['member']->level != 10,"해당 페이지는 관리자만 접근 가능합니다.");
	}

	function file_upload($file){
		$name = $file['name'];
		$tmp_name = $file['tmp_name'];
		// access(!$tmp_name,"파일의 용량이 초과되었습니다.");
		$change_name = time().rand(0,99999);
		if (move_uploaded_file($tmp_name, _DATA."{$_SESSION['member']->id}/{$change_name}")) {
			return $change_name;
		}
	}

	function file_type($type){
		$type = explode(".", $type);
		return array_pop($type);
	}

	function get_size($size){
		$size /= 1024*1024;
		if ($size > 1) {
			$size = number_format($size)."MB";
		} else{
			$size = floor($size*1024)."KB";
		}
		return $size;
	}

	function __autoload($className){
		$className = strtolower($className);
		$className2 = preg_replace("/(model|application)(.*)/", "$1", $className);
		switch ($className2) {
			case 'model': $dir = _MODEL; break;
			case 'application': $dir = _APP; break;
			default: $dir = _CTR; break;
		}
		require_once("{$dir}{$className}.php");
	}