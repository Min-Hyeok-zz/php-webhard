<?php
	class Model_member extends Model{

		function memberList(){
			return $this->fetchAll("SELECT * FROM member order by level desc");
		}

		function memberInfo(){
			return $this->fetch("SELECT * FROM member where idx='{$this->param->idx}'");
		}

		function idChk(){
			return $this->fetch("SELECT * FROM member where id='{$_POST['id']}'");
		}

		function memberDelete(){
			$data = $this->memberInfo();
			rmdir(_DATA.$data->id);
			$this->query("DELETE FROM member where idx='{$this->param->idx}'");
			alert("삭제되었습니다.");
			move("/member/member");
		}

		function memberAction(){
			if (isset($_POST['action'])) {
				$cancle = "/action/pw";
				$add_sql = "";
				$this->table = "member";
				$this->action = $_POST['action'];
				$data = $this->memberInfo();
				switch ($_POST['action']) {
					case 'add':
					case 'update':
						$pw = hash("sha256", $_POST['pw'].$_POST['id']);
						$add_sql = ",pw='{$pw}'";
						access($this->idChk() != "","중복된 아이디 입니다.");
						$column = $this->get_column($_POST,$cancle);
						if (isset($this->param->idx)){
							$add_sql .= " where idx='{$this->param->idx}'";	
							$id = $data->id;
						} 
						$column .= $add_sql;
						@rmdir(_DATA.$id);
						@mkdir(_DATA.$_POST['id']);
						access($this->get_query($column),"완료되었습니다.","/member/member");
					break;
				}
			}
		}

	}