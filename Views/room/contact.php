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

  $id = $_GET['id'];

  if(empty($id)){
    header('Location: intro.php');
    exit();
  }


  if(!isset($_SESSION['vuser'])){
    header('Location: intro.php');
    exit();
  }


$error_content ="";


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($post['content']===""){
         	$error_content = 'blank';
        }elseif(250<mb_strlen($post['content'])){
          $error_content = 'over';
        }

        if($error_content===""){

          $_SESSION['contact'] = $post;
           header('Location: contact_complete.php');
           exit();
          }else{
              $post = $post;
          }
    }

?>
<div class="amain" style="height:800px;">
  <div class="container justify-content-center" style="width:50%;">

    <div class="formgroup">
      <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="formgroup">
            <?php if($error_content === 'blank'): ?>
            <span class="list-group-item-danger">お問い合わせ内容を入力して下さい。</span>
            <?php endif;?>
            <?php if($error_content === 'over'): ?>
              <span class="list-group-item-danger">内容を250文字以内で入力して下さい。</span>
            <?php endif;?>


              <textarea name="content" id="content" rows="12" cols="40"
              class="form-control"><?php if(isset($post['content']))
              {echo html_entity_decode($post['content']);}?></textarea>
                <input id="contact" type="submit" value="送信" class="btn btn-info"
                style="width:100%; margin-top:30px;"
                onclick="return confirm('この内容で送信しますか？')">
            </div>

    </form>
    <!-- style="width:450px;margin-left:auto;margin-right:auto;"  -->
</div>
</div>
</div>
</div>
</div>
</div>
</body>
