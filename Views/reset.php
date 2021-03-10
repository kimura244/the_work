<?php
require_once('../Controllers/Controller.php');
$user = new Controller();
// $params = $user->resetpw_1('ggg@gmail.com','地獄');
// var_dump($params);

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
    if ($_POST['secret'] === '') {
        // エラーメッセージを配列に設定する
        $err[] = '●秘密の合言葉が未入力です';
      // もし、パスワードが6文字以上だったら:文字数計測はmb_strlen()を使う
    }

    //　$errが無かったならば
    if (count($err) === 0) {

            $params = $user->resetpw_1($_POST['email'],$_POST['secret']);

            if (count($params["players"])=== 0) {
                $err[] = '●メールアドレスまたは秘密の合言葉に誤りがあります。';
            }

            if (count($err)=== 0) {

                session_start();
                $_SESSION['id'] = $params['players'][0]["id"];

                header('Location: reset1.php');
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
            <label for="user_name">メールアドレス</label>
            <input type="text" class="block" id="email" name="email" value="" style="display:block">
            <span class="block small">
              <label for="passwd">秘密の合言葉</label>
              <input type="text" class="block" id="passwd" name="secret" value="" style="display:block">
            <span class="block small">
            </span>
            <input type="submit" value="リセット" style="margin-bottom: 40px">
        </form>
</div>
<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
