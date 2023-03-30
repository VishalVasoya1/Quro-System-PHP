
<?php 
session_start();
include "../../conn.php";
$error=FALSE;
$msg=FALSE;
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{$out='';
        $sql1 = "SELECT * from orders where payment_method='COD' and uid='".$_SESSION['uid']."' ORDER BY sno DESC";
        $result = mysqli_query($conn, $sql1);
        while($row1 = mysqli_fetch_array($result))
        {
            $order_id = $row1['order_id'];
            $output='';
            
            $product_name = $row1['product_name'];
            $price = $row1['price'];
            $quantity = $row1['quantity'];
            $uid = $row1['uid'];
            $total = $row1['total'];
            $dop = $row1['dop'];
            $status = $row1['status'];
            $payment_method = $row1['payment_method'];
            $output.='<tr><td>'.$order_id.'</td>';
            $output.='<td>'.$product_name.'</td>';
            $output.='<td>'.$dop.'</td>';
            $output.='<td>'.$uid.'</td>';
            $output.='<td>₹'.$price.'</td>';
            $output.='<td>'.$quantity.'</td>';
            $output.='<td>₹'.$total.'</td>';
            $output.='<td><form method="post">
            <input type="hidden" name="order_id" value="'.$order_id.'">
            <button type="submit" name="view" class="btn btn-outline-primary">View</button>
            </form></td></tr>';
            ?>
        <?php
            $out .= '<br> '.$output.'
            ';
        }
    
    if(isset($_POST['view']))
    {
        $_SESSION['orderid'] = $_POST['order_id'];
        echo "<script>window.location.href='order_details.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Offline Collection</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
   
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
     <link rel="shortcut icon" href="../../images/other/phone.png" />
    <link rel="stylesheet" href="style.css">
    <script src="../../assets/js/jquery.js"></script>

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
<div class="content-wrapper" style="background-color:white;">
<div class="page-header">
                        <h3 class="page-title">Total Offline Collection</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Collection</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Offline Collection</li>
                            </ol>
                        </nav>
                    </div>

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
       <div class="row  w-100">
               
                    <table id="order-listing" class="table" >
                      <thead class="bg-dark" style="color:white;">
                        <tr>
                          <th>Order id</th>
                          <th>product name</th>
                          <th>Purchased On</th>
                          <th>Customer_id</th>
                          <th>Purchased Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody> <?php echo $out;?></tbody>
                      </table>
                 
         </div>
       </div>
       <?php include "../../footer.php"; ?>
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