<?php 
	include_once ("database.php");

	class xl_loai_phim extends database
	{
		function lay_ds_loai_phim_theo_id_phim($id_phim)
		{
			$lenh_sql = "SELECT lp.*
						FROM rp_loai_phim lp, rp_phim_loai_phim plp
						WHERE plp.id_phim = ?
						AND plp.id_loai_phim = lp.id";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll(array($id_phim));
			return $result;
		}

		function lay_ds_loai_phim()
		{
			$lenh_sql = "SELECT *
							FROM rp_loai_phim";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}
	}

?>