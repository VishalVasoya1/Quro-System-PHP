<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$uname=$_SESSION['ename'];
$uid=$_SESSION['eid'];
$uemail=$_SESSION['eemail'];
$bytes = random_bytes(3);
$new=bin2hex($bytes);

if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_POST['cat']))
    {
        $cname=$_POST['cname'];
        $q1="select * from category where cname='$cname'";
        if($r1=mysqli_query($conn,$q1))
        {
            $n1=mysqli_num_rows($r1);
            if($n1<=0)
            {
                $q2="insert into category values('$new','$cname',current_timestamp())";
                if($r2=mysqli_query($conn,$q2))
                {
                    $msg="Category Added SuccesFully";
                }
                else
                {
                    $error="Category Not Inserted SuccesFully";
                }
            }
            else
            {
                $error="Category Name is Already Exist";
            }
        }
    }
    if(isset($_POST['subcat']))
    {
        $subname=$_POST['subname'];
        $catname=$_POST['catname'];
        $q1="select * from subcategory where scname='$subname'";
        if($r1=mysqli_query($conn,$q1))
        {
            $n1=mysqli_num_rows($r1);
            if($n1<=0)
            {
                $q2="insert into subcategory values('$new','$subname','$catname',current_timestamp())";
                if($r2=mysqli_query($conn,$q2))
                {
                    $msg="SubCategory Added SuccesFully";
                }
                else
                {
                    $error="SubCategory Not Inserted SuccesFully";
                }
            }
            else
            {
                $error="SubCategory Name is Already Exist";
            }
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
    <title>Add Category</title>
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
    ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

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
                        <h3 class="page-title">Add Category</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Category</h4>
                                    <form class="forms-sample" method="post" >
                                        <div class="form-group">
                                            <label for="exampleInputName1">Category Name</label>
                                            <input type="text" class="form-control" id="cname" name="cname"
                                                placeholder="Category Name" required>
                                        </div>
                                        <button type="submit" name="cat" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Add Subcategory</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Subcategory</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Subcategory</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Subcategory</h4>
                                    <form class="forms-sample" method="post">
                                    <div class="form-group">
                                            <label for="gender">Category Name</label>
                                            <select class="form-control form-control-lg" id="catname" name="catname"  required >
                                                <option value="">Category</option>
                                                <?php
                                                $q5="select * from category";
                                                if($r5=mysqli_query($conn,$q5))
                                                {
                                                    while($num=mysqli_fetch_assoc($r5))
                                                    {
                                                        echo '<option value="'.$num['cid'].'">'.$num['cname'].'</option>';
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Subcategory Name</label>
                                            <input type="text" class="form-control" id="subname" name="subname"
                                                placeholder="Subcategory Name" required>
                                        </div>
                                          <button type="submit" name="subcat" class="btn btn-primary mr-2">Submit</button>
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