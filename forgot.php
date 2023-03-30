

<?php 
//include "conn.php";
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'qurosystem1');

    session_start();
    $error=FALSE;
    $msg=FALSE;
    if(isset($_POST['submit']))
    {
      $email=$_POST['email']; 
      $type=$_POST['type'];
      
     $_SESSION['type']=$type;
         if($type=="admin")
         { 
          $sql_confirm="select * from admin where aemail='$email'";
          
          $total_query=mysqli_query($con,$sql_confirm);
          $total_rec=mysqli_num_rows($total_query);
              if($total_rec==1)
              {

                $email_rec=mysqli_fetch_assoc($total_query);
                $_SESSION['email']=$email_rec['aemail'];
                $msg="We are send otp";
                header("refresh:0;url=mail/smtp.php");
              }
              else
              {
                $error="Your email not match";
              }
         }
         if($type=="employee")
         { 
          $sql_confirm="select * from employee where eemail='$email'";
          
          $total_query=mysqli_query($con,$sql_confirm);
          $total_rec=mysqli_num_rows($total_query);
              if($total_rec==1)
              {

                $email_rec=mysqli_fetch_assoc($total_query);
                $_SESSION['email']=$email_rec['eemail'];
                  $msg="We are send otp";
                header("refresh:0;url=mail/smtp.php");
           
              }
              else
              {
                $error="Your email not match";
              }
         }
          if($type=="user")
         { 
          $sql_confirm="select * from user_register where uemail='$email'";
          $total_query=mysqli_query($con,$sql_confirm);
          $total_rec=mysqli_num_rows($total_query);
              if($total_rec==1)
              {
                 
                $email_rec=mysqli_fetch_assoc($total_query);
                $_SESSION['email']=$email_rec['uemail'];
                $msg="We are send otp";
                header("refresh:3;url=mail/smtp.php");
              }
              else
              {
                $error="Your email not match";
              }
         }

         

    }

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:33 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forget Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/other/phone.png" />
</head>

<body>
 
    <div class="container-scroller">
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                              <center><div class="brand-logo">
                                <img
                                    src="images/other/logo6.jpg"></img>
                                </div></center>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post">
                                <div class="form-group">
                                    <select class="js-example-basic-single form-control form-control-lg"
                                        style="width:100%" name="type" required>
                                        <option value="">Select Login Type</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" 
                                        placeholder="Email" name="email" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Forgot Password</button>
                                </div>
                                
                                <div class="text-center mt-4 font-weight-light"> Back to login? <a
                                        href="login.php" class="text-primary">Go</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->

</body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:33 GMT -->

</html>