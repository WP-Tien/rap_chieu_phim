<?php 
	include_once ("database.php");

	class xl_qua extends database 
	{
		function lay_tat_ca_qua($diem)
		{
			$lenh_sql = "SELECT *
						FROM rp_qua
						WHERE gia_tri_diem <= ?";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array($diem));
			return $result;
		}

		function lay_diem_theo_id($id)
		{
			$lenh_sql = "SELECT gia_tri_diem
						FROM rp_qua
						WHERE id =?";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id));
			return $result;
		}

		function hoa_don_qua($id_user, $id_phan_thuong, $so_luong, $tong_diem_doi)
		{
			$lenh_sql = "INSERT INTO rp_chi_tiet_hd_doi_qua(id_quan_tri, id_qua, so_luong, tong_diem_doi)
				VALUES (?,?,?,?)";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($id_user, $id_phan_thuong, $so_luong, $tong_diem_doi));
			return $result;
		}

		function lay_diem_qua($id)
		{
			$lenh_sql = "SELECT gia_tri_diem
						FROM rp_qua";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id));
			return $result;
		}


	}

?>