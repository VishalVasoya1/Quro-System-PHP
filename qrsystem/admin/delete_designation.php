<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
    if(isset($_GET['did']))
    {
        $did=$_GET['did'];
        $q3="delete from designation where did='$did'";
        if($r3=mysqli_query($conn,$q3))
        {
            header("location: view_designation.php?status=success");
        }
        else
        {
            header("location: view_designation.php?status=failed");
        }   
    }
}
?>