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


  $error_key ="";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if($post['key'] ===""){
      $error_key = 'blank';
    }
    if($error_key ===""){

                 $_SESSION['form'] = $post;

                 header('Location: key_index.php');
                 exit();
               }else{
                 $post = $post;

            }
          }
?>
<div class="main d-flex align-items-center justify-content-center">
<form action="" method="post">
  <div class="formgroup">
  <?php if($error_key === 'blank'): ?>
    <span class="list-group-item-danger">検索ワードを選択して下さい</span>

  <?php endif;?>
  </div>
  <div class="formgroup d-flex">
  <input type="text" name="key" style="height:38px;margin-right:15px;" class="form-control" placeholder="検索ワード"
  value="<?php if(isset($post['key'])){echo htmlspecialchars($post['key']);}?>">
  <input class="btn btn-info" type="submit" value="検索">
</div>
</form>

</div>
</body>
