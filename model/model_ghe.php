<?php  
include_once ("database.php");

class xl_ghe extends database
{
	function dat_ve_phim_tam($mang_vi_tri, $id_phong_chieu)
	{
		$lenh_sql = "INSERT INTO rp_ghe(id_phong_chieu,vi_tri_hang_ghe,vi_tri_cot_ghe) VALUES(?,?,?)";
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($id_phong_chieu, $mang_vi_tri["hang"], $mang_vi_tri["cot"]));
		return $result;
	}

	function lay_ghe_da_dat($id_suat_chieu)
	{
		$lenh_sql = "SELECT DISTINCT g.*
					FROM rp_ghe g, rp_lich_chieu lc
					WHERE lc.id = ?
					AND g.id IN (SELECT id_ghe FROM rp_ve_phim WHERE status_ve = 1)
					AND lc.id_phong_chieu = g.id_phong_chieu";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll(array($id_suat_chieu));
		return $result;
	}

	function lay_id_ghe_theo_vi_tri($mang_vi_tri)
	{
		$lenh_sql = "SELECT g.id
		FROM rp_ghe g
		WHERE vi_tri_hang_ghe = ?
		AND vi_tri_cot_ghe = ?";
		$this->setQuery($lenh_sql);
		$result = $this->fetch(array($mang_vi_tri["hang"], $mang_vi_tri["cot"]));
		return $result;
	}

    function xoa_ghe($vi_tri_hang_ghe, $vi_tri_cot_ghe)
    {
    	$lenh_sql = "DELETE FROM rp_ghe
					WHERE vi_tri_hang_ghe = ?
					AND vi_tri_cot_ghe = ?";
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($vi_tri_hang_ghe, $vi_tri_cot_ghe));
		return $result;
    }

}