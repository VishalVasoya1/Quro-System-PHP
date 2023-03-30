<?php
include "../../conn.php";
session_start();
$total=0;
$bytes2 = random_bytes(3);
$new2=bin2hex($bytes2);
$uid="";
$msg="";
$error="";
$cop="";
$osid="";
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['osid']))
    {
        $osid=$_GET['osid'];
        $q51="select * from order_status where osid='$osid'";
        if($r51=mysqli_query($conn,$q51))
        {
            while($n51=mysqli_fetch_assoc($r51))
            {
                $cop=$n51['cop'];
            }
        }
    }
    else
    {
        header("location:new_order.php");
    }
    if(isset($_POST['final_order']))
    {
        $cop=$_POST['cop'];
        $q2="select * from orders where cop='$cop'";
        if($r2=mysqli_query($conn,$q2))
        {
            while($n2=mysqli_fetch_assoc($r2))
            {
                $uid=$n2['uid'];
            }
        }
        $q1="update order_status set status='Order Done' where osid='$osid'";
        if($r1=mysqli_query($conn,$q1))
        {
            $q4="update orders set prstatus='Order Done' where cop='$cop'";
            if($r4=mysqli_query($conn,$q4))
            {
                $msg="Order Done SuccesFully....";
                header("refresh:2;url=view_orders.php");
            }
            else
            {
                $error="Order Selection Failed...";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/tables/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:23 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Status</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/other/phone.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <?php

if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
   include "themes/header.php";
}
else
{
   header("location:../../login.php");
}
?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        <!-- partial -->
        <?php

if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
   include "themes/sidebar.php";
}
else
{
   header("location:../../login.php");
}
?>
        <!-- partial:../../partials/_sidebar.html -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <?php 
            if($msg)
            {
              echo '<script>swal("Well Done!", "'.$msg.'", "success");</script>';  
            }
            if($error)
            {
              echo '<script>swal("Oops!", "'.$error.'", "error");</script>';
            }
            ?>
            <div class="page-header">
              <h3 class="page-title">Order Stauts</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Order</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order Status</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                          <h4 class="card-title"><font color="green"></font></h4>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total<th>
                                <th>Mode</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>View</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                
                              $total=0;
                                    $q1="select * from orders where cop='$cop'";
                                    if($r1=mysqli_query($conn,$q1))
                                    {
                                        while($n1=mysqli_fetch_assoc($r1))
                                        {
                                            echo '<tr>
                                            <td>'.$n1['order_id'].'
                                            <td>'.$n1['product_name'].'</td>
                                            <td>'.$n1['price'].'</td>
                                            <td>'.$n1['quantity'].'</td>
                                            <td>'.$n1['total'].'<td>
                                            <td>'.$n1['payment_method'].'</td>';
                                            if($n1['prstatus'] == "Payment Received")
                                            {
                                                echo ' <td><label class="badge badge-primary">'.$n1['prstatus'].'</label></td>';   
                                            }
                                            elseif($n1['prstatus'] == "Order Done")
                                            {
                                                echo ' <td><label class="badge badge-success">'.$n1['prstatus'].'</label></td>';   
                                            }
                                            elseif($n1['prstatus'] == "Order Preparing")
                                            {
                                                echo ' <td><label class="badge badge-danger">'.$n1['prstatus'].'</label></td>';   
                                            }
                                            else
                                            {
                                                echo ' <td><label class="badge badge-danger">Pending</label></td>';   
                                            }
                                            echo '<td>'.$n1['dop'].'</td>';
                                            echo '<td><a href="order_details.php?oid='.$n1['order_id'].'" class="btn btn-sm btn-inverse-danger mr-2">View</a></td>';
                                            
                                            echo '

                                        </tr>';
                                        }
                                        
                                    }
                                  ?>                      
                              </tbody>
                            </table><br><br>
                            <div class="container-fluid w-100">
                            <form method="post">
                            <input type="hidden" name="cop" value="<?php echo $cop; ?>"/>
                            <button name="final_order" type="submit" class="btn btn-sm btn-inverse-primary mr-2">Order Done</button>
                            </form>
                          </div><br>
                          </div>
                        </div>
                                </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
        <?php include "../../footer.php"; ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/tables/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:24 GMT -->
</html>