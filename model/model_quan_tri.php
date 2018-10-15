<?php  
if(file_exists("model/database.php"))
{
    include_once("database.php");
}
else
{
    include_once("../model/database.php");
}

	class xl_nguoi_dung extends database
	{
		function lay_tat_ca_nguoi_dung()
		{
			$lenh_sql = "SELECT * FROM rp_quan_tri
						WHERE authorization = 1";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function lay_tat_ca_quan_tri()
		{
			$lenh_sql = "SELECT * FROM rp_quan_tri
						WHERE authorization = 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetchAll();
			return $result;
		}

		function lay_thong_tin_nguoi_dung($username)
		{
			$lenh_sql = "SELECT * FROM rp_quan_tri
						WHERE username = ?";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($username));
			return $result;
		}

		function lay_thong_tin_quan_tri($username)
		{
			$lenh_sql = "SELECT * FROM rp_quan_tri
						WHERE username = ?
						AND authorization = 0";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($username));
			return $result;
		}

		function them_nguoi_dung($username, $password, $hoten, $email, $trangthai = 1, $diemtichluy = 0, $authorization = 1)
		{
			$password = md5($password);
	    	$lenh_sql = "INSERT INTO rp_quan_tri(username,password,ho_ten,email, trang_thai, diem_tich_luy,authorization) 
	    	 				VALUES(?,?,?,?,?,?,?)";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($username,$password,$hoten,$email,$trangthai,$diemtichluy,$authorization));
			return $result;
		}
		function them_quan_tri($username, $password, $hoten, $email, $quan_tri_rap, $trangthai = 1,  $diemtichluy = 0, $authorization = 0 )
		{
			$password = md5($password);
	    	$lenh_sql = "INSERT INTO rp_quan_tri(username,password,ho_ten,email, trang_thai, diem_tich_luy,authorization, quan_tri_rap) 
	    	 				VALUES(?,?,?,?,?,?,?,?)";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($username,$password,$hoten,$email,$trangthai,$diemtichluy,$authorization, $quan_tri_rap));
			return $result;
		}

		function thay_doi_thong_tin_nguoi_dung($hoten, $email, $password, $id)
		{
			$password = md5($password);
			$lenh_sql = "UPDATE rp_quan_tri
						SET ho_ten = ?, email = ? , password = ?
						WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($hoten,$email,$password,$id));
			return $result;
		}		

		function thay_doi_thong_tin_quan_tri($id, $email, $hoten, $password, $quan_tri_rap)
		{
			$password = md5($password);
			$lenh_sql = "UPDATE rp_quan_tri
						SET ho_ten = ?, email = ? , password = ?, quan_tri_rap = ?
						WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($hoten, $email,$password, $quan_tri_rap, $id));
			return $result;
		}

		function lay_diem_nguoi_dung($id_nguoidung)
		{
			$lenh_sql = "SELECT diem_tich_luy FROM rp_quan_tri WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->fetch(array($id_nguoidung));
			return $result;
		}

		function cong_diem_cho_nguoi_dung($diem_tich_luy, $id)
		{
			$lenh_sql = "UPDATE rp_quan_tri
						SET diem_tich_luy = ?
						WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($diem_tich_luy, $id));
			return $result;
		}

		function xoa_quan_tri($id)
		{
			$lenh_sql = "DELETE FROM rp_quan_tri
							WHERE id = ?";
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($id));
			return $result;
		}
	}
?>