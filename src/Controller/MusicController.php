<?php
namespace Bruno\Controller;

use Bruno\Model\Music;
use Bruno\Model\MusicTable;

class MusicController extends Controller
{
	
	public function __construct()
	{
	}
	
	public function add(array $data)
	{
		$music = new Music;
		$music->data($data);
		MusicTable::save($music);
	}
	
	public function delete($id)
	{
		$id = (int) $id;
		MusicTable::delete($id);
	}
	
	
	public function view($id = null)
	{
		$id = (int) $id;
		
		if (!$id) {
			return MusicTable::fetchAll();
		}
		else {
			return MusicTable::fetch($id);
		}
	}
}