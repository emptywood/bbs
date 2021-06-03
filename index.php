<?php
session_start();
//ログイン済みかどうか
if(empty($_SESSION['u_name'])){
	header('Location: login.php');
	exit();
}
if(isset($_GET['log'])){
	if($_GET['log']=='out'){
		$_SESSION=[];
		session_destroy();
		header('Location: login.php');
		exit();
	}
}
$u_name=$_SESSION['u_name'];
//データベースへの接続
require_once('config.php');
//投稿の取得
$sql='SELECT users.u_name,contents.content FROM users INNER JOIN contents USING(u_id) ORDER BY contents.date DESC';
$res=$dbInfo->query($sql);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ひとこと掲示板</title>
</head>
<body>
<h1>ひとこと掲示板</h1>
<p><a href="edit.php">編集</a></p>
<p><a href="index.php?log=out">ログアウト</a></p>
<section id="m_form">
	<form action="c_insert.php" method="post">
		<dl>
			<dt><label for="content"><?php echo htmlspecialchars($u_name,ENT_QUOTES); ?>さんメッセージを投稿してください</label></dt>
			<dd><textarea name="content" id="content" cols="30" rows="4"></textarea></dd>
		</dl>
		<p><input type="submit" value="投稿"></p>
	</form>
</section>
<section id="display">
	<dl>
<?php
while($row=$res->fetch(PDO::FETCH_ASSOC)){
?>
		<dt><?php echo htmlspecialchars($row['u_name'],ENT_QUOTES); ?></dt>
		<dd><?php echo nl2br(htmlspecialchars($row['content']),false); ?></dd>
<?php
}
?>
	</dl>
</section>
</body>
</html>