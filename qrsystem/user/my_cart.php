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
$bytes = random_bytes(3);
$new=bin2hex($bytes);
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_POST['go_shopping']))
    {
        header("location:view_product.php");
    }
    if(isset($_POST['update']))
    {
        $pqty=$_POST['pqty'];
        $cpid=$_POST['cpid'];
        $pprice=$_POST['pprice'];
        $finaltotal=intval($pqty)*intval($pprice);
        $q21="select * from cart where cid='$cpid'";
        if($r21=mysqli_query($conn,$q21))
        {
            while($n21=mysqli_fetch_assoc($r21))
            {
                $fstock=$n21['pstock'];
                if($fstock<$pqty)
                {
                    $error="Only ".$fstock. " Qunatity Available....Please Enter Little Value..."; 
                }
                else
                {
                    $q13="update cart set qty='$pqty',total='$finaltotal' where cid='$cpid'";
                    if($r13=mysqli_query($conn,$q13))
                    {
                        $msg="Quantity Updated SuccesFully...";
                        header("refresh:0,url=my_cart.php");
                    }
                    else
                    {
                        $error="Quantity Updation is Failed...";
                        header("refresh:0,url=my_cart.php");
                    }
                }
            }
        }
      
    }
    if(isset($_POST['update_size']))
    {
        $pqty=$_POST['pqty'];
        $cpid=$_POST['cpid'];
        $pprice=$_POST['pprice'];
        $finaltotal=intval($pqty)*intval($pprice);
        $q21="select * from cart where cid='$cpid'";
        if($r21=mysqli_query($conn,$q21))
        {
            while($n21=mysqli_fetch_assoc($r21))
            {
                $fstock=$n21['pstock'];
                if($fstock<$pqty)
                {
                    $error="Only ".$fstock. " Qunatity Available....Please Enter Little Value..."; 
                }
                else
                {
                    $q13="update cart set qty='$pqty',total='$finaltotal' where cid='$cpid'";
                    if($r13=mysqli_query($conn,$q13))
                    {
                        $msg="Quantity Updated SuccesFully...";
                        header("refresh:0,url=my_cart.php");
                    }
                    else
                    {
                        $error="Quantity Updation is Failed...";
                        header("refresh:0,url=my_cart.php");
                    }
                }
            }
        }
      
    }
    if(isset($_POST['remove_to_cart']))
    {
        $cid=$_POST['cid'];
        $q14="delete from cart where cid='$cid'";
        if($r14=mysqli_query($conn,$q14))
        {
            $msg="Product Remove SuccesFully From Cart...";
            header("refresh:0,url=my_cart.php");
        }
        else
        {
            $msg="Product Remove Failed From Cart...";
            header("refresh:0,url=my_cart.php");
        }
    }
    if(isset($_POST['checkout']))
    {
        $uid=$_SESSION['uid'];
        $q15="select * from user_address where uid='$uid'";
        if($r15=mysqli_query($conn,$q15))
        {
            $n15=mysqli_num_rows($r15);
            if($n15>=1)
            {
                header("location:checkout.php");
            }
            else
            {
                header("location:add_address.php");
            }
            
        }
    }
    if(isset($_POST['remove_all_product']))
    {
        $uid=$_SESSION['uid'];
        $q15="delete from cart where uid='$uid'";
        if($r15=mysqli_query($conn,$q15))
        {
            $msg="We are Remove All Product From Cart...";
            header("refresh:0,url=view_product.php");
        }
        else
        {
            $error="Not Remove All Products....";
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
    <title>My Cart</title>
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
                        <h3 class="page-title">View Cart</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Cart</li>
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
                        $cpid="";
                        $total=0;
$q1="select * from cart where uid='".$_SESSION['uid']."'";
if($r1=mysqli_query($conn,$q1))
{
  while($n1=mysqli_fetch_assoc($r1))
  {
        $cpid=$n1['pid'];        
        $q22="select * from products where pid='$cpid'";
        if($r22=mysqli_query($conn,$q22))
        {
            while($num=mysqli_fetch_assoc($r22))
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
                                        <h4 class="font-weight-semibold mb-0 text-dark product-price ">'.'&#8377;'. $num['poprice'].'</h4>
                                    </div>
                                </div>
                                <div class="col d-flex mt-2 mt-xl-0">
                                    <div
                                        class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                        <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                                    </div>
                                    <div class="wrapper pl-3">
                                        <p class="mb-0 font-weight-medium text-muted">SALE PRICE</p>
                                        <h4 class="font-weight-semibold mb-0 text-primary text-dark">'.'&#8377;'. $num['psprice'].'</h4>
                                    </div>
                                </div>

                                <div class="col d-flex align-items-center">
                                    <div class="image-grouped ml-auto">
                                        <div class="image-grouped ml-auto">
                                            <form method="post">
                                                <input type="hidden" name="pid" value="'.$num['pid'].'">
                                                ';
                                                if($num['pstock']>=1)
                                                {
                                                echo '<button type="submit" name="active"
                                                    class="btn btn-sm btn-inverse-success mr-2" disabled>Available</button>';
                                                }
                                                else
                                                {
                                                echo '<button type="submit" name="deactive"
                                                    class="btn btn-sm btn-inverse-danger mr-2" disabled>Not Available</button>';
                                                }
                                                echo '
                                            </form>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        ';
                                    echo '
                                    </div>
                                </div>
                            ' ;?>
                        <?php
                            if($n1['psizedetail']=="1")
                            {
                                ?>
                        <div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <font color="red">Selected Size and Color</font>
                                    </h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="cpid" value="<?php echo $n1['cid']; ?>" />
                                            <input type="hidden" name="pprice" value="<?php echo $n1['pprice']; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">SIZE</label>
                                            <input type="text" class="form-control" id="ename" name="psize"
                                                value="<?php echo $n1['psize'];?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">COLOR</label>
                                            <input type="text" class="form-control" id="ename" name="pcolor"
                                                value="<?php echo $n1['pcolor'];?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">QUANTITY</label>
                                            <input type="number" class="form-control" id="pcolor" name="pqty" min="1"
                                                value="<?php echo $n1['qty'];?>">
                                        </div>
                                        <button type="submit" name="update"
                                            class="btn btn-sm btn-inverse-success mr-2">Update Quantity</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                           <?php
                            if($n1['psizedetail']=="0")
                            {
                                ?>
                        <div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <font color="red">Update Quantity</font>
                                    </h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="cpid" value="<?php echo $n1['cid']; ?>" />
                                            <input type="hidden" name="pprice" value="<?php echo $n1['pprice']; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">QUANTITY</label>
                                            <input type="number" class="form-control" id="pcolor" name="pqty" min="1"
                                                value="<?php echo $n1['qty'];?>">
                                        </div>
                                        <button type="submit" name="update_size"
                                            class="btn btn-sm btn-inverse-success mr-2">Update Quantity</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                         if($n1['psizedetail']=="1")
                            {
                                    echo '<div class="col-12 grid-margin mt-2">
                                        <div class="wrapper d-flex justify-content-end">';
                                        
                                            $finalamt=intval($n1['pprice'])*intval($n1['qty']); 
                                            $total=$total + $finalamt;
                                            echo '
                                            <form method="post">
                                                <input type="hidden" name="cid" value="'.$n1['cid'].'">
                                                <button type="submit" name="remove_to_cart"
                                                    class="btn btn-sm btn-inverse-danger mr-2">Remove</button>
                                                <button class="btn btn-sm btn-inverse-success mr-2" disabled>Product Amount :
                                                </button>
                                                <button class="btn btn-sm btn-inverse-danger mr-2"
                                                    disabled>&#8377;'. $n1['pprice'] . ' * ' . $n1['qty'].'</button>
                                                <button class="btn btn-sm btn-inverse-primary mr-2"
                                                    disabled>&#8377;'. $finalamt.'</button>
                                            </form>
                                        </div>
                                    </div>';
                            }
                            else
                            {
                                    echo '<div class="col-12 grid-margin mt-5">
                                        <div class="wrapper d-flex justify-content-end">';
                                        
                                            $finalamt=intval($n1['pprice'])*intval($n1['qty']); 
                                            $total=$total + $finalamt;
                                            echo '
                                            <form method="post">
                                                <input type="hidden" name="cid" value="'.$n1['cid'].'">
                                                <button type="submit" name="remove_to_cart"
                                                    class="btn btn-sm btn-inverse-danger mr-2">Remove</button>
                                                <button class="btn btn-sm btn-inverse-success mr-2" disabled>Product Amount :
                                                </button>
                                                <button class="btn btn-sm btn-inverse-danger mr-2"
                                                    disabled>&#8377;'. $n1['pprice'] . ' * ' . $n1['qty'].'</button>
                                                <button class="btn btn-sm btn-inverse-primary mr-2"
                                                    disabled>&#8377;'. $finalamt.'</button>
                                            </form>
                                        </div>
                                    </div>';
                            }
                        ?>
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
                                    
  }
}
?>
                        <?php
                        if($total == 0)
                        {
                            echo '<div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <form method="post">
                                    <div class="card-body">
                                       <center> <h4 class="card-title">Your Cart is Empty....</h4></center>
                                        <div class="form-group">
                                        <center><button  name="go_shopping" class="btn btn-sm btn-inverse-primary mr-2" style="height:50px;width:250px">GO FOR SHOPPING</button></center>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
                        } 
                        ?>
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <form method="post">
                                    <div class="card-body">
                                        <h4 class="card-title">Final Amount</h4>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Final Amount</label>
                                            <input type="text" class="form-control" id="adhar"
                                                value="<?php echo '&#8377;'. $total;?>" name="total" disabled>
                                        </div>
                                        <?php
                                        if($total == 0)
                                        {
                                            echo '<button  name="out" class="btn btn-sm btn-inverse-primary mr-2" disabled>CheckOut</button>
                                            <button type="submit" name="remove" class="btn btn-sm btn-inverse-danger mr-2" disabled>Remove All</button>';
                                        }
                                        else
                                        {
                                            echo '<button type="submit" name="checkout" class="btn btn-sm btn-inverse-primary mr-2">CheckOut</button>
                                            <button type="submit" name="remove_all_product" class="btn btn-sm btn-inverse-danger mr-2">Remove All</button>';
                                        } 
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>

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