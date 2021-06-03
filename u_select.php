<?php
session_start();
if(empty($_POST['u_name']) || empty($_POST['pass'])){
	header('Location: login.php');
	exit();
}
require_once('config.php');
$u_name=$_POST['u_name'];
$pass=$_POST['pass'];
$sql='SELECT u_id,u_name,pass FROM users WHERE u_name=:name';
$stmt=$dbInfo->prepare($sql);
$stmt->bindValue(':name',$u_name,PDO::PARAM_STR);
$stmt->execute();
if($stmt->rowCount()>=1){
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		if(password_verify($pass,$row['pass'])){
			$_SESSION['u_name']=$u_name;
			$_SESSION['u_id']=$row['u_id'];
			header('Location: index.php');
			exit();
		}
	}
	
	if(empty($_SESSION['u_name'])){
		header('Location: login.php');
		exit();
	}
}else{
	header('Location: login.php');
	exit();
}

?>
