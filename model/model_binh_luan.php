<?php 
include_once ("database.php");

class xl_binh_luan extends database 
{
	function lay_ds_binh_luan()
	{
		$lenh_sql = "SELECT * 
					FROM rp_bai_viet
					WHERE id_loai_bai_viet = 1";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
	}

	function lay_ds_binh_luan_hien_thi($bat_dau = 0, $so_luong = "")
	{	
		if($so_luong)
		{
			$lenh_sql = "SELECT * FROM rp_bai_viet
						WHERE trang_thai = 1
						AND id_loai_bai_viet = 1
						LIMIT $bat_dau, $so_luong";	
		}
		else 
		{
			$lenh_sql = "SELECT * FROM rp_bai_viet
						WHERE trang_thai = 1
						AND id_loai_bai_viet = 1";
		}
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
	}

	function lay_ds_su_kien()
	{
		$lenh_sql = "SELECT * 
					FROM rp_bai_viet
					WHERE id_loai_bai_viet = 2";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
	}

	function lay_ds_su_kien_hien_thi($bat_dau = 0, $so_luong = "")
	{	
		if($so_luong)
		{
			$lenh_sql = "SELECT * FROM rp_bai_viet
						WHERE trang_thai = 1
						AND id_loai_bai_viet = 2
						LIMIT $bat_dau, $so_luong";	
		}
		else 
		{
			$lenh_sql = "SELECT * FROM rp_bai_viet
						WHERE trang_thai = 1
						AND id_loai_bai_viet = 2";
		}
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
	}

	function ds_binh_luan_moi_nhat()
	{
		$lenh_sql = "SELECT * 
					FROM rp_bai_viet
					WHERE id_loai_bai_viet = 1
					ORDER BY id DESC
					LIMIT 0, 5";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
	}	

	function ds_su_kien_moi_nhat()
	{
		$lenh_sql = "SELECT * 
					FROM rp_bai_viet
					WHERE id_loai_bai_viet = 2
					ORDER BY id DESC
					LIMIT 0, 7";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
	}

	function lay_chi_tiet_binh_luan($id_bl)
	{
		$lenh_sql = "SELECT *
					FROM rp_bai_viet
					WHERE id = ?  
					AND id_loai_bai_viet = 1
					";
		$this->setQuery($lenh_sql);
		$result = $this->fetch(array($id_bl));
		return $result;
	}	

	function lay_chi_tiet_su_kien($id_sk)
	{
		$lenh_sql = "SELECT *
					FROM rp_bai_viet
					WHERE id = ?  
					AND id_loai_bai_viet = 2
					";
		$this->setQuery($lenh_sql);
		$result = $this->fetch(array($id_sk));
		return $result;
	}

}
?>