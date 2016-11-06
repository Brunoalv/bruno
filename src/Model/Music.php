<?php
namespace Bruno\Model;

use Bruno\Form\Validation;

class Music {
	public $id;
	public $band_name;
	public $album_name;
	public $year;
	
	public function __construct()
	{
	}
	
	public function data($data)
	{
        $data = Validation::get($data);
		$this->id = !empty($data['id']) ? $data['id'] : null;
		$this->band_name = !empty($data['band_name']) ? $data['band_name'] : null;
		$this->album_name = !empty($data['album_name']) ? $data['album_name'] : null;
		$this->year = !empty($data['year']) ? $data['year'] : null;
	}
}