<?php 
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE; 
$uname="";
$umno="";
$house="";
$road="";
$pincode="";
$city="";
$state="";
$country="";
$aid="";
$final=0;
$n11="";
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    $q1 ="select * from user_address where uid='".$_SESSION['uid']."' and status='1'";
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
    if(isset($_POST['continue']))
    {
      header("location:payment_option.php");
    }
    if(isset($_POST['add_address']))
    {
      header("location:add_address.php");
    }
    if(isset($_POST['add_new_address']))
    {
      header("location:add_address.php");
    }
    if(isset($_POST['manage_address']))
    {
        header("location:user_profile.php");
    }
    if(isset($_POST['go_to_checkout']))
    {
        header("location:checkout.php");
    }
    if(isset($_POST['checkout_now']))
    {
        header("location:checkout.php");
    }
    if(isset($_POST['select']))
    {
        $aid1=$_POST['aid'];
        $q21="update user_address set status='0' where aid='$aid'";
        if($r21=mysqli_query($conn,$q21))
        {
            $q22="update user_address set status='1' where aid='$aid1'";
            if($r22=mysqli_query($conn,$q22))
            {
                $msg="Address Selected SuccesFully....";
                header("refresh:0,url=checkout.php");
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
    <title>Change Address</title>
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

        <div class="container-fluid page-body-wrapper">

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
                        <h3 class="page-title">Change Address</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Address</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Change Address</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Selected Details</h4>
                                    <hr>
                                    <form method="post">
                                        <font color="black" size="4px"><b><?php echo $uname; ?></b></font><br>
                                        <font color="black" size="3px"><?php echo $house.','.$road.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $city.'-'.$pincode.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $state.','; ?></font><br>
                                        <font color="black" size="3px"><?php echo $country; ?></font><br><br>
                                        <h2 class="font-weight-bold"><b></b></h2>
                                        <input type="hidden" value="<?php echo $aid; ?>" name="aid" />
                                        <!-- <button type="submit" name="address"
                                            class="btn btn-sm btn-inverse-danger mr-2">Add Address Or Change
                                            Address</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Other Address</h4>
                                    <?php
                                $q11 ="select * from user_address where uid='".$_SESSION['uid']."' and status='0'";
                                if($r11=mysqli_query($conn,$q11))
                                {
                                    $n11=mysqli_num_rows($r11);
                                    if($n11>=1)
                                    {
                                        while($num11=mysqli_fetch_assoc($r11))
                                        {
                                        echo '
                                        <hr>
                                        <form method="post">
                                            <font color="black" size="4px"><b>'.$num11['uname'].'</b></font><br>
                                            <font color="black" size="3px">'.$num11['house'].','.$num11['road'].',</font>
                                            <br>
                                            <font color="black" size="3px">'.$num11['city'].'-'.$num11['pincode'].',</font><br>
                                            <font color="black" size="3px">'.$num11['state'].',</font><br>
                                            <font color="black" size="3px">'.$num11['country'].'</font><br><br>
                                            <h2 class="font-weight-bold"><b></b></h2>
                                            <input type="hidden" value="'.$num11['aid'].'" name="aid" />
                                            <button type="submit" name="select"
                                                class="btn btn-sm btn-inverse-danger mr-2">Select Address</button>
                                            </form>';
                                        }
                                    }
                                    else
                                    {
                                        echo '
                                        <form method="post">
                                        <font color="black" size="4px"><b>No Other Address Available...</b></font><br><br>
                                        <button type="submit" name="add_address"
                                        class="btn btn-sm btn-inverse-danger mr-2">Add Address</button>
                                        <button type="submit" name="checkout_now"
                                        class="btn btn-sm btn-inverse-success mr-2">Go To CheckOut</button>
                                    </form>';
                                    }
                                }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            if($n11>=1)
                            {
                                    
                        echo '<div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    
                                        <form method="post">
                                            <h4 class="card-title">Action</h4><hr>
                                            <button type="submit" name="add_new_address"
                                                class="btn btn-sm btn-inverse-danger mr-2">Add New Address</button>
                                                
                                            <button type="submit" name="manage_address"
                                            class="btn btn-sm btn-inverse-primary mr-2">Manage Address</button>
                                            
                                            <button type="submit" name="go_to_checkout"
                                                class="btn btn-sm btn-inverse-success mr-2">Go To CheckOut</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
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