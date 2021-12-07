<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <title>部屋シェア</title>
</head>
<body>
  <?php include('../public/header/header.php');?>
  <?php



  if(!isset($_SESSION['post'])){
    header('Location: intro.php');
    exit();
  }else{
    $_POST = $_SESSION['post'];
  }

  require_once(ROOT_PATH .'Controllers/RoomController.php');
  $room = new RoomController();
  $room->re_post();

  header('Location: post_mypage.php');
  exit();

   ?>
</body>
