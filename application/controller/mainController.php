<?php
	class mainController extends Controller{

		function basic(){
			memberChk();
			if (isset($_POST['action'])) $this->model->login();
		}

	}