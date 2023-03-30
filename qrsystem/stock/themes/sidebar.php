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
                                <img src="../../images/employee/profile/'.$_SESSION['eimg'].'" style="height:35px;width:35px;border-radius: 50%;" alt="image">
                            </div>
                            <div class="sidebar-profile-text">
                                <p class="mb-1">'.$_SESSION['ename'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
               <span class="icon-bg bg-light"><i class=""> <img src="../../icon/dashboard.svg" style="height:18px;width:18px;"></i></span>

                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Employee Profile</li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic1200" aria-expanded="false"
            aria-controls="ui-basic">
           <span class="icon-bg bg-light"><i class=""> <img src="../../icon/admin.svg" style="height:18px;width:18px;"></i></span>
            <span class="menu-title">Profile</span>
        </a>
        <div class="collapse" id="ui-basic1200">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="view_profile.php">View Profile</a></li>
    <li class="nav-item"> <a class="nav-link" href="change_password.php">Change Password</a></li>
            </ul>
        </div>
    </li>
  
        
        <li class="nav-item nav-category">Products</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1211" aria-expanded="false" aria-controls="ui-basic">
                 <span class="icon-bg bg-light"><i class=""> <img src="../../icon/catagories1.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Categorys</span>
            </a>
            <div class="collapse" id="ui-basic1211">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_category.php">Add
                            Catagories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="view_category.php">View Catagories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
            <span class="icon-bg bg-light"><i class=""> <img src="../../icon/product1.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Products</span>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="add_product.php">Add Products</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="view_product.php">View Products</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Help & Desk</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false"
                aria-controls="ui-basic5">
                   <span class="icon-bg bg-light"><i class=""> <img src="../../icon/suggestion.svg" style="height:18px;width:18px;"></i></span>
             
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
                <span class="icon-bg bg-light"><i class=""> <img src="../../icon/complain.svg" style="height:18px;width:18px;"></i></span>
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
                <a href="#" class="nav-link"><i class=""><img src="../../icon/logout.svg" style="height:18px;width:18px;"></i>
                    <span class="menu-title">Log Out</span></a>
            </div>
        </li>
    </ul>
</nav>';
}
?>