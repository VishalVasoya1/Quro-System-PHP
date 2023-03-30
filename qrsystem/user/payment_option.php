<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE; 
if(isset($_POST['continue']))
{               
    if(isset($_POST['rd']))
    {
        $rd =$_POST['rd']; 
    }
    if($rd == "Paytm")
    {
        header("location:register1.php");
    }
    elseif($rd == "COD")
    {
        header("location:order_status.php");
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
    <title>Payment Option</title>
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

            <div class="main-panel">
                <div class="content-wrapper">
                <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-4">Payment Option</h4>
                    <div class="email">
                      <div class="table-responsive mb-4">
                        <table style="background:#f3f3f3; width:100%;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="padding: 50px;">
                              <table style="width: 550px;height: 100%;margin: 0 auto" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                  <tr style="border-bottom:1px dashed #ddd">

                                  </tr>
                                  <tr>
                                    <td style="padding-top: 5px;background-color:black;    "  >
                                    <a class="navbar-brand brand-logo" href="index.html">
                                    <img src="../../images/other/logo4.png" height=50 width=400 alt="logo" /></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-radius: 10px;background: #fff;padding: 30px 60px 20px 60px;margin-top: 10px;display: block;">
                                    <form action="payment_option.php" method="post" >
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rd" value="COD" id="flexRadioDisabled" required>
                                        <label class="form-check-label" for="flexRadioDisabled" style="font-size:21px;color:black">
                                            Cash On Delivery
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rd" value="Paytm" id="flexRadioCheckedDisabled" required>
                                        <label class="form-check-label" for="flexRadioCheckedDisabled" style="font-size:21px;color:black">
                                            Paytm
                                        </label>
                                            <button type="submit" name="continue" class="btn btn-sm btn-inverse-primary mt-5">Continue Payment</button>
                                        </div>
                                        </form>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    
     ?>
     <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

<script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/owl-carousel.js"></script>
</body>
</html>


<?php



// if(isset($_GET['status']))
// {
//     $status=$_GET['status'];
//     if($status == "success")
//     {
//         echo '<script>swal("Well Done!", "Suggestion Remove SuccesFully", "success");</script>';  
//     }
//     else
//     {
//         echo '<script>swal("Well Done!", "'.$status.'", "success");</script>';
//     }
// }



?>