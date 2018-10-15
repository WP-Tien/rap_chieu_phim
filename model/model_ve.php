<?php
include_once("database.php");

class xl_ve extends database 
{
	function lay_gia_phim_theo_lich_chieu($id_lich_chieu)
	{
		$lenh_sql  = "SELECT p.gia
					FROM rp_phim p, rp_lich_chieu lc
					WHERE lc.id = ?
					AND lc.id_phim = p.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetch(array($id_lich_chieu));
		return $result;
	}

	function dat_ve_nguoi_dung($id_ghe, $id_lich_chieu, $gia_ve, $email_nguoi_mua, $ho_ten_nguoi_mua, $id_thanh_vien, $ngay_gio_dat_ve, $status = 1)
	{
		$lenh_sql = "INSERT INTO rp_ve_phim (id_lich_chieu, gia_ve, email_nguoi_mua, ho_ten_nguoi_mua, id_thanh_vien, ngay_gio_dat_ve, id_ghe, status_ve) 
					VALUES( ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($id_lich_chieu, $gia_ve, $email_nguoi_mua, $ho_ten_nguoi_mua, $id_thanh_vien, $ngay_gio_dat_ve, $id_ghe, $status));
		return $result;
	}

    function lay_ds_ve_theo_lich_chieu($id_lich_chieu)
    {
        $lenh_sql = "SELECT * 
					FROM rp_ve_phim vp, rp_ghe g
					WHERE vp.id_ghe = g.id
					AND vp.id_lich_chieu = ?";
        $this->setQuery($lenh_sql);
        $result = $this->fetchAll(array($id_lich_chieu));
        return $result;
    }

    function xoa_ve($id_ghe)
    {
    	$lenh_sql = "DELETE FROM rp_ve_phim
					WHERE id_ghe = ?";
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($id_ghe));
		return $result;
    }

    function thong_tin_ve_theo_nguoi_dung($user_nguoi_dung)
    {
    	$lenh_sql = "SELECT vp.* , g.* , lc.*, p.*, vp.id as id_ve_phim, pc.ten_phong_chieu, rc.ten_rap_chieu
					FROM rp_quan_tri qt, rp_ve_phim vp, rp_ghe g, rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc, rp_rap_chieu rc 
					WHERE vp.id_thanh_vien = qt.id
					AND vp.id_ghe = g.id
					AND vp.status_ve = 1
					AND lc.id = vp.id_lich_chieu
					AND qt.username = ?
					AND p.id = lc.id_phim
					AND lc.id_phong_chieu = pc.id
					AND pc.id_rap_chieu = rc.id
					AND vp.ngay_gio_dat_ve BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu 
					AND DATEDIFF(lc.ngay_gio_chieu,NOW()) >= 0
					GROUP BY vp.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll(array($user_nguoi_dung));
		return $result;
    }   

    function thong_tin_ve_nguoi_dung_muon_huy_theo_rap($id_rap)
    {
    	$lenh_sql = "SELECT vp.* , g.* , lc.*, p.ten_phim , vp.id as id_ve_phim, pc.ten_phong_chieu, rc.ten_rap_chieu
					FROM rp_quan_tri qt, rp_ve_phim vp, rp_ghe g, rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc, rp_rap_chieu rc
					WHERE vp.id_thanh_vien = qt.id
					AND vp.id_ghe = g.id
					AND lc.id = vp.id_lich_chieu
					AND p.id = lc.id_phim
					AND vp.status_ve = 0
					AND lc.id_phong_chieu = pc.id
					AND pc.id_rap_chieu = rc.id
					AND	pc.id_rap_chieu = ?
					AND vp.ngay_gio_dat_ve BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu 
					AND DATEDIFF(lc.ngay_gio_chieu,vp.ngay_gio_dat_ve) >= 0
					GROUP BY vp.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll(array($id_rap));
		return $result;
    }    

    function thong_tin_ve_nguoi_dung_muon_nhan_theo_rap($id_rap)
    {
    	$lenh_sql = "SELECT vp.* , g.* , lc.*, p.ten_phim , vp.id as id_ve_phim, pc.ten_phong_chieu, rc.ten_rap_chieu
					FROM rp_quan_tri qt, rp_ve_phim vp, rp_ghe g, rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc, rp_rap_chieu rc
					WHERE vp.id_thanh_vien = qt.id
					AND vp.id_ghe = g.id
					AND lc.id = vp.id_lich_chieu
					AND p.id = lc.id_phim
					AND vp.status_ve = 1
					AND lc.id_phong_chieu = pc.id
					AND pc.id_rap_chieu = rc.id
					AND	pc.id_rap_chieu = ?
					AND vp.ngay_gio_dat_ve BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu 
					AND DATEDIFF(lc.ngay_gio_chieu,vp.ngay_gio_dat_ve) >= 0
					GROUP BY vp.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll(array($id_rap));
		return $result;
    }
    
    function thong_tin_ve_nguoi_dung_muon_huy()
    {
    	$lenh_sql = "SELECT vp.* , g.* , lc.*, p.ten_phim , vp.id as id_ve_phim, pc.ten_phong_chieu, rc.ten_rap_chieu
					FROM rp_quan_tri qt, rp_ve_phim vp, rp_ghe g, rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc, rp_rap_chieu rc
					WHERE vp.id_thanh_vien = qt.id
					AND vp.id_ghe = g.id
					AND lc.id = vp.id_lich_chieu
					AND p.id = lc.id_phim
					AND vp.status_ve = 0
					AND lc.id_phong_chieu = pc.id
					AND pc.id_rap_chieu = rc.id
					AND vp.ngay_gio_dat_ve BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu 
					AND DATEDIFF(lc.ngay_gio_chieu,vp.ngay_gio_dat_ve) >= 0
					GROUP BY vp.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
    }

    function thong_tin_ve_nguoi_dung_muon_nhan()
    {
    	$lenh_sql = "SELECT vp.* , g.* , lc.*, p.ten_phim , vp.id as id_ve_phim, pc.ten_phong_chieu, rc.ten_rap_chieu
					FROM rp_quan_tri qt, rp_ve_phim vp, rp_ghe g, rp_lich_chieu lc, rp_phim p, rp_phong_chieu pc, rp_rap_chieu rc
					WHERE vp.id_thanh_vien = qt.id
					AND vp.id_ghe = g.id
					AND lc.id = vp.id_lich_chieu
					AND p.id = lc.id_phim
					AND vp.status_ve = 1
					AND lc.id_phong_chieu = pc.id
					AND pc.id_rap_chieu = rc.id
					AND vp.ngay_gio_dat_ve BETWEEN p.ngay_khoi_chieu AND p.ngay_ngung_chieu 
					AND DATEDIFF(lc.ngay_gio_chieu,vp.ngay_gio_dat_ve) >= 0
					GROUP BY vp.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll();
		return $result;
    }

    function huy_ve_nguoi_dung($id_ve)
    {
    	$lenh_sql = "UPDATE rp_ve_phim
						SET status_ve = 0
						WHERE id = ?";
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($id_ve));
		return $result;
    }

    function nhan_ve($id_ve)
    {
    	$lenh_sql = "UPDATE rp_ve_phim
						SET status_ve = 2
						WHERE id = ?";
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($id_ve));
		return $result;
    }


}




?> 