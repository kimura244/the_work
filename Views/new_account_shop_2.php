<?php
require_once('../Controllers/Controller.php');
$user = new Controller();


session_start();

session_destroy();

$err = [];

// POSTで送るため--------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    // もし、送信されたuser_nameが空白ならば
    if ($_POST['email'] === '') {
     $err[] = '●IDが入力されていません';
         // ユーザー名が11文字以上だったら
    }
    // もし、上記でチェックされたパスワードが空白ならば
    if ($_POST['passwd'] === '') {
        // エラーメッセージを配列に設定する
        $err[] = '●パスワードが未入力です';
      // もし、パスワードが6文字以上だったら:文字数計測はmb_strlen()を使う
    }
    // もし、上記でチェックされたパスワードが空白ならば
    if ($_POST['secret'] === '') {
        // エラーメッセージを配列に設定する
        $err[] = '●秘密の合言葉が未入力です';
      // もし、パスワードが6文字以上だったら:文字数計測はmb_strlen()を使う
    }

    //　$errが無かったならば
    if (count($err) === 0) {

            // データベースに接続
            $hash = md5($_POST['passwd']);
            $params = $user->new_shop($_POST['email'],$hash,$_POST['secret']);


            if (count($err)=== 0) {
                    header('Location: index_1.php');
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
      <div id="rogin">登録が完了いたしました</div>

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

</div>
<a href="login.php"><p style="text-align: center">ログイン画面へ</p></a><br>

<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
