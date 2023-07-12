<?php 

  include "../includes/dbConfig.php";


	$referral = $_GET['id'];

	$sql = "UPDATE post_orders SET referral_code = 'Paid Out' WHERE post_orders.referral_code = '$referral'";

	$query = $conn->query($sql);
		 echo mysqli_error($conn);

	echo '<meta http-equiv="refresh" content="0; url= https://admin.plauditssa.co.za/referrals/referral_'.$referral.'.php">';
 ?>