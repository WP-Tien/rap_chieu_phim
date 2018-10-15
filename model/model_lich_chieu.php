<?php
include_once("database.php");
	
	class xl_lich_chieu extends database 
	{
		function danh_sach_lich_chieu()
		{
			$lenh_sql = "SELECT DISTINCT lc.*, p.ten_phim, pc.ten_phong_chieu 
							FROM rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc
							WHERE p.id = lc.id_phim
							AND lc.id_phong_chieu = pc.id
							AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
	                    	AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function kiem_tra_ngay($gio_bat_dau, $gio_ket_thuc, $id_phong_chieu)
		{
			$lenh_sql = "SELECT DISTINCT lc.*
							FROM rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc
							WHERE lc.id_phong_chieu = ?
							AND ? BETWEEN ngay_gio_chieu AND ngay_gio_ket_thuc
							OR ? BETWEEN ngay_gio_chieu AND ngay_gio_ket_thuc
							AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array( $id_phong_chieu, $gio_bat_dau, $gio_ket_thuc));
			return $result;
		}

		function danh_sach_lich_chieu_theo_rap($id_rap)
		{
			$lenh_sql = "SELECT DISTINCT lc.*, p.ten_phim , pc.ten_phong_chieu FROM rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc, rp_rap_chieu rc
							WHERE p.id = lc.id_phim
							AND lc.id_phong_chieu = pc.id
							AND pc.id_rap_chieu = ?
							AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
	                    	AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array($id_rap));
			return $result;
		}


		function xoa_lich_chieu($id_lich)
		{
			$lenh_sql = "DELETE FROM rp_lich_chieu
							WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($id_lich));
			return $result;
		}

		function them_moi_lich_chieu($id_phim, $id_phong, $ngay_gio_chieu, $ngay_gio_ket_thuc)
		{
			$lenh_sql = "INSERT INTO rp_lich_chieu(id_phim,id_phong_chieu,ngay_gio_chieu,ngay_gio_ket_thuc)VALUES(?, ?, ?, ?)";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($id_phim,$id_phong,$ngay_gio_chieu,$ngay_gio_ket_thuc));
			return $result;
		}

	}

?>