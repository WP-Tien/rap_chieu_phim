<?php 
include_once ("database.php");

class xl_dien_vien extends database 
{
	function lay_ds_dien_vien_theo_id_phim($id_phim)
	{
		$lenh_sql = "SELECT dv.*
					FROM rp_dien_vien dv, rp_dien_vien_phim dvp
					WHERE dvp.id_phim = ?
					AND dvp.id_dien_vien = dv.id";
		$this->setQuery($lenh_sql);
		$result = $this->fetchAll(array($id_phim));
		return $result;
	}
}
?>