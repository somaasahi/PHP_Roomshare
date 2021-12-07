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


  $error_mail = "";
  $error_password = "";
  $error_login = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      if($post['mail'] === ""){
        $error_mail ='blank';
      }elseif(!preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $post['mail']) ) {
          $error_mail = 'wrong';
        }

      if($post['password'] === ""){
        $error_password ='blank';
      }elseif(!preg_match("/\A[a-z\d]{8,100}+\z/i", $post['password'])){
         $error_password = 'wrong';
      }


      if($error_mail==="" && $error_password==="") {
        require_once(ROOT_PATH .'Controllers/RoomController.php');
        $room = new RoomController();
        $params = $room->view_login();

        $_SESSION['form'] = $post;

     if($params['bool'] == true){


          if($params['user']['del_flg'] == "1"){
            $_SESSION['wrong'] = 'ok';
            header('Location: login_wrong.php');
            exit();
          }
            $_SESSION['vuser'] = $params['user'];
           header('Location: view_mypage.php');
           exit();
         }else{
          $error_login = 'wrong';
         }

       }else{
           $post = $post;
      }
    }


   ?>

  <body>

    <div class="main d-flex align-items-center justify-content-center">


        <form action="" method="post">
          <div class="formgroup">
            <?php if($error_login === 'wrong'): ?>
            <p class="list-group-item-danger">ログイン情報に誤りがあります。</p>
            <?php endif; ?>
          </div>
    <div class="formgroup" style="margin-bottom:30px;">

              <?php if($error_mail === 'blank'): ?>
               <span class="list-group-item-danger">**入力して下さい。</span>
              <?php endif; ?>
              <?php if($error_mail === 'wrong'): ?>
               <span class="list-group-item-danger">**正しく入力して下さい。</span>
              <?php endif; ?>
        <input style="width:250px;" name="mail" id="mail"
        class="form-control" placeholder="mail"
        value="<?php if(isset($post['mail'])){echo htmlspecialchars($post['mail']);}?>">
    </div>


    <div class="formgroup" style="margin-bottom:30px;">
      <?php if($error_password === 'blank'): ?>
       <span class="list-group-item-danger">**入力して下さい。</span>
      <?php endif; ?>
      <?php if($error_password === 'wrong'): ?>
       <span class="list-group-item-danger">**英数字8文字以上100文字以下で入力して下さい。</span>
      <?php endif; ?>
          <input type="password" style="width:250px;" name="password" id="password"
          class="form-control" placeholder="password"
          value="<?php if(isset($post['password'])){echo htmlspecialchars($post['password']);}?>">
    </div>

    <div class="formgroup" style="margin-bottom:55px;">
          <input id="login" style="width:250px;" type="submit" value="login"
          type="button" class="btn btn-info">
    </div>
    <div class="formgroup" style="margin-bottom:30px;">
    <a href="view_register.php" type="button" class="btn btn-info" style="width:250px;">新規登録</a>
    </div>
          <a href="view_forget.php" type="button" class="btn btn-info" style="width:250px;">パスワードを忘れてしまった方</a>
    </form>

    </div>


</body>
