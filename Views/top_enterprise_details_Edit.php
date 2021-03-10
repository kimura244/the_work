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

if (!empty($_GET['id_1'])){
  $_SESSION['id_2'] = intval($_GET['id_1']);
} else {

}


$id_2 = $_SESSION['id_2'];

require_once('../Controllers/Controller.php');

$user = new Controller();
$data = $user->History_details($id_2);

// var_dump($data["players"]);
// var_dump($_SESSION);




// ここ
// $toke_byte = openssl_random_pseudo_bytes(16);
//   $csrf_token = bin2hex($toke_byte);
//   // 生成したトークンをセッションに保存します
//   $_SESSION['csrf_token'] = $csrf_token;

function h($str){
   return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

if(!empty($_POST)){
  //$_POSTにデータが入っていて$_SESSION['data']の中身も空のとき

    //　氏名
    if(empty($_POST['name'])){
        $error_msg['name'] = "*サービス名は必須項目です";
    }else if(mb_strlen($_POST['name']) > 10){
        $error_msg['name'] = "*サービス名は10文字以内で入力してください";
    }

    // フリガナ
    if(empty($_POST['URL'])){
        $error_msg['URL'] = "*URLは必須項目です";
    }
    // else if(mb_strlen($_POST['URL']) > 10){
    //     $error_msg['URL'] = "*URLは10文字以内で入力してください";
    // }

    // 電話番号
    $number = $_POST['phone'];
    $pattern_num = "/^[0-9０-９]+$/";

    if(!empty($_POST['phone']) && (!preg_match($pattern_num, $number))){
        $error_msg['phone'] = "*電話番号は数字で入力してください";
    }

    // メールアドレス
    $addres = $_POST['mail'];
    $pattern_add = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";

    if(empty($_POST['mail'])){
        $error_msg['mail'] = '*メールアドレスは必須項目です';
    }else if(!preg_match($pattern_add, $addres)){
        $error_msg['mail'] = '*メールアドレスは正しい形式で入力してください';
    }

    // お問い合わせ内容
    if(empty($_POST['category'])){
        $error_msg['category'] = '*カテゴリは必須項目です';
    }

    // お問い合わせ内容
    if(empty($_POST['text'])){
        $error_msg['text'] = '*詳細は必須項目です';
    }

    // エラーがない場合、確認画面へ移る
    if(empty($error_msg)){
        $_SESSION['data'] = $_POST;
        header('Location: top_enterprise_details_Edit2.php');
        exit();
    }

}else if(!empty($_SESSION['data'])){
    $_POST = $_SESSION['data'];
}

if (!empty($_POST['name'])){
  $_POST['name'] =  $_POST['name'];
}
else if (empty($_POST['name'])) {
  $_POST['name'] = $data["players"][0]['name'];
  $_SESSION['name'] =  $_POST['name'];
}

if (!empty($_POST['URL'])){
  $_SESSION['URL'] =  $_POST['URL'];
} else if (empty($_POST['URL'])) {
  $_POST['URL'] = $data["players"][0]['URL'];
  // $_SESSION['URL'] =  $_POST['URL'];
}
if (!empty($_POST['phone'])){
  $_POST['phone'] =  $_POST['phone'];
} else if (empty($_POST['phone'])) {
  $_POST['phone'] = $data["players"][0]['phone'];
  // $_SESSION['phone'] =  $_POST['phone'];
}
if (!empty($_POST['mail'])){
  $_POST['mail'] =  $_POST['mail'];
} else if (empty($_POST['mail'])) {
  $_POST['mail'] = $data["players"][0]['mail'];
  // $_SESSION['mail'] =  $_POST['mail'];
}
if (!empty($_POST['category'])){
  $_POST['category'] =  $_POST['category'];
} else if (empty($_POST['category'])) {
  $_POST['category'] = $data["players"][0]['category'];
  // $_SESSION['category'] =  $_POST['category'];
}

if (!empty($_POST['text'])){
  $_POST['text'] =  $_POST['text'];
} else if (empty($_POST['text'])) {
  $_POST['text'] = $data["players"][0]['text'];
  // $_SESSION['text'] =  $_POST['text'];
}

$_SESSION['name'] = null;
$_SESSION['URL']  = null;
$_SESSION['phone']  = null;
$_SESSION['mail']  = null;
$_SESSION['category']  = null;
$_SESSION['text']  = null;

// var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="../css/contact.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
		$(function(){

				//  氏名
				$(".btn").on('click',function(){
						if($(".input-name").val() === ''){
								$(".required-name").html('氏名は必須項目です*');
								return false;
						}else{
								$(".required-name").html('');
						}

						if($(".input-name").val().length >= 10){
								$(".count-name").html('10文字以内で入力してください*');
								return false;
						}else{
								$(".count-name").html('');
						}
				});

				//  フリガナ
				$(".btn").on('click',function(){
						if($(".input-kana").val() === ''){
								$(".required-kana").html('フリガナは必須項目です*');
								return false;
						}else{
								$(".required-kana").html('');
						}

						if($(".input-kana").val().length >= 10){
								$(".count-kana").html('10文字以内で入力してください*');
								return false;
						}else{
								$(".count-kana").html('');
						}
				});

				//  電話番号
				$(".btn").on('click',function(){
						if(!$(".input-tel").val().trim() == ""){
								if(!$("input.input-tel").val().match(/^[0-9０-９]+$/)){
										$(".error-tel").html("数字で入力してください*");
										return false;
								}
						}else if($(".input-tel").val().trim() == ""){
								$(".error-tel").html('');
						}
				});

				//  メールアドレス
				$(".btn").on('click',function(){
						if($(".input-mail").val() === ''){
								$(".required-mail").html('メールアドレスは必須項目です*');
								return false;
						}else{
								$(".required-mail").html('');
						}

						if(!$(".input-mail").val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
								$(".error-mail").html('メールアドレスは正しい形式で入力してください*');
								return false;
						}else{
								$(".error-mail").html('');
						}
				});

				//  お問い合わせ内容
				$(".btn").on('click',function(){
						if(!$(".input-content").val().trim() == ""){
								$(".required-content").html('');

						}else if($(".input-content").val().trim() == ""){
								$(".required-content").html('お問い合わせ内容は必須項目です*');
								return false;
						}
				});

		});
</script>

</head>

<body>
	<div id="wrapper">
	<div id="header">
	<div id="logo">
		<a href="index.php"><img src="../jobpop/index4.png" alt="JobPop" /></a>
	</div>
  <div id="menu">
    <ul>
      <li><a href="login.php">ログアウト</a></li>
    </ul>
  </div>

</div>
<div id="contents">
			<h1 style="color: #FF0000;">編集</h1>
			<h2>編集内容を入力してください</h2>
			<p id="text">
				<span class="red">*</span>は必須項目となります。
			</p>

      <p class="red" style = "text-align:center;">
      <?php
      if(isset($error_msg['name'])){
          echo $error_msg['name'];
      }
      ?>
    </p>
    <p class="red" style = "text-align:center;">
      <?php
      if(isset($error_msg['URL'])){
          echo $error_msg['URL'];
      }
      ?>
    </p>
    <p class="red" style = "text-align:center;">
      <?php
      if(isset($error_msg['phone'])){
          echo $error_msg['phone'];
      }
      ?>
    </p>
    <p class="red" style = "text-align:center;">
      <?php
      if(isset($error_msg['mail'])){
          echo $error_msg['mail'];
      }
      ?>
    </p>
    <p class="red" style = "text-align:center;">
      <?php
      if(isset($error_msg['category'])){
          echo $error_msg['category'];
      }
      ?>
    </p>
    <p class="red" style = "text-align:center;">
      <?php
      if(isset($error_msg['text'])){
          echo $error_msg['text'];
      }
      ?>
    </p>



			<form name="form" action="top_enterprise_details_Edit.php" method="POST" onSubmit="return check()">
				<dl class="clearfix">


					<dt>サービス名<span class="red">*</span></dt>
					<dd><input type="text" name="name" class="input-name" value="<?php echo isset($_POST['name']) ? h($_POST['name']) : ''; ?>"></dd>



					<dt>URL<span class="red">*</span></dt>
					<dd><input type="text" name="URL" class="input-kana" value="<?php echo isset($_POST['URL']) ? h($_POST['URL']) : ''; ?>"></dd>


					<dt>電話番号</dt>
					<dd><input type="text" name="phone" class="input-tel" value="<?php echo isset($_POST['phone']) ? h($_POST['phone']) : ''; ?>"></dd>


					<dt>メールアドレス<span class="red">*</span></dt>
					<dd><input type="text" name="mail" class="input-mail" value="<?php echo isset($_POST['mail']) ? h($_POST['mail']) : ''; ?>"></dd>

          <dt>カテゴリー<span class="red">*</span></dt>
					<dd>
            <select name="category">
              <option value="">選択してください</option>
              <option value="水道">水道</option>
              <option value="電気">電気</option>
              <option value="ガス">ガス</option>
              <option value="通信">通信</option>
            </select>
          </dd>

				</dl>
				<h2>詳細<span class="red">*</span></h2>
				<dl>
					<dd><textarea name="text" class="input-content"><?php echo isset($_POST['text']) ? h($_POST['text']) : ''; ?></textarea></dd>

          <!-- <input type="hidden" name="csrf_token" value="<?php //echo $csrf_token; ?>"> -->
          <input type="submit" value="更&emsp;新" id="submit_btn">
				</dl>
        <dl>

        </dl>
			</form>

	</div>

		<div id="footer">
<a href="" target="_blank"><p>KMR.GG</p></a>
</div>	</div><!--- wrapper --->
<!-- <script>let name = document.getElementById("name").value;
console.log(name);</script> -->
</body>
</html>
