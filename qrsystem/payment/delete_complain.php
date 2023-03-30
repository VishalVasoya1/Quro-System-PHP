<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['cid']))
    {
        $cid=$_GET['cid'];
        $q3="delete from complain where cid='$cid'";
        if($r3=mysqli_query($conn,$q3))
        {
            header("location: view_complain.php?status=success");
        }
        else
        {
            header("location: view_complain.php?status=failed");
        }   
    }
}
?>