<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$ename="";
$eemail="";
$emno="";
$epass="";
$egender="";
$eimg="";
$eoccupation="";
$eexp="";
$eskills="";
$esalary="";
$etime="";
$otime="";
$aadharno="";
$aadhar1="";
$aadhar2="";
$resume="";
if(isset($_GET['eid']))
{
    $eid=$_GET['eid'];
    $q1="select * from employee where eid='$eid'";
    if($r1=mysqli_query($conn,$q1))
    {
        while($num=mysqli_fetch_assoc($r1))
        {
            $ename=$num['ename'];
            $eemail=$num['eemail'];
            $emno=$num['emno'];
            $epass=$num['epass'];
            $egender=$num['egender'];
            $eimg=$num['eimg'];
            $eoccupation=$num['eoccupation'];
            $eexp=$num['eexp'];
            $eskills=$num['eskills'];
            $esalary=$num['esalary'];
            $etime=$num['etime'];
            $otime=$num['otime'];
            $aadharno=$num['aadharno'];
            $aadhar1=$num['aadhar1'];
            $aadhar2=$num['aadhar2'];
            $resume=$num['resume'];
        }
    }
}
if(isset($_POST['submit']))
{
    header("location:update_employee.php?eid=$eid");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Employees</title>
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
            <!-- partial:../../partials/_settings-panel.html -->
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
                        <h3 class="page-title">View Employee</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Employee</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Personal Info</h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name</label>
                                            <input type="text" class="form-control" id="ename" name="ename" 
                                                value="<?php echo $ename; ?>" disabled required
                                                placeholder="Employee Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="eemail" name="eemail"
                                                value="<?php echo $eemail; ?>" disabled required placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mobiles</label>
                                            <input type="tel" class="form-control" id="emno"
                                                value="<?php echo $emno; ?>" disabled pattern="[0-9]{10}" name="emno"
                                                required placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Password</label>
                                            <input type="password" class="form-control" id="epass" name="epass"
                                                value="<?php echo $epass; ?>" disabled required
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Gender</label>
                                            <input type="text" class="form-control" id="gender" name="gender"
                                                value="<?php echo $egender; ?>" disabled required
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Profile Picture</label>
                                            <input type="file" name="eimg" class="file-upload-default" required disabled value="<?php echo $eimg ?>"
                                                accept="image/x-png,image/gif,image/jpeg">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Work Info</h4>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Occupation</label>
                                            <input type="text" class="form-control" id="eoccupation" name="eoccupation" required
                                                placeholder="occupation" disabled value="<?php echo $eoccupation; ?>">
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Experience</label>
                                            <input type="number" class="form-control" value="<?php echo $eexp; ?>" disabled id="eexp" name="eexp" required
                                                placeholder="Experience(Year)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Skills</label>
                                            <input type="text" class="form-control" id="eskills" value="<?php echo $eskills; ?>" disabled name="eskills" required
                                                placeholder="Skills">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Salary</label>
                                            <input type="numbers" class="form-control" id="esalary" value="<?php echo $esalary; ?>" disabled name="esalary"
                                                required placeholder="Salary">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Work Time</label>
                                            <input type="number" class="form-control" id="etime" value="<?php echo $etime; ?>" disabled name="etime" required
                                                placeholder="Work Time(Hour)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Over Time</label>
                                            <input type="number" class="form-control" id="otime" value="<?php echo $otime; ?>" disabled name="otime" required
                                                placeholder="OverTime Time(Hour)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Upload Document</h4>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Adhar Card No.</label>
                                            <input type="text" class="form-control" pattern="[0-9]{12}" id="adhar"
                                                name="aadharno" required placeholder="Aadhar Card No."  value="<?php echo $aadharno; ?>" disabled>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                                        <button class="btn btn-light">Cancel</button>
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