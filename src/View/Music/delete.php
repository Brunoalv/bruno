<?php
use Bruno\Controller\MusicController;
$controller = new MusicController;
$id = $_GET['id'];

if (isset($_POST['submit']))
{
    $controller->delete($id);
    header ('Location: http://localhost/php');
}

if (isset($_POST['notSubmit']))
{
    header ('Location: http://localhost/php');
}

$fetch = $controller->view($id);