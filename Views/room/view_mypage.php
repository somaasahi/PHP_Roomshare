<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <script src="https://kit.fontawesome.com/2135f49250.js" crossorigin="anonymous"></script>

  <title>部屋シェア</title>
</head>
<body>
  <?php include('../public/header/header.php');?>

  <?php


  if(!isset($_SESSION['vuser'])){
    header('Location: intro.php');
    exit();
  }else{
    $_POST = $_SESSION['vuser'];
  }


  require_once(ROOT_PATH .'Controllers/RoomController.php');
  $room = new RoomController();
  $mylikes = $room->mylikes();


?>
<div class="amain">
  <div class="container justify-content-center" style="width:60%;">
    <div class="area_index">
<div class="three_text" style="text-align:center;margin-left:110px;">
<p style="font-size:18px; color:#555555;">ようこそ<?php echo $_POST['name']; ?>様</p>
<p style="font-size:18px; color:#555555;"><?php echo $_POST['mail']; ?></p>
<p style="font-size:18px; color:#555555;"><?php echo $_POST['tel']; ?></p>
<a type="button" class="btn btn-outline-info" href="view_my_edit.php">編集する</a>
</div>
</div>
<div class="area_index">
  <div class="images">
  <img src="/css/house.jpeg" style="width:100%;">
</div>
<div class="three_text">
  <p style="font-size:18px; color:#555555;">部屋を探しに行こう！</p>
  <a type="button" class="btn btn-outline-info btn-lg" style="width:150px;margin-right:60px;"href="area_search.php">エリア検索</a>
  <a type="button" class="btn btn-outline-info btn-lg" style="width:180px;" href="key_search.php">キーワード検索</a>

</div>
</div>


<?php foreach ($mylikes as $mylike): ?>
<div class="area_index">
  <div class="images">
  <img src="<?php echo $mylike['save_path'] ?>" style="width:100%;">
</div>
<div class="three_text">
  <p style="font-size:18px; color:#555555;"><i style="color:#B384FF;" class="fa-heart fa-lg px-16 active fas"></i><i>**thanks like!**</i></p>
  <p style="font-size:18px; color:#555555;"><?php echo $mylike['address'];?></p>
  <p style="font-size:18px; color:#555555;"><?php echo $mylike['title'];?></p>
  <a type="button" class="btn btn-info" href="view_view.php?id=<?php echo $mylike['id']; ?>">詳細</a>
</div>
</div>
<?php endforeach; ?>

<?php if(empty($mylikes)): ?>
  <div class="area_index">
    <div class="three_text" style="text-align:center;margin-left:110px;">
<p style="font-size:18px; color:#555555;">いいねした投稿はありません</p>
</div>
</div>
<?php endif; ?>

</div>
</div>






</body>
