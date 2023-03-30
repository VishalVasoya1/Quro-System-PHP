<?php 
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
$address_id = $_GET['address'];
$selectquery = "SELECT * FROM user_address where add_id=$address_id";
$queryselect = mysqli_query($conn,$selectquery);
$result = mysqli_fetch_assoc($queryselect);
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
   
    if(isset($_POST['save'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $companyname=$_POST['companyname'];
        $country=$_POST['country'];
        $address=$_POST['address'];
        $address1=$_POST['address1'];
        $pincode=$_POST['pincode'];
        $city=$_POST['city'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $additional = $_POST['additional'];
       // $addinsert = "insert into user_address(uid,firstname,lastname,companyname,country,address,address1,pincode,city,phone,email,additional_info) values('$uid','$firstname','$lastname','$companyname','$country','$address','$address1',$pincode,'$city','$phone','$email','$additional')";
        $update = "update user_address set firstname='$firstname',lastname='$lastname',companyname='$companyname',country='$country',address='$address',address1='$address1',pincode=$pincode,city='$city',phone=' $phone',email='$email',additional_info='$additional' where add_id= $address_id";
        if(mysqli_query($conn,$update))
        {
            $msg = "address saved successfully";
        }
        else
        {
            $error = "address not saved successfully!please check your deta";
        }



   
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update CheckOut</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
 //include "themes/header.php";
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
<h3><strong>Checkout Page</strong></h3>
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
       <!--Section: Block Content-->
<section>

<!--Grid row-->
<div class="row">

  <!--Grid column-->

  <div class="col-lg-8 mb-4">

    <!-- Card -->
    <div class="card wish-list pb-1">
      <div class="card-body">

        <h5 class="mb-2">Delivery Address Info</h5>
        <form method="post" enctype="multipart/form-data">

            <!-- Grid row -->
            <div class="row">
            <div class="col-lg-6">
                <div class="md-form md-outline mb-0 mb-lg-4">
                <label for="firstName">First name</label>
                <input type="text" id="firstName"  name="firstname" class="form-control mb-0 mb-lg-2" value="<?php echo $result['firstname'];?>" Required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="md-form md-outline">
                <label for="lastName">Last name</label>

                <input type="text" id="lastName" name="lastname" class="form-control" value="<?php echo $result['lastname'];?>" Required>
                </div>
            </div>
            </div><br>
            <div class="md-form md-outline my-0">
            <label for="companyName">Company name (optional)</label>
            <input type="text" id="companyName" name="companyname" class="form-control mb-0" value="<?php echo $result['companyname'];?>">
            </div><br>
            <div class="d-flex flex-wrap">
            <label>Country</label>
            <div class="select-outline position-relative w-100">
                <select class="mdb-select md-form md-outline w-100 p-2" name="country" value="<?php echo $result['country'];?>" Required>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="canada">canada</option>
                </select>
            </div>
            </div><br>
            <div class="md-form md-outline mt-0">          
            <label for="form14">Address</label>
            <input type="text" id="form14" name="address" placeholder="House number and street name" class="form-control" value="<?php echo $result['address'];?>" Required>
            </div><br>
            <div class="md-form md-outline">
            <label for="form15">Address</label>
            <input type="text" id="form15" name="address1" placeholder="Apartment, suite, unit etc. (optional)"
                class="form-control" value="<?php echo $result['address1'];?>" Required>
            </div><br>
            <div class="md-form md-outline">
            <label for="form16">Postcode / ZIP</label>
            <input type="text" id="form16" name="pincode" class="form-control" value="<?php echo $result['pincode'];?>" Required>
            </div><br>
            <div class="md-form md-outline">
            <label for="form17">Town / City</label>
            <input type="text" id="form17" name="city" class="form-control" value="<?php echo $result['city'];?>" Required>
            </div><br>
            <div class="md-form md-outline">
            <label for="form18">Phone</label>
            <input type="mobile" id="form18" name="phone" class="form-control" value="<?php echo $result['phone'];?>"  Required>
            </div><br>
            <div class="md-form md-outline">
            <label for="form19">Email address</label>
            
            <input type="email" id="form19" name="email" class="form-control" value="<?php echo $result['email'];?>" Required>
            </div><br>
            <div class="md-form md-outline">
            <label for="form76">Additional information(Optinal)</label>
            <textarea id="form76"  name="additional" class="md-textarea form-control" rows="4"><?php echo $result['additional_info'];?></textarea>
            </div><br>

            <div class="pull-right  pl-0 mb-4 mb-lg-0">
                <button type="submit" name="save" class="btn btn-success">Save</button>
            </div>
        </form>

      </div>
    </div>
    <!-- Card -->

  </div>
    </form>

  <!--Grid column-->

  <!--Grid column-->
  <div class="col-lg-4">

    <!-- Card -->
    <div class="card mb-4">
      <div class="card-body">

        <h5 class="mb-3">The total amount of</h5>

        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            Temporary amount
            <?php  $tot ="SELECT SUM(total) as t1 from cart where `uid`='$_SESSION[uid]'";
              $result = mysqli_query($conn,$tot);
              $fetch = mysqli_fetch_array($result);
              $total = $fetch['t1'];
            ?>
            <span>₹<?php echo $total ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
            Shipping
            <span>Free</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>The total amount of</strong>
             
            </div>
            <span><strong>₹<?php echo $total ?></strong></span>
          </li>
        </ul>
      <a href="order_review.php">  <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Continue Payment</button></a>
      </div>
    </div>
    <!-- Card -->

    <!-- Card -->
    <div class="card mb-4">
      <div class="card-body">

        <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
          aria-expanded="false" aria-controls="collapseExample">
          Add a discount code (optional)
          <span><i class="fas fa-chevron-down pt-1"></i></span>
        </a>

        <div class="collapse" id="collapseExample">
          <div class="mt-3">
            <div class="md-form md-outline mb-0">
              <input type="text" id="discount-code" class="form-control font-weight-light"
                placeholder="Enter discount code">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Card -->

  </div>
  <!--Grid column-->

</div>
<!--Grid row-->

</section>
<!--Section: Block Content-->
    </div>
    </div>
</div>
       <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/owl-carousel.js"></script>
</body>
</html>