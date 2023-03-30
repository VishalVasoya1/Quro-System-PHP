<?php
include '../../conn.php';
session_start();
$pid="";
$pfinalstatus="";
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['psid']))
    {
        $psid=$_GET['psid'];
        $q3="select * from product_size where psid='$psid'";
        if($r3=mysqli_query($conn,$q3))
        {
            while($num=mysqli_fetch_assoc($r3))
            {
                $pid=$num['pid'];
                $q11="select * from products where pid='$pid'";
                if($r11=mysqli_query($conn,$q11))
                {
                    while($n11=mysqli_fetch_assoc($r11))
                    {
                        $pfinalstatus=$n11['pfinalstatus'];
                    }
                }
                $q4="delete from product_size where psid='$psid'";
                if($q4=mysqli_query($conn,$q4))
                {
                    if($pfinalstatus == "1")
                    {
                        header("refresh:1;url=view_product_detail.php?pid=$pid");
                    }
                    elseif($pfinalstatus == "0")
                    {
                        header("refresh:1;url=product_size.php?pid=$pid");
                    }
                }
                else
                {
                        header("location: view_product.php?status=failed");
                }
            }
        }
         
    }
}
?>