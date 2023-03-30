<?php
session_start();
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    session_destroy();
    header("location:login.php");
}
elseif(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
    session_destroy();
    header("location:login.php");
}
elseif(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    session_destroy();
    header("location:login.php");
}

?>