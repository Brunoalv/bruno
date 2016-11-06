<?php
use Bruno\Controller\MusicController;
$controller = new MusicController;
$id = $_GET['id'];

if (isset($_POST['submit']))
{
    $data['id'] = $id;
    $data['band_name'] = $_POST['band_name'];
	$data['album_name'] = $_POST['album_name'];
    $data['year'] = $_POST['year'];
    
    $controller->add($data);
    header ('Location: http://localhost/php');
}

$fetch = $controller->view($id);
?>