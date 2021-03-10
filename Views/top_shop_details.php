<?php
session_start();
// // user_nameが空白の状態でlogin.phpアクセスしたとき強制的にlogout.phpへ飛ばす
//   if (isset($_SESSION['role']) === false) {
//       header('Location:login.php');
//       exit;
//   }
// var_dump($_GET['id']);
require_once('../Controllers/Controller.php');
$user = new Controller();
$params = $user->History_details($_GET['id']);
// var_dump($params['players']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>JOBPOP 特定労働者派遣事業 東京都豊島区東池袋</title>
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

        <div class="container">
            <h2 id="rogin">サービス詳細</h2>
            <table class="table-list detail-table" style="margin  auto;">

                <tr>
                    <th>サービスタイトル</th>
                    <td><?=$params['players'][0]['name'] ?></td>
                </tr>
                <tr>
                    <th>詳細</th>
                    <td><?=$params['players'][0]['text'] ?></td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td><?=$params['players'][0]['URL'] ?></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td><?=$params['players'][0]['phone'] ?></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><?=$params['players'][0]['mail'] ?></td>
                </tr>
                <tr>
                    <th>カテゴリー</th>
                    <td><?=$params['players'][0]['category'] ?></td>
                </tr>
            </table>



        <div class="top-btn">
            <a href="top_shop.php">トップへ戻る</a>
        </div>

        <div id="footer">
        <a href="" target="_blank"><p>KMR.GG</p></a>
        </div>
    </body>
</html>
