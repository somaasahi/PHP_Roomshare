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

require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$post = $room->view_view();
$param = $room->isGood($_SESSION['vuser']['id'],$post['id']);



?>

<div class="amain">
  <div class="container justify-content-center" style="width:70%;">

<div class="view_outline">
  <div class="k" style="margin-bottom:40px;">
    <span data-postid="<?php echo $post['id']; ?>" class="like <?php if($room->isGood($post['id'],$_SESSION['vuser']['id']) == 1){ echo 'active';} ?>">
      <i style="color:#B384FF;" class="fa-heart fa-3x px-16
          <?php
              if(!$room->isGood($post['id'],$_SESSION['vuser']['id']) == 0){ //いいね押したらハートが塗りつぶされる
                  echo ' active fas';
              }else{ //いいねを取り消したらハートのスタイルが取り消される
                  echo ' far';
              }; ?>"></i>
              </span>
                    <i>Hit the like button!!</i>
  </div>
<?php
  if(!empty($_POST)){
    $post_id = $_POST['postId'];
    $view_user_id = $_SESSION['vuser']['id'];
    $room->checkGood($post_id,$view_user_id);
  }
?>
<div class="view_view">
  <div class="view_images">
  <img src="<?php echo $post['save_path'] ?>" style="width:100%;">
</div>
<div class="view_three_text">
  <a type="button" class="btn btn-outline-info" style="margin-bottom:50px;margin-left:50px;"
  href="contact.php?id=<?php echo $post['id']; ?>">投稿者に連絡する</a>
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
