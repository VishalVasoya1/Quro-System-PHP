<?php
session_start();
include '../../conn.php';
$tid=$_GET['tid'];
$uid=$_SESSION['uid'];
$oid=$_SESSION['oid'];
$total=$_SESSION['total1'];
$q11="update  transection set uid='$uid',oid='$oid',amount='$total' where tid='$tid'";
if($r11=mysqli_query($conn,$q11))
{
    header("location:order_success.php");
}
?>