<?php 
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE; 
$uname="";
$umno="";
$house="";
$road="";
$pincode="";
$city="";
$state="";
$country="";
$aid="";
$final=0;
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    $q1 ="select * from user_address where uid='".$_SESSION['uid']."' and status='1'";
    if($r1=mysqli_query($conn,$q1))
    {
    $num1=mysqli_num_rows($r1);
    if($num1 ==0)
    {
        $error="Please First Add Address Than Go To CheckOut";
        header("refresh:1;url=add_address.php");
    }
      while($n1 = mysqli_fetch_assoc($r1))
      {
          $aid=$n1['aid'];
          $uname=$n1['uname'];
          $umno=$n1['umno'];
          $house=$n1['house'];
          $road=$n1['road'];
          $pincode=$n1['pincode'];
          $city=$n1['city'];
          $state=$n1['state'];
          $country=$n1['country'];
      }
    }
    if(isset($_POST['continue']))
    {
      header("location:payment_option.php");
    }
    if(isset($_POST['address']))
    {
      header("location:change_address.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckOut</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">

    <link rel="shortcut icon" href="../../images/other/phone.png" />

    <link rel="stylesheet" href="style.css">
    <script src="../../assets/js/checkdesign.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
</head>

<body>

    <div class="container-scroller">


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
                        <h3 class="page-title">CheckOut</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">CheckOut</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Final Payment</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Address Details</h4>
                                    <hr>
                                    <form method="post">
                                    <font color="black" size="4px"><b><?php echo $uname; ?></b></font><br>
                                    <font color="black" size="3px"><?php echo $house.','.$road.','; ?></font><br>
                                    <font color="black" size="3px"><?php echo $city.'-'.$pincode.','; ?></font><br>
                                    <font color="black" size="3px"><?php echo $state.','; ?></font><br>
                                    <font color="black" size="3px"><?php echo $country; ?></font><br><br>
                                    <h2 class="font-weight-bold"><b></b></h2>
                                    <input type="hidden" value="<?php echo $aid; ?>" name="aid" />
                                    <button type="submit" name="address"
                                        class="btn btn-sm btn-inverse-danger mr-2">Add Address Or Change
                                        Address</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-nav-wrapper row">
                                        <div class="col-lg-4 col-md-5">
                                            <ul class="nav product-filter-nav">
                                                <li class="active"><a href="#">YOUR CART</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-8 col-md-7 product-filter-options">
                                            <ul class="account-user-info ml-auto">
                                                <li><a href="view_product.php" class="text-dark">Add Other Product</a></li>
                                                <li><a href="wishlist.php" class="text-dark">Wishlist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row product-item-wrapper">
                                        <?php
                                                $q11="select * from cart where uid='".$_SESSION['uid']."'";
                                                if($r11=mysqli_query($conn,$q11))
                                                {
                                                    while($n11=mysqli_fetch_assoc($r11))
                                                    {
                                                      $pid=$n11['pid'];
                                                      $q1="select * from products where pid='$pid'";
                                                      if($r1=mysqli_query($conn,$q1))
                                                      {
                                                          while($n1=mysqli_fetch_assoc($r1))
                                                          {
                                                        echo '
                                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 product-item">
                                                             <div class="card">
                                                                    <div class="card-body">
                                                        <div class="action-holder">
                                                        <div class="sale-badge bg-success">New</div>
                                                        <span class="favorite-button"><i class="mdi mdi-heart-outline"></i></span>
                                                        </div>
                                                    <a href="view_product_detail.php?pid='.$n1['pid'].'" style="width:310px"> <img class="product_image" src="../../images/employee/products/'.$n1['ptitleimg'].'" alt="product image" height="240px"></a>
                                                        <p class="product-title text-dark">'.$n1['pname'].'</p>
                                                        <p class="product-price text-dark">&#8377;'.$n1['psprice'].'</p>
                                                        <p class="product-actual-price">&#8377;'.$n1['poprice'].'</p>
                                                        <ul class="product-variation">';  
                                                        if($n11['psize']!="0" && $n11['pcolor']!="0")
                                                        {
                                                            echo ' <li><a href="#">'.$n11['psize'].'</a></li>';
                                                        echo ' <li><a href="#">'.$n11['pcolor'].'</a></li>';
                                                        }
                                                        
                                                        echo '
                                                        </ul>
                                                        <p class="product-description product-title text-dark">Quantity: '.$n11['qty'].'</p>
                                                    </div>
                                                    </div>
                                                </div>';
                                                          }
                                                        }
                                                    }
                                                }
                                                ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 grid-margin mt-4">
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
                                                        <th class="sortStyle font-weight-bold">PID<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">PRICE<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">QTY<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                        <th class="sortStyle font-weight-bold">TOTAL<i
                                                                class="mdi mdi-chevron-down"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php
                        $q2="select * from cart where uid='".$_SESSION['uid']."'";
                        if($r2=mysqli_query($conn,$q2))
                        {
                                while($num2=mysqli_fetch_assoc($r2))
                                {
                                  echo '<tr>
                                  <td>'.$num2['pid'].'</td>
                                  <td>'.$num2['pprice'].'</td>
                                  <td>'.$num2['qty'].'</td>
                                  <td>'.$num2['total'].'</td>
                                </tr>
                                '; 
                                $final = $final + intval($num2['total']);
                                $_SESSION['total1']= $final;
                                } 
                          }
                      ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <h2>Grand Total : </h2>
                                                        </td>
                                                        <td>
                                                            <h2><?php echo $final;  ?></h2>
                                                        </td>
                                                    </tr>
                                                    
                                                 
                                                </tbody>
                                            </table>
                                            <form method="post">
                                            <button type="submit" name="continue" class="btn btn-sm btn-inverse-primary mr-2 float-right">Continue Payment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/owl-carousel.js"></script>
</body>

</html>