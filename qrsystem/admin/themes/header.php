<?php
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
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
            <span class=""></span>
            <div class="input-group-prepend bg-transparent">
            <i class=""><img src="../../icon/toggle.svg" style="height:18px;width:18px;"></i>
        </div>
        </button>
      
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item  dropdown d-none d-md-block">
                <a class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" id="projectDropdown"
                    href="../../logout.php" >LogOut</a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown" id="profileDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="../../images/admin/profile/'.$_SESSION['aimg'].'"
                            style="height:35px;width:35px;border-radius: 50%;" alt="image">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">'.$_SESSION['aname'].'</p>
                    </div>
                    
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    <div class="p-3 text-center bg-primary">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="../../images/admin/profile/'.$_SESSION['aimg'].'"
                            alt="">
                    </div>
                    <div class="p-2">
                        <h5 class="dropdown-header text-uppercase pl-2 text-dark">Admin Options</h5>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="admin_profile.php">
                            <span>Profile</span>
                            <span class="p-0">
                                <i class=""><img src="../../icon/admin.svg" style="height:18px;width:18px;"></i>
                            </span>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                        <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../../logout.php">
                            <span>Log Out</span>
                            <i class=""><img src="../../icon/logout.svg" style="height:18px;width:18px;"></i>
                        </a>
                    </div>
                </div>
            </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>';
}
?>