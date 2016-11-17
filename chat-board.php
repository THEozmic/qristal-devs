<?php

require_once "querydb.php";

					$messages = querydb("SELECT * FROM messages");
					$count_messages = count($messages);
					$n = 0;
					while ($n <= $count_messages - 1) {
						$sender = querydb("SELECT * FROM users WHERE id = '{$messages[$n]["user_id"]}'");
						$sender_name = $sender[0]["name"];
						$message = $messages[$n]["message"];
						$time = $messages[$n]["time_sent"];

		?>
				<div class="a-message">
					<span class="sender"><?php echo $sender_name;?> says: </span>
					<span class="message"><?php echo $message;?> - <span class="timeago"  data-livestamp="<?php echo $time; ?>"></span></span>

				</div>
		<?php
				 		$n++;
					}

		?>