<?php
namespace Bruno\Model;

class MusicTable {
	public static function fetch($id)
	{
		return Mysql::select('SELECT * FROM music WHERE id = ?', [$id]);
	}
	
	public static function fetchAll()
	{
		return Mysql::select('SELECT * FROM music');
	}
	
	public static function save(Music $music)
	{
		$data = ['id' => $music->id, 'band' => $music->band_name, 'album' => $music->album_name, 'year' => $music->year];
		
		if ($data['id'] !== null) {
			Mysql::update('UPDATE music SET band_name = ?, album_name = ?, year = ? WHERE id = ?', [$data['band'], $data['album'], $data['year'], $data['id']]);
		}
		else {
			Mysql::insert('INSERT INTO music (band_name, album_name, year) VALUES (?, ?, ?)', [$data['band'], $data['album'], $data['year']]);
		}
	}
	
	public static function delete($id)
	{
		Mysql::delete('DELETE FROM music WHERE id = ?', [$id]);
	}
}