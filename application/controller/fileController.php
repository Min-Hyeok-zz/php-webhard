<?php
	class fileController extends Controller{

		function file(){
			loginChk();
			$this->folder = $this->model->folderList();
			$this->file = $this->model->fileList();
			$this->model->fileAction();
			$this->parent = $this->model->parent();
			$this->root = $this->model->pathName();
		}

		function action(){
			loginChk();
			$this->info = $this->model->info();
			$this->model->fileAction();
		}

		function delete(){
			loginChk();
			$this->model->delete();
		}

		function down(){
			$data = $this->model->info();
			$name = "{$data->file_name}.{$data->type}";
			header("Pragma: public");
			header("Expires: 0");
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"{$name}\"");
			header("Content-Length: {$data->file_size}");
			header("Content-Transper-Encoding: binary");
			ob_clean();
			flush();
			readfile(_DATA."{$_SESSION['member']->id}/{$data->change_name}");
			exit;
		}

	}