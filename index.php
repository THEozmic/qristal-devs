<!DOCTYPE html>
<html>
<head>
	<!--Meta Tags-->
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content="IE=edge">
	<meta name = viewport content = "width = device-width, initial-scale = 1.0">
	<meta name = "description" content = "Easy access and interaction between Qrystal Devs.">
	<meta name = "keywords" content = "codes, fun, jokes, ideas, individuals, bla bla bla and thingies"/>
	<meta name = "robots" content = "index, follow"/>
	<meta name = "author" content = "Qrystal Devs">

	<title>Qristal Devs</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src = "js/jquery-3.1.0.min.js"></script>
</head>
<body>
	<header>
		<nav>
			<img class = "menu-toggle" src = "img/menu-2.png">
		</nav>
	</header>
		<div class = "menu">
			<ul class = "other-link">
				<li class = "link"><a href = "#">Home</a></li>
				<li class = "link"><a href = "#">Your Profile</a></li>
				<li class = "link"><a href = "#">About</a></li>
				<li class = "link"><a href = "#">Log Out</a></li>
			</ul>
		</div>
	<div

	<div class="center-div">
		<div class="chat-board"></div>
		<div class="chat-input">
		<form>
			<textarea name="text" placeholder = "Type your message here..." class = "message-box"></textarea>
			<!--<input type="text" placeholder="Type your message here..." name="message" class = "message-box">-->
		</form>

		</div>
	</div>

</body>
<script>
	$("body").on("click", ".menu-toggle", function(){
		$(".other-link").slideToggle();
	});
</script>
</html>