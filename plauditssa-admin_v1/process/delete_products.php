<?php 

  include "../includes/dbConfig.php";


	$id_product = $_GET['id'];

		$sql="SELECT * FROM orders, products WHERE orders.productID = products.productID AND products.productID = '$id_product'";

     	$result_set=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     	$rows_fetched=mysqli_num_rows($result_set);

        if($rows_fetched > 0)
            {	
            	?>
               <script>
                    window.alert("Cannot Delete This Product. There Are Orders on this product");
                </script>
				<meta http-equiv="refresh" content="0 ;https://admin.plauditssa.co.zas/index.php" /> 
                        <?php
			} else {
					$sql = "DELETE FROM products WHERE productID = $id_product";
					$query = $conn->query($sql);
					echo '<meta http-equiv="refresh" content="0 ;https://admin.plauditssa.co.za/index.php" /> '; 
			} 

 ?>
