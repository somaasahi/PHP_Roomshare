<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <title>部屋シェア</title>
</head>
<body>
<div class="main d-flex align-items-center justify-content-center">
  <?php include('../public/header/header.php');?>
  <!-- <div class="area_index">
  <p>
    部屋シェアへようこそ</br>
  　住む場所をフラッと変えたい</br>
  　まだ何も決めていないけど、居住地を変えたい
  　そんな方が訪れる場所が部屋シェアです
  </p>
  </div> -->
  <div class="area_index" style="width:60%;">
    <div class="images">
    <img src="/css/nice.jpeg" style="width:100%;">
  </div>
  <div class="three_text">
    <p style="font-size:22px; color:#555555;margin-bottom:30px;">部屋を探しに行こう！</p>
    <a type="button" class="btn btn-outline-info btn-lg" style="width:150px;margin-right:60px;"href="area_search.php">エリア検索</a>
    <a type="button" class="btn btn-outline-info btn-lg" style="width:180px;" href="key_search.php">キーワード検索</a>

  </div>
  </div>
</body>
