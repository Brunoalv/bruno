<?php
use Bruno\Controller\MusicController;
$controller = new MusicController;

if (isset($_POST['submit']))
{
	$data = ['band_name' => $_POST['band_name'], 'album_name' => $_POST['album_name'], 'year' => $_POST['year']];
	
	$controller->add($data);
	//header('Location: http://localhost/php');
}

$dataView = $controller->view();