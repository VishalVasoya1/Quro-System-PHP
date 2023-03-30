<?php
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
    if(isset($_POST['cart']))
    {
        header("location:my_cart.php");
    }
} 
?>
<?php
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
echo '
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="index.php"><img
    src="../../images/other/logo4.png"
    alt="logo" /></a>
<a class="navbar-brand brand-logo-mini" href="index.php"><img
                src="../../images/other/phone.png"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <img src="../../icon/toggle.svg" style="height:18px;width:18px;">        </button>
    
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item  dropdown d-none d-md-block">
                <a href="../../logout.php" ><img src="../../icon/exit.svg" style="height:60px;width:70px;"/></a>
            </li>
           
            <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown" id="profileDropdown" href="#" data-toggle="dropdown"
                aria-expanded="false">
                <div class="nav-profile-img">
                    <img src="../../images/user/profile/'.$_SESSION['uimg'].'"
                        style="height:35px;width:35px;border-radius: 50%;" alt="image">
                </div>
                <div class="nav-profile-text">
                    <p class="mb-1 text-black">'.$_SESSION['uname'].'</p>
                </div>
                
            </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-3 text-center bg-primary">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="../../images/user/profile/'.$_SESSION['uimg'].'"
                            alt="">
                    </div>
                    <div class="p-2">
                        <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="user_profile.php">
                            <span>Profile</span>
                            <span class="p-0">
                                <img src="../../icon/admin.svg" style="height:18px;width:18px;">                           
                                 </span>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="deactive_account.php">
                            <span>Lock Account</span>
                            <img src="../../icon/logout.svg" style="height:18px;width:18px;">                           

                        </a>
                       
                </div>
            </li>';
            $uid=$_SESSION['uid'];
            $data="select * from cart where uid=$uid";
            $query = mysqli_query($conn,$data);
            $num=mysqli_num_rows($query);
echo '            
            <form method="post">
            <li class="nav-item  dropdown d-none d-md-block">
                <button type="submit" name="cart"
                    class="btn btn-sm btn-inverse-info mr-2"><img src="../../icon/cart.svg" style="height:35px;width:35px;"/> ('.$num.')</button>
              </li>
           </form>
        </ul>';
        // $conn=mysqli_connect("localhost","truetoke","True@Token","truetoke_qurosystem");
        echo '
 </div>
</nav>';
}
?>
