<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  if(isset($_POST['deactive']))
  {
    $eid=$_POST['uid'];
    $q1="update user_register set account_status='11' where uid='$eid'";
    if($r1=mysqli_query($conn,$q1))
    {
        $msg="Account Active SuccesFully";
        // header("location:employee_list.php");
    }
  }
  if(isset($_POST['active']))
  {
    $eid=$_POST['uid'];
    $q1="update user_register set account_status='10' where uid='$eid'";
    if($r1=mysqli_query($conn,$q1))
    {
      $msg="Account Deactive SuccesFully";
      // header("location:employee_list.php");
    }
  }
}
                          
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/user-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:39 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Active Users</title>
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
    ?>    <!-- partial -->
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
       <div class="main-panel">
          <div class="content-wrapper">
          <div class="page-header">
                        <h3 class="page-title">Active Users</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Active Users</li>
                            </ol>
                        </nav>
                    </div>
            <div class="row">
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
        <!-- partial -->
    <?php
    $q1="select * from user_register where account_status='0'";
    if($r1=mysqli_query($conn,$q1))
    {
      while($num=mysqli_fetch_assoc($r1))
      {
        echo '<div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-4 text-dark">
              <h5 class="mr-2 font-weight-semibold border-right pr-2 mr-2">User ID</h5>
              <h5 class="font-weight-semibold">'.$num['uid'].'</h5>
            </div>
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="card rounded shadow-none border">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4 d-xl-flex">
                        <div class="user-avatar mb-auto">
                          <img src="../../images/user/profile/'.$num['uimg'].'" alt="profile image" style="height:135px;width:135px;border-radius: 50%;" class="profile-img img-lg rounded-circle">
                        </div>
                        <div class="wrapper pl-0 pl-xl-4">
                          <div class="wrapper d-flex align-items-center">
                            <h4 class="mb-0 font-weight-medium text-dark">'.$num['uname'].'</h4>
                           </div>
                           <br>
                          <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                            <i class="mdi mdi-map-marker-outline mr-2"></i>
                            <p class="mb-0 text-muted">'.$num['uemail'].'</p>
                          </div>
                          <br>
                          <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                          <i class="mdi mdi-map-marker-outline mr-2"></i>
                          <p class="mb-0 text-muted">'.$num['umno'].'</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                      <div class="image-grouped ml-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ';
                      if($num['gender']=='Male')
                      {
                        echo ' <img src="../../images/user/male.png" title="Male" alt="User Gender" style="height:100px;width:100px;border-radius:50%" class="profile-img img-lg rounded-circle"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      }
                      else
                      {
                        echo '<img src="../../images/user/male.png" title="Male" alt="User Gender" style="height:100px;width:100px;border-radius:50%" class="profile-img img-lg rounded-circle"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      }
                      echo '
                        </div>
          
                      </div>
                      
                      <div class="col-md-3">
                        <div class="wrapper d-flex justify-content-end">
                        <form method="post">
                        <input type="hidden" name="uid" value="'.$num['uid'].'">
                        ';
                        if($num['account_status']=="1" || $num['account_status']=="11")
                        {
                          echo '<button type="submit" name="active" class="btn btn-sm btn-inverse-success mr-2">Active</button>'; 
                        }
                        else
                        {
                          echo '<button type="submit" name="deactive" class="btn btn-sm btn-inverse-danger mr-2">DeActive</button>';
                        }
                        echo '
                        </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>';
      }
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

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/user-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:41 GMT -->
</html>