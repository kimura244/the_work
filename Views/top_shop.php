<?php
require_once('../Controllers/Controller.php');
$user = new Controller();
// $params = $user->History_ALL();

if (!empty($_POST)) {
$params = $user->Search_1($_POST["search_name"]);
} else {
  $params = $user->History_ALL();
}

session_start();
// var_dump($_SESSION);
// session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>CROSS PORTARU</title>
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
    <li><a href="top_shop_acount.php">店舗情報の新規登録</a></li>
    <li><a href="top_shop_acount_Edit.php">店舗情報の編集</a></li>
    <li><a href="login.php">ログアウト</a></li>
  </ul>
</div>
</div>
<body>

  <div id="yoko">

      <form action="top_shop.php" method="post">
          <!-- 任意の<input>要素＝入力欄などを用意する -->
          <input type="text" name="search_name"><br>
          <!-- 送信ボタンを用意する -->
          <input type="submit" name="submit" value="サービス名で検索する">
      </form>

          <table class="table-list">
              <tr>
                  <th>サービス名</th>
                  <th>カテゴリ</th>
                  <th>詳細</th>
              </tr>
              <?php foreach($params['contact'] as $player): ?>
              <tr>
                  <td><?=$player['name'] ?></td>
                  <td><?=$player['category'] ?></td>
                  <td><a href="top_shop_details.php?id=<?php echo $player['id'] ?>">詳細</a></td>
              </tr>
              <?php endforeach; ?>
          </table>
  </div>

<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
    </body>
</html>
