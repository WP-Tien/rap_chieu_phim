<?php
if(file_exists("config.php"))
{
    include_once("config.php");
}
else
{
    include_once("../config.php");
}

class Database{
	protected $pdo, $sql, $sth;

	function Database()
	{
		try{
			$config = new config();
			$this->pdo = new PDO("mysql:host=$config->host;dbname=$config->dbname;charset=utf8","root","");
		}
		catch(PDOException $exception){
			throw new Exception("Không kết nối được với database");
		}
	}

	function setQuery($sql)
	{
		$this->sql = $sql;
	}
	
	function execute($option = array())
	{
		$this->sth = $this->pdo->prepare($this->sql);
		if($option)
		{
			for($i = 0; $i < count($option); $i++)
			{
				$this->sth->bindParam($i + 1, $option[$i]);
			}
		}
		$this->sth->execute();
		return $this->sth;
	}
	
	function fetchAll($option = array()){
		if($option)
		{
			if(!$result = $this->execute($option))
			{
				return false;
			}
		}
		else
		{
			if(!$result = $this->execute())
			{
				return false;
			}
		}
		return $this->sth->fetchAll(PDO::FETCH_OBJ);
	}
	
	function fetch($option = array()){
		if($option)
		{
			if(!$result = $this->execute($option))
			{
				return false;
			}
		}
		else
		{
			if(!$result = $this->execute())
			{
				return false;
			}
		}
		return $this->sth->fetch(PDO::FETCH_OBJ);
	}
	
	function getLastId()
	{
		return $this->pdo->lastInsertId();
	}
	
	function close_database()
	{
		$this->pdo = null;
		$this->sth = null;
	}

}
?>