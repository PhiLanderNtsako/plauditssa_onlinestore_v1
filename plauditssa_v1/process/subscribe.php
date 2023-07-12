<?php 
	session_start();
  	include "../includes/dbConfig.php";

  	$email = mysqli_real_escape_string($conn,$_POST['email']);

  	$user_check_query = "SELECT * FROM newsletters WHERE email = '$email' ";
	$result = mysqli_query($conn, $user_check_query) or die(mysqli_error($conn));
	$rows_fetched=mysqli_num_rows($result);

        if($rows_fetched >0 )
        {
            echo'<script>alert("You Are Already Subscribed.")</script>';
            echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/home/">';
     
        	} else {

        		$query = "INSERT INTO newsletters (email)
							VALUES ('$email')"; 
				mysqli_query($conn, $query);
				mysqli_close($conn);

				if (isset($_POST['send'])) 
					{
						$to = "$email";

						$subject = "Plaudits SA - Subscribed To Our Newsletter";
						
						$message = "<h4>Thank You For Subscribing </h4><br>

									<p>You are now subscribed to Plaudits SA newsletter, You will be notified on this email about new products, updates and more.</p><br>

									<p>Thank You.</p>
									";			

						$headers =  "From: info@plauditssa.co.za" ."\r\n".
									"Reply-To: info@plauditssa.co.za" ."\r\n".
									"CC: plauditssa@gmail.com" ."\r\n".
									"MIME-Version: 1.0" ."\r\n".
									"Content-type: text/html; charset=UTF-8" ."\r\n".
									"X-Mailer: PHP/".phpversion();

									
						mail($to, $subject, $message, $headers);
					}
            echo'<script>alert("Thank You for Subscribing.")</script>';

            echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/home/">';
        	}
 ?>


