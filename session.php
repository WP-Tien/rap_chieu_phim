<?php
class  Session
{
	private static $_sessionStart = false;

	public static function start()
	{
		if(self::$_sessionStart == false)
		{
			session_start();
			self::$_sessionStart = true;
		}
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key, $secondKey = false)
	{
		if ($secondKey ==  true)
		{
			if (isset($_SESSION[$key][$secondKey]))
				return $_SESSION[$key][$secondKey];
		}
		else
		{
			if(isset($_SESSION[$key]))
			{
			return $_SESSION[$key];
			}
		}

		return false;

	}

	public static function display()
	{
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	}

	public static function destroy()
	{
		if(self::$_sessionStart == true)
		{
		session_unset();
		session_destroy();
		}
	}
}
?>