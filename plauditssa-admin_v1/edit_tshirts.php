<?php

    session_start();
    if(!isset($_SESSION['adminID']))
    {
      echo '<meta http-equiv="refresh" content="0; url= https://admin.plauditssa.co.za/login.php">';
    }

    include "includes/dbConfig.php";

            $id_product = $_GET['id1'];
            $id_size = $_GET['id2'];

            $sql = "SELECT * FROM products, product_size WHERE product_size.productID = products.productID AND products.productID = '$id_product'";
            $result = $conn->query($sql);
            $row2 = $result->fetch_assoc();
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
            <li class="active"><a href="t_shirts.php">T-Shirts</a></li>
            <li><a href="hoodies.php">Hoodies</a></li>
            <li><a href="headwear.php">Headwear</a></li>
            <li><a href="long_sleeves.php">Long Sleeves</a></li>
            <li><a href="Kids_collection.php">Kids</a></li>
            <li><a href="winter_collection.php">Winter</a></li>
            <li><a href="pride_merch.php">Pride-Merch</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="orders.php">Orders</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Plaudits SA <small><a href="#">view site</a> </small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Edit T-Shirts
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addArtist">Edit T-Shirts</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="https://admin.plauditssa.co.za/process/edit_products.php" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <a href="t_shirts.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
        <h4 class="modal-title" id="myModalLabel">Edit T-Shirts Quantity</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>X Small Quantity</label>
          <input type="hidden" name="product_id" class="form-control" value="<?php echo $id_product ?>">
          <input type="hidden" name="size_id" class="form-control" value="<?php echo $id_size ?>">
          <input type="hidden" name="oneSize_quantity" class="form-control" value="">
          <input type="number" name="xsmall_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_XS'] ?>">
        </div>
        <div class="form-group">
          <label>Small Quantity</label>
          <input type="number" name="small_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_S'] ?>">
        </div>
        <div class="form-group">
          <label>Medium Quantity</label>
          <input type="number" name="medium_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_M'] ?>">
        </div>
        <div class="form-group">
          <label>Large Quantity</label>
          <input type="number" name="large_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_L'] ?>">
        </div>
        <div class="form-group">
          <label>X Large Quantity</label>
          <input type="number" name="xlarge_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_XL'] ?>">
        </div>
        <div class="form-group">
          <label>XX Large Quantity</label>
          <input type="number" name="2xlarge_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_2XL'] ?>">
        </div>
        <div class="form-group">
          <label>XXX Large Quantity</label>
          <input type="number" name="3xlarge_quantity" class="form-control" min="0" required="true" value="<?php echo $row2['product_quantity_3XL'] ?>">
        </div>
      </div>
      <div class="modal-footer">
        <a href="t_shirts.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary">Edit T-Shirt</button>
      </div>
    </form>
    </div>
  </div>
</div>

        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy;<script>document.write(new Date().getFullYear());</script> Sweet Sound (Pty) Ltd</a></p>
    </footer>
    <!-- Modals -->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>