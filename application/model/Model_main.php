<?php
	class Model_main extends Model{

		function login(){
			extract($_POST);
			$pw = hash("sha256", $pw.$id);
			$this->sql = "SELECT * FROM member where id='{$id}' and pw='{$pw}'";
			access($this->fetch() == "","아이디 또는 비밀번호가 일치하지 않습니다.");
			$_SESSION['member'] = $this->fetch();
			alert("로그인 되었습니다.");
			move("/file/file");
		}

	}