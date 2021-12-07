<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/header.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  </head>

<body>
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- height:39px; -->
<?php session_start(); ?>
<header style="width:100%;">

  <nav class="navbar navbar-expand-md navbar-dark bg-info d-flex justify-content-between" style="width:100%;">
  <a class="navbar-brand">
    <span style="color:white;font-weight:bold;">.部屋シェア...</span>
  </a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/about.php" style="margin-right:30px;">部屋シェアとは?<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/intro.php" style="margin-right:30px;">検索画面へ<span class="sr-only">(current)</span></a>
      </li>
      <?php if(!isset($_SESSION['vuser'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="/view_login.php">閲覧のみの方</a>
        </li>
　　　　<?php endif; ?>
<?php if(isset($_SESSION['vuser'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="/view_mypage.php">閲覧者マイページへ</a>
        </li>
<?php endif; ?>

<?php if(!isset($_SESSION['puser'])): ?>
<li class="nav-item">
  <a class="nav-link" href="/post_login.php">投稿する方</a>
  </li>
<?php endif; ?>
<?php if(isset($_SESSION['puser'])): ?>
  <li class="nav-item">
    <a class="nav-link" href="/post_mypage.php">投稿者マイページへ</a>
    </li>
<?php endif; ?>
<?php if(isset($_SESSION['vuser']) || isset($_SESSION['puser'])): ?>
  <li class="nav-item">
    <a class="nav-link" href="/logout.php">ログアウト</a>
    </li>
<?php endif; ?>

    </ul>
  </div>
  <button class="btn btn-link d-sm-none" type="button" data-toggle="modal" data-target="#menuModal" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<button class="btn btn-outline-warning" onclick="history.back()"
style="margin-left:15px; margin-top:30px;">前のページに戻る</button>

</header>
</body>
