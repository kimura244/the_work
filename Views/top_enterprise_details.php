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

        <div class="container">
            <h1 id="rogin">サービス詳細</h1>
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
                    <td style="word-wrap:break-word"><?=$params['players'][0]['URL'] ?></td>
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
                <tr>
                    <th></th>
                    <td><?php print '<a href="top_enterprise_details_Edit.php?id_1=' . $params['players'][0]['id'] . '">編集</a>';?></td>
                </tr>
                <tr>
                    <th></th>
                      <td class="db_delete" id="delete">
                        <a href="top_enterprise_details_Delete.php?id_1=<?php print $params['players'][0]['id'] ?> " onclick="return confirm('削除します。本当によろしいですか？')">削除</a>
                      </td>
                </tr>

            </table>

          </td>




        <div class="top-btn" style="text-align: center;">
            <a href="top_enterprise.php">トップへ戻る</a>
        </div>
      </div><!-- container -->
      <div id="footer">
      <a href="" target="_blank"><p>KMR.GG</p></a>
      </div>
    </body>
</html>
