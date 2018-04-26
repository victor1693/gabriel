<?php
	      $url ='http://www.opinion-app.com/api/v1/langwebserv.php';
		  $json = file_get_contents($url);
		  $array = json_decode($json,true);  
?>