<?php

    session_start();
    if(!isset($_SESSION['adminID']))
    {
      echo '<meta http-equiv="refresh" content="0; url= https://admin.plauditssa.co.za/login.php">';
    }

    include "../includes/dbConfig.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Plaudits SA</title>
    <base href="https://admin.plauditssa.co.za/referrals">     
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
            <li class="active"><a href="referrals/referral_thapelo.php">Thapelo</a></li>
            <li><a href="referrals/referral_felicity.php">Felicity</a></li>
            <li><a href="referrals/referral_kamogelo.php">Kamogelo</a></li>
            <li><a href="referrals/referral_lerato.php">Lerato</a></li>
            <li><a href="referrals/referrals/referral_thabo.php">Thabo</a></li>
            <li><a href="referrals/referral_siyabonga.php">Siyabonga</a></li>
            <li><a href="referrals/referral_kgatlhiso.php">Kgatlhiso</a></li>
            <li><a href="referrals/referral_takatso.php">Takatso</a></li>
            <li><a href="referrals/referral_chantel.php">Chantel</a></li>
          </ul>
          <?php
              $id_admin = $_SESSION['adminID'];

              $sql="SELECT * FROM admin WHERE admin_username = '$id_admin'";

              $result_set=mysqli_query($conn,$sql);
              $row=mysqli_fetch_array($result_set)
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><?php echo $row['admin_username'] ?></a></li>
            <li><a href="process/logout_admin.php">Logout</a></li>
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
          <li class="active">Referrals - Thapelo</li>
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
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'thapelo' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $thapelo = $row2[0];
              ?>
              <a href="referrals/referral_thapelo.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Thapelo <span class="badge"><?php echo $thapelo ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'felicity' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $felicity = $row2[0];
              ?>
              <a href="referrals/referral_felicity.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Felicity <span class="badge"><?php echo $felicity ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'kamogelo' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $kamogelo = $row2[0];
              ?>
              <a href="referrals/referral_kamogelo.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Kamogelo <span class="badge"><?php echo $kamogelo ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'lerato' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $lerato = $row2[0];
              ?>
              <a href="referrals/referral_lerato.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Lerato <span class="badge"><?php echo $lerato ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'thabo' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $thabo = $row2[0];
              ?>
              <a href="referrals/referral_thabo.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Thabo <span class="badge"><?php echo $thabo ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'chantel' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $chantel = $row2[0];
              ?>
              <a href="referrals/referral_chantel.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Chantel <span class="badge"><?php echo $chantel ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'kgatlhiso' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $kgatlhiso = $row2[0];
              ?>
              <a href="referrals/referral_kgatlhiso.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Kgatlhiso <span class="badge"><?php echo $kgatlhiso ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'siyabonga' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $siyabonga = $row2[0];
              ?>
              <a href="referrals/referral_siyabonga.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Siyabonga <span class="badge"><?php echo $siyabonga ?></span></a>

              <?php
                $sql2="SELECT count(1) FROM post_orders WHERE referral_code = 'takatso' "; $result=mysqli_query($conn,$sql2); $row2 = mysqli_fetch_array($result);
                $takatso = $row2[0];
              ?>
              <a href="referrals/referral_takatso.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Takatso <span class="badge"><?php echo $takatso ?></span></a>
              
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Code: thapelo</h3>
              </div>
              <div class="panel-body"><br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Buyer</th>
                    <th>Product Details</th>
                    <th>Product Price</th>
                    <th>5% of Product Price</th>
                  </tr>
                  <?php

                        $sql="SELECT * FROM users INNER JOIN pre_orders ON users.userID = pre_orders.userID INNER JOIN post_orders ON post_orders.preOrderID = pre_orders.preOrderID WHERE post_orders.referral_code = 'thapelo'";
                        $result_set=mysqli_query($conn,$sql);
                        $bonus_total = 0;

                    while($row=mysqli_fetch_array($result_set)) 
                      {
                  ?>
                      <tr>
                        <td>
                          <?php echo $row['user_firstName'] ?> <?php echo $row['user_lastName'] ?>
                        </td>
                        <td>
                          <a class="btn btn-danger" href="https://admin.plauditssa.co.za/order_details.php?id=<?php echo $row['preOrderID'] ?>">View Order</a>
                        </td>
                        <td>
                          R<?php echo $prod_price = $row['postOrder_totalPrice'] - $row['postOrder_deliveryMethod']?><br>
                        </td>
                        <td>
                          <?php 
                            $total = ($prod_price * 5/100);
                            echo 'R'.$total.'';
                            $bonus_total += $total;
                          ?>
                        </td>
                      </tr>
                      <?php 
                        }
                      ?>
                      
                </table>
                    <table class="table table-striped table-hover">
                      <tr>
                        <th>Total Recouped 
                          <?php 
                            $sql="SELECT * FROM users, orders, post_orders WHERE post_orders.referral_code = 'thapelo'";
                            $result_set=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_array($result_set);

                            echo 'R'.$bonus_total.'';
                          ?>
                          <?php 
                            $day = date('d');
                          
                            if ($bonus_total > 0) 
                              {
                                if($day == 30 || $day == 31 || $day == 1 || $day == 2 || $day == 3 )
                                { 
                                  echo '<a class="btn btn-default" href="https://admin.plauditssa.co.za/referrals/pay_referrals.php?id='.$row['referral_code'].'" onclick="return confirmDelete();">Pay Out</a>';
                                }
                              } 
                            else 
                              {
                                echo ' "PAID OUT"';
                              }
                          ?>                    
                        </th>
                      </tr>
                    </table>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy;<script>document.write(new Date().getFullYear());</script> Sweet Sound Tech (Pty) Ltd</a></p>
    </footer>
    <!-- Modals -->

<script language="javascript" type="text/javascript">
  function confirmDelete() {
    if (confirm('Are You Sure Referrals To Thapelo Are Paid?')) {
      return true;
    }
    return false;
  } 
</script>

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
