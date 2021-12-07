<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/header.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/style.js"></script>
  <title>部屋シェア</title>
</head>
<body>
  <?php include('../public/header/header.php');?>

<?php

  if(!isset($_SESSION['update'])){
    header('Location: intro.php');
    exit();
  }


  $error_password="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($post['new_password'] === ""){
          $error_password ='blank';
        }elseif(!preg_match("/\A[a-z\d]{8,100}+\z/i", $post['new_password'])){
           $error_password = 'wrong';
        }


        if($error_password==="") {
             $_SESSION['form']['new_password'] = $post;

             header('Location: post_pass_complete.php');
             exit();
           }$post = $post;
        }



     ?>
    <body>
      <div class="main d-flex align-items-center justify-content-center">


     <form action="" method="post">

        <div class="formgroup" style="margin-bottom:30px;">
          <?php if($error_password === 'blank'): ?>
           <span class="list-group-item-danger">**入力して下さい。</span>
          <?php endif; ?>
          <?php if($error_password === 'wrong'): ?>
           <span class="list-group-item-danger">**英数字8文字以上100文字以下で入力して下さい。</span>
          <?php endif; ?>
        <input style="width:250px;" name="new_password" id="password" placeholder="password" class="form-control"
           value="<?php if(isset($post['new_password'])){echo htmlspecialchars($post['new_password']);}?>">

        </div>
        <div class="formgroup" style="margin-bottom:30px;">
        <input id="pass_update" style="width:250px;" type="submit" type="button" class="btn btn-info" value="再設定"></td>
      </div>

    </form>
    </div>
</body>
