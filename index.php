<!DOCTYPE html>
<html>
<head>
	<title>Qristal Devs</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src = "jquery-3.1.0.min.js"></script>
</head>
<body>

	<header>
		<nav>
			<button class = "menu-toggle">See More</button>
			<ul class = "other-link">
				<li><a href = "#">Home</a></li>
				<li><a href = "#">Your Profile</a></li>
				<li><a href = "#">About</a></li>
			</ul>
		</nav>
	</header>
	<div

	<div class="center-div">
		<div class="chat-board"></div>
		<div class="chat-input">
		<form>
			<input type="text" placeholder="Type your message here..." name="message">
		</form>

		</div>
	</div>

</body>
<script>
	$("body").on("click", ".menu-toggle", function(){
		$(".other-link").toggle("up");
	});
</script>
</html>