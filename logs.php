<?php

require_once "querydb.php";

					$logs = querydb("SELECT * FROM user_logs order by id DESC");
					$count_logs = count($logs);
					$n = 0;
					while ($n <= $count_logs - 1) {
						$user = querydb("SELECT * FROM users WHERE id = '{$logs[$n]["user_id"]}'");
						$user_name = $user[0]["name"];
						$action = $logs[$n]["action"];
						$time = $logs[$n]["time_of_action"];

		?>
		<div class="log_entry"><?php echo $user_name ?> triggered the <?php echo $action?> event - <span class="timeago"  data-livestamp="<?php echo $time; ?>"></span></div>
		<?php
				 		$n++;
					}

		?>