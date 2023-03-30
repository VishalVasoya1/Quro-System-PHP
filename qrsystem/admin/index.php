<?php 
session_start();
include "../../conn.php";
$cdate=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:48:38 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.5.d">

    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">


    <link rel="shortcut icon" href="../../images/other/phone.png" />
</head>

<body>
    <div class="container-scroller">

        <?php
    if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
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
            <?php
    if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
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
                            <h2 class="text-dark font-weight-bold mb-2">Admin Dashbord</h2>
                        </div>
                    </div>
                    <hr><br>
                    <div class="d-xl-flex justify-content-between align-items-start">
                        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                            <h4 class="text-dark font-weight-bold mb-2">Orders</h4>
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
                                                <a href="today_order_list.php" style="text-decoration: none">
                                                    <div class="card-body text-center">
                                                        <h5 class="mb-2 text-dark font-weight-bold">Today Orders</h5>
                                                        <?php
                                $sql="select * from orders";
                                $result = mysqli_query($conn,$sql);
                                $count=0;
                                  while($num1=mysqli_fetch_assoc($result))
                                  {
                                    $tdate=$num1['dop'];
                                    $tdate=substr($tdate,0,10);
                                    if($cdate == $tdate)
                                    {
                                      $count++;
                                    }
                                  }
                                ?>
                                                        <h2 class="mb-4 text-dark font-weight-bold"><?php echo $count;?>
                                                        </h2>
                                                        <img src="../../images/admin/icon/order icon.png" height=70
                                                            width=70 />
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                            <div class="card shadow p-3 mb-5 bg-white rounded"
                                                style="height:220px;box-sh">
                                                <a href="total_order_list.php" style="text-decoration: none">
                                                    <div class="card-body text-center">
                                                        <h5 class="mb-2 text-dark font-weight-bold">My Orders</h5>
                                                        <?php
                                $sql="select * from orders";
                                $result = mysqli_query($conn,$sql);
                                $num = mysqli_num_rows($result);
                                ?>
                                                        <h2 class="mb-4 text-dark font-weight-bold"><?php echo $num;?>
                                                        </h2>
                                                        <img src="../../images/admin/icon/order icon.png" height=70
                                                            width=70 />

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-xl-flex justify-content-between align-items-start">
                                    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                        <h4 class="text-dark font-weight-bold mb-2">User</h4>
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
                                                            <a href="user_list.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Total
                                                                        User</h5>
                                                                    <?php
                            $sql1="select * from user_register";
                            $result1 = mysqli_query($conn,$sql1);
                            $num = mysqli_num_rows($result1);
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $num;?></h2>
                                                                    <img src="../../icon/crowd.svg"
                                                                        height=70 width=150 />
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                            style="height:220px;box-sh">
                                                            <a href="active_user.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Active User</h5>
                                                                    <?php
                                                                    $c=0;
                            $q11="select * from user_register";
                            if($r11 = mysqli_query($conn,$q11))
                            {
                                while($n11=mysqli_fetch_assoc($r11))
                                {
                                    if($n11['account_status']=="1" || $n11['account_status']=="11")
                                    {
                                        $c=$c+1;
                                    }
                                }
                            }
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $c;?></h2>
                                                                        <img src="../../icon/user.svg"
                                                                        height=70 width=140 />

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                            style="height:220px;box-sh">
                                                            <a href="deactive_user.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">DeActive User</h5>
                                                                    <?php
                                                                    $c=0;
                            $q11="select * from user_register";
                            if($r11 = mysqli_query($conn,$q11))
                            {
                                while($n11=mysqli_fetch_assoc($r11))
                                {
                                    if($n11['account_status']=="0")
                                    {
                                        $c=$c+1;
                                    }
                                }
                            }
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $c;?></h2>
                                                                    <img src="../../icon/deactive.svg"
                                                                        height=70 width=140 />

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                            style="height:220px;box-sh">
                                                            <a href="blocked_user.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Blocked User</h5>
                                                                    <?php
                                                                    $c=0;
                            $q11="select * from user_register";
                            if($r11 = mysqli_query($conn,$q11))
                            {
                                while($n11=mysqli_fetch_assoc($r11))
                                {
                                    if($n11['account_status']=="10")
                                    {
                                        $c=$c+1;
                                    }
                                }
                            }
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $c;?></h2>
                                                                    <img src="../../icon/block.svg"
                                                                        height=70 width=140 />

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="d-xl-flex justify-content-between align-items-start">
                                    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                        <h4 class="text-dark font-weight-bold mb-2">Employee</h4>
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
                                                            <a href="employee_list.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Total
                                                                        Employees</h5>
                                                                    <?php
                            $sql1="select * from employee";
                            $result1 = mysqli_query($conn,$sql1);
                            $num = mysqli_num_rows($result1);
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $num;?></h2>
                                                                    <img src="../../icon/emp.svg"
                                                                        height=70 width=150 />
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                            style="height:220px;box-sh">
                                                            <a href="active_employee.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Active Employees</h5>
                                                                    <?php
                                                                    $c=0;
                            $q11="select * from employee";
                            if($r11 = mysqli_query($conn,$q11))
                            {
                                while($n11=mysqli_fetch_assoc($r11))
                                {
                                    if($n11['account_status']=="1")
                                    {
                                        $c=$c+1;
                                    }
                                }
                            }
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $c;?></h2>
                                                                        <img src="../../icon/active.svg"
                                                                        height=70 width=140 />

                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                            style="height:220px;box-sh">
                                                            <a href="deactive_employee.php" style="text-decoration: none">
                                                                <div class="card-body text-center">
                                                                    <h5 class="mb-2 text-dark font-weight-bold">Blocked Employee</h5>
                                                                    <?php
                                                                    $c=0;
                            $q11="select * from user_register";
                            if($r11 = mysqli_query($conn,$q11))
                            {
                                while($n11=mysqli_fetch_assoc($r11))
                                {
                                    if($n11['account_status']=="0")
                                    {
                                        $c=$c+1;
                                    }
                                }
                            }
                            ?>
                                                                    <h2 class="mb-4 text-dark font-weight-bold">
                                                                        <?php echo $c;?></h2>
                                                                    <img src="../../icon/block.svg"
                                                                        height=70 width=140 />

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
                                                        <img src="../../icon/out1.png" height=70 width=140 />

                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                                                                <div
                                                                                    class="d-xl-flex justify-content-between align-items-start">
                                                                                    <div
                                                                                        class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                                                                        <h4
                                                                                            class="text-dark font-weight-bold mb-2">
                                                                                            Payments</h4>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div
                                                                                            class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                                                                        </div>
                                                                                        <div
                                                                                            class="tab-content tab-transparent-content">
                                                                                            <div class="tab-pane fade show active"
                                                                                                id="business-1"
                                                                                                role="tabpanel"
                                                                                                aria-labelledby="business-tab">
                                                                                                <div class="row">

                                                                                                    <div
                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                            style="height:220px;box-sh">
                                                                                                            <a href="today_collection_online.php"
                                                                                                                style="text-decoration: none">
                                                                                                                <div
                                                                                                                    class="card-body text-center">
                                                                                                                    <h6
                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                        Today
                                                                                                                        Online
                                                                                                                        Payment
                                                                                                                    </h6>
                                                                                                                    <?php
                                                                        $t41 = 0;
                                                                        $q41="select * from orders where status='order Placed' and payment_method='Paytm'";
                                                                        if($r41 = mysqli_query($conn,$q41))
                                                                        {
                                                                          $n41 = mysqli_num_rows($r41);
                                                                          while($num41 = mysqli_fetch_assoc($r41))
                                                                          {
                                                                            $tdate=$num41['dop'];
                                                                            $tdate=substr($tdate,0,10);
                                                                            if($cdate == $tdate)
                                                                            {
                                                                              $t41 += $num41['total']; 
                                                                            }
                                                                          }   
                                                                        }
                                                                                                  
                                                                    ?>
                                                                                                                    <h2
                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                        <?php echo $t41;?>
                                                                                                                    </h2>
                                                                                                                    <img src="../../images/admin/icon/ponline.png"
                                                                                                                        height=70
                                                                                                                        width=100 />

                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                            style="height:220px;box-sh">
                                                                                                            <a href="today_collection_offline.php"
                                                                                                                style="text-decoration: none">
                                                                                                                <div
                                                                                                                    class="card-body text-center">
                                                                                                                    <h6
                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                        Today
                                                                                                                        COD
                                                                                                                        Payment
                                                                                                                    </h6>
                                                                                                                    <?php
                                                                        $t43 = 0;
                                                                        $q43="select * from orders where status='order Placed' and payment_method='COD'";
                                                                        if($r43 = mysqli_query($conn,$q43))
                                                                        {
                                                                          $n43 = mysqli_num_rows($r43);
                                                                          while($num43 = mysqli_fetch_assoc($r43))
                                                                          {
                                                                            $tdate3=$num43['dop'];
                                                                            $tdate3=substr($tdate3,0,10);
                                                                            if($cdate == $tdate3)
                                                                            {
                                                                              $t43 += $num43['total']; 
                                                                            }
                                                                          }   
                                                                        }
                                                                                                  
                                                                    ?>
                                                                                                                    <h2
                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                        <?php echo $t43;?>
                                                                                                                    </h2>
                                                                                                                    <img src="../../images/admin/icon/offline1.png"
                                                                                                                        height=70
                                                                                                                        width=80 />
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                            style="height:220px;box-sh">
                                                                                                            <a href="view_collection_online.php"
                                                                                                                style="text-decoration: none">
                                                                                                                <div
                                                                                                                    class="card-body text-center">
                                                                                                                    <h6
                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                        Total
                                                                                                                        Online
                                                                                                                        Payment
                                                                                                                    </h6>
                                                                                                                    <?php
                                                                        $t42 = 0;
                                                                        $q42="select * from orders where status='order Placed' and payment_method='Paytm'";
                                                                        if($r42 = mysqli_query($conn,$q42))
                                                                        {
                                                                          $n42 = mysqli_num_rows($r42);
                                                                          while($num42 = mysqli_fetch_assoc($r42))
                                                                          {
                                                                              $t42 += $num42['total']; 
                                                                          }   
                                                                        }
                                                                                                  
                                                                    ?>
                                                                                                                    <h2
                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                        <?php echo $t42;?>
                                                                                                                    </h2>
                                                                                                                    <img src="../../images/admin/icon/ponline.png"
                                                                                                                        height=70
                                                                                                                        width=100 />
                                                                                                                </div>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                            style="height:220px;box-sh">
                                                                                                            <a href="view_collection_offline.php"
                                                                                                                style="text-decoration: none">
                                                                                                                <div
                                                                                                                    class="card-body text-center">
                                                                                                                    <h6
                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                        Total
                                                                                                                        COD
                                                                                                                        Payment
                                                                                                                    </h6>
                                                                                                                    <?php
                                                                        $t43 = 0;
                                                                        $q43="select * from orders where status='order Placed' and payment_method='COD'";
                                                                        if($r43 = mysqli_query($conn,$q43))
                                                                        {
                                                                          $n43 = mysqli_num_rows($r43);
                                                                          while($num43 = mysqli_fetch_assoc($r43))
                                                                          {
                                                                              $t43 += $num43['total'];
                                                                          }   
                                                                        }
                                                                                                  
                                                                    ?>
                                                                                                                    <h2
                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                        <?php echo $t43;?>
                                                                                                                    </h2>
                                                                                                                    <img src="../../images/admin/icon/offline1.png"
                                                                                                                        height=70
                                                                                                                        width=100 />
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div
                                                                                                class="d-xl-flex justify-content-between align-items-start">
                                                                                                <div
                                                                                                    class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                                                                                    <h4
                                                                                                        class="text-dark font-weight-bold mb-2">
                                                                                                        User Suggestion
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <div
                                                                                                        class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tab-content tab-transparent-content">
                                                                                                        <div class="tab-pane fade show active"
                                                                                                            id="business-1"
                                                                                                            role="tabpanel"
                                                                                                            aria-labelledby="business-tab">
                                                                                                            <div
                                                                                                                class="row">

                                                                                                                <div
                                                                                                                    class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                    <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                        style="height:220px;box-sh">
                                                                                                                        <a href="view_user_suggestion.php"
                                                                                                                            style="text-decoration: none">
                                                                                                                            <div
                                                                                                                                class="card-body text-center">
                                                                                                                                <h6
                                                                                                                                    class="mb-2 text-dark font-weight-bold">
                                                                                                                                    User
                                                                                                                                    Suggestions
                                                                                                                                </h6>
                                                                                                                                <?php
                            $totalprice = 0;
                            $q31="select * from suggestion where desig='USER'";
                            $n31=0;
                             if($r31=mysqli_query($conn,$q31))
                             {
                               $n31=mysqli_num_rows($r31);
                             }                  
                            ?>
                                                                                                                                <h2
                                                                                                                                    class="mb-4 text-dark font-weight-bold">
                                                                                                                                    <?php echo $n31;?>
                                                                                                                                </h2>
                                                                                                                                <img src="../../icon/suggestion.svg"
                                                                                                                                    height=70
                                                                                                                                    width=70 />
                                                                                                                            </div>
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="d-xl-flex justify-content-between align-items-start">
                                                                                                            <div
                                                                                                                class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                                                                                                <h4
                                                                                                                    class="text-dark font-weight-bold mb-2">
                                                                                                                    User
                                                                                                                    Complain
                                                                                                                </h4>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <div
                                                                                                                    class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="tab-content tab-transparent-content">
                                                                                                                    <div class="tab-pane fade show active"
                                                                                                                        id="business-1"
                                                                                                                        role="tabpanel"
                                                                                                                        aria-labelledby="business-tab">
                                                                                                                        <div
                                                                                                                            class="row">
                                                                                                                            <div
                                                                                                                                class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                    style="height:220px;box-sh">
                                                                                                                                    <a href="view_user_complain.php"
                                                                                                                                        style="text-decoration: none">
                                                                                                                                        <div
                                                                                                                                            class="card-body text-center">
                                                                                                                                            <h6
                                                                                                                                                class="mb-2 text-dark font-weight-bold">
                                                                                                                                                User
                                                                                                                                                Complain
                                                                                                                                            </h6>
                                                                                                                                            <?php
                                                                                            $totalprice = 0;
                                                                                            $q21="select * from complain where type='USER'";
                                                                                            $n21=0;
                                                                                            if($r21=mysqli_query($conn,$q21))
                                                                                            {
                                                                                            $n21=mysqli_num_rows($r21);
                                                                                            }                  
                                                                                            ?>
                                                                                                                                            <h2
                                                                                                                                                class="mb-4 text-dark font-weight-bold">
                                                                                                                                                <?php echo $n21;?>
                                                                                                                                            </h2>
                                                                                                                                            <img src="../../images/employee/icon/complain.svg"
                                                                                                                                                height=70
                                                                                                                                                width=100 />
                                                                                                                                        </div>
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                            <div
                                                                                                                                class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                    style="height:220px;box-sh">
                                                                                                                                    <a href="user_pending_complain.php"
                                                                                                                                        style="text-decoration: none">
                                                                                                                                        <div
                                                                                                                                            class="card-body text-center">
                                                                                                                                            <h6
                                                                                                                                                class="mb-2 text-dark font-weight-bold">
                                                                                                                                                Pending
                                                                                                                                                Complain
                                                                                                                                            </h6>
                                                                                                                                            <?php
                                                                                            $totalprice = 0;
                                                                                            $q22="select * from complain where type='USER' and rstatus='0'";
                                                                                            $n22=0;
                                                                                            if($r22=mysqli_query($conn,$q22))
                                                                                            {
                                                                                            $n22=mysqli_num_rows($r22);

                                                                                            }                  
                                                                                            ?>
                                                                                                                                            <h2
                                                                                                                                                class="mb-4 text-dark font-weight-bold">
                                                                                                                                                <?php echo $n22;?>
                                                                                                                                            </h2>
                                                                                                                                            <img src="../../images/employee/icon/pcomplain.svg"
                                                                                                                                                height=70
                                                                                                                                                width=100 />
                                                                                                                                        </div>
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                    style="height:220px;box-sh">
                                                                                                                                    <a href="user_closed_complain.php"
                                                                                                                                        style="text-decoration: none">
                                                                                                                                        <div
                                                                                                                                            class="card-body text-center">
                                                                                                                                            <h6
                                                                                                                                                class="mb-2 text-dark font-weight-bold">
                                                                                                                                                Closed
                                                                                                                                                Complain
                                                                                                                                            </h6>
                                                                                                                                            <?php
                                                                                            $totalprice = 0;
                                                                                            $q23="select * from complain where type='USER' and rstatus='1'";
                                                                                            $n23=0;
                                                                                            if($r23=mysqli_query($conn,$q23))
                                                                                            {
                                                                                            $n23=mysqli_num_rows($r23);
                                                                                            }                  
                                                                                            ?>
                                                                                                                                            <h2
                                                                                                                                                class="mb-4 text-dark font-weight-bold">
                                                                                                                                                <?php echo $n23;?>
                                                                                                                                            </h2>
                                                                                                                                            <img src="../../images/employee/icon/closed.svg"
                                                                                                                                                height=70
                                                                                                                                                width=100 />
                                                                                                                                        </div>
                                                                                                                                    </a>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="d-xl-flex justify-content-between align-items-start">
                                                                                                                        <div
                                                                                                                            class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                                                                                                            <h4
                                                                                                                                class="text-dark font-weight-bold mb-2">
                                                                                                                                Employee
                                                                                                                                Suggestion
                                                                                                                            </h4>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div
                                                                                                                            class="col-md-12">
                                                                                                                            <div
                                                                                                                                class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="tab-content tab-transparent-content">
                                                                                                                                <div class="tab-pane fade show active"
                                                                                                                                    id="business-1"
                                                                                                                                    role="tabpanel"
                                                                                                                                    aria-labelledby="business-tab">
                                                                                                                                    <div
                                                                                                                                        class="row">

                                                                                                                                        <div
                                                                                                                                            class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                            <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                                style="height:220px;box-sh">
                                                                                                                                                <a href="view_employee_suggestion.php"
                                                                                                                                                    style="text-decoration: none">
                                                                                                                                                    <div
                                                                                                                                                        class="card-body text-center">
                                                                                                                                                        <h6
                                                                                                                                                            class="mb-2 text-dark font-weight-bold">
                                                                                                                                                            Employee
                                                                                                                                                            Suggestions
                                                                                                                                                        </h6>
                                                                                                                                                        <?php
                            $totalprice = 0;
                            $q31="select * from suggestion where desig='EMPLOYEE'";
                            $n31=0;
                             if($r31=mysqli_query($conn,$q31))
                             {
                               $n31=mysqli_num_rows($r31);
                             }                  
                            ?>
                                                                                                                                                        <h2
                                                                                                                                                            class="mb-4 text-dark font-weight-bold">
                                                                                                                                                            <?php echo $n31;?>
                                                                                                                                                        </h2>
                                                                                                                                                        <img src="../../icon/suggestion.svg"
                                                                                                                                                            height=70
                                                                                                                                                            width=70 />
                                                                                                                                                    </div>
                                                                                                                                                </a>
                                                                                                                                            </div>
                                                                                                                                        </div>

                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                                <div
                                                                                                                                    class="d-xl-flex justify-content-between align-items-start">
                                                                                                                                    <div
                                                                                                                                        class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                                                                                                                                        <h4
                                                                                                                                            class="text-dark font-weight-bold mb-2">
                                                                                                                                            Employee
                                                                                                                                            Complain
                                                                                                                                        </h4>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="row">
                                                                                                                                    <div
                                                                                                                                        class="col-md-12">
                                                                                                                                        <div
                                                                                                                                            class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                                                                                                                                        </div>
                                                                                                                                        <div
                                                                                                                                            class="tab-content tab-transparent-content">
                                                                                                                                            <div class="tab-pane fade show active"
                                                                                                                                                id="business-1"
                                                                                                                                                role="tabpanel"
                                                                                                                                                aria-labelledby="business-tab">
                                                                                                                                                <div
                                                                                                                                                    class="row">
                                                                                                                                                    <div
                                                                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                                            style="height:220px;box-sh">
                                                                                                                                                            <a href="view_employee_complain.php"
                                                                                                                                                                style="text-decoration: none">
                                                                                                                                                                <div
                                                                                                                                                                    class="card-body text-center">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                                                                        Employee
                                                                                                                                                                        Complain
                                                                                                                                                                    </h6>
                                                                                                                                                                    <?php
                                                                                            $totalprice = 0;
                                                                                            $q21="select * from complain where type='EMPLOYEE'";
                                                                                            $n21=0;
                                                                                            if($r21=mysqli_query($conn,$q21))
                                                                                            {
                                                                                            $n21=mysqli_num_rows($r21);
                                                                                            }                  
                                                                                            ?>
                                                                                                                                                                    <h2
                                                                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                                                                        <?php echo $n21;?>
                                                                                                                                                                    </h2>
                                                                                                                                                                    <img src="../../images/employee/icon/complain.svg"
                                                                                                                                                                        height=70
                                                                                                                                                                        width=100 />
                                                                                                                                                                </div>
                                                                                                                                                            </a>
                                                                                                                                                        </div>
                                                                                                                                                    </div>

                                                                                                                                                    <div
                                                                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                                            style="height:220px;box-sh">
                                                                                                                                                            <a href="employee_pending_complain.php"
                                                                                                                                                                style="text-decoration: none">
                                                                                                                                                                <div
                                                                                                                                                                    class="card-body text-center">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                                                                        Pending
                                                                                                                                                                        Complains
                                                                                                                                                                    </h6>
                                                                                                                                                                    <?php
                                                                                            $totalprice = 0;
                                                                                            $q22="select * from complain where type='EMPLOYEE' and rstatus='0'";
                                                                                            $n22=0;
                                                                                            if($r22=mysqli_query($conn,$q22))
                                                                                            {
                                                                                            $n22=mysqli_num_rows($r22);

                                                                                            }                  
                                                                                            ?>
                                                                                                                                                                    <h2
                                                                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                                                                        <?php echo $n22;?>
                                                                                                                                                                    </h2>
                                                                                                                                                                    <img src="../../images/employee/icon/pcomplain.svg"
                                                                                                                                                                        height=70
                                                                                                                                                                        width=100 />
                                                                                                                                                                </div>
                                                                                                                                                            </a>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div
                                                                                                                                                        class="col-xl-3 col-lg-3 col-sm-2 grid-margin stretch-card">
                                                                                                                                                        <div class="card shadow p-3 mb-5 bg-white rounded"
                                                                                                                                                            style="height:220px;box-sh">
                                                                                                                                                            <a href="employee_closed_complain.php"
                                                                                                                                                                style="text-decoration: none">
                                                                                                                                                                <div
                                                                                                                                                                    class="card-body text-center">
                                                                                                                                                                    <h6
                                                                                                                                                                        class="mb-2 text-dark font-weight-bold">
                                                                                                                                                                        Closed
                                                                                                                                                                        Complains
                                                                                                                                                                    </h6>
                                                                                                                                                                    <?php
                                                                                            $totalprice = 0;
                                                                                            $q23="select * from complain where type='EMPLOYEE' and rstatus='1'";
                                                                                            $n23=0;
                                                                                            if($r23=mysqli_query($conn,$q23))
                                                                                            {
                                                                                            $n23=mysqli_num_rows($r23);
                                                                                            }                  
                                                                                            ?>
                                                                                                                                                                    <h2
                                                                                                                                                                        class="mb-4 text-dark font-weight-bold">
                                                                                                                                                                        <?php echo $n23;?>
                                                                                                                                                                    </h2>
                                                                                                                                                                    <img src="../../images/employee/icon/closed.svg"
                                                                                                                                                                        height=70
                                                                                                                                                                        width=100 />
                                                                                                                                                                </div>
                                                                                                                                                            </a>
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
                                                                                                        <script
                                                                                                            src="../../assets/vendors/js/vendor.bundle.base.js">
                                                                                                        </script>
                                                                                                        <!-- endinject -->
                                                                                                        <!-- Plugin js for this page -->
                                                                                                        <script
                                                                                                            src="../../assets/vendors/chart.js/Chart.min.js">
                                                                                                        </script>
                                                                                                        <script
                                                                                                            src="../../assets/vendors/jquery-circle-progress/js/circle-progress.min.62">
                                                                                                        </script>
                                                                                                        <!-- End plugin js for this page -->
                                                                                                        <!-- inject:js -->
                                                                                                        <script
                                                                                                            src="../../assets/js/off-canvas.js">
                                                                                                        </script>
                                                                                                        <script
                                                                                                            src="../../assets/js/hoverable-collapse.js">
                                                                                                        </script>
                                                                                                        <script
                                                                                                            src="../../assets/js/misc.js">
                                                                                                        </script>
                                                                                                        <script
                                                                                                            src="../../assets/js/settings.js">
                                                                                                        </script>
                                                                                                        <script
                                                                                                            src="../../assets/js/todolist.js">
                                                                                                        </script>
                                                                                                        <!-- endinject -->
                                                                                                        <!-- Custom js for this page -->
                                                                                                        <script
                                                                                                            src="../../assets/js/dashboard.js">
                                                                                                        </script>
                                                                                                        <!-- End custom js for this page -->
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:49:08 GMT -->

</html>