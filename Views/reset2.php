<?php
// require_once(ROOT_PATH .'Controllers/PlayerController.php');
// $player = new PlayerController();
// $params = $player->loginpw('ggg@gmail.com',123456789);
// var_dump($params['players']);

session_start();

session_destroy();

$err = [];

// POSTで送るため--------------------------------------



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
  <div  id="reset_2" style="text-align: center">パスワードのリセットが完了しました。</div>
  <p id="text" style="text-align: center">
    </style>
    <a href = "login.php" target="_self">ログインページに戻る</a>
  </p>
</div>
<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
