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


    if(!isset($_SESSION['wrong'])){
      header('Location: intro.php');
      exit();
    }else{
      $_POST = $_SESSION['form'];
    }

session_destroy();
    ?>
    <div class="main d-flex align-items-center justify-content-center">
      <p class="list-group-item list-group-item-action list-group-item-danger"
      style="width:250px;">停止されたアカウントです</p>
    </div>
</body>
