<?php
include "../../conn.php";
session_start();
$fcode="";
$uname="";
$umno="";
$house="";
$road="";
$pincode="";
$city="";
$state="";
$country="";
$aid="";
$dop="";
$total=0;
if(isset($_GET['fcode']))
{
  $fcode=$_GET['fcode'];
}
else
{
  header("total_order_list.php");
}
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  $q1="select * from orders where order_id='$fcode'";
  if($r1=mysqli_query($conn,$q1))
  {
    while($num=mysqli_fetch_assoc($r1))
    {
      $aid=$num['aid'];
      $dop=$num['dop'];
    }
  }
  $q2="select * from user_address where aid='$aid'";
  if($r2=mysqli_query($conn,$q2))
  {
    while($n1 = mysqli_fetch_assoc($r2))
    {
        $aid=$n1['aid'];
        $uname=$n1['uname'];
        $umno=$n1['umno'];
        $house=$n1['house'];
        $road=$n1['road'];
        $pincode=$n1['pincode'];
        $city=$n1['city'];
        $state=$n1['state'];
        $country=$n1['country'];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:41 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Invoice</title>
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
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
      //  include "themes/header.php";
    }
    else
    {
        header("location:../../login.php");
    }
    ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        <?php
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
      //  include "themes/sidebar.php";
    }
    else
    {
        header("location:../../login.php");
    }
    ?>
        <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->
       
        <!-- partial -->
        <div class="main-panel container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Invoice</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
              </nav>
            </div>
            <div class="row ">
              <div class="col-lg-12 ">
                <div class="card px-2">
                  <div class="card-body">
                    <div class="container-fluid">
                      <h3 class="text-right my-5"><font color="black" size="3px">Order ID : <?php echo $fcode; ?></font><br><br></h3>
                      <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                      <font color="black" size="4px"><b>Quro System</b></font><br><br>
                                        <font color="black" size="3px"><?php echo '351,D-Mart,Mota Varachha,'; ?></font><br>
                                        <font color="black" size="3px"><?php echo $city.'-'.$pincode.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $state.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $country; ?></font><br><br>
                      </div>
                      <div class="col-lg-3 pr-0">
                        <font color="black" size="4px"><b>Invoice To : </b></font><br><br>
                        <font color="black" size="4px"><b><?php echo $uname; ?></b></font><br>
                                        <font color="black" size="3px"><?php echo $house.','.$road.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $city.'-'.$pincode.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $state.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $country; ?></font><br><br>
                      </div>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5"><font color="black" size="3px">Invoice Date : <?php echo $dop; ?></font><br></p>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                        <table class="table">
                          <thead>
                            <tr class="bg-dark text-white">
                              <th>No.</th>
                              <th>Name</th>
                              <th class="text-right">Quantity</th>
                              <th class="text-right">Unit cost</th>
                              <th class="text-right">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                               $q4="select * from orders where order_id='$fcode'";
                               if($r4=mysqli_query($conn,$q4))
                               {
                                 while($num4=mysqli_fetch_assoc($r4))
                                 {
                                   $total=$total + $num4['total'];
                                   echo '  <tr class="text-right">
                                   <td class="text-left">'.$num4['sno'].'</td>
                                   <td class="text-left">'.$num4['product_name'].'</td>
                                   <td>&#8377;'.$num4['price'].'</td>
                                   <td>'.$num4['quantity'].'</td>
                                   <td>&#8377;'.$num4['total'].'</td>
                                 </tr>
                               ';
                                 }
                               }
                            ?>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                      <h4 class="text-right mb-5"><font color="black" size="3px">Total : 	&#8377;<?php echo $total; ?></font><br><br></h4>
                      <hr>
                    </div>
                    <div class="container-fluid w-100">
                      <a href="" onclick="window.print()"  class="btn btn-sm btn-inverse-primary mr-2">Print</a>
                      <a href="view_product.php" class="btn btn-sm btn-inverse-danger mr-2">Home</a>
                    </div><br>
                    <div class="alert alert-danger" role="alert">
                          <strong>Alret!</strong>This is System Generated Invoice.Please Verify With Our Employee...</div>
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

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:41 GMT -->
</html>