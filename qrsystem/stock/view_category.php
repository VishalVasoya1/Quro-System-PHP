<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$status="";

if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    $q1="select * from employee where eid='".$_SESSION['eid']."'";
    if($r1=mysqli_query($conn,$q1))
    {
        while($num=mysqli_fetch_assoc($r1))
        {
            $stamp=$num['stamp'];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Category</title>
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

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
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
                        <h3 class="page-title">View Categories</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Categories</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <?php
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
                $q1="select * from category";
                if($r1=mysqli_query($conn,$q1))
                {
                    while($num=mysqli_fetch_assoc($r1))
                    {
                        echo '
                        <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title"><font color="red">'.$num['cid'].' </font>| '.$num['stamp'].'</h4>
                            
                            <label for="exampleInputPassword4"><b><font color="black">Category Name</font></b></label><br>
                            <form class="forms-sample" method="post">
                              <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" value="'.$num['cname'].'" disabled>
                              </div>
                              <button name="update" class="btn btn-success mr-3"><a style="color:white" href="update_category.php?cid='.$num['cid'].'"> Update</a></button>
                              <button name="remove" class="btn btn-danger mr-4"><a style="color:white" href="delete_category.php?cid='.$num['cid'].'">Remove</a></button><br><br>
                              
                              <label for="exampleInputPassword4"><b><font color="black">SubCategory Name</font></b></label><br>';
                              $q2="select * from subcategory where cid='".$num['cid']."'";
                              
                              if($r2=mysqli_query($conn,$q2))
                              {
                                  while($num2=mysqli_fetch_assoc($r2))
                                  {
                                      echo '
                                      <div class="form-group col-md-6 grid-margin stretch-card">
                                      <input type="text" class="form-control" id="title" name="title" value="'.$num2['scname'].'" disabled>&nbsp;&nbsp;&nbsp;&nbsp;
                                      <button name="update" class="btn btn-success mr-3"><a style="color:white" href="update_subcategory.php?scid='.$num2['scid'].'">Update</a></button>
                              <button name="remove" class="btn btn-danger mr-4"><a style="color:white" href="delete_subcategory.php?scid='.$num2['scid'].'">Remove</a></button><br><br>
                                    </div>
                                   ';
                                  }
                              }
                            echo '
                            </form>
                          </div>
                        </div>
                      </div>
                    ';
                    }
                }
            }
             ?>
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

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->

</html>