<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$uname="";
$uid="";
$ctitle="";
$uemail="";
$cdesc="";
$oid="";
$mno="";
$rstatus=0;
$cid=$_GET['cid'];
$name=$_SESSION['aname'];
$id=$_SESSION['aid'];
$bytes = random_bytes(3);
$new=bin2hex($bytes);
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{ 
    if(isset($_GET['cid']))
    {
        $q1="select * from complain where cid='$cid'";
        if($r1=mysqli_query($conn,$q1))
        {
            while($num=mysqli_fetch_assoc($r1))
            {
                $uid=$num['id'];
                $uname=$num['name'];
                $ctitle=$num['ctitle'];
                $cdesc=$num['cdesc'];
                $uemail=$num['email'];
                $mno=$num['mno'];
                $oid=$num['oid'];
                $rstatus=(int)$num['rstatus'];
            }
        }
    }
    
}
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
    if(isset($_POST['submit']))
    {
        $creplay=$_POST['replay'];
        $q2="insert into complain_replay values('$new','$creplay','','$cid','$id','$name',current_timestamp())";
        if($r2=mysqli_query($conn,$q2))
        {
            $q4="update complain set rstatus='$rstatus' where cid='$cid'";
            if($r4=mysqli_query($conn,$q4))
            {
                $msg="Complain Replay SuccesFully";
                header("refresh:0;url=view_employee_complain.php");
            }
        }
        else
        {
            $error="Complain Not Replay SuccesFully";
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
    <title>User Complain Replay</title>
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
                        <h3 class="page-title">Employee Complain Replay</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Complain</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Complain Replay</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"> <font color="green"><?php echo $ctitle; ?> </font> | <font color="red"><?php echo $cid; ?> </font></h4>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Employee Name</label>
                                            <input type="text" class="form-control" id="uname" name="uname"
                                                value="<?php echo $uname; ?>" placeholder="Name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Order-ID(Optional)</label>
                                            <input type="number" class="form-control" value="<?php echo $oid; ?>" id="oid" name="oid"
                                                placeholder="Order ID" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description</label>
                                            <textarea class="form-control" id="desc" name="desc" rows="4"
                                                required disabled><?php echo $cdesc; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Replay</label>
                                            <textarea class="form-control" id="replay" name="replay" rows="5"
                                                required ></textarea>
                                        </div>                                       
                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Replay</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
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

    <script src="../../assets/js/file-upload.js"></script>
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