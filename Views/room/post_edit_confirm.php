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
  if(!isset($_SESSION['form']['save_path'])){
    header('Location: intro.php');
    exit();
  }else{
    $_POST = $_SESSION['form'];
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_SESSION['post'] = $_POST;
      header('Location: post_edit_ok.php');
      exit();
}
    ?>
    <div class="amain">
      <div class="container justify-content-center" style="width:70%;">

    <div class="view_outline">
<form action="" method="post">
    <div class="view_view">
      <div class="view_images">
      <img src="<?php echo $_POST['save_path'] ?>" style="width:100%;">
    </div>
    <div class="view_three_text">
      <input class="btn btn-outline-info" style="margin-bottom:60px;margin-left:150px;"
      type="submit" value="更新" onclick="return confirm('更新しますか？')">
      <p style="font-size:18px; color:#555555;"><?php echo $_POST['address'];?></p>
      <p style="font-size:18px; color:#555555;"><?php echo $_POST['title'];?></p>
    </div>
    </div>
    <div class="contentbox">
      <p style="font-size:18px; color:#555555;"><?php echo nl2br($_POST['content']);?></p>
    </div>
</form>
    </div>
    </div>
    </div>

   </body>
