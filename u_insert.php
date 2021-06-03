<?php
if(empty($_POST['u_name']) || empty($_POST['pass'])){
	header('Location: new.php');
	exit();
}
require_once('config.php');
$u_name=$_POST['u_name'];
$pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
$sql='INSERT INTO users(u_name,pass) VALUES(:u_name,:pass)';
$stmt=$dbInfo->prepare($sql);
$stmt->bindValue(':u_name',$u_name,PDO::PARAM_STR);
$stmt->bindValue(':pass',$pass,PDO::PARAM_STR);
$stmt->execute();
header('Location: login.php');
exit();
?>
