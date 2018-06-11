<?php
	class memberController extends Controller{

		function member(){
			adminChk();
			$this->list = $this->model->memberList();
		}

		function action(){
			adminChk();
			$this->info = $this->model->memberInfo();
			$this->model->memberAction();
		}

		function delete(){
			adminChk();
			$this->model->memberDelete();
		}

		function logout(){
			loginChk();
			access(session_destroy(),"로그아웃 되었습니다.","/");
		}

	}