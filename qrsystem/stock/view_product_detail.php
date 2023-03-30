<?php 
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$pid="";
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['pid']))
    {
        $pid=$_GET['pid'];
    }
  if(isset($_POST['deactive']))
  {
    $pid=$_POST['pid'];
    $q1="update products set qrcodeimg=1 where pid='$pid'";
    if($r1=mysqli_query($conn,$q1))
    {
        $msg="Product Active SuccesFully";
        // header("location:employee_list.php");
    }
  }
  if(isset($_POST['active']))
  {
    $pid=$_POST['pid'];
    $q1="update products set qrcodeimg=0 where pid='$pid'";
    if($r1=mysqli_query($conn,$q1))
    {
      $msg="Product Deactive SuccesFully";
      // header("location:employee_list.php");
    }
  }
  if(isset($_POST['update']))
  {
    $pid=$_POST['pid'];
    header("location:update_product.php?pid=$pid");
  }
  if(isset($_POST['remove']))
  {
    $pid=$_POST['pid'];
    header("location:delete_product.php?pid=$pid");
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
            <div class="main-panel">
                <div class="content-wrapper">
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
                    <div class="col-md-3">
                        <div class="wrapper d-flex justify-content-end">
                            <form method="post">
                                <input type="hidden" name="pid" value="'.$num['pid'].'">
                                <button type="submit" name="update"
                                    class="btn btn-sm btn-inverse-primary mr-2">UPDATE</button>
                                <button type="submit" name="remove" class="btn btn-sm btn-inverse-danger mr-2">REMOVE</button>
                            </form>
                        </div>
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
                                <p class="mb-0 font-weight-medium text-muted">O. PRICE</p>
                                <h4 class="font-weight-semibold mb-0 text-dark">'.$num['poprice'].'</h4>
                            </div>
                        </div>
                        <div class="col d-flex mt-2 mt-xl-0">
                            <div
                                class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                            </div>
                            <div class="wrapper pl-3">
                                <p class="mb-0 font-weight-medium text-muted">S. PRICE</p>
                                <h4 class="font-weight-semibold mb-0 text-primary text-dark">'.$num['psprice'].'</h4>
                            </div>
                        </div>

                        <div class="col d-flex align-items-center">
                            <div class="image-grouped ml-auto">
                                <div class="image-grouped ml-auto">
                                     <form method="post">
                                       
                                    </form>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ';
                              echo '
                             </div>
                          </div>
                       ' ;?>
                        <?php
                        if($num['psdetail']=="1" && $num['pfinalstatus']=="1" && ($num['psub']=="Shoes" || $num['psub']=="Cloth"))
                        {
                          ?>
                        <div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <font color="red">Product Size and Color</font>
                                    </h4>
                                    <div class="row">
                                        <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                            <table id="sortable-table-1" class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="sortStyle font-weight-bold">ID<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">P-ID<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">SIZE<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">COLOR<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">STOCK<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">TIMESTAMP<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold" width="20%">
                                                            Action<i class="mdi mdi-chevron-down"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php
                        $q2="select * from product_size where pid='".$num['pid']."'";
                        if($r2=mysqli_query($conn,$q2))
                        {
                                while($num2=mysqli_fetch_assoc($r2))
                                {
                                  echo '<tr>
                                  <td>'.$num2['psid'].'</td>
                                  <td>'.$num2['pid'].'</td>
                                  <td>'.$num2['psize'].'</td>
                                  <td>'.$num2['pcolor'].'</td>
                                  <td>'.$num2['pstock'].'</td>
                                  <td>'.$num2['stamp'].'</td>
                                  <td>   <button type="submit" name="update" class="btn btn-sm btn-primary mr-2"><a href="update_product_size.php?psid='.$num2['psid'].'" style="color:white">UPDATE</a></button> 
                                   <button type="submit" name="delete" class="btn btn-sm btn-danger  mr-2"><a href="delete_product_size.php?psid='.$num2['psid'].'" style="color:white">DELETE</a></button>
                               </td>
                                </tr>';
                                } 
                          }
                      ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if($num['psdetail']=="1" && $num['pfinalstatus']=="0")
                        {
                          ?>
                        <div class="col-12 grid-margin border mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-danger">Product Insertion is
                                        InComplete...Please Finish it...</h4>
                                    <button type="submit" name="complete" class="btn btn-primary mr-2"><a
                                            href="product_size.php?pid=<?php echo $num['pid']; ?>"
                                            style="color:white">Complete Insertion</a></button>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php 
                        echo '
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                       <button type="submit" name="update" class="btn btn-sm btn-primary mr-2"><a target="_blank" href="../../qrcode/temp/'.$num['qrcodeimg'].'" style="color:white">View QRCode</a></button> 
                                   <button type="submit" name="delete" class="btn btn-sm btn-danger mr-2"><a href="../../qrcode/download.php?file='.$num['qrcodeimg'].'" style="color:white">Download QRCode</a></button>
                                </div>
                            </div>
                        </div>';
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