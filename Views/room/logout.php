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
  if(isset($_SESSION)){
    session_destroy();
  }
  header('Location: logout_complete.php');
  exit();

   ?>

</body>
