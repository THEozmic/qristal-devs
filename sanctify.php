<?php
// @param $data = data from ajax
// @return $sanctified
// @usage sanctify(array("foo" => "bar"))
// error codes: e0 = empty data
// _POST will be passed to sanctify hence _POST will be modified

	function sanctify($post_data){

		foreach ($post_data as $key => $value) {

			if($key == "image"){ // check if current value is an image

				if(empty($value["name"])) { // check if it's empty

					return "e0"; // return empty data

				}

			} else { // current value is not an image

				$value = clean($value); //cleans all the values

				if(empty($value)) { // check if it's empty

					return "e0"; // return empty data

				}

			}

		}

		return $post_data;
	}

	function clean($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data, ENT_NOQUOTES, 'UTF-8');
	    return $data;
	}

?>