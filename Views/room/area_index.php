<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/like.js"></script>
  <script src="https://kit.fontawesome.com/2135f49250.js" crossorigin="anonymous"></script>

  <title>部屋シェア</title>
</head>
<body>
  <?php include('../public/header/header.php');?>
  <?php


if(!isset($_SESSION['form'])){
  header('Location: intro.php');
  exit();
}else{
  $_POST = $_SESSION['form'];
}


require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$result = $room->view_area_index();
$params = $result['posts'];


?>

<div class="amain">
  <div class="container justify-content-center" style="width:60%;">
    <?php if(empty($params)):?>
      <p class="list-group-item list-group-item-action list-group-item-warning"
      style="width:100%;height:50px;text-align:center;margin-top:150px;margin-bottom:300px;">データがありません</p>
    <?php endif;?>

<?php foreach ($params as $param): ?>
<div class="area_index">
  <!-- <div class="view_outline"> -->
    <div class="k" style="margin-left:10px;margin-top:10px;">
      <span class="like <?php if($room->isGood($param['id'],$_SESSION['vuser']['id']) == 1){ echo 'active';} ?>">
        <i style="color:#B384FF;" class="fa-heart fa-2x px-16
            <?php
                if(!$room->isGood($param['id'],$_SESSION['vuser']['id']) == 0){ //いいね押したらハートが塗りつぶされる
                    echo ' active fas';
                }else{ //いいねを取り消したらハートのスタイルが取り消される
                    echo ' far';
                }; ?>"></i>
                </span>

    </div>
  <div class="images">
  <img src="<?php echo $param['save_path'] ?>" style="width:100%;">
</div>
<div class="three_text">
  <p style="font-size:18px; color:#555555;"><?php echo $param['address'];?></p>
  <p style="font-size:18px; color:#555555;"><?php echo $param['title'];?></p>
  <?php if(empty($_SESSION['vuser'])): ?>
  <p style="font-size:13px;text-align:right;margin-top:30px;">*詳細は閲覧者ログインをしないと見ることができません</p>
<?php else: ?>
  <a type="button" class="btn btn-outline-info" href="view_view.php?id=<?php echo $param['id']; ?>">詳細をみる</a>
<?php endif; ?>
</div>
</div>
<?php endforeach; ?>


<div class="area_index" style="height:100px;">
  <div class="images">
  </div>
  <div class="three_text">
   <nav aria-label="...">
  <ul class="pagination pagination-lg">
    <li class="page-item disabled">
      <a class="page-link" href="#!" tabindex="-1">Pages</a>
    </li>
    <?php for($i=0;$i<=$result['pages'];$i++): ?>
      <?php if(isset($_GET['page']) && $_GET['page'] == $i): ?>
        <li class="page-item"><a class="page-link">
        <?php echo $i+1; ?>
         </a></li>
      <?php else: ?>
        <li class="page-item"><a class="page-link" href='?page=<?php echo $i; ?>'>
          <?php echo $i+1; ?>
        </a></li>
      <?php endif; ?>
    <?php endfor; ?>

  </ul>
</nav>
</div>
</div>
</div>
</div>


</body>
