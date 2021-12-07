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


  $error_name="";
  $error_mail="";
  $error_tel="";
  $error_password="";


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

        if($post['password'] === ""){
          $error_password ='blank';
        }elseif(!preg_match("/\A[a-z\d]{8,100}+\z/i", $post['password'])){
           $error_password = 'wrong';
        }


        if($error_name==="" && $error_mail==="" && $error_tel==="" && $error_password==="") {
             $_SESSION['form'] = $post;

             header('Location: view_complete.php');
             exit();
           }$post = $post;
        }



     ?>
    <body>
      <div class="main d-flex align-items-center justify-content-center">


      <form action="" method="post">

      <div class="formgroup" style="margin-bottom:30px;">
        <?php if($error_name === 'blank'): ?>
         <span class="list-group-item-danger">**入力して下さい。</span>
        <?php endif; ?>
        <?php if($error_name === 'over'): ?>
         <span class="list-group-item-danger">**30文字以内で入力して下さい。</span>
        <?php endif; ?>
      <input style="width:250px;" name="name" id="name" placeholder="name" class="form-control"
          value="<?php if(isset($post['name'])){echo htmlspecialchars($post['name']);}?>">

        </div>
        <div class="formgroup" style="margin-bottom:30px;">
          <?php if($error_mail === 'blank'): ?>
           <span class="list-group-item-danger">**入力して下さい。</span>
          <?php endif; ?>
          <?php if($error_mail === 'wrong'): ?>
           <span class="list-group-item-danger">**正しく入力して下さい。</span>
          <?php endif; ?>
        <input style="width:250px;" name="mail" id="mail" placeholder="mail" class="form-control"
          value="<?php if(isset($post['mail'])){echo htmlspecialchars($post['mail']);}?>">

        </div>
        <div class="formgroup" style="margin-bottom:30px;">
          <?php if($error_tel === 'blank'): ?>
           <span class="list-group-item-danger">**入力して下さい。</span>
          <?php endif; ?>
          <?php if($error_tel === 'wrong'): ?>
           <span class="list-group-item-danger">**正しく入力して下さい。</span>
          <?php endif; ?>
        <input style="width:250px;" name="tel" id="tel" placeholder="tel" class="form-control"
          value="<?php if(isset($post['tel'])){echo htmlspecialchars($post['tel']);}?>">

        </div>

            <div class="formgroup" style="margin-bottom:30px;">
              <?php if($error_password === 'blank'): ?>
               <span class="list-group-item-danger">**入力して下さい。</span>
              <?php endif; ?>
              <?php if($error_password === 'wrong'): ?>
               <span class="list-group-item-danger">**英数字8文字以上100文字以下で入力して下さい。</span>
              <?php endif; ?>
        <input type="password" style="width:250px;" name="password" id="password" placeholder="password" class="form-control"
           value="<?php if(isset($post['password'])){echo htmlspecialchars($post['password']);}?>">

        </div>
        <div class="formgroup" style="margin-bottom:30px;">
        <input id="register" style="width:250px;" type="submit" type="button" class="btn btn-info" value="新規登録"></td>
      </div>

      </form>
      </div>
  </body>
