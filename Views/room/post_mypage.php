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


  if(!isset($_SESSION['puser'])){
    header('Location: intro.php');
    exit();
  }else{
    $_POST = $_SESSION['puser'];
  }


  require_once(ROOT_PATH .'Controllers/RoomController.php');
  $room = new RoomController();
  $myposts = $room->mypost();

?>
<div class="amain">
  <div class="container justify-content-center" style="width:60%;">
    <div class="area_index">
<div class="three_text" style="text-align:center;margin-left:110px;">
<p style="font-size:18px; color:#555555;">ようこそ<?php echo $_POST['name']; ?>様</p>
<p style="font-size:18px; color:#555555;"><?php echo $_POST['mail']; ?></p>
<p style="font-size:18px; color:#555555;"><?php echo $_POST['tel']; ?></p>
<a type="button" class="btn btn-outline-info" href="post_my_edit.php">個人情報を編集する</a>
<a type="button" class="btn btn-outline-info" href="post.php" style="margin-left:50px;">部屋を投稿する</a>
</div>
</div>




<?php foreach ($myposts as $mypost): ?>
<div class="area_index">
  <div class="images">
  <img src="<?php echo $mypost['save_path'] ?>" style="width:100%;">
</div>
<div class="three_text">
  <p style="font-size:18px; color:#555555;"><?php echo $mypost['address'];?></p>
  <p style="font-size:18px; color:#555555;"><?php echo $mypost['title'];?></p>
  <a type="button" class="btn btn-info" href="post_edit.php?id=<?php echo $mypost['id']; ?>">編集</a>
  <a type="button" class="btn btn-info" href="post_delete.php?id=<?php echo $mypost['id']; ?>"
    onclick="return confirm('削除しますか？')">削除</a>
</div>
</div>
<?php endforeach; ?>

</div>
</div>


</body>
