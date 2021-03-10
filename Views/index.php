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
// var_dump($params);


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>JOBPOP 特定労働者派遣事業 東京都豊島区東池袋</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/slider.js"></script>
</head>
<body>
	<div id="wrapper">
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
    <div id="contents">
			<div id="top_img">
				<img id="main_img" src="../jobpop/index3.png" alt="写真" />
				<div class="flexslider">
					<ul class="slides">
						<li class="first">
							<img id="catchcopy" src="../jobpop/catchcopy.png" alt="キャッチコピー" />
						</li>
						<li class="second">
							<img id="catchcopy" src="../jobpop/catchcopy2.png" alt="キャッチコピー" />
						</li>
					</ul>
				</div>
			</div>
			<!-- <a href="new_account_shop.php"><img id="aka" src="../jobpop/index1.png" alt="EVENT TOTAL PRODUCE" /></a>
			<a href="new_account_enterprise.php"><img id="ao" src="../jobpop/index2.png" alt="EVENT TOTAL PRODUCE" /></a> -->

      <ul>
        <li id="dd" class="aa" style="display: flex;">
          <img src="../jobpop/index5.png" width="60px" height="60px" style="float: left;" />
          <p style="font-size: 20px;">サービスをお探しの方は<br>
          <a href="new_account_shop.php">＞こちらから</a></p>
        </li>
        <li id="dd" class="cc" style="display: flex;">
          <img src="../jobpop/index6.png" width="60px" height="60px" style="float: left;"/>
          <p style="font-size: 20px;">サービス掲載したい方は<br>
          <a href="new_account_enterprise.php">＞こちらから</a></p>
        </li>
      </ul>

		</div>


		<div id="footer">
	<a href="" target="_blank"><p>KMR.GG</p></a>
</div>
</div><!--- wrapper --->
</body>
</html>
