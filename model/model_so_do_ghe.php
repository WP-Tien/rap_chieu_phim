<?php  
include_once ("database.php");
	class xl_so_do_ghe extends database
	{
		function danh_sach_ghe_theo_lich_chieu($id_lich_chieu, $id_phim)
		{
			$lenh_sql = "SELECT pc.*, rc.*, p.*, lc.id as id_lich_chieu, TIME(ngay_gio_chieu) as gio_chieu, pc.id as id_phong_chieu
						FROM rp_lich_chieu lc, rp_phong_chieu pc, rp_rap_chieu rc, rp_phim p
						WHERE lc.id = ?
						AND p.id = ?
						AND lc.id_phong_chieu = pc.id
						AND pc.id_rap_chieu = rc.id
						AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
                    	AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id_lich_chieu,$id_phim));
			return $result;
		}

	}
?>