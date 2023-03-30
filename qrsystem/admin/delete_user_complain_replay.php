<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
    if(isset($_GET['crid']))
    {
        $crid=$_GET['crid'];
        $q3="delete from complain_replay where crid='$crid'";
        if($r3=mysqli_query($conn,$q3))
        {
            header("location: view_user_complain.php?status=success");
        }
        else
        {
            header("location: view_user_complain.php?status=failed");
        }   
    }
}
?>