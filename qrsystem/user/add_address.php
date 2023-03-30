<?php 
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$uname="";
$uemail="";
$umno="";
$upass="";
$ugender="";
$uimg="";
$uid="";
$bytes = random_bytes(3);
$new=bin2hex($bytes);
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    $uid=$_SESSION['uid'];
    $q1="select * from user_register where uid='$uid'";
    if($r1=mysqli_query($conn,$q1))
    {
        while($num=mysqli_fetch_assoc($r1))
        {
            $uname=$num['uname'];
            $uemail=$num['uemail'];
            $umno=$num['umno'];
            $ugender=$num['gender'];
            $uimg=$num['uimg'];
        }
    }
    if(isset($_POST['add_address']))
    {
        $house=$_POST['house'];
        $road=$_POST['road'];
        $pincode=$_POST['pincode'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $country=$_POST['country'];
        $q13 ="select * from user_address where uid='".$_SESSION['uid']."' and status='1'";
        if($r13=mysqli_query($conn,$q13))
        {
            $n13=mysqli_num_rows($r13);
            if($n13>=1)
            {
                $q11="insert into user_address values('$new','$uid','$uname','$umno','$house','$road','$pincode','$city','$state','$country','0',current_timestamp())";
                if($r11=mysqli_query($conn,$q11))
                {
                    $msg = "Address saved successfully...";
                    header("refresh:0;url=change_address.php");

                }
                else
                {
                    $error = "Address Not Saved SuccesFully...";
                    header("refresh:0;url=add_address.php");
                }
            }
            else
            {
                $q11="insert into user_address values('$new','$uid','$uname','$umno','$house','$road','$pincode','$city','$state','$country','1',current_timestamp())";
                if($r11=mysqli_query($conn,$q11))
                {
                    $msg = "Address saved successfully...";
                    header("refresh:0;url=change_address.php");

                }
                else
                {
                    $error = "Address Not Saved SuccesFully...";
                    header("refresh:0;url=add_address.php");
                }
            }
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
    <title>Add Address</title>
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
            <!-- partial:../../partials/_sidebar.html -->
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
            <!-- partial -->
            <div class="main-panel">
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

                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Add Address</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Address</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Address</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="post">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Address Details</h4>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $uname;?>"
                                                id="adhar" name="uname" disabled required placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Mobile No.</label>
                                            <input type="text" class="form-control" value="<?php echo $umno;?>"
                                                id="adhar" name="umno" disabled required placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">House No.,Building Name</label>
                                            <input type="text" class="form-control" id="adhar" name="house" required
                                                placeholder="House No.,Building Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Road Name,Area,Colony</label>
                                            <input type="text" class="form-control" id="adhar" name="road" required
                                                placeholder="Road Name,Area,Colony">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Pincode</label>
                                            <input type="text" class="form-control" pattern="[0-9]{6}" maxlength="6"
                                                id="adhar" name="pincode" required placeholder="Pincode">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">City</label>
                                            <input type="text" class="form-control" id="adhar" name="city" required
                                                placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">State</label>
                                            <input type="text" class="form-control" id="adhar" name="state" required
                                                placeholder="State">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Country</label>
                                            <input type="text" class="form-control" id="adhar" name="country" required
                                                placeholder="Country">
                                        </div>
                                        <button type="submit" name="add_address"
                                            class="btn btn-sm btn-inverse-primary mr-2">Add Address</button>
                                         <button class="btn btn-sm btn-danger mr-2" name="go_to_profile"><a href="user_profile.php" style="color:white">Go To Profile</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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