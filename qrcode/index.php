<?php
$f = "visit.php";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
} 
 
include('libs/phpqrcode/qrlib.php'); 

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$email = $_POST['compony'];
	$subject =  $_POST['subject'];
	$filename =$email;
	$body =  $_POST['msg'];

	$codeContents ='Company/Category Name='. $email.'Product_Name='.$subject.'Product_ID='.$body; 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);

	//if u want to save qr into database 

	// $con =mysqli_connect('localhost','root','','practice');
	// $query ="INSERT INTO `qrcode`(`cname`, `pname`, `number`)  
	// 	VALUES ('$email','$subject','$body')"; 
	// $run = mysqli_query($con,$query); 
}


?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	<title>KarmaWeb-QR Code</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/karma_favicon.png" type="image/png">
	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
	<script src="libs/navbarclock.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body onload="startTime()" style="width: 100%">
		
			<h3><strong>QR Code Genrate-Download-Scan</strong></h3>
			<a href="scanner.html" class="btn btn-primary submitBtn">Scan Your QR Code</a> <br>
	<br>	
<div class="akshay" style="border-style: double;">
	<div class="row">
  		<div class="col-md-6">
			<h3>Please Fill-out All Fields</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  >
				<center>	
					<div class="form-group">
						<label>Company/Category</label>
						<input type="text" class="form-control" name="compony"  placeholder="Enter Name "  onfocus="this.value=''" style="width: auto;" value="<?php echo @$email; ?>" required  />
					</div>
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" name="subject"  placeholder="Enter your Product Name" onfocus="this.value=''" value="<?php echo @$subject; ?>" required pattern="[a-zA-Z .]+" style="width: auto;" />
					</div>
					<div class="form-group">
						<label>Product ID</label>
						<input type="text" class="form-control" name="msg"  value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your Product ID"  onfocus="this.value=''" style="width: auto;" >
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success submitBtn"  />
					</div>
					</center>
				</form>
		</div>

			<?php
			if(!isset($filename)){
				$filename = "karmaweb";
			}
			?>

  		<div class="col-md-6">
			<h3 style="text-align:center">QR Code Result: </h3>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
  		</div>
	</div>
</div>

</body>
</html>