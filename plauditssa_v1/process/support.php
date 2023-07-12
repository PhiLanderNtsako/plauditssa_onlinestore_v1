<?php 
	session_start();
  	include "../includes/dbConfig.php";

  	$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
  	$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
  	$email = mysqli_real_escape_string($conn,$_POST['email']);
  	$subject = mysqli_real_escape_string($conn,$_POST['subject']);
  	$message = mysqli_real_escape_string($conn,$_POST['message']);  	


	mysqli_query($conn, $query);
	mysqli_close($conn);

	if (isset($_POST['send'])) 
		{
			$to = "info@plauditssa.co.za";

			$subject = "$subject";
			
			$message = " <h2> $firstName $lastName </h2><br><br>

							$message 
						";			

			$headers =  "From: $email" ."\r\n".
						"Reply-To: $email" ."\r\n".
						"CC: plauditssa@gmail.com" ."\r\n".
						"MIME-Version: 1.0" ."\r\n".
						"Content-type: text/html; charset=UTF-8" ."\r\n".
						"X-Mailer: PHP/".phpversion();

						
			mail($to, $subject, $message, $headers);
		}
	echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/home/">';

 ?>


