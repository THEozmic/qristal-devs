<?php

if($_SERVER["METHOD"] = "POST"){
	require "insertdb.php";
	require "sanctify.php";
	$_POST = sanctify($_POST);

	if (!isset($_POST["op"])) {
		die("Must give our password!");
	}
	if ($_POST["op"] !== "waydaai") {
		die("Be gone you alien! Okay? <a href='http://www.nasa.gov/content/the-road-to-mars-begins-here/'>okay</a>");
	}
	$_POST["password"] = md5($_POST["password"]);

	if (!empty($_POST)) {
		$new_user = $new_user[0];
		insertdb($_POST, "users");
		header("Location: ./");
	} else {
		echo "Invalid details";
		echo $new_user;
	}


} else {
	echo "Who you epp?";
}

?>