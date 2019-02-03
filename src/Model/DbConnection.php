<?php
namespace Bruno\Model;
use PDO;

final class DbConnection
{
	public static function get()
	{
		return self::connect();
	}

	private static function connect()
	{
		try {
			$conn = new PDO("mysql:host=servername; dbname=dbname", 'username', 'password');
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return $conn;
		}
		catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
	public static function statement($sql, $data = null)
	{
		$connection = self::connection();
		$prepare = $connection->prepare($sql);
        $prepare->execute($data);
        
		return $prepare;
	}
	
	public static function select($sql, $data = null)
	{
		if (!$data) {
			$prepare = self::statement($sql);
			return $prepare->fetchAll();
		}
		else {
			$prepare = self::statement($sql, $data);
			return $prepare->fetch();
		}
	}
	
	public static function update($sql, $data)
	{
		self::statement($sql, $data);
	}
	
	public static function insert($sql, $data)
	{
        self::statement($sql, $data);
	}
	
	public static function delete($sql, $data)
	{
        self::statement($sql, $data);
	}
}