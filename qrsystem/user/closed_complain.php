<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$status="";

if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    $q1="select * from user_register where uid='".$_SESSION['uid']."'";
    if($r1=mysqli_query($conn,$q1))
    {
        while($num=mysqli_fetch_assoc($r1))
        {
            $stamp=$num['stamp'];
        }
    }
}
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_POST['satisfy']))
    {
        $crid=$_POST['crid'];
        $cid=$_POST['cid'];
        $q2="update complain_replay set status='1' where crid='$crid'";
        if($r2=mysqli_query($conn,$q2))
        {
            $q3="update complain set rstatus='1' where cid='$cid'";
            if($r3=mysqli_query($conn,$q3))
            {
                $msg="Thank You For Positive Replay....";
                header("refresh:3;url=view_complain.php");
            }  
        }
    }
    elseif(isset($_POST['unsatisfy']))
    {
        $crid=$_POST['crid'];
        $cid=$_POST['cid'];
        $q2="update complain_replay set status='0' where crid='$crid'";
        if($r2=mysqli_query($conn,$q2))
        {
            $q3="update complain set rstatus='0' where cid='$cid'";
            if($r3=mysqli_query($conn,$q3))
            {
                $msg="We are Very Apologize For That....";
                header("refresh:3;url=view_complain.php");  
            }
        }
    }
    if($r1=mysqli_query($conn,$q1))
    {
        while($num=mysqli_fetch_assoc($r1))
        {
            $stamp=$num['stamp'];
        }
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
    <title>Closed Complain</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/other/phone.png" />
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

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
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
                    <div class="page-header">
                        <h3 class="page-title">Closed Complain</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Complain</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Closed Complain</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <?php
            if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
            {
                $q1="select * from complain where id='".$_SESSION['uid']."' and rstatus='1'";
                if($r1=mysqli_query($conn,$q1))
                {
                    while($num=mysqli_fetch_assoc($r1))
                    {
                        echo '
                        <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">'.$num['stamp'].'  | <font color="red"> '.$num['cid'].'</font></h4>
                            <form class="forms-sample" method="post">
                              <div class="form-group">
                                <label for="exampleInputPassword4">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="'.$num['ctitle'].'" disabled>
                              </div>';
                              if(!$num['oid']=="")
                              {
                                    echo '  <div class="form-group">
                                    <label for="exampleInputPassword4">Order-ID</label>
                                    <input type="text" class="form-control" id="title" name="title" value="'.$num['oid'].'" disabled>
                                      </div>';
                              }
                            echo '
                              <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" id="desc" name="desc" rows="4" disabled>'.$num['cdesc'].'</textarea>
                              </div>
                              <button name="update" class="btn btn-success mr-3"><a style="color:white" href="update_complain.php?cid='.$num['cid'].'">Update</a></button>
                              <button name="remove" class="btn btn-danger mr-3"><a style="color:white" href="delete_complain.php?cid='.$num['cid'].'">Remove</a></button>';
                              if(!$num['img']=="")
                              {
                                echo '<button name="img" class="btn btn-primary mr-3"><a style="color:white" target="_blank" href="../../images/user/complain/'.$num['img'].'">Uploaded Document</a></button>';
                              }
                              echo '
                            </form>
                          </div>';
                          $q12="select * from complain_replay where cid='".$num['cid']."' order by stamp";
                          if($r12=mysqli_query($conn,$q12))
                          {
                              while($n12=mysqli_fetch_assoc($r12))
                              {     
                              echo '<div class="card-body">
                              <h4 class="card-title">'.$n12['stamp'].' | Replay</font></h4>
                              <form class="forms-sample" method="post">
                              <input type="hidden" name="crid" value="'.$n12['crid'].'"/>
                              <input type="hidden" name="cid" value="'.$n12['cid'].'"/>
                                  <div class="form-group">
                                      <label for="exampleTextarea1">Description</label>
                                      <textarea class="form-control" id="desc" name="desc" rows="4" disabled>'.$n12['rdesc'].'</textarea>
                                  </div>';
                                  if($n12['status'] == NULL)
                                  {
                                        echo '<button name="satisfy" class="btn btn-success mr-3">Satisfy</button>
                                        <button name="unsatisfy" class="btn btn-danger mr-3">UnSatisfy</button>';
                                  }
                                  else
                                  {
                                      if($n12['status']=='1')
                                      {
                                        echo "<font color='black'><b>Satisfy</b> : Your FeedBack is Valuable For Us...Thank You For Your Support..</font>";
                                      }
                                      else
                                      {
                                        echo "<font color='black'><b>UnSatisfy</b> : We are Apologize to You because of Your Unsatisfaction....</font>";
                                      }
                                  }
                                  echo '
                                  </form>
                            </div>';
                        }
                          }
                          echo '  
                        </div>
                      </div>
                    ';
                    }
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

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:34 GMT -->

</html>