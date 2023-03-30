<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  if(isset($_POST['update']))
  {
    $aid=$_POST['aid'];
    header("location:update_admin_profile.php?aid=$aid");
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
    <title>View Profile</title>
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
                        <h3 class="page-title">Admin Profile</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
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
    $q1="select * from admin where aid='".$_SESSION['aid']."'";
    if($r1=mysqli_query($conn,$q1))
    {
      while($num=mysqli_fetch_assoc($r1))
      {
        echo '<div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-4 text-dark">
              <h5 class="mr-2 font-weight-semibold border-right pr-2 mr-2">Admin ID</h5>
              <h5 class="font-weight-semibold">'.$num['aid'].'</h5>
            </div>
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="card rounded shadow-none border">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4 d-xl-flex">
                        <div class="user-avatar mb-auto">
                          <img src="../../images/admin/profile/'.$num['aimg'].'" alt="profile image" style="height:135px;width:135px;border-radius: 50%;" class="profile-img img-lg rounded-circle">
                        </div>
                        <div class="wrapper pl-0 pl-xl-4">
                          <div class="wrapper d-flex align-items-center">
                            <h4 class="mb-0 font-weight-medium text-dark">'.$num['aname'].'</h4>
                           </div>
                           <br>
                          <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                            <i class="mdi mdi-map-marker-outline mr-2"></i>
                            <p class="mb-0 text-muted">'.$num['aemail'].'</p>
                          </div>
                          <br>
                          <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                          <i class="mdi mdi-map-marker-outline mr-2"></i>
                          <p class="mb-0 text-muted">'.$num['amno'].'</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                      <div class="image-grouped ml-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      ';
                      if($num['agender']=='Male')
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
                          <input type="hidden" name="aid" value="'.$num['aid'].'">
                            <button type="submit" name="update" class="btn btn-sm btn-inverse-primary mr-2">UPDATE</button>
                        ';
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