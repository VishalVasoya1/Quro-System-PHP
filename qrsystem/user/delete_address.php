<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_GET['aid']))
    {
        $aid=$_GET['aid'];
        $q3="select * from user_address where aid='$aid'";
        if($r3=mysqli_query($conn,$q3))
        {
            while($num=mysqli_fetch_assoc($r3))
            {
                $status=$num['status'];
                if($status == "0")
                {
                    $q4="delete from user_address where aid='$aid'";
                    if($q4=mysqli_query($conn,$q4))
                    {
                        header("location: user_profile.php?status=success");
                    }
                }            
                else
                {
                    $q4="delete from user_address where aid='$aid'";
                    if($q4=mysqli_query($conn,$q4))
                    {
                       $q11="select * from user_address where uid='".$_SESSION['uid']."' LIMIT 1";
                       if($r11=mysqli_query($conn,$q11))
                       {
                           $n11=mysqli_num_rows($r11);
                           if($n11>=1)
                           {
                               while($n12=mysqli_fetch_assoc($r11))
                               {
                                   $aid2=$n12['aid'];
                                   $q12="update user_address set status='1' where aid='$aid2'";
                                   if($r12=mysqli_query($conn,$q12))
                                   {
                                       header("location:user_profile.php?status=update");
                                   }
                                   else
                                   {
                                       echo "Not Updated";
                                   }
                               }
                            }
                       }
                    }
                }
            }
        }
         
    }
}
?>