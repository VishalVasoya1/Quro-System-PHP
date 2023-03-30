<?php
 session_start();
 $uid1="";
 $msg="";
 $error="";
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

	

include "../../conn.php";
       
      
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";


$paramList = $_POST;

$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		

	if (isset($_POST) && count($_POST)>0 )
	{ 
		
	

    //    $uid1 =$_SESSION['uid'];
    //     $total=$_SESSION['total1'];
    //     $oid=$_SESSION['oid'];
		$MID = $_POST['MID'];
		$TXNID = $_POST['TXNID'];

    
    $PAYMENTMODE = $_POST['PAYMENTMODE'];
    $CURRENCY = $_POST['CURRENCY'];
    $TXNDATE = $_POST['TXNDATE'];
    $STATUS = $_POST['STATUS'];
    $RESPCODE = $_POST['RESPCODE'];
    $RESPMSG = $_POST['RESPMSG'];
    $GATEWAYNAME = $_POST['GATEWAYNAME'];
    $BANKTXNID = $_POST['BANKTXNID'];
    $BANKNAME = $_POST['BANKNAME'];
   

		$query ="INSERT INTO `transection`( `tid`,  `currency`, `gateway`, `respmsg`, `bankname`, `respcord`,  `status`, `banktxnid`, `txndate`, `mid`) VALUES ('$TXNID','$CURRENCY','$GATEWAYNAME','$RESPMSG','$BANKNAME',' $RESPCODE',' $STATUS','$BANKTXNID','$TXNDATE','$MID')";

		if($r1=mysqli_query($conn,$query)){
                   $msg="Payment Successfully";
                   header("refresh:2;url=http://localhost/final/qrsystem/user/new.php?tid=$TXNID");
		}
		

		// header("location:");
	}
	}
	else {
		
	}
	   


	

}
else {
	$error="Transaction is Failed Plese Go To The Cart Page Again";
	header("refresh:2;url=my_cart.php");
}


?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
</head>
<body>
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
</body>