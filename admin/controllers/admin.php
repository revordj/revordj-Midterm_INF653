<?php
	$testing = username_exists('josh');
	if($testing == false){
		echo("doesn't exist'");
	}
	else{
		echo("exists");
	}

	echo($testing);
	?>