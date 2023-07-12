<?php

	$dbhost = "localhost";

	$dbuser = "sweetlcy_ntsako";

	$dbpass = "9809256054086";

	$dbname = "sweetlcy_plaudits_sa_db";



	$conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 

	mysqli_select_db($conn,$dbname) or die('database selection problem');

?>