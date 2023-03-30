<?php
include "../../conn.php";
session_start();
$total=0;
$cdate=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/tables/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:23 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Total Collection</title>
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
            <div class="page-header">
              <h3 class="page-title">Today Payments</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Payment</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Today Payments</li>
                </ol>
              </nav>
            </div>
            <div class="row">
                <?php
                $q2="select distinct(cop),dop from orders where eid='".$_SESSION['eid']."'";
                if($r2=mysqli_query($conn,$q2))
                {
                    while($n2=mysqli_fetch_assoc($r2))
                    {
                        $tdate=$n2['dop'];
                        $tdate=substr($tdate,0,10);
                        if($tdate == $cdate)
                        {
                        echo '<div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                          <h4 class="card-title"><font color="green">'.$n2['dop'].'</font></h4>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Cart ID</th>
                                  <th>Product Name</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Total<th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>';
                              
                                    $q1="select * from orders where cop='".$n2['cop']."'";
                                    if($r1=mysqli_query($conn,$q1))
                                    {
                                        while($n1=mysqli_fetch_assoc($r1))
                                        {
                                            $total=$total + $n1['total'];
                                            echo '
                                            <tr>
                                            <td>'.$n1['cid'].'</td>
                                            <td>'.$n1['product_name'].'</td>
                                            <td>'.$n1['price'].'</td>
                                            <td>'.$n1['quantity'].'</td>
                                            <td>'.$n1['total'].'<td>';
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
                                            echo '

                                          </tr>';
                                        }
                                        
                                    }
                                    
                                    
                                  echo '
                              
                              </tbody>
                            </table><br><br>
                            <div class="container-fluid w-100">
                            <b><font color="black" size="3px">Total : 	&#8377;'.$total.'</font></b>&nbsp;&nbsp;&nbsp;
                            <a href="order_success.php?fcode='.$n2['cop'].'" class="btn btn-sm btn-inverse-primary mr-2">View Invoice</a>
                            <a href="view_payment_details.php?pcode='.$n2['cop'].'" class="btn btn-sm btn-inverse-danger mr-2">View Details</a>
                          </div><br>';
                            echo '
                          </div>
                        </div>
                      </div>';
                                }
                    }
                    }
                  
                ?>
              <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <form method="post">
                                    <div class="card-body">
                                        <h4 class="card-title">Final Amount</h4>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Final Amount</label>
                                            <input type="text" class="form-control" id="adhar"
                                                value="<?php echo '&#8377;'. $total;?>" name="total" disabled>
                                        </div>
                                        <?php
                                            echo '<a href="index.php" class="btn btn-sm btn-inverse-primary mr-2 float-right">Go To Dashboard</a>'; 
                                        ?>
                                    </div>
                                </form>
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