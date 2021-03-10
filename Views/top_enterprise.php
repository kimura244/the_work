<?php

session_start();
// var_dump($_SESSION);
$_SESSION['name'] = null;
$_SESSION['URL']  = null;
$_SESSION['phone']  = null;
$_SESSION['mail']  = null;
$_SESSION['category']  = null;
$_SESSION['text']  = null;

$_SESSION["data"]['name'] = null;
$_SESSION["data"]['URL']  = null;
$_SESSION["data"]['phone']  = null;
$_SESSION["data"]['mail']  = null;
$_SESSION["data"]['category']  = null;
$_SESSION["data"]['text']  = null;


require_once('../Controllers/Controller.php');
$user = new Controller();
$params = $user->History_1_details($_SESSION['id']);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="../css/top_shop.css">
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
    <li><a href="top_enterprise_Registration.php">新規登録</a></li>
    <li><a href="login.php">ログアウト</a></li>
  </ul>
</div>
</div>
    <body>
      <h1 id="rogin">登録済みサービス</h1>


  <table class="table-list">
              <tr>
                  <th>商材名</th>
                  <th>カテゴリ</th>
                  <th>詳細</th>
              </tr>
              <?php foreach($params['players'] as $player): ?>
              <tr>
                  <td><?=$player['name'] ?></td>
                  <td><?=$player['category'] ?></td>
                  <td><a href="top_enterprise_details.php?id=<?php echo $player['id'] ?>">詳細</a></td>
              </tr>
              <?php endforeach; ?>
          </table>
</div>
<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
