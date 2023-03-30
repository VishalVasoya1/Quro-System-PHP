<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    if(isset($_GET['cid']))
    {
        $cid=$_GET['cid'];
        $q3="select * from complain where cid='$cid'";
        if($r3=mysqli_query($conn,$q3))
        {
            while($num=mysqli_fetch_assoc($r3))
            {
                $file=$num['img'];
                if($file!="")
                {
                    $q4="delete from complain where cid='$cid'";
                    if($q4=mysqli_query($conn,$q4))
                    {
                        if(unlink("../../images/employee/complain/".$file))
                        {
                            header("location: view_complain.php?status=success");
                        }  
                    }    
                }
                $q4="delete from complain where cid='$cid'";
                if($q4=mysqli_query($conn,$q4))
                {
                       header("location: view_complain.php?status=success");    
                }
                else
                {
                     header("location: view_complain.php?status=failed");
                }
            }
        }
         
    }
}
?>