<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$ename="";
$eemail="";
$emno="";
$epass="";
$egender="";
$eimg="";
$uemail="";
$umno="";
$aid="";
if(isset($_GET['aid']))
{
    $aid=$_GET['aid'];
    $q1="select * from admin where aid='$aid'";
    if($r1=mysqli_query($conn,$q1))
    {
        while($num=mysqli_fetch_assoc($r1))
        {
            $ename=$num['aname'];
            $eemail=$num['aemail'];
            $emno=$num['amno'];
            $egender=$num['agender'];
            $eimg=$num['aimg'];
        }
    }
}
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  if(isset($_POST['submit']))
  {
      $ename=$_POST['ename'];
      $uemail=$_POST['eemail'];
      $umno=$_POST['emno'];
      $egender=$_POST['egender'];
      $file1=$_FILES['eimg']['name'];
      $temp=$_FILES['eimg']['tmp_name'];
      if(!$file1 == "")
      {
        unlink("../../images/admin/profile/".$eimg);
        move_uploaded_file($temp,"../../images/admin/profile/$file1");
        $q11="update admin set aimg='$file1' where aid='$aid'";
        if($r11=mysqli_query($conn,$q11))
        {
        }
      }
      if(!$uemail == "")
      {
          if($uemail == $eemail)
          {

          }
          else
          {
                $q11="select * from admin where aemail='$uemail'";
                if($r11=mysqli_query($conn,$q11))
                {
                    $n11=mysqli_num_rows($r11);
                    if($n11<=0)
                    {
                        $q12="update admin set aemail='$uemail' where aid='$aid'";
                        if($r12=mysqli_query($conn,$q12)); 
                    }
                    else
                    {
                        $error="Email-Id Already Available...";
                    }
                }
                else
                {
                    $error="Query Wrong";
                }
          }
       }
       if(!$umno == "")
      {
          if($umno == $emno)
          {

          }
          else
          {
                $q13="select * from admin where amno='$umno'";
                if($r13=mysqli_query($conn,$q13))
                {
                    $n12=mysqli_num_rows($r13);
                    if($n12<=0)
                    {
                        $q14="update admin set amno='$umno' where aid='$aid'";
                        if($r14=mysqli_query($conn,$q14));
                    }
                    else
                    {
                        $error=$error."Mobile-No Already Available...";
                    }
                }
          }
       }
            $q1="update admin set aname='$ename',agender='$egender',stamp=current_timestamp() where aid='$aid'";
            if($r1=mysqli_query($conn,$q1))
            {
                $msg="<b><u>   ". $ename ."</u></b>". " Admin Updated SuccesFully....";
                header("refresh:2,url=admin_profile.php");
            }
            else
            {
                $error="<b><u>   ". $ename ."</u></b>". " Admin Updation Failed....";
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
    <title>Update Profile</title>
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
        // include "themes/header.php";
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
            <?php 
            if($msg)
            {
              echo '<script>swal("Well Done!", "'.$msg.'", "success");</script>';  
            }
            if($error)
            {
              echo '<script>swal("Oops!", "'.$error.'", "error");</script>';
            }
            ?>         <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Update Admin</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Admin</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Personal Info</h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name</label>
                                            <input type="text" class="form-control" id="ename" name="ename" 
                                                value="<?php echo $ename; ?>"  placeholder="User Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="eemail" name="eemail"
                                                value="<?php echo $eemail; ?>"   placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mobiles</label>
                                            <input type="tel" class="form-control" id="emno"
                                                value="<?php echo $emno; ?>"  pattern="[0-9]{10}" name="emno"
                                                required placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control form-control-lg" id="egender" name="egender"
                                                required>
                                                <option value="<?php echo $egender; ?>"><?php echo $egender; ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Profile Picture</label>
                                            <input type="file" name="eimg" class="file-upload-default"                                               accept="image/x-png,image/gif,image/jpeg">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" 
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

    <script src="../../assets/js/file-upload.js"></script>
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