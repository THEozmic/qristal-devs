<?php
session_start();

if($_SERVER["METHOD"] = "POST"){
	require "insertdb.php";
	require "sanctify.php";
	$_POST = sanctify($_POST);
	if (empty($_POST["message"])) {
		die("Who you epp with that empty message? <a href='./'>nobody</a>");
	}

	$message = insertdb($_POST, "messages");

	if (!empty($message)) {
		$message = $message[0];
		$user_id = $_SESSION["user_id"];
		insertdb(array("user_id" => "$user_id", "action" => "message", "time_of_action" => time()), "user_logs");
		header("Location: ./");
	} else {
		echo "Invalid message";
		echo $message;
	}


} else {
	echo "Who you epp?";
}

?>