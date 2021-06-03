<?php
session_start();
if(empty($_SESSION['u_name']) || empty($_SESSION['u_id'])){
	header('Location: login.php');
	exit();
}
require_once('config.php');
$u_id=$_SESSION['u_id'];
$sql='SELECT content,c_id FROM contents WHERE u_id = :u_id ORDER BY date DESC';
$stmt=$dbInfo->prepare($sql);
$stmt->bindValue(':u_id',$_SESSION['u_id'],PDO::PARAM_STR);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>投稿編集&nbsp;|&nbsp;ひとこと掲示板</title>
</head>
<body>
<h1>ひとこと掲示板投稿編集</h1>
<?php
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
<section class="edit_form">
	<form action="c_update.php" method="post">
			<p><textarea name="content" cols="30" rows="4"><?php echo htmlspecialchars($row['content'],ENT_QUOTES); ?></textarea></p>
			<input type="hidden" name="c_id" value="<?php echo (int) $row['c_id']; ?>">
			<p><input type="submit" value="編集"></p>
	</form>
	<form action="c_delete.php" method="post">
			<input type="hidden" name="c_id" value="<?php echo (int) $row['c_id']; ?>">
		<input type="submit" value="削除">
	</form>
</section>
<?php
}
?>
<p><a href="index.php">戻る</a></p>
</body>
</html>