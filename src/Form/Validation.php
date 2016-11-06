<?php
namespace Bruno\Form;

class Validation {
	
	public static function get($data)
	{
		$data = self::htmlChars($data);
		$data = self::trimVal($data);
		$data = self::strips($data);
		
		return $data;
	}
	
	/**
	 * Elimina os espaços em branco no começo e no final
	 *
	 * @param array $data Recebe os dados a serem validados
	 * @return array
	 */
	public static function trimVal($data)
	{
		foreach ($data as $i => $v)
		{
			$data[$i] = trim($v);
		}
		
		return $data;
	}
	
	public static function strips($data)
	{
		foreach ($data as $i => $v)
		{
			$data[$i] = stripslashes($v);
		}
		
		return $data;
	}
	
	public static function htmlChars(array $data)
	{
		foreach ($data as $i => $v)
		{
			$data[$i] = htmlspecialchars($v);
		}
		
		return $data;
	}
	
	/**
	 * Verifica a quantidade de caracteres
	 *
	 * @param mixed $data
	 * @param int $limit
	 * @return mixed
	 */
	public static function length(array $data, int $limit)
	{
		if ($data.length > $limit) {
			return false;
		}
		else {
			return true;
		}
	}
}