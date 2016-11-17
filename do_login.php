<?php
session_start();

if($_SERVER["METHOD"] = "POST"){
	require "querydb.php";
	require "sanctify.php";
	require "insertdb.php";
	$_POST = sanctify($_POST);

	$_POST["password"] = md5($_POST["password"]);

	$user = querydb("SELECT * FROM users WHERE name = '{$_POST["username"]}' AND password = '{$_POST["password"]}'");
	if (!empty($user)) {
		$user = $user[0];
		$user_id = $user["id"];
		$_SESSION["is_online"] = "true";
		$_SESSION["user_id"] = $user_id;
		$_SESSION["username"] = $user["name"];
		insertdb(array("user_id" => "$user_id", "action" => "login", "time_of_action" => time()), "user_logs");
		header("Location: ./");
	} else {
		echo "Invalid details";
	}


} else {
	echo "Who you epp?";
}


?>