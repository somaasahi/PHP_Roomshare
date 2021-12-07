<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <title>部屋シェア</title>
</head>
<body>

  <?php include('../public/header/header.php');?>
  <?php


if(!isset($_SESSION['contact'])){
  header('Location: intro.php');
  exit();
}else{
  $_POST = $_SESSION['contact'];
}

require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$params = $room->get_contact_data();

$contact['post_id'] = $_POST['id'];
$contact['post_user_id'] = $params['id'];
$contact['view_user_id'] = $_SESSION['vuser']['id'];
$contact['content'] = $_SESSION['contact']['content'];

require_once(ROOT_PATH .'Controllers/RoomController.php');
$room = new RoomController();
$room->contact_submit($contact);

$to = $params['mail'];
$subject = "TEST";
$messanger = $_SESSION['vuser']['mail'];
$message = '部屋に興味を持った'.$messanger.'様からメッセージが届いています。'."\n".'以下内容:'."\n".
$contact['content']."\n"."\n"."\n".'お手数ですが、返信は'.$messanger.'様宛にお願い致します。';
$return = $_SESSION['vuser']['mail'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require_once(ROOT_PATH .'public/mail/PHPMailer.php');
require_once(ROOT_PATH .'public/mail/Exception.php');
require_once(ROOT_PATH .'public/mail/SMTP.php');



// 文字エンコードを指定
mb_language('uni');
mb_internal_encoding('UTF-8');

// インスタンスを生成（true指定で例外を有効化）
$mail = new PHPMailer(true);

// 文字エンコードを指定
$mail->CharSet = 'utf-8';

try {
  // デバッグ設定
  // $mail->SMTPDebug = 2; // デバッグ出力を有効化（レベルを指定）
  // $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str<br>";};

  // SMTPサーバの設定
  $mail->isSMTP();                          // SMTPの使用宣言
  $mail->Host       = 'smtp.mailtrap.io';   // SMTPサーバーを指定
  $mail->SMTPAuth   = true;                 // SMTP authenticationを有効化
  $mail->Username   = '47364a50139238';   // SMTPサーバーのユーザ名
  $mail->Password   = '5c7505fc4d36b9';           // SMTPサーバーのパスワード
  $mail->SMTPSecure = 'tls';  // 暗号化を有効（tls or ssl）無効の場合はfalse
  $mail->Port       = 2525; // TCPポートを指定（tlsの場合は465や587）

  // 送受信先設定（第二引数は省略可）
  $mail->setFrom('from@example.com', '差出人名'); // 送信者
  $mail->addAddress($to);   // 宛先
  $mail->addReplyTo($return); // 返信先
  // $mail->addCC('cc@example.com', '受信者名'); // CC宛先
  $mail->Sender = 'return@example.com'; // 送信者と同じ？Return-path

  // 送信内容設定
  $mail->Subject = '部屋シェア運営よりご連絡です';
  $mail->Body    = $message;

  // 送信
  $mail->send();
} catch (Exception $e) {
  // エラーの場合
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




// unset($_SESSION['contact']);

   ?>
   <div class="main d-flex align-items-center justify-content-center">
     <p class="list-group-item list-group-item-action list-group-item-warning"
     style="width:150px;height:42px;">送信しました</p>
     <a href="view_mypage.php" style="width:150px;height:38px;margin-left:30px;"
     class="btn btn-outline-warning">マイページへ</a>
   </div>

</body>
