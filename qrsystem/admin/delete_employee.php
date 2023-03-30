<?php
include '../../conn.php';
session_start();
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
    if(isset($_GET['eid']))
    {
        $eid=$_GET['eid'];
        $q3="select * from employee where eid='$eid'";
        if($r3=mysqli_query($conn,$q3))
        {
            while($num=mysqli_fetch_assoc($r3))
            {
                $eimg=$num['eimg'];
                $aadhar1=$num['aadhar1'];
                $aadhar2=$num['aadhar2'];
                $resume=$num['resume'];
                $q4="delete from employee where eid='$eid'";
                if($q4=mysqli_query($conn,$q4))
                {
                    if(unlink("../../images/employee/profile/".$eimg) && unlink("../../images/employee/proof/".$aadhar1) && unlink("../../images/employee/proof/".$aadhar2) && unlink("../../images/employee/resume/".$resume))
                    {
                        header("location: employee_list.php?status=success");
                    }
                }
                else
                {
                     header("location: employee_list.php?status=failed");
                }
            }
        }
         
    }
}
?>