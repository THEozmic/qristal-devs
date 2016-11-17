<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Qristal Devs</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="jquery.min.js"></script>
 	<script src="moment.min.js"></script>
	<script src="livestamp.min.js"></script>
	<link href="http://emojicss.com/emoji.css" rel="stylesheet">
</head>
<body>
<div class="error-center-element" style="display: none;">
	<div class="error-refresh" >
		There is a connection problem. Click <a href="./">here</a> to refresh.
		<span class="close-error-msg">close</span>
	</div>
</div>

 	<?php
 		if(!isset($_SESSION["is_online"] )) {
 			// show login page
 		?>
 		<div class="login-div">
 			<form method= "post" action="do_login.php" class="login-form">
 				<input type="text" name="username" class="login-input" placeholder="username">
 				<input type="password" name="password" class="login-input" placeholder="password">
 				<button class="login-btn">Login</button>
 			</form>
 			<a href="register.php">Or register</a>

 		</div>
	<?php
		} else {
			// show chat page
			?>

<header>
		<nav>
			<a class ="menu-item" href="do_logout.php">Logout</a>
			<a class ="menu-item" href="./">Home</a>
		</nav>

	</header>

	<div class="center-div">
		<div class="chat-board">

		</div>
		<div class="chat-input">
		<form class="chat-form" id="chat-form">
			<input type="text" placeholder="Type your message here..." name="message" class="message-input">

			<button class="message-btn">Send</button>
			<input style="display: none" type="text" name="user_id" value="<?php echo $_SESSION["user_id"];?>">
			<input type="text" name="time_sent" class="time" style="display: none;" value="<?php echo time();?>">

		</form>

		</div>
	</div>
	<div class="center-div">
		<div class="logs">

		</div>
	</div>

			<?php
		}
 	?>
 	<script type="text/javascript">
 		//get new messages after .5 seconds
		var previous_chats = "";
 		 function get_chats(){

 		 	var chats = "";
    		var ajaxy = $.ajax({
		        type: "POST",
		        url: "chat-board.php",
		        async: true,
		        timeout: 10000,
		        error: function(){
		        	setTimeout(function(){
					        	get_chats();
					        }, 10000);
		        },
		        success: function(data){
		        	setTimeout(function(){get_chats();}, 10000);
		        	chats = data;
		        	if (previous_chats !== chats){
				    	$('.chat-board').html(chats);
				    	$(".chat-board").animate({ scrollTop: $('.chat-board').prop("scrollHeight")}, 1000);
				    	console.log("not equal");
				    	previous_chats = chats;
				    	$(".message-input").val("");
	                   	$(".message-input").prop('disabled', false);

				    }
				    $( ".error-center-element" ).fadeOut();
		        }

		    });


		}

		var previous_logs = "";
 		 function get_logs(){

 		 	var logs = "";
    		var ajaxy = $.ajax({
		        type: "POST",
		        url: "logs.php",
		        async: true,
		        timeout: 10000,
		        error: function(){
		        	setTimeout(function(){
					        	get_logs();
					        }, 20000);
		        },
		        success: function(data_logs){
		        	setTimeout(function(){get_logs();}, 20000);
		        	logs = data_logs;
		        	if (previous_logs !== logs){
				    	$('.logs').html(logs);
				    	console.log("not equal -logs");
				    	previous_logs = logs;

				    }
		        }

		    });


		}


 		 function get_time(){

 		 	var time = "";
    		var ajaxy = $.ajax({
		        type: "POST",
		        url: "time.php",
		        async: true,
		        timeout: 10000,
		        error: function(){
		        	setTimeout(function(){
					        	get_time();
					        }, 10000);
		        },
		        success: function(data_time){
		        	setTimeout(function(){get_time();}, 10000);
		        	time = data_time;
				    	$('.time').val(time);
				 }

		    });


		}



		$(window).on("load", function() {

		  $(".chat-board").animate({ scrollTop: $('.chat-board').prop("scrollHeight")}, 1000);
		});

		$(document).on("submit", "#chat-form", function(){
			$(".message-input").val($(".message-input").val().trim());
			$(".message-input").val(encode($(".message-input").val()));
	        var formData = new FormData($(this)[0]);
	        if ($(".message-input").val() !== "") {
		        $(".message-input").val("Please wait...");
		        $(".message-input").prop('disabled', true);

		        $.ajax({
	                    url: "do_message.php",
	                    type: 'POST',
	                    data: formData,
	                    async: true,
	                    error: function () {
					        setTimeout(function(){
					        	$("#chat-form").submit();
					        }, 10000);
					    },
	                    success: function (data) {
	                    	$(".message-input").val("");
	                    	$(".message-input").prop('disabled', false);
	                        $(".chat-board").animate({ scrollTop: $('.chat-board').prop("scrollHeight")}, 1000);
	                        $( ".error-center-element" ).fadeOut();
	                    },
	                    cache: false,
	                    contentType: false,
	                    processData: false
	                });
		    	}
	    	return false;
	    });

	    $(document).ready(function(){
	    	get_time();
	    	get_chats();
	    	get_logs();
	    	//setTimeout(function(){check_ajax_fail();}, 500);
	    });

	    $( document ).ajaxError(function() {
		  $( ".error-center-element" ).fadeIn();
		});

		 $("body").on("click", ".close-error-msg", function() {
		  $( ".error-center-element" ).fadeOut();
		});

		 function encode(r) {
		  return r.replace(/[\x26\x0A\x3c\x3e\x22\x27]/g, function(r) {
			return "&#" + r.charCodeAt(0) + ";";
		  });
		}

 	</script>
</body>
</html>