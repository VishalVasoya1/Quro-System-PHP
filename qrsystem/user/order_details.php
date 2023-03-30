<?php
session_start();
include "../../conn.php";
$msg="";
$error="";
$pid="";
$pstock="";
$psize="";
$pcolor="";
$psdetail="";
$status=0;
$pimg="";
$bytes = random_bytes(3);
$new=bin2hex($bytes);
$oid="";
if(isset($_GET['oid']))
{
    $oid=$_GET['oid'];
}
else
{
    header("location:order_history.php");
}
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg'])){
    $out='';
    $totalprice=0;
    $sql = "select * from orders where order_id='$oid'";
    $result = mysqli_query($conn,$sql);
        while($row1 = mysqli_fetch_array($result))
        {
            $order_id = $row1['order_id'];
            $output='';
            $product_name = $row1['product_name'];
            $price = $row1['price'];
            $quantity = $row1['quantity'];
            $total = $row1['total'];
            $uid = $row1['uid'];
            $pid = $row1['pid'];
            $dop = $row1['dop'];
            $size=$row1['size'];
            $pcolor=$row1['pcolor'];
            $status = $row1['status'];
            $payment_method = $row1['payment_method'];
            $totalprice += $row1['total'];
            $output.='<tr><td>'.$product_name.'</td>';
            $output.='<td>₹'.$price.'</td>';
            $output.='<td>'.$quantity.'</td>';
            $output.='<td>'.$pid.'</td>';
            $output.='<td>₹'.$total.'</td></tr>';
            ?>
        <?php
            $out .= '<hr><div class="alert-secondary rounded-top p-2 mt-2">
         
            <strong>ORDER ID:'.$order_id.'</strong>
            </div>
                    <table class="table table-light">
                    <tr>
                        <th>PRODUCT NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>product Id</th>
                        <th>TOTAL</th>
                    </tr>
                    <tbody>
                        '.$output.'
                    </tbody>
                    </table>';

        }
        $p1 = "select * from products where pid='$pid'";
        $r1 = mysqli_query($conn,$p1);
        while($fet = mysqli_fetch_assoc($r1))
        {
            $pdesp = $fet['pdesc'];
            $pbrand = $fet['pbrand'];
            $pname = $fet['pname'];
            $psub = $fet['psub'];
            $psdetail=$fet['psdetail'];
            $pimg=$fet['pimg'];
        }

        $q1 ="select * from user_address where uid='$uid' LIMIT 1";
        if($r1=mysqli_query($conn,$q1))
        {
          while($n1 = mysqli_fetch_assoc($r1))
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

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/user-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:39 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
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
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))  {
        // include "themes/header.php";
    }
    else
    {
        header("location:../../login.php");
    }
    ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))    {
        include "themes/sidebar.php";
    }
    else
    {
        header("location:../../login.php");
    }
    ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">View Order Details</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Order Details</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
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
                        <!-- partial -->
                        <?php

    echo '
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-4 text-dark">
                <h5 class="mr-2 font-weight-semibold border-right pr-2 mr-2">Order ID</h5>
                <h5 class="font-weight-semibold"><font color="red">'. $order_id.'</font> </h5>
              </div>
              <div class="row">

                    
    <div class="col-md-12 mb-5">
        <div class="card rounded shadow-none border">';?>
                        <div class="row grid-margin">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="owl-carousel owl-theme rtl-carousel">
                                            <?php
                                          $arr2=explode("++", $pimg);  
                                          $len=count($arr2);
                                          for($i=0;$i<$len-1;$i++)
                                          {
                                              echo '   <div class="item">
                                              <img src="../../images/employee/products/'.$arr2[$i].'" height="200px" width="200px"/>
                                            </div>';
                                          }
                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo '
      
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-xl-flex">
                        <div class="wrapper pl-0 pl-xl-4">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="mb-0 font-weight-medium text-dark">'.$product_name.'</h4>
                            </div>
                            <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                                <i class="mdi mdi-map-marker-outline mr-2"></i>';
                                $q13="select * from subcategory where scname='$psub'";
                                if($r13=mysqli_query($conn,$q13))
                                {
                                    while($num11=mysqli_fetch_assoc($r13))
                                    {
                                        $q14="select * from category where cid='".$num11['cid']."'";
                                        if($r14=mysqli_query($conn,$q14))
                                        {
                                            while($num14=mysqli_fetch_assoc($r14))
                                            {
                                            echo '<p class="mb-0 text-muted">'.$num14['cname'].'</p>';
                                            }
                                        }
                                        echo '&nbsp;&nbsp;&nbsp;<i class="mdi mdi-map-marker-outline mr-2"></i>
                                        <p class="mb-0 text-muted">'.$psub.'</p>';
                                    }
                                }
                                echo '
                            </div>
                            <div class="wrapper d-flex align-items-start pt-3">
                                <div class="wrapper pl-0 pl-xl-2 mt-0 mt-2 mt-xl-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex align-items-center w-100">
                            <b>
                                <font color="black">Description</font>
                            </b>
                        </div>
                        <p class="text-muted mt-4">'.$pdesp.'</p>
                    </div>
                    
                </div>
            </div>
            <div class="wrapper border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">BRAND</p>
                                <h4 class="font-weight-semibold mb-0 text-dark">'.$pbrand.'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">Quantity</p>
                                <h4 class="font-weight-semibold mb-0 text-dark">'.$quantity.'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">PRICE</p>
                                <h4 class="font-weight-semibold mb-0 text-dark product-price ">'. $price.'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">Total PRICE</p>
                                <h4 class="font-weight-semibold mb-0 text-primary text-dark">'.$total.'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                        <div
                            class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                            <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                        </div>
                        <div class="wrapper pl-3">
                            <p class="mb-0 font-weight-medium text-muted">Date Of Purchase</p>
                            <h4 class="font-weight-semibold mb-0 text-primary text-dark">'.$dop.'</h4>
                        </div>
                    </div>
                       ' ;?>
                        <?php
                                   
                                    ?>
                                      
                        <div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Address Details</h4>
                                    <hr>
                                    <font color="black" size="4px"><b><?php echo $uname; ?></b></font><br>
                                    <font color="black" size="3px"><?php echo $house.','.$road.','; ?></font><br>
                                    <font color="black" size="3px"><?php echo $city.'-'.$pincode.','; ?></font><br>
                                    <font color="black" size="3px"><?php echo $state.','; ?></font><br>
                                    <font color="black" size="3px"><?php echo $country; ?></font><br><br>
                                    <h2 class="font-weight-bold"><b></b></h2>
                                   
                                </div>
                            </div>
                        </div>
                        <?php 
                        if($psdetail == "1")
                        {
                            echo '<div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <font color="red">Product Size and Color</font>
                                    </h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="pid" value="'.$pid.'">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Size</label>
                                            <input class="form-control form-control-lg" id="psize" name="psize" value="'.$size.'"
                                                required disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender"> Color</label>
                                            <input class="form-control form-control-lg" id="pcolor" name="pcolor" value="'.$pcolor.'"
                                                required disabled>
                                        </div>
                                
                                    </form>

                                </div>
                            </div>
                        </div>';
                        }
                        
                       ?>
                        <?php
                          echo '
                          <div class="container-fluid w-100">
                          <a href="view_product.php" class="btn btn-sm btn-inverse-primary mr-2">Go For Shopping</a>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     ';
 
?>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
               <?php include "../../footer.php"; ?>
                <!-- partial -->
            </div>

        </div>

    </div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>

    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>

    <script src="../../assets/js/owl-carousel.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/user-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:41 GMT -->

</html>