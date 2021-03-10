<?php

session_start();

// var_dump($_SESSION);
// $_SERVER['HTTP_REFERER'];
//
// if (!empty($_SERVER['HTTP_REFERER'])) {
// $host = $_SERVER['HTTP_REFERER'];
// $str02 = parse_url($host);
//
// if(stristr($str02['host'], "localhost")){
//   echo 'OK';
// } else {
//   header('Location: contact.php');
//  exit();
// }
//
// } else {
//   header('Location: contact.php');
//  exit();
// }




$id =  $_SESSION['id'];


$name =  $_SESSION["data"]['name'];
$URL =  $_SESSION["data"]['URL'];
$phone =  $_SESSION["data"]['phone'];
$mail =  $_SESSION["data"]['mail'];


$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$URL = htmlspecialchars($URL, ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');

// DBへデータを入れる処理------------------------------------------------
require_once('../Controllers/Controller.php');
$user = new Controller();
$user->update_shop($id,$name,$URL,$phone,$mail);



// DBへデータを入れる処理------------------------------------------------
$_SESSION['id_2'] = null;
$_SESSION['name'] = null;
$_SESSION['URL']  = null;
$_SESSION['phone']  = null;
$_SESSION['mail']  = null;

$_SESSION["data"]['name'] = null;
$_SESSION["data"]['URL']  = null;
$_SESSION["data"]['phone']  = null;
$_SESSION["data"]['mail']  = null;

// セッション破壊
// session_destroy();

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>JOBPOP 特定労働者派遣事業 東京都豊島区東池袋</title>
<link rel="stylesheet" type="text/css" href="../css/contact.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

</head>
<body>
	<div id="wrapper">
		<div id="header">
	<div id="logo">
		<a href="index.php"><img src="../jobpop/index4.png" alt="JobPop" /></a>
	</div>

</div>		<div id="contents">
			<h1 style="color: #FF0000;">登録情報更新</h1>
			<h2 style="text-align: center;">編集が完了しました。</h2>
			<p id="text">
				</style>
				<a href = "top_shop.php" target="_self" style = "color:black;">トップに戻る</a>

			</p>

		</div>
		<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>	</div><!--- wrapper --->
</body>
</html>
