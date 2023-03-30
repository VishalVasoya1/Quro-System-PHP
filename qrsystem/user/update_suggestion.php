<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$uname=$_SESSION['uname'];
$uid=$_SESSION['uid'];
$uemail=$_SESSION['uemail'];
$sid=$_GET['sid'];
$stitle="";
$sdesc="";
$mno="";
$img="";
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
  $q1="select * from suggestion where sid='$sid'";
  if($r1=mysqli_query($conn,$q1))
  {
    while($num=mysqli_fetch_assoc($r1))
    {
      $stitle=$num['stitle'];
      $sdesc=$num['sdesc'];
      $mno=$num['mno'];
      $img=$num['img'];
    }
  }
}
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_POST['submit']))
    {
      $title=$_POST['title'];
      $desc=$_POST['desc'];
      $file1=$_FILES['suggestion']['name'];
      $temp=$_FILES['suggestion']['tmp_name'];
      if(!$file1 == "")
      {
        unlink("../../images/user/suggestion/$img");
        move_uploaded_file($temp,"../../images/user/suggestion/$file1");
        $q11="update suggestion set img='$file1' where sid='$sid'";
        if($r11=mysqli_query($conn,$q11))
        {

        }
      }
      $q1="update suggestion set stitle='$title',sdesc='$desc',stamp=current_timestamp() where sid='$sid'";
      if($r1=mysqli_query($conn,$q1))
      {
        $msg="Suggestion Updated SuccesFully";
        header("refresh:0;url=view_suggestion.php");
      }
      else
      {
        $msg="Suggestion Not Updated SuccesFully";
        header("refresh:0;url=view_suggestion.php");
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
    <title>Update Suggestion</title>
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
                        <h3 class="page-title">User Suggestion</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Suggestion</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Suggestion</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Suggestion</h4>
                                    <form class="forms-sample" method="post" enctype="multipart/form-data"> 
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Name</label>
                                            <input type="text" class="form-control" id="uname" name="uname"
                                                value="<?php echo $_SESSION['uname']; ?>" placeholder="Name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Email</label>
                                            <input type="email" class="form-control" id="uemail" name="uemail"
                                                value="<?php echo $uemail; ?>" placeholder="Email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Mobile</label>
                                            <input type="tel" class="form-control" id="umno" name="umno"
                                                value="<?php echo $mno; ?>" placeholder="Mobile" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Suggestion Title" value="<?php echo $stitle; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description</label>
                                            <textarea class="form-control" id="desc" name="desc" rows="4"
                                                required><?php echo $sdesc; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Upload</label>
                                            <input type="file" name="suggestion" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" 
                                                    placeholder="Upload Pdf,Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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