<?php

$id = $_GET['id'];

if(empty($id)){
  header('Location: intro.php');
  exit();
}
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: intro.php');
  exit();
}

require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$room->poster_delete();

header('Location: poster_index.php');
exit();

?>
