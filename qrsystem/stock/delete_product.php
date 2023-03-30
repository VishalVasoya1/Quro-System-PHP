<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['pid']))
    {
        $pid=$_GET['pid'];
        $q3="select * from products where pid='$pid'";
        if($r3=mysqli_query($conn,$q3))
        {
            while($num=mysqli_fetch_assoc($r3))
            {
                unlink("../../images/employee/products/".$num['ptitleimg']);
                $arr2=explode("++",$num['pimg']);  
                $len=count($arr2);
                for($i=0;$i<$len-1;$i++)
                {
                    unlink("../../images/employee/products/".$arr2[$i]);
                }
                $q4="delete from products where pid='$pid'";
                if($q4=mysqli_query($conn,$q4))
                {
                    header("location: view_product.php?status=success");
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