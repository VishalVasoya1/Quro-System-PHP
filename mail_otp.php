<?php 
$con=mysqli_connect("localhost","truetoke","True@Token","truetoke_qurosystem");

    session_start();

    $error=FALSE;
    $msg=FALSE;
    
    $type=$_SESSION['type'];
    
    $email=$_SESSION['email'];
  
    $otp_send=$_SESSION['otp'];

    if(!isset($_SESSION['otp']))
    {
         header("location:index.php");
    } 
          if(isset($_POST['submit']))
          {

            $otp=$_POST['otp'];

                    if($otp_send==$otp)

                     {
                              $password=($_POST['password']);
                              $repassword=($_POST['repassword']);
                              
                              if($password!=$repassword)
                              {
                                echo "<script type='text/javascript'>alert('password are not match')</script>";
                              }
                              if ($type=='admin') 
                              {
                                $sql="update admin set apass='$password' where aemail='$email'";
                                $res=mysqli_query($con,$sql);
                               
                                if($res)
                                {

                                      $msg="Password Change Successfully";
                                    header("refresh:3;url=login.php");
           
                                  }
                                else
                                {

                                    $error="Password Not Change Tyr Again!";
                                 }
                              
                              }
                               if ($type=='user') 
                               {
                                     $sql="update user_radister set upass='$password' where uemail='$email'";
                                    $res=mysqli_query($con,$sql);
                                   
                                    if($res)
                                    {
                                      
                                      $msg="Password Change Successfully";
                                    header("refresh:3;url=login.php");

                                    }
                                    else
                                    {
                                        $error="Password Not Change Tyr Again!";
                              
                                     }
                               }
                               if ($type=='employee') 
                               {
                                     $sql="update employee set epass='$password' where eemail='$email'";
                                    $res=mysqli_query($con,$sql);
                                   
                                    if($res)
                                    {
                                     
                                      $msg="Password Change Successfully";
                                    header("refresh:3;url=login.php");
 
                                    }
                                    else
                                    {
                                         $error="Password Not Change Tyr Again!";
                              
                                    }
                             
                              }
                     }
                         else
                          {
                          
                            $error="Password Not Change Tyr Again!";
                              
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
    <title>Change Password</title>
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
                            <center>
                                <div class="brand-logo">
                                    <img src="images/other/logo6.jpg"></img>
                                </div>
                            </center>
                            <p class="login-box-msg">Sign in to start your session</p>
                            <div style="color: red;"><?php echo @$msg?></div>
                            <form class="pt-3" method="post">
                                <div class="form-group has-feedback">
                                    <input type="number" class="form-control" required="" placeholder="Enter Otp"
                                        name="otp" value="">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" required=""
                                        placeholder="Enter New password" name="password" value="">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" required=""
                                        placeholder="Enter Confrim Password" name="repassword" value="">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Change Password</button>
                                    <div class="text-center mt-4 font-weight-light"> Back to login? <a href="login.php"
                                            class="text-primary">Go</a>
                                    </div>
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