<?php
session_start();
include "../../conn.php";
$msg="";
$error="";
$pid="";
$pstock="";
$psize="";
$pcolor="";
$status=0;
$pname="";

$bytes = random_bytes(3);
$new=bin2hex($bytes);
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_GET['pid']))
    {
        $pid=$_GET['pid'];
        $q51="select * from products where pid='$pid'";
        if($r51=mysqli_query($conn,$q51))
        {
            while($n51=mysqli_fetch_assoc($r51))
            {
                $pname=$n51['pname'];
            }
        }
    }
    if(isset($_POST['check']))
    {
        $psize=$_POST['psize'];
        $pcolor=$_POST['pcolor'];
        $pid=$_POST['pid'];
        $q13="select * from product_size where pid='$pid' and pcolor='$pcolor' and psize='$psize'";
        if($r13=mysqli_query($conn,$q13))
        {
            $num13=mysqli_num_rows($r13);
            if($num13 >=1)
            {
                while($num14=mysqli_fetch_assoc($r13))
                {
                    $pstock=$num14['pstock'];
                    if($pstock>=1)
                    {
                        $msg="Product is Available...";
                        header("refresh:0,url=view_product_detail.php?pid=$pid&ssize=$psize&scolor=$pcolor");
                    }
                    else
                    {
                        $error="Product is Not Available...";
                        header("refresh:0,url=view_product_detail.php?pid=$pid&fsize=$psize&fcolor=$pcolor");
                    }
                }

            }
        }
    }
    if(isset($_POST['check_again']))
    {
        $psize=$_POST['psize'];
        $pcolor=$_POST['pcolor'];
        $pid=$_POST['pid'];
        $q14="select * from product_size where pid='$pid' and pcolor='$pcolor' and psize='$psize'";
        if($r14=mysqli_query($conn,$q14))
        {
            $num14=mysqli_num_rows($r14);
            if($num14 >=1)
            {
                while($num15=mysqli_fetch_assoc($r14))
                {
                    $pstock1=$num15['pstock'];
                    if($pstock1>=1)
                    {
                        $msg="Product is Available...";
                        header("refresh:0,url=view_product_detail.php?pid=$pid&ssize=$psize&scolor=$pcolor");
                    }
                    else
                    {
                        $error="Product is Not Available...";
                        header("refresh:0,url=view_product_detail.php?pid=$pid&fsize=$psize&fcolor=$pcolor");
                    }
                }

            }
        }
    }
    if(isset($_GET['pid']) && isset($_GET['ssize']) && isset($_GET['scolor']))
    {
        $status=1;
        $pid=$_GET['pid'];
        $psize=$_GET['ssize'];
        $pcolor=$_GET['scolor'];
    }
    if(isset($_GET['pid']) && isset($_GET['fsize']) && isset($_GET['fcolor']))
    {
        $status=1;
        $pid=$_GET['pid'];
        $psize=$_GET['fsize'];
        $pcolor=$_GET['fcolor'];
    }
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_GET['pid']) && isset($_GET['ssize']) && isset($_GET['scolor']))
        {
            $pid=$_GET['pid'];
            $psize=$_GET['ssize'];
            $pcolor=$_GET['scolor'];
            $pid=$_POST['pid'];
            $pprice=$_POST['pprice'];
            $pstock11=$_POST['pstock'];
            $q21="select * from cart where pid='$pid' and uid='".$_SESSION['uid']."' and psize='$psize' and pcolor='$pcolor'";
            if($r21=mysqli_query($conn,$q21))
            {
                $n21=mysqli_num_rows($r21);
                if($n21==1)
                {
                    $error="Product Already Added in Cart...";
                }
                else
                {
                    $uid=$_SESSION['uid'];
                    $q22="insert into cart values('$new','$uid','$pid','$pname','$pprice','1','$pprice','$pstock11','$psize','$pcolor','1',current_timestamp())";
                    if($r22=mysqli_query($conn,$q22))
                    {
                        $msg="Product Added in Cart...";
                    }
                    else
                    {
                        $error="Product Addition in Cart Failed";
                    }
                }
            }
        }
        else
        {
            $pdetail=$_POST['psdetail'];
            $pid=$_POST['pid'];
            $pprice=$_POST['pprice'];
            $pstock11=$_POST['pstock'];
            if($pdetail != "1")
            {
                $q21="select * from cart where pid='$pid' and uid='".$_SESSION['uid']."'";
                if($r21=mysqli_query($conn,$q21))
                {
                    $n21=mysqli_num_rows($r21);
                    if($n21==1)
                    {
                        $error="Product Already Added in Cart...";
                    }
                    else
                    {
                        $uid=$_SESSION['uid'];
                        $q22="insert into cart values('$new','$uid','$pid','$pname','$pprice','1','$pprice','$pstock11','0','0','0',current_timestamp())";
                        if($r22=mysqli_query($conn,$q22))
                        {
                            $msg="Product Added in Cart...";
                        }
                        else
                        {
                            $error="Product Addition in Cart Failed";
                        }
                    }
                }
            }
            else
            {
                $error="Please First Check Size and Color...";
            }
            
        }
    }
    if(isset($_POST['add_to_wishlist']))
    {
        $pid=$_POST['pid'];
        $q21="select * from wishlist where pid='$pid' and uid='".$_SESSION['uid']."'";
        if($r21=mysqli_query($conn,$q21))
        {
            $n21=mysqli_num_rows($r21);
            if($n21==1)
            {
                $error="Product Already Added in WishList...";
            }
            else
            {
                $uid=$_SESSION['uid'];
                $q22="insert into wishlist values('$new','$uid','$pid',current_timestamp())";
                if($r22=mysqli_query($conn,$q22))
                {
                    $msg="Product Added in Wishlist...";
                }
                else
                {
                    $error="Product Addition in Wishlist Failed";
                }
            }
        }
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
    <title>View Product Details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
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
                        <h3 class="page-title">View Product</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Product</li>
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
$q1="select * from products where pid='$pid'";
if($r1=mysqli_query($conn,$q1))
{
  while($num=mysqli_fetch_assoc($r1))
  {
    echo '
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-4 text-dark">
                <h5 class="mr-2 font-weight-semibold border-right pr-2 mr-2">Product ID</h5>
                <h5 class="font-weight-semibold"><font color="red">'.$num['pid'].'</font> || <font color="green">'.$num['ptype'].'</font></h5>
              </div>
              <div class="row">

                    
    <div class="col-md-12 mb-5">
        <div class="card rounded shadow-none border">';?>
                        <div class="row grid-margin">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="owl-carousel owl-theme rtl-carousel">
                                            <?php
                                          $arr2=explode("++",$num['pimg']);  
                                          $len=count($arr2);
                                          for($i=0;$i<$len-1;$i++)
                                          {
                                              echo '   <div class="item">
                                              <img src="../../images/employee/products/'.$arr2[$i].'" height="200px" width="200px"/>
                                            </div>';
                                          }
                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo '
      
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-xl-flex">
                        <div class="wrapper pl-0 pl-xl-4">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="mb-0 font-weight-medium text-dark">'.$num['pname'].'</h4>
                            </div>
                            <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                                <i class="mdi mdi-map-marker-outline mr-2"></i>';
                                $q13="select * from subcategory where scname='".$num['psub']."'";
                                if($r13=mysqli_query($conn,$q13))
                                {
                                while($num11=mysqli_fetch_assoc($r13))
                                {
                                $q14="select * from category where cid='".$num11['cid']."'";
                                if($r14=mysqli_query($conn,$q14))
                                {
                                while($num14=mysqli_fetch_assoc($r14))
                                {
                                echo '<p class="mb-0 text-muted">'.$num14['cname'].'</p>';
                                }
                                }
                                echo '&nbsp;&nbsp;&nbsp;<i class="mdi mdi-map-marker-outline mr-2"></i>
                                <p class="mb-0 text-muted">'.$num['psub'].'</p>';
                                }
                                }

                                echo '
                            </div>
                            <div class="wrapper d-flex align-items-start pt-3">
                                <div class="wrapper pl-0 pl-xl-2 mt-0 mt-2 mt-xl-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex align-items-center w-100">
                            <b>
                                <font color="black">Description</font>
                            </b>
                        </div>
                        <p class="text-muted mt-4">'.$num['pdesc'].'</p>
                    </div>
                    
                </div>
            </div>
            <div class="wrapper border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">BRAND</p>
                                <h4 class="font-weight-semibold mb-0 text-dark">'.$num['pbrand'].'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">STOCK</p>
                                <h4 class="font-weight-semibold mb-0 text-dark">'.$num['pstock'].'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">PRICE</p>
                                <h4 class="font-weight-semibold mb-0 text-dark product-price ">'.$num['poprice'].'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">SALE PRICE</p>
                                <h4 class="font-weight-semibold mb-0 text-primary text-dark">'.$num['psprice'].'</h4>
                            </div>
                        </div>
                       ' ;?>
                        <?php
                                    if($num['psdetail']=='1' && ($num['psub']=="Shoes" || $num['psub']=="Cloth"))
                                    {
                                    ?>
                        <div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <font color="red">Product Size and Color</font>
                                    </h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Select Size</label>
                                            <select class="form-control form-control-lg" id="psize" name="psize"
                                                required>
                                                <?php 
                                            if($psize=="")
                                            {
                                                echo ' <option value="">Choose Size</option>';
                                            }
                                            else
                                            {
                                                echo ' <option value="">'.$psize.'</option>';
                                            }
                                            ?>
                                                <?php
                                            $q12="select DISTINCT(psize) from product_size where pid='$pid'";
                                            if($r12=mysqli_query($conn,$q12))
                                            {
                                                while($num12=mysqli_fetch_assoc($r12))
                                                {
                                                    echo ' <option value="'.$num12['psize'].'">'.$num12['psize'].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Select Color</label>
                                            <select class="form-control form-control-lg" id="pcolor" name="pcolor"
                                                required>
                                                <?php 
                                            if($pcolor=="")
                                            {
                                                echo ' <option value="">Choose Color</option>';
                                            }
                                            else
                                            {
                                                echo ' <option value="">'.$pcolor.'</option>';
                                            }
                                            ?>
                                                <?php
                                            $q12="select DISTINCT(pcolor) from product_size where pid='$pid'";
                                            if($r12=mysqli_query($conn,$q12))
                                            {
                                                while($num12=mysqli_fetch_assoc($r12))
                                                {
                                                    echo ' <option value="'.$num12['pcolor'].'">'.$num12['pcolor'].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <?php
                                    if($status == 1)
                                    {
                                        echo '<button type="submit" name="available" class="btn btn-sm btn-inverse-success mr-2" disabled>Available</button>';
                                    }
                                    elseif($status == 2)
                                    {
                                        echo '<button type="submit" name="not_available" class="btn btn-sm btn-inverse-danger mr-2">Not Available</button>';
                                    }
                                    else
                                    {
                                        echo '<button type="submit" name="check" class="btn btn-sm btn-inverse-primary mr-2">Check Availablity</button>';
                                    }
                                    if($status!=0)
                                    {
                                        echo '  <button type="submit" name="check_again" class="btn btn-sm btn-inverse-primary mr-2">Check Again</button>';
                                    }
                                    ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?php 
                                    }
                                    ?>
                        <div class="col-12 grid-margin mt-5">
                            <div class="wrapper d-flex justify-content-end">
                                <form method="post">
                                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                                    <input type="hidden" name="pprice" value="<?php echo $num['psprice']; ?>" />
                                    <input type="hidden" name="pstock" value="<?php echo $num['pstock']; ?>" />
                                    <input type="hidden" name="psdetail" value="<?php echo $num['psdetail']; ?>" />
                                    <button type="submit" name="add_to_cart"
                                        class="btn btn-sm btn-inverse-danger mr-2">Add To Cart</button>
                                    <button type="submit" name="add_to_wishlist"
                                        class="btn btn-sm btn-inverse-primary mr-2">Add To Wishlist</button>
                                </form>
                            </div>
                        </div>
                        <?php
                          echo '

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     ';
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

        </div>

    </div>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>

    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>

    <script src="../../assets/js/owl-carousel.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

<!-- Mirrored from www.bootstrapdash.com/demo/connect-plus/jquery/template/demo_1/pages/samples/user-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Apr 2021 08:50:41 GMT -->

</html>