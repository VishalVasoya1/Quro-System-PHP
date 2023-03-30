<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$status="";

if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
    if(isset($_POST['update']))
    {
        $did=$_POST['did'];
        header("location:edit_designation.php?did=$did");
    }
    if(isset($_POST['remove']))
    {
        $did=$_POST['did'];
        header("location:delete_designation.php?did=$did");
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
    <title>View Designation</title>
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
                   <div class="page-header">
                        <h3 class="page-title">View Designation</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Designation</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Designation</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <?php
            if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
            {
                $q1="select * from designation";
                if($r1=mysqli_query($conn,$q1))
                {
                    while($num=mysqli_fetch_assoc($r1))
                    {
                        echo '
                        <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">'.$num['stamp'].'</h4>
                            <form class="forms-sample" method="post">
                              <div class="form-group">
                                <label for="exampleInputPassword4">Name</label>
                                <input type="text" class="form-control" id="dname" name="dname" value="'.$num['dname'].'" disabled>
                              </div>
                              <div class="form-group">
                              <label for="exampleInputPassword4">Vacancy</label>
                              <input type="text" class="form-control" id="vacancy" name="vacancy" value="'.$num['vacancy'].'" disabled>
                             </div>
                             <input type="hidden" name="did" value="'.$num['did'].'"/>
                              <button name="update" class="btn btn-success mr-2" disabled>Update</button>
                              <button name="remove" class="btn btn-danger mr-2" disabled>Remove</button>
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