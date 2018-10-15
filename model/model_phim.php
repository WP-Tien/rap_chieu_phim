<?php  
include_once 'database.php';
	class xl_phim extends database
	{
		function danh_sach_tat_ca_phim()
		{
			$lenh_sql = "SELECT * FROM rp_phim";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		// function lay_danh_theo_id($id_phim)
		// {
		// 	$lenh_sql = "SELECT * 
		// 				FROM rp_phim
		// 				WHERE id = ?";
		// 	$this->setQuery($lenh_sql);
		// 	$result = $this->fetchAll($id_phim);
		// 	return $result;
		// }		

		function lay_phim_theo_id($id_phim)
		{
			$lenh_sql = "	SELECT p.*, nsx.ten_nha_san_xuat, dd.ten_dao_dien, lc.ngay_gio_chieu
							FROM  rp_phim p, rp_nha_san_xuat nsx, rp_dao_dien dd, rp_lich_chieu lc
							WHERE p.id = ?
							AND p.nha_san_xuat = nsx.id
							AND p.dao_dien	= dd.id
							AND p.id = lc.id_phim";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id_phim));
			return $result;
		}		

		function lay_phim_theo_id_ko_lc($id_phim)
		{
			$lenh_sql = "	SELECT p.*, nsx.ten_nha_san_xuat, dd.ten_dao_dien
							FROM  rp_phim p, rp_nha_san_xuat nsx, rp_dao_dien dd
							WHERE p.id = ?
							AND p.nha_san_xuat = nsx.id
							AND p.dao_dien	= dd.id ";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id_phim));
			return $result;
		}


		function danh_sach_phim_sap_chieu()
		{
			$lenh_sql = "SELECT *
						FROM rp_phim
						WHERE DATEDIFF (ngay_khoi_chieu,NOW()) > 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function lay_ds_phim_sap_chieu_hien_thi($bat_dau = 0, $so_luong = "")
		{
			if($so_luong)
			{
				$lenh_sql = "SELECT *
							FROM rp_phim
							WHERE DATEDIFF (ngay_khoi_chieu,NOW()) > 0
							LIMIT $bat_dau, $so_luong";	
			}
			else 
			{
				$lenh_sql = "SELECT *
							FROM rp_phim
							WHERE DATEDIFF (ngay_khoi_chieu,NOW()) > 0";
			}
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function danh_sach_phim_dang_chieu()
		{
			$lenh_sql = "SELECT DISTINCT p.* 
						FROM rp_phim p, rp_lich_chieu lc
						WHERE NOW() BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu
						AND p.id = lc.id_phim
						AND DATEDIFF(lc.ngay_gio_chieu, NOW()) >= 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}		

		function lay_ds_phim_dang_chieu_hien_thi($bat_dau = 0, $so_luong = "")
		{
			if($so_luong)
			{
				$lenh_sql = "SELECT * 
							FROM rp_phim
							WHERE NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
							AND DATEDIFF(ngay_ngung_chieu,NOW()) >= 0
							LIMIT $bat_dau, $so_luong";	
			}
			else 
			{
				$lenh_sql = "SELECT * 
							FROM rp_phim
							WHERE NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
							AND DATEDIFF(ngay_ngung_chieu,NOW()) >= 0";
			}
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}



		function danh_sach_rap_co_phim_dang_chieu()
		{
			$lenh_sql = "SELECT DISTINCT rc.*
						FROM rp_phim p, rp_lich_chieu lc, rp_phong_chieu pc,rp_rap_chieu rc
						WHERE NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
						AND DATEDIFF(ngay_ngung_chieu,NOW()) >= 0
						AND rc.id = pc.id_rap_chieu
						AND pc.id = lc.id_phong_chieu";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function danh_sach_phim_dang_chieu_theo_rap($id_rap)
		{
	        $lenh_sql = "SELECT DISTINCT p.* 
	                    FROM rp_phim p, rp_lich_chieu lc, rp_phong_chieu pc
	                    WHERE p.id = lc.id_phim
	                    AND lc.id_phong_chieu = pc.id
	                    AND pc.id_rap_chieu = ?
	                    AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
	                    AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
	        $this->setQuery($lenh_sql);
	        $result = $this->fetchAll(array($id_rap));
	        return $result;
		}

		function danh_sach_ngay_chieu_theo_rap($id_rap, $id_phim)
		{
			$lenh_sql = "SELECT DISTINCT DATE_FORMAT(lc.ngay_gio_chieu,'%d/%m/%Y') as ngay
                    FROM rp_phim p, rp_lich_chieu lc, rp_phong_chieu pc
                    WHERE p.id = lc.id_phim
                    AND lc.id_phong_chieu = pc.id
                    AND pc.id_rap_chieu = ?
                    AND p.id = ?
                    AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
                    AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
            $this->setQuery($lenh_sql);
            $result = $this->fetchAll(array($id_rap, $id_phim));
            return $result;
		}

		function danh_sach_ngay_gio($id_rap, $id_phim)
		{
			$lenh_sql = "SELECT DISTINCT lc.id, TIME(ngay_gio_chieu) as gio_chieu , DATE_FORMAT(lc.ngay_gio_chieu,'%d/%m/%Y') as ngay
                    FROM rp_phim p, rp_lich_chieu lc, rp_phong_chieu pc
                    WHERE p.id = lc.id_phim
                    AND lc.id_phong_chieu = pc.id
                    AND pc.id_rap_chieu = ?
                    AND p.id = ?
                    AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
                    AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
            $this->setQuery($lenh_sql);
            $result = $this->fetchAll(array($id_rap, $id_phim));
            return $result;
		}


		function danh_sach_ngay_chieu_co_phim_dang_chieu()
		{
			$lenh_sql = "SELECT DISTINCT DATE_FORMAT(lc.ngay_gio_chieu,'%d/%m/%Y') as ngay
                    FROM rp_phim p, rp_lich_chieu lc, rp_phong_chieu pc, rp_rap_chieu rc
                    WHERE p.id = lc.id_phim
                    AND lc.id_phong_chieu = pc.id
                    AND pc.id_rap_chieu = rc.id
                    AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
                    AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0";
            $this->setQuery($lenh_sql);
            $result = $this->fetchAll();
            return $result;
		}

		function danh_sach_gio_chieu_theo_ngay($id_rap, $id_phim, $ngay)
		{
			$mang_ngay = explode("/",$ngay);
            $lenh_sql = "SELECT lc.*, TIME(ngay_gio_chieu) as gio_chieu 
                        FROM rp_lich_chieu lc, rp_phong_chieu pc
                        WHERE lc.id_phong_chieu = pc.id
                        AND id_phim = ?
                        AND pc.id_rap_chieu = ?
                        AND DATEDIFF(ngay_gio_chieu,NOW()) >= 0
                        AND DAY(ngay_gio_chieu) = ?
                        AND MONTH(ngay_gio_chieu) = ?
                        AND YEAR(ngay_gio_chieu) = ?";
            $this->setQuery($lenh_sql);
            $result = $this->fetchAll(array($id_phim,$id_rap,$mang_ngay[0],$mang_ngay[1],$mang_ngay[2]));
            return $result;
		}

		function danh_rap_theo_phim($id_phim)
		{
	        $lenh_sql = "SELECT DISTINCT rc.* 
						FROM rp_rap_chieu rc, rp_phim p, rp_lich_chieu lc, rp_phong_chieu pc 
						WHERE lc.id_phim = ?
						AND lc.id_phong_chieu = pc.id
						AND pc.id_rap_chieu = rc.id ";
	        $this->setQuery($lenh_sql);
	        $result = $this->fetchAll(array($id_phim));
	        return $result;
		}		

		function danh_sach_rap_theo_ngay($id_ngay)
		{
	        $lenh_sql = "SELECT DISTINCT rc.* 
						FROM rp_lich_chieu lc, rp_phong_chieu pc, rp_rap_chieu rc
						WHERE lc.id_phong_chieu = pc.id
						AND pc.id_rap_chieu = rc.id
						AND DATE_FORMAT(lc.ngay_gio_chieu,'%d/%m/%Y') = ?";
	        $this->setQuery($lenh_sql);
	        $result = $this->fetchAll(array($id_ngay));
	        return $result;
		}

		function danh_sach_phim_gio_chieu_theo_ngay_va_rap($id_ngay, $id_rap)
		{
			$lenh_sql = "SELECT DISTINCT p.* , TIME(ngay_gio_chieu) as gio_chieu, lc.id as id_suat
							FROM rp_lich_chieu lc, rp_phong_chieu pc, rp_rap_chieu rc, rp_phim p
							WHERE lc.id_phong_chieu = pc.id
							AND pc.id_rap_chieu = rc.id
							AND DATE_FORMAT(lc.ngay_gio_chieu,'%d/%m/%Y') = ?
							AND p.id = lc.id_phim
							AND rc.id = ? ";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array($id_ngay,$id_rap));
			return $result;
		}

		// function thong_tin_theo_id_phim($id_phim)
		// {
		// 	$lenh_sql = "";
		// 	$this->setQuery($lenh_sql);
		// 	$result = $this->fetchAll(array($id_phim));
		// 	return $result;
		// }

		function ds_lich_chieu_duoc_chon_theo_phim($id_phim){
            $lenh_sql = "SELECT lc.*, TIME(ngay_gio_chieu) as gio_chieu 
                        FROM rp_lich_chieu lc, rp_phong_chieu pc
                        WHERE lc.id_phong_chieu = pc.id
                        AND id_phim = ?";
            $this->setQuery($lenh_sql);
            $result = $this->fetchAll(array($id_phim));
            return $result;
        }

        function ds_phim_sap_chieu_theo_loai($id_loai)
        {
        	$lenh_sql = "SELECT p.* 
        				FROM rp_phim p, rp_phim_loai_phim plp
        				WHERE p.id = plp.id_phim 
        				AND plp.id_loai_phim = ?
        				AND DATEDIFF (ngay_khoi_chieu,NOW()) > 0";
            $this->setQuery($lenh_sql);
            $result = $this->fetchAll(array($id_loai));
            return $result;
        }



        function lay_ds_phim_sap_chieu_hien_thi_theo_loai($bat_dau = 0, $so_luong = "", $id_loai)
		{
			if($so_luong)
			{
				$lenh_sql = "SELECT p.*
	        				FROM rp_phim p, rp_phim_loai_phim plp
	        				WHERE p.id = plp.id_phim 
							AND DATEDIFF (ngay_khoi_chieu,NOW()) > 0
							AND plp.id_loai_phim = $id_loai
							LIMIT $bat_dau, $so_luong";	
			}
			else 
			{
				$lenh_sql = "SELECT p.*
	        				FROM rp_phim p, rp_phim_loai_phim plp
	        				AND p.id = plp.id_phim 
							WHERE DATEDIFF (ngay_khoi_chieu,NOW()) > 0
							AND plp.id_loai_phim = $id_loai";
			}
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function danh_sach_phim_dang_chieu_theo_loai($id_loai)
		{
			$lenh_sql = "SELECT DISTINCT p.* 
						FROM rp_phim p, rp_lich_chieu lc, rp_phim_loai_phim plp
						WHERE p.id = plp.id_phim 
	        			AND plp.id_loai_phim = $id_loai
	        			AND NOW() BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu
						AND p.id = lc.id_phim
						AND DATEDIFF(lc.ngay_gio_chieu, NOW()) >= 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}		
		
		function lay_ds_phim_dang_chieu_hien_thi_theo_loai($bat_dau = 0, $so_luong = "", $id_loai)
		{
			if($so_luong)
			{
				$lenh_sql = "SELECT * 
							FROM rp_phim p, rp_phim_loai_phim plp
	        				WHERE p.id = plp.id_phim 
	        				AND plp.id_loai_phim = $id_loai
							AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
							AND DATEDIFF(ngay_ngung_chieu,NOW()) >= 0
							LIMIT $bat_dau, $so_luong";	
			}
			else 
			{
				$lenh_sql = "SELECT * 
							FROM rp_phim p, rp_phim_loai_phim plp
	        				WHERE p.id = plp.id_phim 
	        				AND plp.id_loai_phim = $id_loai
							AND NOW() BETWEEN ngay_khoi_chieu AND ngay_ngung_chieu
							AND DATEDIFF(ngay_ngung_chieu,NOW()) >= 0";
			}
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

	}
?>