<?php
session_start();
if(empty($_SESSION['u_name'])){
	header('Location: login.php');
	exit();
}
if(empty($_POST['c_id'])){
	header('Location: index.php');
	exit();
}
require_once('config.php');
$sql='DELETE FROM contents WHERE c_id=:c_id';
$stmt=$dbInfo->prepare($sql);
$stmt->bindValue(':c_id',$_POST['c_id'],PDO::PARAM_INT);
$res=$stmt->execute();
if($res){
	header('Location: index.php');
	exit();
}else{
	header('Location: edit.php');
	exit();
}
?>