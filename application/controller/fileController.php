<?php
	class fileController extends Controller{

		function file(){
			loginChk();
			$this->folder = $this->model->folderList();
			$this->file = $this->model->fileList();
			$this->model->fileAction();
		}

		function action(){
			loginChk();
			$this->info = $this->model->info();
			$this->model->fileAction();
		}

		function down(){
			$data = $this->model->info();
			$name = "{$data->file_name}.{$data->type}";
			header("Content-Disposition: attachment; filename=\"{$name}\"");
			readfile(_DATA."{$_SESSION['member']->id}/{$data->change_name}");
			exit;
		}

	}