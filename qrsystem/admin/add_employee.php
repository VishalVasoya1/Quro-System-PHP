<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$mt = explode(' ', microtime());
$mt1=((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  if(isset($_POST['submit']))
  {
      $ename=$_POST['ename'];
      $eemail=$_POST['eemail'];
      $emno=$_POST['emno'];
      $epass=$_POST['epass'];
      $egender=$_POST['egender'];
      $eoccupation=$_POST['eoccupation'];
      $eexp=$_POST['eexp'];
      $eskills=$_POST['eskills'];
      $esalary=$_POST['esalary'];
      $etime=$_POST['etime'];
      $otime=$_POST['otime'];
      $aadharno=$_POST['aadharno'];
      $file1=$_FILES['eimg']['name'];
      $temp=$_FILES['eimg']['tmp_name'];
      move_uploaded_file($temp,"../../images/employee/profile/$file1");
      $file2=$_FILES['aadhar1']['name'];
      $temp2=$_FILES['aadhar1']['tmp_name'];
      move_uploaded_file($temp2,"../../images/employee/proof/$file2");
      $file3=$_FILES['aadhar2']['name'];
      $temp3=$_FILES['aadhar2']['tmp_name'];
      move_uploaded_file($temp3,"../../images/employee/proof/$file3");
      $file4=$_FILES['resume']['name'];
      $temp4=$_FILES['resume']['tmp_name'];
      move_uploaded_file($temp4,"../../images/employee/resume/$file4");
      $q1="select * from employee where eemail='$eemail' or emno='$emno'";
      if($r1=mysqli_query($conn,$q1))
      {
          $n1=mysqli_num_rows($r1);
          if($n1<=0)
          {
              $q2="insert into employee values('$mt1','$ename','$eemail','$emno','$epass','$egender','$file1','$eoccupation','$eexp','$eskills','$esalary','$etime','$otime','$aadharno','$file2','$file3','$file4','1',current_timestamp())";
              if($r2=mysqli_query($conn,$q2))
              {
                   $msg="<b><u>   ". $ename ."</u></b>". " Employee Register SuccesFully....";
              }
              else
              {
                  $error="Employee Registration Failed .... Please Try Again ....";    
              }
          }
          else
          {
            $error="Email Id or Mobile No is Already Exist";
          }
      }
      else
      {
          $error="Error in Query";
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
    <title>Add Employee</title>
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
            ?>   
        
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Add Employee</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Personal Info</h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name</label>
                                            <input type="text" class="form-control" id="ename" name="ename" required
                                                placeholder="Employee Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="eemail" name="eemail" required
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mobiles</label>
                                            <input type="tel" class="form-control" id="emno" pattern="[0-9]{10}"
                                                name="emno" required placeholder="Mobile">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Password</label>
                                            <input type="password" class="form-control" id="epass" name="epass" required
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control form-control-lg" id="gender" name="egender"
                                                required required>
                                                <option value="">Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Profile Picture</label>
                                            <input type="file" name="eimg" class="file-upload-default" required
                                                accept="image/x-png,image/gif,image/jpeg">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Work Info</h4>
                                        <div class="form-group">
                                            <label for="gender">Occupation</label>
                                            <select class="form-control form-control-lg" id="eoccupation" name="eoccupation"
                                                required >
                                                <option value="">Employee Occupation</option>
                                                <?php
                                                $q5="select * from designation";
                                                if($r5=mysqli_query($conn,$q5))
                                                {
                                                    while($num=mysqli_fetch_assoc($r5))
                                                    {
                                                        echo '<option value="'.$num['dname'].'">'.$num['dname'].'</option>';
                                                    }
                                                } 
                                                ?>
                                            
                                            </select>
                                        </div>
                                       <div class="form-group">
                                            <label for="exampleInputEmail1">Experience</label>
                                            <input type="number" class="form-control" id="eexp" name="eexp" required
                                                placeholder="Experience(Year)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Skills</label>
                                            <input type="text" class="form-control" id="eskills" name="eskills" required
                                                placeholder="Skills">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Salary</label>
                                            <input type="numbers" class="form-control" id="esalary" name="esalary"
                                                required placeholder="Salary">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Work Time</label>
                                            <input type="number" class="form-control" id="etime" name="etime" required
                                                placeholder="Work Time(Hour)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Over Time</label>
                                            <input type="number" class="form-control" id="otime" name="otime" required
                                                placeholder="OverTime Time(Hour)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Upload Document</h4>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Adhar Card No.</label>
                                            <input type="text" class="form-control" pattern="[0-9]{12}" id="adhar" name="aadharno" required
                                                placeholder="Aadhar Card No.">
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Upload AAdhar Card(Front Part)</label>
                                            <input type="file" name="aadhar1" class="file-upload-default"
                                                accept="image/x-png,image/gif,image/jpeg" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Front Side">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Upload AAdhar Card(Back Part)</label>
                                            <input type="file" name="aadhar2" class="file-upload-default"
                                                accept="image/x-png,image/gif,image/jpeg" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Back Side">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Resume</label>
                                            <input type="file" name="resume" accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="file-upload-default" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Resume">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
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