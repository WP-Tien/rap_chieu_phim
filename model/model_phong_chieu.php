<?php  
include_once ("database.php");
	class xl_phong_chieu extends database
	{
		function danh_sach_phong_chieu()
		{
			$lenh_sql = "SELECT * FROM rp_phong_chieu";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}


		function thay_doi_thong_tin_phong($id, $ten_phong_chieu, $so_ghe, $trang_thai, $so_hang_cot, $loi_di, $quan_tri_rap)
		{
			$lenh_sql = "UPDATE rp_phong_chieu
						SET ten_phong_chieu = ?, so_ghe = ?, trang_thai = ?, id_rap_chieu = ?, so_hang_cot = ?, loi_di = ? 
						WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten_phong_chieu, $so_ghe, $trang_thai, $so_hang_cot, $loi_di, $quan_tri_rap, $id));
			return $result;
		}

		function them_phong($ten, $so_ghe, $trang_thai = 1, $hang_cot , $loi_di, $quan_tri_rap)
		{
			$lenh_sql = "INSERT INTO rp_phong_chieu(ten_phong_chieu,so_ghe,trang_thai, id_rap_chieu, so_hang_cot, loi_di) 
	    	 				VALUES(?,?,?,?,?,?)";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten, $so_ghe, $trang_thai = 1, $quan_tri_rap, $hang_cot , $loi_di));
			return $result;
		}

		function xoa_phong($id)
		{
			$lenh_sql = "DELETE FROM rp_phong_chieu
							WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($id));
			return $result;	
		}


	}
?>