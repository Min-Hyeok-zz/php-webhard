<?php
	class Model_share extends Model{

		function inAdd(){
			$this->sql = "
				INSERT INTO in_file SET
					fidx='{$this->param->idx}',
					midx='{$_SESSION['member']->idx}',
					date=now()
			";
			$this->query();
			alert("추가되었습니다.");
			move("/share/in");
		}

		function inList(){
			return $this->fetchAll("
					SELECT i.*,
						m.idx as member_idx,
						m.name as member_name,
						f.file_name as file_name,
						f.idx as file_idx,
						f.file_size as file_size,
						f.type as file_type,
						m.id as member_id
					FROM in_file i
					join member m on i.midx = m.idx
					join file f on i.fidx = f.idx
					order by date desc
				");
		}

		function inDown(){
			$this->query("UPDATE in_file SET hit=hit+1 where idx='{$_GET['idx']}'");
			return $this->fetch("
					SELECT i.*,
						f.file_name as file_name,
						f.change_name as change_name,
						f.type as file_type,
						m.id as member_id
					FROM in_file i
					join file f on i.fidx = f.idx
					join member m on i.midx = m.idx
				");
		}

		function inDelete(){
			if (isset($_POST['chk'])) {
				$arr = $_POST['chk'];
				$total = count($_POST['chk']);
				for ($i=0; $i < $total; $i++) {
					$this->query("DELETE FROM in_file where idx='{$arr[$i]}'");
				}			
				alert("삭제되었습니다.");
				move();
			}
		}

		function outAdd(){
			$key = "qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
			$len = strlen($key);
			while (1) {
				$ukey = "";
				for ($i=0;$i <= 3;$i++) $ukey .= $key[rand(0,$len-1)];
				if (preg_match("/([0-9]+)/", $ukey) == 0) continue;
				if ($this->fetch("SELECT * FROM out_file where url='{$ukey}'")) continue;
				break;
			}
			$this->query("
					INSERT INTO out_file set
					fidx='{$this->param->idx}',
					midx='{$_SESSION['member']->idx}',
					url='{$ukey}',
					date=now()
				");
			alert("공유되었습니다.");
			move("/share/out");
		}

		function outList(){
			return $this->fetchAll("
				SELECT i.*,
					m.idx as member_idx,
					m.name as member_name,
					m.id as member_id,
					f.idx as file_idx,
					f.file_name as file_name,
					f.file_size as file_size,
					f.type as file_type
				FROM out_file i
				join member m on i.midx = m.idx
				join file f on i.fidx = f.idx
				order by date desc
			");
		}

		function outDown(){
			$this->query("UPDATE out_file set hit=hit+1 where url='{$_GET['url']}'");
			return $this->fetch("
					SELECT i.*,
						f.idx as file_idx,
						f.file_name as file_name,
						f.change_name as file_change_name,
						f.type as file_type
					FROM out_file i
					join file f on i.fidx = f.idx
					where url='{$_GET['url']}'
				");
		}

		function outDelete(){
			if (isset($_POST['chk'])) {
				access($_POST['chk'] == "","항목이 선택되지 않았습니다.","/share/out");
				$cnt = count($_POST['chk']);
				for ($i=0; $i < $cnt; $i++) { 
					$this->query("DELETE FROM out_file where idx='{$_POST[''][$i]}'");
				}
				alert("공유가 취소되었습니다.");
				move("/share/out");
			}
		}

	}