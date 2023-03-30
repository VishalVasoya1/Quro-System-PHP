<?php
session_start();
include "../../conn.php";
include('../../qrcode/libs/phpqrcode/qrlib.php'); 
$error=FALSE;
$msg=FALSE;
$bytes = random_bytes(3);
$new=bin2hex($bytes);
$person="";
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
      $tempDir = '../../qrcode/temp/'; 
      move_uploaded_file($_FILES['ptitle']['tmp_name'],'../../images/employee/products/'.$ptitle);
      $countfiles = count($_FILES['pimg']['name']);
      $filedata = $_FILES['pimg']['name'];
      for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['pimg']['name'][$i];
        move_uploaded_file($_FILES['pimg']['tmp_name'][$i],'../../images/employee/products/'.$filename);
        $person=$person . $filename . '++';
    } 
      $q1="select * from products where pname='$pname'";
      if($r1=mysqli_query($conn,$q1))
      {
          $n1=mysqli_num_rows($r1);
          if($n1<=0)
          {
              $imgname=$new.'.png';
              $person=str_replace("'","''",$person);
              $q2="insert into products values('$new','$ptype','$pbrand','$pname','$psub','$pdesc','$pstock','$poprice','$psprice','$ptitle','$person','1','$imgname','0',0,current_timestamp())";
              if($r2=mysqli_query($conn,$q2))
              {
                   $msg="<b><u>   ". $pname ."</u></b>". " Product Added SuccesFully...Now We are Going To add Size,Color and Stock...";
                  $finalname='Product ID:'.$new.'@@ Product Name:'.$pname;
                   	$codeContents ="$finalname"; 
	               QRcode::png($codeContents, $tempDir.''.$new.'.png', QR_ECLEVEL_L, 5);
                   header("refresh:0;url=product_size.php?pid=$new");
              }
              else
              {
                  $error="Product Insertion Failed .... Please Try Again ...";    
              }
          }
          else
          {
            $error="Product Name is Already Available....";
          }
      }
      else
      {
          $error="Error in Query";
      }
  }
  if(isset($_POST['NO']))
  {
      $pbrand=$_POST['pbrand'];
      $pname=$_POST['pname'];
      $ptype=$_POST['ptype'];
      $psub=$_POST['psub'];
      $pdesc=$_POST['pdesc'];
      $pstock=$_POST['pstock'];
      $poprice=$_POST['poprice'];
      $psprice=$_POST['psprice'];
      $ptitle=$_FILES['ptitle']['name'];
      $tempDir = '../../qrcode/temp/'; 
      move_uploaded_file($_FILES['ptitle']['tmp_name'],'../../images/employee/products/'.$ptitle);
      $countfiles = count($_FILES['pimg']['name']);
      $filedata = $_FILES['pimg']['name'];
      for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['pimg']['name'][$i];
        move_uploaded_file($_FILES['pimg']['tmp_name'][$i],'../../images/employee/products/'.$filename);
        $person=$person . $filename . '++';
    } 
      $q1="select * from products where pname='$pname'";
      if($r1=mysqli_query($conn,$q1))
      {
          $n1=mysqli_num_rows($r1);
          if($n1<=0)
          {
              $imgname=$new.'.png';
              $person=str_replace("'","''",$person);
              $q2="insert into products values('$new','$ptype','$pbrand','$pname','$psub','$pdesc','$pstock','$poprice','$psprice','$ptitle','$person','0','$imgname','1',0,current_timestamp())";
              if($r2=mysqli_query($conn,$q2))
              {
                   $msg="<b><u>   ". $pname ."</u></b>". " Product Added SuccesFully....";
                    $finalname='Product ID:'.$new.'@@ Product Name:'.$pname;
                   	$codeContents ="$finalname"; 
	               QRcode::png($codeContents, $tempDir.''.$new.'.png', QR_ECLEVEL_L, 5);
	               header("refresh:0;url=view_product.php");
              }
              else
              {
                  $error="Product Insertion Failed .... Please Try Again ....";    
              }
          }
          else
          {
            $error="Product Name is Already Available....";
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
    <title>Add product</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
   
    <link rel="shortcut icon" href="../../images/other/phone.png" />
    	<script src="../../qrcode/libs/navbarclock.js"></script>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
                        <h3 class="page-title">Add Product</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                                            <input type="text" class="form-control" id="ptype" name="ptype" required
                                                placeholder="Product Type">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Product Brand</label>
                                            <input type="text" class="form-control" id="pbrand" name="pbrand" required
                                                placeholder="Product Brand">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" class="form-control" id="pname" name="pname" required
                                                placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Product Category</label>
                                            <select class="form-control form-control-lg" id="psub" name="psub" required>
                                                <option value="">Product Category</option>
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
                                            <input type="number" class="form-control"  min="1" id="poprice" name="poprice"
                                                required placeholder="Original Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Sales Price</label>
                                            <input type="number" class="form-control" min="1" id="psprice" name="psprice"
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
                                            <input type="number" class="form-control" min="0" id="pstock" name="pstock" required
                                                placeholder="Total Stock">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Product Description</label>
                                            <textarea class="form-control" id="pdesc" name="pdesc" rows="30"
                                                required></textarea>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Upload Product Images</h4>
                                        <div class="form-group">
                                            <label for="images">Product Title Image</label>
                                            <input type="file" name="ptitle" class="file-upload-default"
                                                accept="image/x-png,image/gif,image/jpeg"  required>
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
                                            <label for="images">Product Images</label>
                                            <input type="file" name="pimg[]" class="file-upload-default"
                                                accept="image/x-png,image/gif,image/jpeg" multiple required>
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
                                        <h4 class="card-title text-danger">Are You Want to add Size,Color and Other Stock Details ?</h4><hr><hr>
                                        <h2 class="card-title text-primary">YES : We are Store Product Details And Move to Next Step....</h2>
                                        <h2 class="card-title">NO : We are Only Store Product Details Without Size and Color...</h2><hr><hr>
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