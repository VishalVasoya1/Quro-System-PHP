<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;

                          
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
    if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
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
    if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
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
    $q1="select * from employee where eid='".$_SESSION['eid']."'";
    if($r1=mysqli_query($conn,$q1))
    {
      while($num=mysqli_fetch_assoc($r1))
      {
        echo '<div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex mb-4 text-dark">
              <h5 class="mr-2 font-weight-semibold border-right pr-2 mr-2">Employee ID</h5>
              <h5 class="font-weight-semibold">'.$num['eid'].'</h5>
            </div>
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="card rounded shadow-none border">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4 d-xl-flex">
                        <div class="user-avatar mb-auto">
                          <img src="../../images/employee/profile/'.$num['eimg'].'" alt="profile image" style="height:135px;width:135px;border-radius: 50%;" class="profile-img img-lg rounded-circle">
                        </div>
                        <div class="wrapper pl-0 pl-xl-4">
                          <div class="wrapper d-flex align-items-center">
                            <h4 class="mb-0 font-weight-medium text-dark">'.$num['ename'].'</h4>
                           </div>
                           <br>
                          <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                            <i class="mdi mdi-map-marker-outline mr-2"></i>
                            <p class="mb-0 text-muted">'.$num['eemail'].'</p>
                          </div>
                          <br>
                          <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                          <i class="mdi mdi-map-marker-outline mr-2"></i>
                          <p class="mb-0 text-muted">'.$num['emno'].'</p>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                      <div class="image-grouped ml-auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="../../images/employee/proof/'.$num['aadhar1'].'" target="blank"> <img src="../../images/employee/aadharfront.png" title="Adhar Front Side" alt="profile image" style="height:100px;width:100px;border-radius:50%" class="profile-img img-lg rounded-circle"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                       <a href="../../images/employee/proof/'.$num['aadhar2'].'" target="blank"> <img src="../../images/employee/aadharback.jpg" title="Adhar Back Side" alt="profile image" style="height:100px;width:100px;border-radius:50%" class="profile-img img-lg rounded-circle"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                       <a href="../../images/employee/resume/'.$num['resume'].'" target="blank"> <img src="../../images/employee/resume.png" title="Resume" alt="profile image" style="height:100px;width:100px;border-radius:50%" class="profile-img img-lg rounded-circle"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="wrapper d-flex justify-content-end">
                          <button type="button" class="btn btn-sm btn-inverse-danger mr-2"><a style="text-decoration:none;color:white;" href="view_employee.php">View</a></button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="wrapper border-top">
                    <div class="card-body">
                      <div class="row">
                        <div class="col d-flex">
                          <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                            <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                          </div>
                          <div class="wrapper pl-3">
                            <p class="mb-0 font-weight-medium text-muted">Gender</p>
                            <h4 class="font-weight-semibold mb-0 text-dark">'.$num['egender'].'</h4>
                          </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                          <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                            <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                          </div>
                          <div class="wrapper pl-3">
                            <p class="mb-0 font-weight-medium text-muted">Occupation</p>
                            <h4 class="font-weight-semibold mb-0 text-dark">'.$num['eoccupation'].'</h4>
                          </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                          <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                            <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                          </div>
                          <div class="wrapper pl-3">
                            <p class="mb-0 font-weight-medium text-muted">Salary</p>
                            <h4 class="font-weight-semibold mb-0 text-dark">'.$num['esalary'].'</h4>
                          </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                          <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                            <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                          </div>
                          <div class="wrapper pl-3">
                            <p class="mb-0 font-weight-medium text-muted">Aadhar No</p>
                            <h4 class="font-weight-semibold mb-0 text-primary text-dark">'.$num['aadharno'].'</h4>
                          </div>
                        </div>
                        <div class="col d-flex align-items-center">
                          <div class="image-grouped ml-auto">
                          <form method="post">
                          <input type="hidden" name="eid" value="'.$num['eid'].'">
                          ';
                          if($num['account_status']==1)
                          {
                            echo '<button  name="active" class="btn btn-sm btn-inverse-success mr-2" disabled>Active</button>'; 
                          }
                          else
                          {
                            echo '<button name="deactive" class="btn btn-sm btn-inverse-danger mr-2" disabled>DeActive</button>';
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
        </div>
      </div>';
      }
    }
    ?>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
              </div>
            </div>
          </footer>
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