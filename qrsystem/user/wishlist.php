<?php
session_start();
include "../../conn.php";
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_POST['go_shopping']))
    {
        header("location:view_product.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/product-catalogue.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:43 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wishlist</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <!-- End Plugin css for this page -->
    <!-- Layout styles -->
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../../images/other/phone.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php
    if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
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
    if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-nav-wrapper row">
                                        <div class="col-lg-4 col-md-5">
                                            <ul class="nav product-filter-nav">
                                                <li class="active"><a href="#">USER WISHLIST</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-8 col-md-7 product-filter-options">
                                            <ul class="account-user-info ml-auto">
                                                <li><a href="wishlist.php" class="text-dark">Wishlist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row product-item-wrapper">
                                        <?php
                    $q11="select * from wishlist where uid='".$_SESSION['uid']."'";
                    if($r11=mysqli_query($conn,$q11))
                    {
                        $np=mysqli_num_rows($r11);
                        if($np == 0)
                        {
                        
                            echo '<div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <form method="post">
                                    <div class="card-body">
                                       <center> <h4 class="card-title">Your Wishlist is Empty....</h4></center>
                                        <div class="form-group">
                                        <center><button  name="go_shopping" class="btn btn-sm btn-inverse-primary mr-2" style="height:50px;width:250px">GO FOR SHOPPING</button></center>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
                        }
                        while($n11=mysqli_fetch_assoc($r11))
                        { 
                            $pid=$n11['pid'];
                            $q1="select * from products where pid='$pid'";
                            if($r1=mysqli_query($conn,$q1))
                            {
                                while($n1=mysqli_fetch_assoc($r1))
                                {
                                    echo '
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 product-item">
                                <div class="card">
                                  <div class="card-body">
                                    <div class="action-holder">
                                      <div class="sale-badge bg-success">New</div>
                                      <span class="favorite-button"><i class="mdi mdi-heart-outline"></i></span>
                                    </div>
                                  <a href="view_product_detail.php?pid='.$n1['pid'].'" style="width:310px"> <img class="product_image" src="../../images/employee/products/'.$n1['ptitleimg'].'" alt="product image" height="240px"></a>
                                    <p class="product-title text-dark">'.$n1['pname'].'</p>
                                    <p class="product-price text-dark">&#8377;'.$n1['psprice'].'</p>
                                    <p class="product-actual-price">&#8377;'.$n1['poprice'].'</p>
                                    <ul class="product-variation">';
                                        $q2="select DISTINCT psize from product_size where pid='".$n1['pid']."'";
                                        if($r2=mysqli_query($conn,$q2))
                                        {
                                            while($n2=mysqli_fetch_assoc($r2))
                                            {
                                                echo ' <li><a href="#">'.$n2['psize'].'</a></li>';
                                            }
                                        }
                                      echo '
                                    </ul>
                                    <p class="product-description font-weight-dark">Product Brand: '.$n1['pbrand'].'</p>
                                  </div>
                                </div>
                              </div>';
                                }
                            }
                          }
                        }
                    ?>

                                    </div>
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

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/product-catalogue.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:48 GMT -->

</html>