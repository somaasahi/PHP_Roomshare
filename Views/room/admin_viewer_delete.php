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
$room->viewer_delete();

header('Location: viewer_index.php');
exit();

?>
