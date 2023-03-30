<?php
include "conn.php";
session_start();
$error=FALSE;
$msg=FALSE;
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $desig=$_POST['desig'];
  if($desig == "user")
  {
      $q1="select * from user_register where uemail='$email' and upass='$pass'";
      if($r1=mysqli_query($conn,$q1))
      {
            $n1=mysqli_num_rows($r1);
            if($n1==1)
            {
                while($n2=mysqli_fetch_assoc($r1))
                {
                    
                    if($pass == $n2['upass'])
                    {
                        $_SESSION['uid']=$n2['uid'];
                        $_SESSION['uemail']=$n2['uemail'];
                        $_SESSION['uname']=$n2['uname'];
                        $_SESSION['uimg']=$n2['uimg'];
                        if($n2['account_status'] == '0')
                        {
                            $error="Your Account Now DeActivate...Please First Active Accout...";
                            header("refresh:3;url=qrsystem/user/active_account.php");
                        }
                        elseif($n2['account_status'] == '10')
                        {
                            $error="Admin DeActivate Your Account...Not Possible to Active...";
                            header("refresh:3;url=login.php");
                        }
                        else
                        {
                            $msg="<b><u>". $n2['uname'] ."</u></b>". " Login SuccesFully....Please Wait 3 Second.....";
                            header("refresh:1;url=qrsystem/user/index.php");
                        }
                    }
                    else
                    {
                        $error="Password Does Not Match....Please Enter Correct Password.....";
                    }
                }
            }
            else
            {
                $error="We can't Find Account on This Email-Id or Password....";
            }
        }
  }
  elseif($desig == "admin")
  {
    $q1="select * from admin where aemail='$email' and apass='$pass'";
      if($r1=mysqli_query($conn,$q1))
      {
            $n1=mysqli_num_rows($r1);
            if($n1==1)
            {
                while($n2=mysqli_fetch_assoc($r1))
                {
                    if($pass == $n2['apass'])
                    {
                        $_SESSION['aid']=$n2['aid'];
                        $_SESSION['aemail']=$n2['aemail'];
                        $_SESSION['aname']=$n2['aname'];
                        $_SESSION['aimg']=$n2['aimg'];
                        $msg="<b><u>". $n2['aname'] ."</u></b>". " Login SuccesFully....Please Wait 3 Second.....";
                        header("refresh:1;url=qrsystem/admin/index.php");
                    }
                    else
                    {
                        $error="Password Does Not Match....Please Enter Correct Password.....";
                    }
                }
            }
            else
            {
                $error="We can't Find Account on This Email-Id or Password....";
            }
        }
  }
  elseif($desig == "employee")
  {
    $q1="select * from employee where eemail='$email' and epass='$pass'";
    if($r1=mysqli_query($conn,$q1))
    {   
          $n1=mysqli_num_rows($r1);
          if($n1==1)
          {
              while($n2=mysqli_fetch_assoc($r1))
              {
                  if($pass == $n2['epass'])
                    {
                      $_SESSION['eid']=$n2['eid'];
                      $_SESSION['eemail']=$n2['eemail'];
                      $_SESSION['ename']=$n2['ename'];
                      $_SESSION['eimg']=$n2['eimg'];
                      if($n2['account_status'] == '0')
                      {
                          $error="Admin DeActivate Your Account...Not Possible to Active...";
                          header("refresh:0;url=login.php");
                      }
                      else
                      {
                        if($n2['eoccupation']=="Stock Manager")
                        {
                            $msg="<b><u>". $n2['ename'] ."</u></b>". " Login SuccesFully....Please Wait 3 Second.....";
                            header("refresh:0;url=qrsystem/stock/index.php");  
                        }
                        elseif($n2['eoccupation']=="Payment Manager")
                        {
                            $msg="<b><u>". $n2['ename'] ."</u></b>". " Login SuccesFully....Please Wait 3 Second.....";
                            header("refresh:0;url=qrsystem/payment/index.php");  
                        }
                        elseif($n2['eoccupation']=="Order Handler")
                        {
                            $msg="<b><u>". $n2['ename'] ."</u></b>". " Login SuccesFully....Please Wait 3 Second.....";
                            header("refresh:0;url=qrsystem/order/index.php");  
                        }
                      }
                    }
                  else
                  {
                      $error="Password Does Not Match....Please Enter Correct Password.....";
                  }
              }
          }
          else
            {
                $error="We can't Find Account on This Email-Id or Password....";
            }
      }
      else
      {
          $error="Email Id and Password Not Match...";
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
    <title>Login</title>
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
                                        style="width:100%" name="desig" required>
                                        <option value="">Select Login Type</option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" 
                                        placeholder="Email Or Phone" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="pass"
                                        placeholder="Password" name="pass" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">Keep me signed in</label>
                                    </div>
                                    <a href="forgot.php" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                                        href="register.php" class="text-primary">Create</a>
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