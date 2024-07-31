<?php 
include('../inc/controller.php');
?>
<header class="main-header"> 
    <!-- Logo --> 
    <a href="index.php" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="../<?php echo $logo;   ?>" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="../<?php echo $logo;   ?>" alt="" width="190" height="70"></span> </a> 
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
      </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages -->
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../<?php echo $_SESSION['login_pic'];   ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo $_SESSION['login_fullname'];   ?></span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="../<?php echo $_SESSION['login_pic'];   ?>" class="img-responsive img-circle" alt="User" height="55" width="55"></div>
                <p class="text-left"><?php echo $_SESSION['login_fullname'];   ?> <small><?php echo $_SESSION['login_email'];   ?></small> </p>
              </li>
              <li><a href="edit_profile.php"><i class="icon-profile-male"></i> Edit Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="edit_photo.php"><i class="icon-gears"></i> Edit Photo</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>