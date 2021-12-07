<?php
$id = $_GET['id'];
if(empty($id)){
  header('Location: intro.php');
  exit();
}
session_start();
if(!isset($_SESSION['puser'])){
header('Location: intro.php');
exit();
}

var_dump($id);
var_dump($id);
require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$room->post_delete();


header('Location: post_mypage.php');
exit();

?>
