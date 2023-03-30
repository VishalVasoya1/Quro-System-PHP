<?php 
include "../../conn.php";
$cdate = date('Y-m-d');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:48:38 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.5.d">
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
        <!-- partial:partials/_navbar.html -->
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

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="d-xl-flex justify-content-between align-items-start">
                        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                            <h2 class="text-dark font-weight-bold mb-2">Employee Dashbord</h2>
                        </div>
                    </div>
                    <hr><br>
                    <div class="d-xl-flex justify-content-between align-items-start">
                        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                            <h4 class="text-dark font-weight-bold mb-2">Category</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

                            </div>
                            <div class="tab-content tab-transparent-content">
                                <div class="tab-pane fade show active" id="business-1" role="tabpanel"
                                    aria-labelledby="business-tab">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                            <div class="card shadow p-3 mb-5 bg-white rounded"
                                                style="height:220px;box-sh">
                                                <a href="view_category.php" style="text-decoration: none">
                                                    <div class="card-body text-center">
                                                        <h5 class="mb-2 text-dark font-weight-bold">Total Catagory
                                                        </h5>
                                                        <?php
                                                        $sql1="select * from category";
                                                        $result1 = mysqli_query($conn,$sql1);
                                                        $num = mysqli_num_rows($result1);
                                                        ?>
                                                        <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num;?>
                                                        </h2>
                                                        <img src="../../icon/ca1.svg" height=70 width=150 />
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                            <div class="card shadow p-3 mb-5 bg-white rounded"
                                                style="height:220px;box-sh">
                                                <a href="view_category.php" style="text-decoration: none">
                                                    <div class="card-body text-center">
                                                        <h5 class="mb-2 text-dark font-weight-bold">Total Subcatagory
                                                        </h5>
                                                        <?php
                                                        $sql="select * from subcategory";
                                                        $result = mysqli_query($conn,$sql);
                                                        $num = mysqli_num_rows($result);
                                                        ?>
                                                        <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num;?>
                                                        </h2>
                                                        <img src="../../icon/sub1.svg" height=70 width=140 />

                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="d-xl-flex justify-content-between align-items-start">
                                    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                        <h4 class="text-dark font-weight-bold mb-2">Products</h4>
                                    </div>
                                </div>
                                <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">

                            </div>
                            <div class="tab-content tab-transparent-content">
                                <div class="tab-pane fade show active" id="business-1" role="tabpanel"
                                    aria-labelledby="business-tab">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                            <div class="card shadow p-3 mb-5 bg-white rounded"
                                                style="height:220px;box-sh">
                                                <a href="view_product.php" style="text-decoration: none">
                                                    <div class="card-body text-center">
                                                        <h5 class="mb-2 text-dark font-weight-bold">Total Products
                                                        </h5>
                                                        <?php
                                                        $sql="select * from products";
                                                        $result = mysqli_query($conn,$sql);
                                                        $num = mysqli_num_rows($result);
                                                        ?>
                                                        <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num;?>
                                                        </h2>
                                                        <img src="../../icon/product1.svg" height=70 width=140 />
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                            <div class="card shadow p-3 mb-5 bg-white rounded"
                                                style="height:220px;box-sh">
                                                <a href="oos_product.php" style="text-decoration: none">
                                                    <div class="card-body text-center">
                                                        <h5 class="mb-2 text-dark font-weight-bold">Out Of Stock Product
                                                        </h5>
                                                        <?php
                                                        $sql="select * from products where pstock='0'";
                                                        $result = mysqli_query($conn,$sql);
                                                        $num = mysqli_num_rows($result);
                                                        ?>
                                                        <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num;?>
                                                        </h2>
                                                        <img src="../../icon/out1.png" height=85 width=140 />

                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    
                                <div class="d-xl-flex justify-content-between align-items-start">
                                    <h4 class="text-dark font-weight-bold mb-2"> Suggetions </h4>
                                    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                        </div>
                                        <div class="tab-content tab-transparent-content">
                                            <div class="tab-pane fade show active" id="business-1" role="tabpanel"
                                                aria-labelledby="business-tab">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                            style="height:220px;box-sh">
                                                            <a href="view_suggestion.php"
                                                                style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Total
                                                                        Suggetions</h5>
                                                                    <?php
                                                                      $sql="select * from suggestion where id='".$_SESSION['eid']."'";
                                                                      $result = mysqli_query($conn,$sql);
                                                                      $num = mysqli_num_rows($result);
                                                                      ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $num;?></h2>
                                                                    <img src="../../icon/suggestion.svg" height=70
                                                                        width=70 />

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>




                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-start">
                                            <h4 class="text-dark font-weight-bold mb-2">Complain</h4>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div
                                                    class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                                </div>
                                                <div class="tab-content tab-transparent-content">
                                                    <div class="tab-pane fade show active" id="business-1"
                                                        role="tabpanel" aria-labelledby="business-tab">
                                                        <div class="row">
                                                        <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                    style="height:220px;box-sh">
                                                                                    <a href="view_complain.php"
                                                                                        style="text-decoration: none">
                                                                                        <div
                                                                                            class="card-body text-center">
                                                                                            <h6
                                                                                                class="mb-2 text-dark font-weight-bold">
                                                                                                My Complain</h6>
                                                                                            <?php
                                                                                            $totalprice = 0;
                                                                                            $q21="select * from complain where type='EMPLOYEE' and id='".$_SESSION['eid']."'";
                                                                                            $n21=0;
                                                                                            if($r21=mysqli_query($conn,$q21))
                                                                                            {
                                                                                            $n21=mysqli_num_rows($r21);
                                                                                            }                  
                                                                                            ?>
                                                                                            <h2
                                                                                                class="mb-4 text-dark font-weight-bold">
                                                                                                <?php echo $n21;?></h2>
                                                                                            <img src="../../images/employee/icon/complain.svg"
                                                                                                height=70 width=100 />
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                    style="height:220px;box-sh">
                                                                                    <a href="pending_complain.php"
                                                                                        style="text-decoration: none">
                                                                                        <div
                                                                                            class="card-body text-center">
                                                                                            <h6
                                                                                                class="mb-2 text-dark font-weight-bold">
                                                                                                Pending Complain</h6>
                                                                                            <?php
                                                                                            $totalprice = 0;
                                                                                            $q22="select * from complain where type='EMPLOYEE' and id='".$_SESSION['eid']."' and rstatus='0'";
                                                                                            $n22=0;
                                                                                            if($r22=mysqli_query($conn,$q22))
                                                                                            {
                                                                                            $n22=mysqli_num_rows($r22);

                                                                                            }                  
                                                                                            ?>
                                                                                            <h2
                                                                                                class="mb-4 text-dark font-weight-bold">
                                                                                                <?php echo $n22;?></h2>
                                                                                            <img src="../../images/employee/icon/pcomplain.svg"
                                                                                                height=70 width=100 />
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                    style="height:220px;box-sh">
                                                                                    <a href="closed_complain.php"
                                                                                        style="text-decoration: none">
                                                                                        <div
                                                                                            class="card-body text-center">
                                                                                            <h6
                                                                                                class="mb-2 text-dark font-weight-bold">
                                                                                                Closed Complain</h6>
                                                                                            <?php
                                                                                            $totalprice = 0;
                                                                                            $q23="select * from complain where type='EMPLOYEE' and id='".$_SESSION['eid']."' and rstatus='1'";
                                                                                            $n23=0;
                                                                                            if($r23=mysqli_query($conn,$q23))
                                                                                            {
                                                                                            $n23=mysqli_num_rows($r23);
                                                                                            }                  
                                                                                            ?>
                                                                                            <h2
                                                                                                class="mb-4 text-dark font-weight-bold">
                                                                                                <?php echo $n23;?></h2>
                                                                                            <img src="../../images/employee/icon/closed.svg"
                                                                                                height=70 width=100 />
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                        <!-- content-wrapper ends -->
                                        <!-- partial:partials/_footer.html -->
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
                            <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
                            <script src="../../assets/vendors/jquery-circle-progress/js/circle-progress.min.62">
                            </script>
                            <!-- End plugin js for this page -->
                            <!-- inject:js -->
                            <script src="../../assets/js/off-canvas.js"></script>
                            <script src="../../assets/js/hoverable-collapse.js"></script>
                            <script src="../../assets/js/misc.js"></script>
                            <script src="../../assets/js/settings.js"></script>
                            <script src="../../assets/js/todolist.js"></script>
                            <!-- endinject -->
                            <!-- Custom js for this page -->
                            <script src="../../assets/js/dashboard.js"></script>
                            <!-- End custom js for this page -->
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:49:08 GMT -->

</html>