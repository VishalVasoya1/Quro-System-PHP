<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_GET['sid']))
    {
        $sid=$_GET['sid'];
        $q3="select * from suggestion where sid='$sid'";
        if($r3=mysqli_query($conn,$q3))
        {
            while($num=mysqli_fetch_assoc($r3))
            {
                $file=$num['img'];
                if($file !="")
                {
                    if(unlink("../../images/user/suggestion/".$file))
                    {
                        $q4="delete from suggestion where sid='$sid'";
                        if($q4=mysqli_query($conn,$q4))
                        {
                            header("location: view_suggestion.php?status=success");
                    
                        }
                        else
                        {
                            header("location: view_suggestion.php?status=failed");
                        }
                    }
                }
                else
                {
                    $q4="delete from suggestion where sid='$sid'";
                    if($q4=mysqli_query($conn,$q4))
                    {
                        header("location: view_suggestion.php?status=success");
                
                    }
                    else
                    {
                        header("location: view_suggestion.php?status=failed");
                    }
                }
            }
        }
         
    }
}
?>