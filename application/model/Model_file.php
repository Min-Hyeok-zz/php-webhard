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
						$cnt = $this->fetchAll("SELECT * FROM file where file_name='{$_POST['file_name']}' and parent='{$this->param->path}'");
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