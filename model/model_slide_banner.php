<?php
include_once ("database.php");
	
	class xl_slide_banner extends database
	{
		function danh_sach_slide_banner()
		{
			$lenh_sql = "SELECT * 
						FROM rp_slide_banner
						WHERE trang_thai = 1";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}
	}	


?>