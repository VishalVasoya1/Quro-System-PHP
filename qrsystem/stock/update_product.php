<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$bytes = random_bytes(3);
$new=bin2hex($bytes);
$pid="";
$ptype="";
$pname="";
$pbrand="";
$psub="";
$pdesc="";
$pstock="";
$poprice="";
$psprice="";
$pfinalstatus="";
$psdetail="";
$pimg="";
$ptitleimg="";
$arr2="";
$person="";
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['pid']))
    {
        $pid=$_GET['pid'];
        $q11="select * from products where pid='$pid'";
        if($r11=mysqli_query($conn,$q11))
        {
            while($num11=mysqli_fetch_assoc($r11))
            {
                $ptype=$num11['ptype'];
                $pbrand=$num11['pbrand'];
                $pname=$num11['pname'];
                $psub=$num11['psub'];
                $pdesc=$num11['pdesc'];
                $pstock=$num11['pstock'];
                $poprice=$num11['poprice'];
                $psprice=$num11['psprice'];
                $pimg=$num11['pimg'];
                $ptitleimg=$num11['ptitleimg'];
                $psdetail=$num11['psdetail'];
                $pfinalstatus=$num11['pfinalstatus'];
            }
        }
    }
}
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_POST['YES']))
    {
        $pbrand=$_POST['pbrand'];
        $ptype=$_POST['ptype'];
        $pname=$_POST['pname'];
        $psub=$_POST['psub'];
        $pdesc=$_POST['pdesc'];
        $pstock=$_POST['pstock'];
        $poprice=$_POST['poprice'];
        $psprice=$_POST['psprice'];
        $ptitle=$_FILES['ptitle']['name'];
        if(!$ptitle == "")
        {
          unlink("../../images/employee/products/".$ptitleimg);
          move_uploaded_file($_FILES['ptitle']['tmp_name'],"../../images/employee/products/$ptitle");
          $q11="update products set ptitleimg='$ptitle' where pid='$pid'";
          if($r11=mysqli_query($conn,$q11))
          {
  
          }
        }
        $countfiles = count($_FILES['pimg']['name']);
        $filedata = $_FILES['pimg']['name'];
        if(!$countfiles == 0)
        {
            $arr2=explode("++",$pimg);  
            $len=count($arr2);
            for($j=0;$j<$len-1;$j++)
            {
                unlink("../../images/employee/products/".$arr2[$j]);
            }
            for($i=0;$i<$countfiles;$i++)
            {
                $filename = $_FILES['pimg']['name'][$i];
                move_uploaded_file($_FILES['pimg']['tmp_name'][$i],'../../images/employee/products/'.$filename);
                $person=$person . $filename . '++';
            }
        }
        $person=str_replace("'","''",$person);
        $q2="update products set ptype='$ptype',pbrand='$pbrand',pname='$pname',psub='$psub',pdesc='$pdesc',pstock='$pstock',poprice='$poprice',psprice='$psprice',pimg='$person',psdetail='1',pfinalstatus='0' where pid='$pid'";
        if($r2=mysqli_query($conn,$q2))
        {
            $msg="<b><u>   ". $pname ."</u></b>". " Product Updated SuccesFully...Now We are Going To add Size,Color and Stock...";
            header("refresh:0;url=update_product_size_info.php?pid=$pid");
        }
        else
        {
            $error="Product Updation Failed .... Please Try Again ....";    
        }
    }
    if(isset($_POST['NO']))
    {
        $pbrand=$_POST['pbrand'];
        $ptype=$_POST['ptype'];
        $pname=$_POST['pname'];
        $psub=$_POST['psub'];
        $pdesc=$_POST['pdesc'];
        $pstock=$_POST['pstock'];
        $poprice=$_POST['poprice'];
        $psprice=$_POST['psprice'];
        $ptitle=$_FILES['ptitle']['name'];
        if(!$ptitle == "")
        {
          unlink("../../images/employee/products/".$ptitleimg);
          move_uploaded_file($_FILES['ptitle']['tmp_name'],"../../images/employee/products/$ptitle");
          $q11="update products set ptitleimg='$ptitle' where pid='$pid'";
          if($r11=mysqli_query($conn,$q11))
          {
  
          }
        }
        $countfiles = count($_FILES['pimg']['name']);
        $filedata = $_FILES['pimg']['name'];
        if(!$countfiles == 0)
        {
            $arr2=explode("++",$pimg);  
            $len=count($arr2);
            for($j=0;$j<$len-1;$j++)
            {
                unlink("../../images/employee/products/".$arr2[$j]);
            }
            for($i=0;$i<$countfiles;$i++)
            {
                $filename = $_FILES['pimg']['name'][$i];
                move_uploaded_file($_FILES['pimg']['tmp_name'][$i],'../../images/employee/products/'.$filename);
                $person=$person . $filename . '++';
            }
            $q12="update products set pimg='$person' where pid='$pid'";
            echo $q12;
            if($r12=mysqli_query($conn,$q12))
            {

            }
        }
        $person=str_replace("'","''",$person);
        $q2="update products set ptype='$ptype',pbrand='$pbrand',pname='$pname',psub='$psub',pdesc='$pdesc',pstock='$pstock',poprice='$poprice',psprice='$psprice',psdetail='0',pfinalstatus='1',where pid='$pid'";
        if($r2=mysqli_query($conn,$q2))
        {
                $msg="<b><u>   ". $pname ."</u></b>". " Product Updated SuccesFully...";
                header("refresh:0;url=view_product.php?pid=$new");
        }
        else
        {
                $error="Product Updation Failed .... Please Try Again ....";    
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
    <title>Update Product</title>
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
                        <h3 class="page-title">Update Product || <font color="red"><?php echo $pname; ?> </font></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Info</h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Product Type</label>
                                            <input type="text" class="form-control" id="ptype" name="ptype" value="<?php echo $ptype; ?>" required
                                                placeholder="Product Type">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Product Brand</label>
                                            <input type="text" class="form-control" id="pbrand" name="pbrand" value="<?php echo $pbrand; ?>" required
                                                placeholder="Product Brand">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $pname; ?>" required
                                                placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Product Category</label>
                                            <select class="form-control form-control-lg" id="psub" name="psub" required>
                                                <option value=""><?php echo $psub; ?></option>
                                                <?php
                                                $q5="select * from subcategory";
                                                if($r5=mysqli_query($conn,$q5))
                                                {
                                                    while($num=mysqli_fetch_assoc($r5))
                                                    {
                                                        echo '<option value="'.$num['scname'].'">'.$num['scname'].'</option>';
                                                    }
                                                } 
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Original Price</label>
                                            <input type="number" class="form-control"  min="1" id="poprice" value="<?php echo $poprice; ?>" name="poprice"
                                                required placeholder="Original Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Sales Price</label>
                                            <input type="number" class="form-control" min="1" id="psprice" value="<?php echo $psprice; ?>" name="psprice"
                                                required placeholder="Sale Price">
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Stock & Description</h4>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Stock</label>
                                            <input type="number" class="form-control" min="0" id="pstock" name="pstock" value="<?php echo $pstock; ?>" required
                                                placeholder="Total Stock">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Product Description</label>
                                            <textarea class="form-control" id="pdesc" name="pdesc" rows="30"
                                                required><?php echo $pdesc; ?></textarea>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update Product Images</h4>
                                        <div class="form-group">
                                            <label for="images">Product Title Image</label>
                                            <input type="file" name="ptitle" class="file-upload-default"
                                                accept="image/x-png,image/gif,image/jpeg" >
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Product Title Photos " >
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Update Product Images</label>
                                            <input type="file" name="pimg[]" class="file-upload-default"
                                                accept="image/x-png,image/gif,image/jpeg" multiple >
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Product Photos " multiple>
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>

                                     </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-danger">Are You Want to Update Size,Color and Other Stock Details ?</h4><hr><hr>
                                        <h2 class="card-title text-primary">YES : We are Update Product Details And Move to Next Step....</h2>
                                        <h2 class="card-title">NO : We are Only Store Product Details Without Update Size and Color...</h2><hr><hr>
                                        <button type="submit" name="YES" class="btn btn-primary mr-2">YES</button>
                                        <button type="submit" name="NO" class="btn btn-light mr-2">NO</button>
                                        <button class="btn btn-danger" type="reset">CANCEL</button>
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