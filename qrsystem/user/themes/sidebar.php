<?php
if(isset($_SESSION['uname']) && isset($_SESSION['uid']) && isset($_SESSION['uemail']) && isset($_SESSION['uimg']))
{
echo '
<nav class="sidebar sidebar-offcanvas d-print-none" id="sidebar">
                <ul class="nav">
                    <li class="nav-item sidebar-user-actions nav-category">
                        <div class="user-details">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="sidebar-profile-img">
                                            <img src="../../images/user/profile/'.$_SESSION['uimg'].'" style="height:35px;width:35px;border-radius: 50%;" alt="image">
                                        </div>
                                        <div class="sidebar-profile-text">
                                            <p class="mb-1">'.$_SESSION['uname'].'</p>
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
 
                    <li class="nav-item">
                        <a class="nav-link" href="view_product.php">
                            <span class="icon-bg bg-light"><i class=""><img src="../../icon/catagories1.svg"  style="height:18px;width:18px;"></i></span>
                            <span class="menu-title">Top Products</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">QR Code</li>
                    <li class="nav-item">
                        <a class="nav-link" href="scanqrcode.php" aria-expanded="false"
                            aria-controls="ui-basic">
                          <span class="icon-bg bg-light"><i class=""><img src="../../icon/qrscan.svg" style="height:18px;width:18px;"></i></span>
                            <span class="menu-title">Scan QR Code</span>

                        </a>

                    </li>
                    <li class="nav-item nav-category">Profile</li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                            aria-controls="ui-basic">
                             <span class="icon-bg bg-light"><i class=""> <img src="../../icon/user-profile.svg" style="height:18px;width:18px;"></i></span>
                            <span class="menu-title">Profile</span>
                        </a>
                        <div class="collapse" id="ui-basic1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="user_profile.php">View
                                        Profile</a></li>
                                <li class="nav-item"> <a class="nav-link" href="change_password.php">Change
                                        Password</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="deactive_account.php">DeActivate Account</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                             <span class="icon-bg bg-light"><i class=""> <img src="../../icon/myaccount.svg" style="height:18px;width:18px;"></i></span>
                            <span class="menu-title">My account</span>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../user/my_cart.php">My
                                        Cart</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../user/wishlist.php">My
                                        Wishlist</a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic123" aria-expanded="false"
                        aria-controls="ui-basic">
                         <span class="icon-bg bg-light"><i class=""> <img src="../../icon/myaccount.svg" style="height:18px;width:18px;"></i></span>
                        <span class="menu-title">Orders</span>
                    </a>
                    <div class="collapse" id="ui-basic123">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../user/order_history.php">My Orders</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../user/order_status.php">Order Status</a></li>
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
                            <a href="../../logout.php" class="nav-link"><i class=""><img src="../../icon/logout.svg" style="height:18px;width:18px;">                           
                            </i>
                                <span class="menu-title">Log Out</span></a>
                        </div>
                    </li>
                </ul>
            </nav>';
}
            ?>