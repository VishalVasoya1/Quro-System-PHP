<?php
if(isset($_SESSION['ename']) && isset($_SESSION['eid']) && isset($_SESSION['eemail']) && isset($_SESSION['eimg']))
{
    echo '<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-user-actions nav-category">
            <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="sidebar-profile-img">
                            <img src="../../images/employee/profile/'.$_SESSION['eimg'].'"
                            style="height:35px;width:35px;border-radius: 50%;" alt="image">           
                                             </div>
                            <div class="sidebar-profile-text">
                            <p class="mb-1 text-white">'.$_SESSION['ename'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                                          <span class="icon-bg bg-light"><i class=""><img src="../../icon/dashboard.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item nav-category">Employee Profile</li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
            aria-controls="ui-basic">
                 <span class="icon-bg bg-light"><i class=""><img src="../../icon/employee_profile.svg" style="height:18px;width:18px;"></i></span>
            <span class="menu-title">Profile</span>
        </a>
        <div class="collapse" id="ui-basic1">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="view_profile.php">View
                        Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="change_password.php">Change
                        Password</a></li>
              
            </ul>
        </div>
    </li>

    <li class="nav-item nav-category">Payments</li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic13" aria-expanded="false"
            aria-controls="ui-basic">
                 <span class="icon-bg bg-light"><i class=""><img src="../../icon/onlinepay.svg" style="height:18px;width:18px;"></i></span>
            <span class="menu-title">Payments</span>
        </a>
        <div class="collapse" id="ui-basic13">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="new_payment.php">New Payment</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_payment.php">View Payments</a></li>
              
            </ul>
        </div>
    </li>

    <li class="nav-item nav-category">Collection</li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic14" aria-expanded="false"
            aria-controls="ui-basic">
                 <span class="icon-bg bg-light"><i class=""><img src="../../icon/todaycollection.svg" style="height:18px;width:18px;"></i></span>
            <span class="menu-title">Collection</span>
        </a>
        <div class="collapse" id="ui-basic14">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="today_collection.php">Today Collections</a></li>
                <li class="nav-item"> <a class="nav-link" href="total_collection.php">View Collection</a></li>
              
            </ul>
        </div>
    </li>
                    
        <li class="nav-item nav-category">Help & Desk</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false"
                aria-controls="ui-basic5">
                                          <span class="icon-bg bg-light"><i class=""><img src="../../icon/suggestion.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Suggestion</span>
            </a>
            <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_suggestion.php">Add Suggestion</a></li>
                    <li class="nav-item"> <a class="nav-link" href="view_suggestion.php">View Suggestion</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false"
                aria-controls="ui-basic6">
                                          <span class="icon-bg bg-light"><i class=""><img src="../../icon/complain.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Complain</span>
            </a>
            <div class="collapse" id="ui-basic6">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add_complain.php">Add Complain</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_complain.php">View Complain</a></li>
                 </ul>
            </div>
        </li>
  
        <br>

        <li class="nav-item sidebar-user-actions">
            <div class="sidebar-user-menu">
                 <a href="../../logout.php" class="nav-link"><i class=""><img src="../../icon/logout.svg" style="height:20px;width:20px;"></i>
                    <span class="menu-title">Log Out</span></a>
            </div>
        </li>
    </ul>
</nav>';
}
?>