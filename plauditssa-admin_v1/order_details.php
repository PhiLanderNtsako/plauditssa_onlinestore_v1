<?php

    session_start();
    if(!isset($_SESSION['adminID']))
    {
      echo '<meta http-equiv="refresh" content="0; url= https://admin.plauditssa.co.za/login.php">';
    }

    include "includes/dbConfig.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Plaudits SA</title>
    <base href="https://admin.plauditssa.co.za/">    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
      <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Plaudits SA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="t_shirts.php">T-Shirts</a></li>
            <li><a href="hoodies.php">Hoodies</a></li>
            <li><a href="headwear.php">Headwear</a></li>
            <li><a href="long_sleeves.php">Long Sleeves</a></li>
            <li><a href="Kids_collection.php">Kids</a></li>
            <li><a href="winter_collection.php">Winter</a></li>
            <li><a href="pride_merch.php">Pride-Merch</a></li>
            <li><a href="users.php">Users</a></li>
            <li class="active"><a href="orders.php">Orders</a></li>
          </ul>
          <?php
              $id_admin = $_SESSION['adminID'];

              $sql="SELECT * FROM admin WHERE admin_username = '$id_admin'";

              $result_set=mysqli_query($conn,$sql);
              $row=mysqli_fetch_array($result_set)
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><?php echo $row['admin_username'] ?></a></li>
            <li><a href="https://admin.plauditssa.co.za/process/logout_admin.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Plaudits SA Website</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>

              <?php
                  $sql2="SELECT count(1) FROM products WHERE product_type = 't-shirts' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                  $t_shirt = $row2[0];
              ?>
              <a href="t_shirts.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> T-Shirts <span class="badge"><?php echo $t_shirt ?></span></a>
              
              <?php
                  $sql3="SELECT count(1) FROM products WHERE product_type = 'hoodies' "; $result=mysqli_query($conn,$sql3); $row3 = mysqli_fetch_array($result);
                  $hoodies = $row3[0];
              ?>
              <a href="hoodies.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Hoodies <span class="badge"><?php echo $hoodies ?></span></a>
              
              <?php
                  $sql4="SELECT count(1) FROM products WHERE product_type = 'headwear' "; $result=mysqli_query($conn,$sql4); $row4 = mysqli_fetch_array($result);
                  $headwear = $row4[0];
              ?>
              <a href="headwear.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Headwear <span class="badge"><?php echo $headwear ?></span></a>
              
              <?php
                  $sql5="SELECT count(1) FROM products WHERE product_type = 'long-sleeves' "; $result=mysqli_query($conn,$sql5); $row5 = mysqli_fetch_array($result);
                  $long_sleeves = $row5[0];
              ?>
              <a href="long_sleeves.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Long Sleeves <span class="badge"><?php echo $long_sleeves ?></span></a>

              <?php
                  $sql5="SELECT count(1) FROM products WHERE product_type = 'kids-collection' "; $result=mysqli_query($conn,$sql5); $row5 = mysqli_fetch_array($result);
                  $kids_collection = $row5[0];
              ?>
              <a href="kids_collection.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Kids Collection <span class="badge"><?php echo $kids_collection ?></span></a>
              
              <?php
                  $sql5="SELECT count(1) FROM products WHERE product_category = 'Hoodie' "; $result=mysqli_query($conn,$sql5); $row5 = mysqli_fetch_array($result);
                  $winter_collection = $row5[0];
              ?>
              <a href="winter_collection.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Winter Collection <span class="badge"><?php echo $winter_collection ?></span></a>

              <?php
                  $sql5="SELECT count(1) FROM products WHERE product_type = 'pride-merch' "; $result=mysqli_query($conn,$sql5); $row5 = mysqli_fetch_array($result);
                  $pride_merch = $row5[0];
              ?>
              <a href="pride_merch.php" class="list-group-item"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Pride Merch <span class="badge"><?php echo $pride_merch ?></span></a>

              <?php
                  $sql6="SELECT count(1) FROM users "; $result=mysqli_query($conn,$sql6); $row6 = mysqli_fetch_array($result);
                  $users = $row6[0];
              ?>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo $users ?></span></a>
              
              <?php
                  $sql8="SELECT count(1) FROM pre_orders"; $result=mysqli_query($conn,$sql8); $row8 = mysqli_fetch_array($result);
                  $orders = $row8[0];
              ?>
              <a href="orders.php" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Orders <span class="badge"><?php echo $orders ?></span></a>
            </div>
          </div>
          
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Orders</h3>
              </div>
              <div class="panel-body">
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Image</th>
                        <th>Order Details</th>
                        <th>Delivery Address</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th> 
                          <?php
                          $preOrder_id = $_GET['id'];

                          $sql="SELECT * FROM orders, post_orders WHERE orders.order_groupID = post_orders.order_groupID AND orders.preOrderID = '$preOrder_id' AND orders.preOrderID = '$preOrder_id'";

                          $result_set=mysqli_query($conn,$sql);
                          $row=mysqli_fetch_array($result_set);

                            if($row['postOrder_paymentStatus'] == 'Payment Pending')
                              {
                                echo '
                                  <a class="btn btn-danger" href="process/pay_order.php?id='.$row['postOrderID'].'" onclick="return confirmPay();">Paid?</a><br><br>
                                ';
                              } elseif ($row['postOrder_deliveryStatus'] == 'On The Way') {
                                
                                echo '
                                  <a class="btn btn-danger" href="process/deliver_order.php?id='.$row['postOrderID'].'" onclick="return confirmDeliver();">Delivered?</a>
                                ';
                              
                              }
                                
                          ?>
                        </th> 
                      </tr>
                      
                    <?php
                      $preOrder_id = $_GET['id'];

                          $sql="SELECT * FROM pre_orders INNER JOIN orders ON orders.preOrderID = pre_orders.preOrderID INNER JOIN post_orders ON post_orders.preOrderID = pre_orders.preOrderID WHERE post_orders.preOrderID = '$preOrder_id'";

                        $result_set=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_array($result_set)) 
                        { 
                    ?>
                    <tr>
                      <td>
                          <img src="uploads/product_images/<?php echo $row['order_productImage'] ?>" style="height: 100px;" alt="">
                      </td>
                      
                        <td>
                          <?php echo $row['order_productTitle'] ?><br>
                          Size: <?php echo $row['order_size'] ?><br>
                          Quantity: <?php echo $row['order_quantity'] ?>
                      </td>
                        <td><strong>
                          <?php 
                            if ($row['postOrder_deliveryMethod'] == '100') {
                              echo "Method: Aramax ";
                            }elseif ($row['postOrder_deliveryMethod'] == '50') {
                              echo "Method: Pep Store (PAXI) ";
                            }else{
                              echo "Method: Personal Pickup ";
                            }
                          ?></strong><br>
                          <?php echo $row['preOrder_streetAddress'] ?>, <?php echo $row['preOrder_suburb'] ?><br>
                          <?php echo $row['preOrder_towncity'] ?>, <?php echo $row['preOrder_zipcode'] ?><br>
                          <?php echo $row['preOrder_province'] ?>
                        </td>
                        <td>
                            Total: R<?php echo $row['postOrder_totalPrice'] ?><br>
                            <strong><?php echo $row['postOrder_paymentStatus'] ?></strong>
                        </td>
                        <td>
                          <strong>

                            <?php 
                            if ($row['postOrder_deliveryMethod'] == '0') {
                              echo "Personal Pickup";
                            }elseif ($row['postOrder_paymentStatus'] == 'Payment Pending') {
                              echo "Payment Pending";
                            }else{
                            echo $row['postOrder_deliveryStatus'];
                              }?>
                            </strong>
                        </td>
                        
                      </tr>
                      <?php 
                        }
                      ?>
                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>
<script language="javascript" type="text/javascript">
  function confirmPay() {
    if (confirm('Are You Sure They Paid??')) {
      return true;
    }
    return false;
  } 

  function confirmDeliver() {
    if (confirm('Are You Sure They Recived The Product??')) {
      return true;
    }
    return false;
  }
</script>


    <footer id="footer">
      <p>&copy;<script>document.write(new Date().getFullYear());</script> Sweet Sound (Pty) Ltd</a></p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
