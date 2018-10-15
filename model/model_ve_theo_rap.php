<?php 
include_once ("database.php");

class xl_ve_theo_rap extends database 
{
	function phan_tram_rap($id_rap)
	{
		$lenh_sql = "SELECT * 
					FROM rp_gia_theo_rap
					WHERE id_rap = ?";
		$this->setQuery($lenh_sql);
		$result = $this->fetch(array($id_rap));
		return $result;
	}
}