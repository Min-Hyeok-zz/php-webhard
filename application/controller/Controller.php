<?php
	class Controller{

		var $isMember;

		function __construct(){
			$this->param = Application::getParam();
			$model = "Model_{$this->param->type}";
			new $model();
			$this->model = new $model();
			$this->index();
			$this->isMember = isset($_SESSION['member']) ? $_SESSION['member'] : false;
		}

		function index(){
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if (method_exists($this, $method)) $this->$method();
			$this->header();
			$this->content();
			$this->footer();
		}

		function header(){
			if ($this->param->page != "") require_once(_VIEW."header.php");
		}

		function content(){
			if (isset($this->param->page)) {
				require_once(_VIEW."{$this->param->type}/{$this->param->page}.php");
			} else {
				require_once(_VIEW."main.php");
			}
		}

		function footer(){
			if ($this->param->page != "") require_once(_VIEW."footer.php");
		}

	}