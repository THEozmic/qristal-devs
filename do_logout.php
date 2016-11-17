<?php
	session_start();
	$user_id = $_SESSION["user_id"];
	require_once "insertdb.php";
	insertdb(array("user_id" => "$user_id", "action" => "logout", "time_of_action" => time()), "user_logs");
	session_destroy();
	header("Location: ./");
?>