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


  if(!isset($_SESSION['vuser'])){
    header('Location: intro.php');
    exit();
  }else{
    $post = $_SESSION['vuser'];
  }


  $error_name="";
  $error_mail="";
  $error_tel="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($post['name'] === ""){
          $error_name ='blank';
         }elseif(30<mb_strlen($post['name'])){
           $error_name = 'over';
         }


        if($post['mail'] === ""){
          $error_mail ='blank';
          }elseif(!preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $post['mail']) ) {
            $error_mail = 'wrong';
          }

          if($post['tel'] === ""){
            $error_tel ='blank';
          }elseif(! preg_match('/^0[0-9]{9,10}\z/',$post['tel'])){
            $error_tel='wrong';
          }
        if($error_name==="" && $error_mail==="" && $error_tel==="") {

          require_once(ROOT_PATH .'Controllers/RoomController.php');
          $room = new RoomController();
          $room->view_my_update();

          $_SESSION['vuser'] = $_POST;
             header('Location: view_mypage.php');
             exit();
           }$post = $post;
        }



   ?>
<div class="main d-flex align-items-center justify-content-center">


<form action="" method="post">

  <div class="formgroup" style="margin-bottom:30px;">
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">

<?php if($error_name === 'blank'): ?>
 <span class="list-group-item-danger">**入力して下さい。</span>
<?php endif; ?>
<?php if($error_name === 'over'): ?>
 <span class="list-group-item-danger">**30文字以内で入力して下さい。</span>
<?php endif; ?>
<input type="text" name="name" id="name" style="width:250px;" class="form-control"
value="<?php if(isset($post['name'])){echo htmlspecialchars($post['name']);}?>">
</div>

<div class="formgroup" style="margin-bottom:30px;">
<?php if($error_mail === 'blank'): ?>
 <span class="list-group-item-danger">**入力して下さい。</span>
<?php endif; ?>
<?php if($error_mail === 'wrong'): ?>
 <span class="list-group-item-danger">**正しく入力して下さい。</span>
<?php endif; ?>
<input type="text" name="mail" id="mail" style="width:250px;" class="form-control"
value="<?php if(isset($post['mail'])){echo htmlspecialchars($post['mail']);}?>">
</div>


<div class="formgroup" style="margin-bottom:30px;">
<?php if($error_tel === 'blank'): ?>
 <span class="list-group-item-danger">**入力して下さい。</span>
<?php endif; ?>
<?php if($error_tel === 'wrong'): ?>
 <span class="list-group-item-danger">**正しく入力して下さい。</span>
<?php endif; ?>
<input type="text" name="tel" id="tel" style="width:250px;" class="form-control"
value="<?php if(isset($post['tel'])){echo htmlspecialchars($post['tel']);}?>">
</div>

<input id="my_edit" type="submit" value="更新" onclick="return confirm('更新しますか？')"
 style="width:250px;" class="btn btn-info">


   </form>
 </div>
</body>
