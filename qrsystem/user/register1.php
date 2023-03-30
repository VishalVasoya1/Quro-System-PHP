<?php
  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");
  
  session_start();
    include "../../conn.php";
   $error=FALSE;
   $msg=FALSE; 
   
    if(isset($_SESSION['total1']))
    {
      $uid1 =$_SESSION['uid'];
      $total=$_SESSION['total1'];
      $oid=$_SESSION['oid'];
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
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
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
   
<div class="container-scroller">

   <?php

if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    //  include "themes/header.php";
}
else
{
   header("location:../../login.php");
}
?>
 <div class="container-fluid page-body-wrapper full-page-wrapper">
       <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">

  
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

    
          <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
              <div class="auth-form-transparent text-left p-3">
                <div class="brand-logo">
                  <img src="https://www.bootstrapdash.com/demo/connect-plus/jquery/template/assets/images/logo-dark.svg" alt="logo">
                </div>
                
              
                <form class="pt-3" method="post" action="pgRedirect.php">
                  <div class="form-group">
                    <label>ORDER_ID</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-account-outline text-primary"></i>
                        </span>
                      </div>
                      <input class="form-control form-control-lg border-left-0 input" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
            name="ORDER_ID" autocomplete="off"
            value="<?php  echo"$oid"?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>CUSTID</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-email-outline text-primary"></i>
                        </span>
                      </div>
                      <input class="form-control form-control-lg border-left-0" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php  echo"$uid1"?>" >
                    </div>
                  </div>
                   <div class="form-group">
                    <label>INDUSTRY_TYPE_ID</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-email-outline text-primary"></i>
                        </span>
                      </div>
                      <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" class="form-control form-control-lg border-left-0" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label>CHANNEL</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-email-outline text-primary"></i>
                        </span>
                      </div>
                      <input  class="form-control form-control-lg border-left-0" id="CHANNEL_ID" tabindex="4" maxlength="12"
            size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label>TXN_AMOUNT</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-email-outline text-primary"></i>
                        </span>
                      </div>
                      <input class="form-control form-control-lg border-left-0" input title="TXN_AMOUNT" tabindex="10"
            type="text" name="TXN_AMOUNT"
            value="<?php  echo $total?>" >
                    </div>
                  </div>
                  
                  
                 <button type="submit"  value="CheckOut"   onclick="" class="btn btn-primary btn-block waves-effect waves-light">Continue Payment</button>
                </form>
              </div>
            </div>
            <div class="col-lg-6 register-half-bg d-flex flex-row">
              <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
  </body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->
</html>