<?php
	class Model{

		function __construct(){
			$this->param = Application::getParam();
			$this->db = new PDO("mysql:host=localhost;dbname=webhard;charset=utf8;","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}

		function query($sql = false){
			if ($sql) $this->sql = $sql;
			$res = $this->db->query($this->sql);
			if (!$res) {
				echo "<pre>";
				echo $this->sql;
				print_r($this->db->errorInfo());
				echo "</pre>";
				exit;
			} else{
				return $res;
			}
		}

		function fetch($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->fetch();
		}

		function fetchAll($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->fetchAll();
		}

		function cnt($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->rowCount();
		}

		//배열을 컬럼 형태로 반환
		function get_column($arr,$cancel){
			$cancel = explode("/", $cancel);
			$column = "";
			foreach ($arr as $key => $val) {
				if (!in_array($key, $cancel)) {
					$column .= ", {$key}='{$val}'";
				}
			}
			return substr($column, 2);
		}

		//action의 value값에 따라 쿼리문 변경
		function get_query($column){
			switch ($this->action) {
				case 'add':
					$sql = "INSERT INTO {$this->table} SET ";
				break;
				case 'update':
					$sql = "UPDATE {$this->table} SET ";
				break;
				case 'delete':
					$sql = "DELETE FROM {$this->table} ";
				break;
			}
			$sql .= $column;
			return $this->query($sql);
		}

	}