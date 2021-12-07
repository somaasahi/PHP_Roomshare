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



  if(!isset($_SESSION['admin'])){
    header('Location: intro.php');
    exit();
  }


  ?>

  <div class="amain" style="height:800px;">
    <div class="container justify-content-center" style="width:60%;">
      <div class="area_index">
  <div class="three_text" style="text-align:center;margin-left:110px;">
  <a href="poster_index.php" type="button" class="btn btn-outline-info">投稿者一覧へ</a>
  <a href="viewer_index.php" type="button" class="btn btn-outline-info">閲覧者一覧へ</a>
  <a href="post_index.php" type="button" class="btn btn-outline-info">投稿一覧へ</a>
    </div>
  </div>


</body>
