<?php
	class Model_file extends Model{
		
		function folderList(){
			return $this->fetchAll("SELECT * FROM file where type='folder' and parent='{$this->param->path}' and midx='{$_SESSION['member']->idx}'");
		}

		function fileList(){
			return $this->fetchAll("SELECT * FROM file where type!='folder' and parent='{$this->param->path}' and midx='{$_SESSION['member']->idx}'");
		}

		function info(){
			return $this->fetch("SELECT * FROM file where idx='{$this->param->idx}'");
		}

		function parent(){
			$parent = $this->fetch("SELECT parent FROM file where idx='{$this->param->path}'");
			if ($parent) return $parent->parent;
		}

		function pathName(){
			$root = "<a href='?path=0'>Root</a>";
			$path_name = $root;
			if ($this->param->path == 0) {
				return $root;
			} else{
				$this->sql = "SELECT * FROM file where type='folder' and idx='{$this->param->path}'";
				$data = $this->fetch();
				while ($data) {
					$data = $this->fetch("SELECT * FROM file where type='folder' and idx='{$data->parent}'");
					if ($data) {
						$link = "/file/file?path={$data->idx}";
						$path_name = "{$data->file_name} &#10095; {$path_name}";
					}
				}
				return "{$root} &#10095; {$path_name}";
			}
		}

		function delete(){
			$data = $this->info();
			if ($data->type != "folder") {
				@unlink(_DATA."{$_SESSION['member']->id}/{$data->change_name}");
				$this->sql = "DELETE FROM file where idx='{$this->param->idx}'";
			} else {
				$idxs = $parent = [];
				$list = $this->fetchAll("SELECT idx FROM file where parent='{$this->param->idx}'");
				foreach ($list as $data) $parent[] = $data->idx;
				$idxs = $parent;
				while (isset($parent[0])) {
					$parent = implode(",", $parent);
					$child_list = $this->fetchAll("SELECT idx FROM file where parent in ($parent)");
					$parent = [];
					foreach ($child_list as $data) {
						$idxs[] = $data->idx;
						$parent[] = $data->idx;
					}
				}
				$idxs[] = $this->param->idx;
				$idxs = implode(",", $idxs);
				$file_list = $this->fetchAll("SELECT * from file where idx in ({$idxs}) and type!='path'");
				foreach ($file_list as $data) {
					$path = _DATA."{$_SESSION['member']->id}/{$data->change_name}";
					@unlink($path);
				}
				$this->sql = "DELETE FROM file where idx in ({$idxs})";
			}
			$this->query();
			alert("삭제되었습니다.");
			move();
		}

		function fileAction(){
			if (isset($_POST['action'])) {
				switch ($_POST['action']) {
					case 'file_upload':
						$file = $_FILES['file'];
						$name = explode(".", $file['name']);
						$change_name = file_upload($file);
						$type = file_type($file['name']);
						$this->sql = "
							INSERT INTO file SET
								midx='{$_SESSION['member']->idx}',
								parent='{$this->param->path}',
								file_name='{$name[0]}',
								change_name='{$change_name}',
								file_size='{$file['size']}',
								type='{$type}',
								date=now(),
								change_date=now()
						";
					break;
					case 'add':
						$cnt = $this->fetch("SELECT * FROM file where file_name='{$_POST['file_name']}' and parent='{$this->param->path}'");
						access($cnt != "","해당 위치에 중복된 이름이 있습니다.");
						$this->sql = "
							INSERT INTO file SET
								midx='{$_SESSION['member']->idx}',
								parent='{$this->param->path}',
								file_name='{$_POST['file_name']}',
								type='folder',
								date=now(),
								change_date=now()
						";
					break;
				}
				$this->query();
				alert("완료되었습니다.");
				move("/file/file");
			}
		}

	}