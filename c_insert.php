<?php
session_start();
if(empty($_SESSION['u_name'])){
	header('Location: login.php');
	exit();
}
if(empty($_POST['content'])){
	header('Location: index.php');
	exit();
}
$u_id=$_SESSION['u_id'];
$content=$_POST['content'];
require_once('config.php');
$sql='INSERT INTO contents(content,u_id) VALUES(:content,:u_id)';
$stmt=$dbInfo->prepare($sql);
$stmt->bindValue(':content',$content,PDO::PARAM_STR);
$stmt->bindValue(':u_id',$u_id,PDO::PARAM_INT);
$stmt->execute();
header('Location: index.php');
exit();
?>
