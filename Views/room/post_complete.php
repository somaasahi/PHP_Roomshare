<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <title>部屋シェア</title>
</head>
<body>
  <?php include('../public/header/header.php');?>
  <?php

  if(!isset($_SESSION['form'])){
    header('Location: intro.php');
    exit();
  }else{
    $_POST = $_SESSION['form'];
  }

  require_once(ROOT_PATH .'Controllers/RoomController.php');
  $room = new RoomController();
  $room->post_register();


   ?>


  <div class="main d-flex align-items-center justify-content-center">
    <p class="list-group-item list-group-item-action list-group-item-warning"
    style="width:200px;">登録が完了しました</p>
  </div>
  </body>
