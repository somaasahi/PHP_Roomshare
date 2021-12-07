<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/style.js"></script>
  <title>部屋シェア</title>
</head>
<body>
  <?php include('../public/header/header.php');?>
  <?php

  $id = $_GET['id'];
  if(empty($id)){
    header('Location: intro.php');
    exit();
  }


if(!isset($_SESSION['puser'])){
  header('Location: intro.php');
  exit();
}
require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$post = $room->post_view();


  $post_user_id = $_SESSION['puser']['id'];

  $error_area_id ="";
  $error_address ="";
  $error_title ="";
  $error_content="";
  $error_file ="";
  $save_path ="";


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($post['area_id'] ==="0"){
          $error_area_id = 'blank';
        }

        if($post['address'] ===""){
          $error_address = 'blank';
        }

        if(30<mb_strlen($post['title'])){
          $error_title = 'over';
        }

        if($post['content']===""){
         	$error_content = 'blank';
        }elseif(500<mb_strlen($post['content'])){
          $error_content = 'over';
        }

if(!$_FILES['img']['name'] == ""){

        $file = $_FILES['img'];
        $filename = basename($file['name']);
        $tmp_path = $file['tmp_name'];
        $file_err = $file['error'];
        $filesize = $file['size'];
        $upload_dir = 'imgs/';
        $save_filename = date('YmdHis').$filename;
        $save_path = $upload_dir.$save_filename;

        if($filesize > 1048576 || $file_err == 2){
          $error_file = 'over';
        }

        $allow_ext = array('jpg','jpeg','png');
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array(strtolower($file_ext),$allow_ext)){
          $error_file = 'wrong';
        }


        if(is_uploaded_file($tmp_path)){

        if(move_uploaded_file($tmp_path, $save_path)){

            }else{
            $error_file = 'error';
            }
         }else{
          $error_file = 'blank';
         }
      }else{
          $save_path = $post['save_path'];
      }
if($error_area_id ==="" && $error_address ==="" && $error_title==="" && $error_content==="" && $error_file===""){

             $_SESSION['form'] = $post;
             $_SESSION['form']['save_path'] = $save_path;
             $_SESSION['form']['post_user_id'] = $post_user_id;

             header('Location: post_edit_confirm.php');
             exit();
           }else{
             $post = $post;

        }
      }


  ?>

  <!-- <img src="<?php echo $post['save_path']; ?>" style="width:5%;"> -->
  <div class="main d-flex align-items-center justify-content-center">


  <form enctype="multipart/form-data" action="" method="POST">
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <input type="hidden" name="post_user_id" value="<?php echo $post_user_id; ?>">

  <div class="formgroup" style="margin-top:80px;">
  <?php if($error_area_id === 'blank'): ?>
  <span class="list-group-item-danger">エリアを選択して下さい</span>
  <?php endif;?>
  </div>
  <div class="formgroup" style="margin-bottom:10px;">
        <select name="area_id" style="width:450px;height:40px;" class="form-control">
          <?php if($post['area_id']): ?>
          <option selected><?=htmlspecialchars($post['area_id']); ?></option>
          <?php endif; ?>
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
      </div>
  <div class="formgroup" style="margin-top:10px;">
        <?php if($error_address === 'blank'): ?>
          <span class="list-group-item-danger">住所は必須項目です</span>
        <?php endif;?>
        <?php if($error_address === 'over'): ?>
          <span class="list-group-item-danger">住所を100文字以内で入力して下さい。</span>
        <?php endif;?>
      </div>
      <div class="formgroup" style="margin-bottom:10px;">
              <input type="text" name="address" id="address" placeholder="住所を記入して下さい"
              style="width:450px;height:40px;" class="form-control"
              value="<?php if(isset($post['address'])){echo htmlspecialchars($post['address']);}?>">
  </div>
  <div class="formgroup">
              <?php if($error_title === 'over'): ?>
                <span class="list-group-item-danger">タイトルを30文字以内で入力して下さい。</span>
              <?php endif;?>
              <?php if($error_title === 'blank'): ?>
                <span class="list-group-item-danger">タイトルを入力して下さい</span>
              <?php endif;?>
            </div>
            <div class="formgroup" style="margin-bottom:10px;">
        <input type="text" name="title" id="title" placeholder="30文字以内でタイトルを記入して下さい"
        style="width:450px;height:40px;" class="form-control"
        value="<?php if(isset($post['title'])){echo htmlspecialchars($post['title']);}?>">
  </div>

  <div class="formgroup">

        <?php if($error_content === 'blank'): ?>
        <span class="list-group-item-danger">内容を入力して下さい。</span>
        <?php endif;?>
        <?php if($error_content === 'over'): ?>
          <span class="list-group-item-danger">内容を500文字以内で入力して下さい。</span>
        <?php endif;?>

        <div>
        <div class="formgroup" style="margin-bottom:10px;">
        <textarea name="content" id="content" rows="12" cols="40" style="width:450px;" class="form-control"
        placeholder="紹介する部屋の詳細について記入して下さい"><?php if(isset($post['content'])){echo html_entity_decode($post['content']);}?></textarea>
  </div>
  <div class="formgroup">

  <?php if($error_file === 'over'): ?>
  <p  class="list-group-item-danger">ファイルサイズは1mb未満にして下さい</p>
  <?php endif; ?>
  <?php if($error_file === 'wrong'): ?>
  <p  class="list-group-item-danger">画像ファイルを添付して下さい</p>
  <?php endif; ?>
  <?php if($error_file === 'blank'): ?>
  <p  class="list-group-item-danger">画像を選択して下さい</p>
  <?php endif; ?>
  <?php if($error_file === 'error'): ?>
  <p  class="list-group-item-danger">エラーが出ています</p>
  <?php endif; ?>
  </div>
  <div class="formgroup" style="margin-bottom:15px;">
  <input type="hidden" name="save_path" value="<?php echo $post['save_path'];?>">
  <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
  <label class="btn btn-info">画像を変更
  <input name="img" type="file" accept="image/*" style="display:none;">
  </label>
  </div>

  <div class="formgroup">
      <input type="submit" id="post" value="確認画面へ"
      style="width:440px;" class="btn btn-info">

  </div>
   </form>
   </div>

</body>
