<?php
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$pname="";
$pid="";
$pcat="";

$bytes = random_bytes(3);
$new=bin2hex($bytes);
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['pid']))
    {
        $pid=$_GET['pid'];
        $q1="select * from products where pid='$pid'";
        if($r1=mysqli_query($conn,$q1))
        {
            while($n1=mysqli_fetch_assoc($r1))
            {
                $pcat=$n1['psub'];
                $pname=$n1['pname'];
            }
        }
    }
    else
    {
        header("location:index.php");
    }
    if(isset($_POST['submit']))
    {
        $psize=$_POST['psize'];
        $pcolor=$_POST['pcolor'];
        $pstock=$_POST['pstock'];
        $q2="select * from product_size where psize='$psize' and pcolor='$pcolor' and pid='$pid'";
        if($r2=mysqli_query($conn,$q2))
        {
            $n2=mysqli_num_rows($r2);
            if($n2==0)
            {
                $q3="insert into product_size values('$new','$pid','$pname','$pcat','$psize','$pcolor','$pstock',current_timestamp())";
                if($r3=mysqli_query($conn,$q3))
                {
                    $msg="Combination Of Size and Color Added SuccesFully....";
                }
                else
                {
                    $error="Combination Of Size and Color Added Failed....";
                }
            }
            else
            {
                $error="Combination Of Size and Color Are Already Available...Please Update...";
            }
        }
    }
    if(isset($_POST['DONE']))
    {
        $q1="update products set pfinalstatus='1' where pid='$pid'";
        if($r1=mysqli_query($conn,$q1))
        {
            $msg="Product Added SuccesFully With Size and Color Combinations...";
            header("refresh:1;url=view_product.php");
        }
        else
        {
            $error="Product Insertion Failed...Please Try Again...";
        }
    }    
    if(isset($_POST['FINAL_DONE']))
    {
        $q1="update products set psdetail='0',pfinalstatus='1' where pid='$pid'";
        if($r1=mysqli_query($conn,$q1))
        {
            $msg="Product Added SuccesFully...";
            header("refresh:1;url=view_product.php");
        }
        else
        {
            $error="Product Insertion Failed...Please Try Again...";
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
    <title>Update Product Size</title>
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
                        <h3 class="page-title">
                            <font color="red"><?php echo $pname; ?></font> || <font color="green"><?php echo $pcat; ?>
                            </font>
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Size and Color</li>
                            </ol>
                        </nav>
                    </div>
                    <?php
                if($pcat == "Cloth")
                {
            ?>
                    <form method="post">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Cloth Size and Color</h4>
                                    <div class="form-group">
                                        <label for="gender">Product Size</label>
                                        <select class="form-control form-control-lg" id="psize" name="psize" required>
                                            <option value="">Choose Product Size(Cloth Format)</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="2XL">2XL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Product Color</label>
                                        <select class="form-control form-control-lg" id="pcolor" name="pcolor" required>
                                            <option value="">Choose Product Color</option>
                                            <option value="Red" style="color:red">Red</option>
                                            <option value="Pink" style="color:pink">Pink</option>
                                            <option value="Orange" style="color:orange">Orange</option>
                                            <option value="Yellow" style="color:yellow">Yellow</option>
                                            <option value="Purple" style="color:purple">Purple</option>
                                            <option value="Green" style="color:green">Green</option>
                                            <option value="Blue" style="color:blue">Blue</option>
                                            <option value="Brown" style="color:brown">Brown</option>
                                            <option value="Black" style="color:black">Black</option>
                                            <option value="White">White</option>
                                            <option value="Gray" style="color:gray">Gray</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock Of Combination Of Size and Color</label>
                                        <input type="number" class="form-control" id="pstock" name="pstock" required
                                            placeholder="Total Stock">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
                    <?php
                if($pcat == "Shoes")
                {
            ?>
                    <form method="post">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Shoes Color and Size</h4>
                                    <div class="form-group">
                                        <label for="gender">Choose Shoes Size</label>
                                        <select class="form-control form-control-lg" id="psize" name="psize" required>
                                            <option value="">Choose Shoes Size</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Product Color</label>
                                        <select class="form-control form-control-lg" id="pcolor" name="pcolor" required>
                                            <option value="">Choose Product Color</option>
                                            <option value="Red" style="color:red">Red</option>
                                            <option value="Pink" style="color:pink">Pink</option>
                                            <option value="Orange" style="color:orange">Orange</option>
                                            <option value="Yellow" style="color:yellow">Yellow</option>
                                            <option value="Purple" style="color:purple">Purple</option>
                                            <option value="Green" style="color:green">Green</option>
                                            <option value="Blue" style="color:blue">Blue</option>
                                            <option value="Brown" style="color:brown">Brown</option>
                                            <option value="Black" style="color:black">Black</option>
                                            <option value="White">White</option>
                                            <option value="Gray" style="color:gray">Gray</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock Of Combination Of Size and Color</label>
                                        <input type="number" class="form-control" id="pstock" name="pstock" required
                                            placeholder="Total Stock">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
            ?>
               <?php
                 if(($pcat=="Shoes" || $pcat=="Cloth"))
                {
            ?>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Added Product Size and Color</h4>
                                <div class="row">
                                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                        <table id="sortable-table-1" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle">ID<i class="mdi mdi-chevron-down"></i></th>
                                                    <th class="sortStyle">P-ID<i class="mdi mdi-chevron-down"></i></th>
                                                    <th class="sortStyle">SIZE<i class="mdi mdi-chevron-down"></i></th>
                                                    <th class="sortStyle">COLOR<i class="mdi mdi-chevron-down"></i></th>
                                                    <th class="sortStyle">STOCK<i class="mdi mdi-chevron-down"></i></th>
                                                    <th class="sortStyle">TIMESTAMP<i class="mdi mdi-chevron-down"></i>
                                                    </th>
                                                    <th class="sortStyle" width="20%">Action<i
                                                            class="mdi mdi-chevron-down"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                        $q2="select * from product_size where pid='$pid'";
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
                                   <button type="submit" name="delete" class="btn btn-sm btn-danger mr-2"><a href="delete_product_size.php?psid='.$num2['psid'].'" style="color:white">DELETE</a></button>
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
                 if(($pcat=="Shoes" || $pcat=="Cloth"))
                {
                ?>
                    <form method="post">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-danger">If You Add All Combination Of Color and
                                        Size...Please Press Done Button...</h4>
                                    <button type="submit" name="DONE" class="btn btn-primary mr-2">DONE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php 
                }
                ?>
                <?php
                if($pcat != "Shoes" && $pcat != "Cloth")
                {
            ?>
                    <form method="post">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-danger">This Product is Not available For Size and Color
                                        Combination.... Please Done...</h4>
                                    <button type="submit" name="FINAL_DONE" class="btn btn-primary mr-2">DONE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
            ?>
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
