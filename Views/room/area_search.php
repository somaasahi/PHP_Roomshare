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


$error_area_id ="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if($post['area_id'] ==="0"){
    $error_area_id = 'blank';
  }
  if($error_area_id ===""){

               $_SESSION['form'] = $post;

               header('Location: area_index.php');
               exit();
             }else{
               $post = $post;

          }
        }


?>

<div class="main d-flex align-items-center justify-content-center">
<form action="" method="post">
<div class="formgroup">
<?php if($error_area_id === 'blank'): ?>
  <span class="list-group-item-danger">エリアを選択して下さい</span>
<?php endif;?>
</div>
<div class="formgroup d-flex">
        <select class="form-control" name="area_id" style="height:38px; margin-right:15px;">
          <option value="0">エリアを選択してください</option>
          <option value="1">1:北海道</option>
          <option value="2">2:東北</option>
          <option value="3">3:関東</option>
          <option value="4">4:東海・北陸</option>
          <option value="5">5:近畿</option>
          <option value="6">6:中国・四国</option>
          <option value="7">7:九州</option>
          <option value="8">8:沖縄</option>
        </select>

        <input class="btn btn-info" type="submit" value="指定一覧へ">
        </div>
      </form>

    </div>
</body>
