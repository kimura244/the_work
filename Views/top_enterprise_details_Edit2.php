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




$id =  $_SESSION['id_2'];


$name =  $_SESSION["data"]['name'];
$URL =  $_SESSION["data"]['URL'];
$phone =  $_SESSION["data"]['phone'];
$mail =  $_SESSION["data"]['mail'];
$category =  $_SESSION["data"]['category'];
$text =  $_SESSION["data"]['text'];


$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$URL = htmlspecialchars($URL, ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
$category = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');
$text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

// DBへデータを入れる処理------------------------------------------------
require_once('../Controllers/Controller.php');
$user = new Controller();
$user->update($id,$name,$URL,$phone,$mail,$category,$text);



// DBへデータを入れる処理------------------------------------------------
$_SESSION['id_2'] = null;
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

// セッション破壊
// session_destroy();

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
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
			<h1>編集</h1>
			<h2 style="text-align: center;">編集が完了しました。</h2>
			<p id="text">
				</style>
				<a href = "top_enterprise.php" target="_self" style = "color:black;">トップに戻る</a>

			</p>

		</div>
		<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>	</div><!--- wrapper --->
</body>
</html>
