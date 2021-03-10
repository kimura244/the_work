<?php

session_start();

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


$id =  $_GET['id_1'];
// var_dump($id);



// DBへデータを入れる処理------------------------------------------------
require_once('../Controllers/Controller.php');
$user = new Controller();
$user->delete($id);


// DBへデータを入れる処理------------------------------------------------




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
		<a href="/index.php"><img src="../jobpop/logo.png" alt="JobPop" /></a>
	</div>
	<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">What's</a></li>
			<li><a href="company.php">Company</a></li>
			<li><a href="recruit.php">Recruit</a></li>
			<li><a href="qa/index.php">Q&A</a></li>
			<li><a href="access.php">Access</a></li>
			<li><a href="http://ameblo.jp/jobpop-4976/" target="_blank">Blog</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>
</div>		<div id="contents">
			<h1>削除</h1>
			<h2>削除が完了しました。</h2>
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
