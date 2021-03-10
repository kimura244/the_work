<?php
require_once('../Controllers/Controller.php');
$User = new Controller();
$hasha = md5(125679);
$params = $User->loginpw('qqq@gmail.com',$hasha);
// var_dump($params['players'][0]["id"]);

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

    //　$errが無かったならば
    if (count($err) === 0) {

            // パスワード暗号化
            $hash = md5($_POST['passwd']);
            $params = $User->loginpw($_POST['email'],$hash);

            if (count($params["players"])=== 0) {
                $err[] = '●ユーザー名またはパスワードに誤りがあります。';
            }

            if (count($err)=== 0) {

                session_start();
                $_SESSION['id'] = $params['players'][0]["id"];
                // $_SESSION['country_id'] = $params['players'][0]["country_id"];

                if ($params['players'][0]["type"] === '1') {
                    header('Location: top_enterprise.php');
                    exit;
                } else {
                    header('Location: top_shop.php');
                exit;
                }
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
      <div id="rogin">ログイン</div>
      <a href="reset.php"><p style="text-align: center">パスワードを忘れてしまった方はこちら</p></a>
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
            <label for="user_name">ユーザ名</label>
            <input type="text" class="block" id="email" name="email" value="" style="display:block">
            <label for="passwd">パスワード</label>
            <input type="password" class="block" id="passwd" name="passwd" value="" style="display:block">
            <span class="block small">
            </span>
            <input type="submit" value="ログイン" style="margin-bottom: 40px">
        </form>
</div>
<a href="new_account_shop.php"><p style="text-align: center">サービスを探している方のアカウント新規作成はこちら</p></a><br>
<a href="new_account_enterprise.php"><p style="text-align: center">商材を掲載したい企業のアカウント新規作成はこちら</p></a>
<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
