<?php
	class shareController extends Controller{

		function in_add(){
			loginChk();
			$this->model->inAdd();
		}

		function in(){
			loginChk();
			$this->list = $this->model->inList();
			$this->total = count($this->list);
			$this->my = 0;
			foreach ($this->list as $data) {
				if ($data->member_idx == $_SESSION['member']->idx) $this->my++;
			}
			$this->model->inDelete();
		}

		function in_down(){
			loginChk();
			$data = $this->model->inDown();
			header("Pragma: public");
			header("Expires: 0");
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"{$data->file_name}.{$data->file_type}\"");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: {$data->file_size}");
			ob_clean();
			flush();
			readfile(_DATA."{$data->member_id}/{$data->change_name}");
			exit;
		}

		function out_add(){
			loginChk();
			$this->model->outAdd();
		}

		function out(){
			$this->list = $this->model->outList();
			$this->total = count($this->list);
			$this->my = 0;
			if (isset($_SESSION['member'])) {
				foreach ($this->list as $data) {
					if ($data->member_idx == $_SESSION['member']->idx) $this->my++;
				}
			}
			$this->model->outDelete();
		}

		function out_down(){
			$data = $this->model->outDown();
			header("Pragma: public");
			header("Expires: 0");
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"{$data->file_name}.{$data->file_type}\"");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: {$data->file_size}");
			ob_clean();
			flush();
			readfile(_DATA."{$data->member_id}/{$data->change_name}");
			exit;
		}

	}