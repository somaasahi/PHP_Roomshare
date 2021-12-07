<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <title>部屋シェア</title>
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/like.js"></script>
  <script src="https://kit.fontawesome.com/2135f49250.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php include('../public/header/header.php');?>

<?php


$id = $_GET['id'];
if(!isset($_SESSION['admin'])){
  header('Location: intro.php');
  exit();
}

require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$post = $room->view_view();




?>

<div class="amain">
  <div class="container justify-content-center" style="width:70%;">

<div class="view_outline">

<div class="view_view">
  <div class="view_images">
  <img src="<?php echo $post['save_path'] ?>" style="width:100%;">
</div>
<div class="view_three_text">
  
  <p style="font-size:18px; color:#555555;"><?php echo $post['address'];?></p>
  <p style="font-size:18px; color:#555555;"><?php echo $post['title'];?></p>
</div>
</div>
<div class="contentbox">
  <p style="font-size:18px; color:#555555;"><?php echo nl2br($post['content']);?></p>
</div>

</div>
</div>
</div>


</body>
