<?php
session_start();
if(isset($_SESSION['u_name'])){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ログイン&nbsp;|&nbsp;ひとこと掲示板</title>
</head>
<body>
<h1>ひとこと掲示板ログイン</h1>
<section id="login_form">
	<form action="u_select.php" method="post">
		<dl>
			<dt><label for="u_name">ユーザー名</label></dt>
			<dd><input type="text" name="u_name" id="u_name"></dd>
			<dt><label for="pass">パスワード</label></dt>
			<dd><input type="password" name="pass" id="pass"></dd>
			<p><input type="submit" value="ログイン"></p>
		</dl>
	</form>
</section>
<p><a href="new.php">新規会員登録へ</a></p>
</body>
</html>