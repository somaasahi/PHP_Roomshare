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

  require_once(ROOT_PATH .'Controllers/RoomController.php');
  $room = new RoomController();
  $result = $room->post_index();
$params = $result['posts'];

  ?>
  <div class="amain">
    <div class="container justify-content-center" style="width:60%;">
      <?php if(empty($params)):?>
        <p class="list-group-item list-group-item-action list-group-item-warning"
        style="width:100%;text-align:center;margin-top:150px;">データがありません</p>
      <?php endif;?>

  <?php foreach ($params as $param): ?>
  <div class="area_index">
    <div class="images">
    <img src="<?php echo $param['save_path'] ?>" style="width:100%;">
  </div>
  <div class="three_text">
    <p style="font-size:18px; color:#555555;">投稿ID:<?php echo $param['id'];?></p>
    <p style="font-size:18px; color:#555555;"><?php echo $param['address'];?></p>
    <p style="font-size:18px; color:#555555;"><?php echo $param['title'];?></p>
    <a type="button" class="btn btn-outline-info" href="admin_view_view.php?id=<?php echo $param['id']; ?>">詳細</a>
    <a type="button" class="btn btn-outline-info" onclick="return confirm('削除しますか？')" href="admin_post_delete.php?id=<?php echo $param['id']; ?>">削除</a>

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
