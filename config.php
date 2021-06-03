<?php
//データベースへの接続
$host='localhost';
$dbname='bbs';
$dbuser='root';
$dbpass='';
$dsn='mysql:dbname='.$dbname.';host='.$host.';charset=utf8';
$dbInfo=new PDO($dsn,$dbuser,$dbpass);
?>
