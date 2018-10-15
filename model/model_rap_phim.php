<?php  
include_once ("database.php");
	class xl_rap_phim extends database
	{
		function danh_sach_rap_phim()
		{
			$lenh_sql = "SELECT * FROM rp_rap_chieu";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function lay_ds_rap_theo_id($id_phim)
		{
			$lenh_sql = "SELECT DISTINCT rc.*
						FROM rp_lich_chieu lc, rp_phong_chieu pc, rp_rap_chieu rc 
						WHERE lc.id_phim = ?
						AND lc.id_phong_chieu = pc.id 
						AND pc.id_rap_chieu = rc.id";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array($id_phim));
			return $result;
		}

		function lay_rap_theo_id_rap($id_rap)
		{
			$lenh_sql = "SELECT * 
						FROM rp_rap_chieu
						WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id_rap));
			return $result;
		}

		function lay_phong_theo_rap($id_rap)
		{
			$lenh_sql = "SELECT * 
						FROM rp_phong_chieu
						WHERE id_rap_chieu = ?";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array($id_rap));
			return $result;
		}

		function thay_doi_thong_tin_rap($id_rap, $ten_rap, $dia_chi, $sdt)
		{
			$lenh_sql = "UPDATE rp_rap_chieu
						SET ten_rap_chieu = ?, dia_chi = ? , so_dien_thoai = ?
						WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten_rap,$dia_chi,$sdt,$id_rap));
			return $result;
		}

		function them_rap($ten_rap, $dia_chi, $sdt)
		{
			$lenh_sql = "INSERT INTO rp_rap_chieu(ten_rap_chieu,dia_chi,so_dien_thoai) 
	    	 				VALUES(?,?,?)";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten_rap,$dia_chi,$sdt));
			return $result;
		}

		function xoa_rap($id)
		{
			$lenh_sql = "DELETE FROM rp_rap_chieu
							WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($id));
			return $result;	
		}


	}
?>