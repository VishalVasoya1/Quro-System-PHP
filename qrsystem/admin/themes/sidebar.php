<?php
if(isset($_SESSION['aname']) && isset($_SESSION['aid']) && isset($_SESSION['aemail']) && isset($_SESSION['aimg']))
{
  echo '
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">  
          <li class="nav-item sidebar-user-actions nav-category">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <img src="../../images/admin/profile/'.$_SESSION['aimg'].'" style="height:35px;width:35px;border-radius: 50%;" alt="image">
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1">'.$_SESSION['aname'].'</p>
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
           
            <li class="nav-item nav-category">Admin Profile</li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="icon-bg bg-light"><i class=""><img src="../../icon/profileadmin.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Admin Profile</span>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link " href="admin_profile.php">View Profile</a></li>
                    <li class="nav-item"> <a class="nav-link" href="change_password.php">Change Password</a></li>
                </ul>
            </div>
        </li>
      
            <li class="nav-item nav-category">Profile</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                             <span class="icon-bg bg-light"><i class=""> <img src="../../icon/user-profile.svg" style="height:18px;width:18px;"></i></span>

                <span class="menu-title">Users</span>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="user_list.php">View Users</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
                               <span class="icon-bg bg-light"><i class=""><img src="../../icon/individual.svg" style="height:18px;width:18px;"></i></span>

                <span class="menu-title">Employees</span>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="add_employee.php">Add Employee</a></li>
                  <li class="nav-item"> <a class="nav-link" href="employee_list.php">View Employee</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic9" aria-expanded="false" aria-controls="ui-basic">
              <span class="icon-bg bg-light"><i class=""><img src="../../icon/designation.png" style="height:18px;width:18px;"></i></span>
              <span class="menu-title">Designations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic9">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add_designation.php">Add Designation</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_designation.php">View Designation</a></li>           
              </ul>
            </div>
          </li>
        

            <li class="nav-item nav-category">Products</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
               <span class="icon-bg bg-light"><i class=""><img src="../../icon/orders.svg" style="height:18px;width:18px;"></i></span>
                <span class="menu-title">Orders</span>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="today_order_list.php">Today Order</a></li>
                  <li class="nav-item"> <a class="nav-link" href="total_order_list.php">View Order</a></li>
                
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts1" aria-expanded="false" aria-controls="charts">
                               <span class="icon-bg bg-light"><i class=""><img src="../../icon/product.svg" style="height:20px;width:20px;"></i></span>

                <span class="menu-title">Products</span>
              </a>
              <div class="collapse" id="charts1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="view_product.php">View Products</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item nav-category">Payment</li>
            
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                               <span class="icon-bg bg-light"><i class=""><img src="../../icon/onlinepay.svg" style="height:20px;width:20px;"></i></span>

                <span class="menu-title">Onlilne Payment</span>
              </a>
              <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="today_collection_online.php">Today Collection</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_collection_online.php">View Collection</a></li>
              </ul>
            </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts5" aria-expanded="false" aria-controls="charts">
                                <span class="icon-bg bg-light"><i class=""><img src="../../icon/offlinepay.svg" style="height:20px;width:20px;"></i></span>

                <span class="menu-title">Offline Payment</span>
              </a>
              <div class="collapse" id="charts5">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="today_collection_offline.php">Today Collection</a></li>
                <li class="nav-item"> <a class="nav-link" href="view_collection_offline.php">View Collection</a></li>
                </ul>
              </div>
            </li>
            
          <li class="nav-item nav-category">Help & Desk</li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts6" aria-expanded="false" aria-controls="charts">
                               <span class="icon-bg bg-light"><i class=""><img src="../../icon/innovation.svg" style="height:20px;width:20px;"></i></span>

                <span class="menu-title">Suggestion</span>
              </a>
              <div class="collapse" id="charts6">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="view_user_suggestion.php">User Suggestion</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_employee_suggestion.php">Employee Suggestion</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#charts7" aria-expanded="false" aria-controls="charts">
                               <span class="icon-bg bg-light"><i class=""><img src="../../icon/complain.svg" style="height:20px;width:20px;"></i></span>

                <span class="menu-title">Complain</span>
              </a>
              <div class="collapse" id="charts7">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="view_user_complain.php">User Complain</a></li>
                  <li class="nav-item"> <a class="nav-link" href="view_employee_complain.php">Employee Complain</a></li>
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