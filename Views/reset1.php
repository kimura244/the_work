<?php
require_once('../Controllers/Controller.php');
$user = new Controller();

session_start();
// var_dump($_SESSION['id']);
$id = $_SESSION['id'];

$err = [];

// POSTで送るため--------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  // もし、送信されたuser_nameが空白ならば
  if ($_POST['passwd'] === '') {
   $err[] = '●パスワードが入力されていません';
       // ユーザー名が11文字以上だったら
  }
  // もし、上記でチェックされたパスワードが空白ならば
  if ($_POST['passwd_1'] === '') {
      // エラーメッセージを配列に設定する
      $err[] = '●確認用パスワードが未入力です';
    // もし、パスワードが6文字以上だったら:文字数計測はmb_strlen()を使う
  }
  if ($_POST['passwd_1'] !== $_POST['passwd']) {
      // エラーメッセージを配列に設定する
      $err[] = '●パスワードが一致していません';
    // もし、パスワードが6文字以上だったら:文字数計測はmb_strlen()を使う
  }

    //　$errが無かったならば
    if (count($err) === 0) {

            // データベースに接続
            $hash = md5($_POST['passwd']);
            $params = $user->resetpw_2($id,$hash);


            if (count($err)=== 0) {
                    header('Location: reset2.php');
                    exit;

            }
    }
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>JOBPOP 特定労働者派遣事業 東京都豊島区東池袋</title>
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/slider.js"></script>
</head>
<body>
  <div id="header">
<div id="logo">
  <a href="index.php"><img src="../jobpop/index4.png" alt="JobPop" /></a>
</div>
<div id="menu">
  <ul>
    <li><a href="login.php">ログイン</a></li>
  </ul>
</div>
</div>
    <body>
      <div id="rogin">パスワードリセット</div>

    <!--エラーメッセージが１つでもある場合-->
    <?php if (count($err) > 0) { ?>
        <ul>
        <!--foreachは$errから1つデータを取り出し$valueに入れる、print $valueで表示を繰り返す、エラーメッセージがなくなるまで回る-->
        <?php foreach ($err as $value) { ?>
            <li style="text-align: center">
            <?php print $value; ?>
            </li>
        <?php } ?>
        </ul>
    <?php } ?>
<div>
        <form  method="post" style="text-align: center">
            <label for="user_name">パスワード</label>
            <input type="password" class="block" id="email" name="passwd" value="" style="display:block">
            <span class="block small">
            <label for="passwd">パスワード確認</label>
            <input type="password" class="block" id="passwd" name="passwd_1" value="" style="display:block">
            <span class="block small">
            </span>
            <input type="submit" value="リセットを行う" style="margin-bottom: 40px">
        </form>
</div>
<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
