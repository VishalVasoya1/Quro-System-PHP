<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$status="";
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  if(isset($_POST['remove']))
  {
    $crid=$_POST['crid'];
    header("location:delete_employee_complain_replay.php?crid=$crid");
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
    <title>View User Complain</title>
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
    ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

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
                        <h3 class="page-title">View Complain</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Complain</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Complain</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <?php
            if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
            {
                $q1="select * from complain where type='EMPLOYEE'";
                if($r1=mysqli_query($conn,$q1))
                {
                    while($num=mysqli_fetch_assoc($r1))
                    {
                        $cid=$num['cid'];
                        $q15="select * from complain_replay where cid='$cid'";
                        if($r15=mysqli_query($conn,$q15))
                        {
                          $n15=mysqli_num_rows($r15);
                        }
                        echo '
                        <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title"><font color="green">'.$num['name'].'</font>  |  '.$num['stamp'].' | <font color="red">' .$num['cid'].'  |  <font color="blue">Replay : '.$n15.' Times</font></font></h4>
                            <form class="forms-sample" method="post">
                            <div class="form-group">
                            <label for="exampleInputEmail3">Email</label>
                            <input type="email" class="form-control" id="uemail" name="uemail"
                                value="'.$num['email'].'" placeholder="Email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Mobile</label>
                            <input type="tel" class="form-control" id="umno" name="umno"
                                value="'.$num['mno'].'" placeholder="Mobile" disabled>
                        </div>
                  
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
                              </div>';
                              if(!$num['img']=="")
                              {
                                echo '<button name="img" class="btn btn-primary mr-3"><a style="color:white" target="_blank" href="../../images/user/complain/'.$num['img'].'">Uploaded Document</a></button>';
                              }
                              echo '
                              <button name="replay" class="btn btn-success mr-3"><a style="color:white" href="employee_complain_replay.php?cid='.$num['cid'].'">Replay</a></button>
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
                                  { echo '
                                    <form method="post">
                                      <input type="hidden" value="'.$n12['crid'].'" name="crid"/> 
                                      <button type="submit" name="remove" class="btn btn-sm btn-danger m-2">REMOVE</button>
                                    <font color="black"><b>Not Answer</b></font>
                                    </form>';

                                  }
                                  else
                                  {
                                      if($n12['status']=='1')
                                      {
                                        echo "<font color='black'><b>Satisfy</b></font>";
                                      }
                                      else
                                      {
                                        echo "<font color='black'><b>UnSatisfy</b></font>";
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