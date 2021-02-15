<?php
	
	define('DBHost', $db_host);
	define('DBPort', 8080);
	define('DBName', $db_name);
	define('DBUser', $db_user);
	define('DBPassword', $db_pwd);
	require(__DIR__ . "/PDO.class.php");
	$DB = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);?>
