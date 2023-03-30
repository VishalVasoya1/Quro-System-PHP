<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$n11="";
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
  if(isset($_POST['update']))
  {
    $aid=$_POST['aid'];
    header("location:update_address.php?aid=$aid");
  }
  if(isset($_POST['add_address']))
  {
    $aid=$_POST['aid'];
    header("location:add_address.php");
  }
  if(isset($_POST['remove']))
  {
    $aid=$_POST['aid'];
    header("location:delete_address.php?aid=$aid");
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
    <title>User Profile</title>
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
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
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
                    <div class="page-header">
                        <h3 class="page-title">User Profile</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
    $q1="select * from user_register where uid='".$_SESSION['uid']."'";
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
              ';
              ?>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">My Address</h4>
                                    <?php
                                $q11 ="select * from user_address where uid='".$_SESSION['uid']."'";
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
                                            <button type="submit" name="update"
                                                class="btn btn-sm btn-inverse-success mr-2">Update</button>
                                                <button type="submit" name="remove"
                                                class="btn btn-sm btn-inverse-danger mr-2">Remove</button>   
                                            </form>';
                                        }
                                    }
                                        echo '
                                        <form method="post"><hr>
                                        <button type="submit" name="add_address"
                                        class="btn btn-sm btn-inverse-primary mr-2">Add New Address</button>
                                    </form>';
                                }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php echo '
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