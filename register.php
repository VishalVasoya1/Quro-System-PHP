<?php
include "conn.php";
$error=FALSE;
$msg=FALSE;
$mt = explode(' ', microtime());
$mt1=((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
if(isset($_POST['submit']))
{
  $uname=$_POST['uname'];
  $uemail=$_POST['uemail'];
  $upass=$_POST['upass'];
  $umno=$_POST['umno'];
  $ugender=$_POST['gender'];
  $file1=$_FILES['uimg']['name'];
  $temp=$_FILES['uimg']['tmp_name'];
  move_uploaded_file($temp,"images/user/profile/$file1");
  $q1="select * from user_register where uemail='$uemail' or umno='$umno'";
  if($r1=mysqli_query($conn,$q1))
  {
      $n1=mysqli_num_rows($r1);
      if($n1<=0)
      {
          $q2="insert into user_register values('$mt1','$uname','$uemail','$umno','$upass','$ugender','$file1',1,current_timestamp())";
          if($r2=mysqli_query($conn,$q2))
          {
               $msg="<b><u>   ". $uname ."</u></b>". " Member Register SuccesFully....";
               header("refresh:2;url=login.php");  
          }
          else
          {
              $error="Member Registration Failed .... Please Try Again ....";    
              header("refresh:2;url=login.php");  
          }
      }
  }
  else
  {
      $error="Error in Query";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register With Us</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/other/phone.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
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
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="uname" name="uname" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="uemail" name="uemail" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-lg" id="umno" name="umno" placeholder="Mobile No" pattern="^\d{10}$" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="upass" name="upass" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-lg" id="gender" name="gender" required>
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="uimg" class="file-upload-default" accept="image/x-png,image/gif,image/jpeg"  required >
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" required> I agree to all Terms &
                                            Conditions </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                        href="login.php" class="text-primary">Login</a>
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
    <script src="assets/js/file-upload.js"></script>
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->

</html>