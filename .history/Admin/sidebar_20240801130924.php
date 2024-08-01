<?php 
include('../inc/controller.php');
?>
<aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="../<?php echo $_SESSION['login_pic'];   ?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?php echo $_SESSION['login_fullname'];   ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="active"> <a href="index.php"> <i class="icon-home"></i> <span>Dashboard</span>  </a>
          
        </li>

		 <li class="treeview"> <a href="#"> <i class="fa fa-user-circle-o"></i> <span>User</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">

            <li><a href="add_user.php"><i class="fa fa-angle-right"></i>New User</a></li>
            <li><a href="user_record.php"><i class="fa fa-angle-right"></i>Manage User</a></li>
            <li><a href="edit_profile.php"><i class="fa fa-angle-right"></i>Edit Profile</a></li>
            <li><a href="edit_photo"><i class="fa fa-angle-right"></i>Edit Photo</a></li>

			<li><a href="changepassword.php"><i class="fa fa-angle-right"></i>Change Password</a></li>

          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-home"></i><span>Manage Schools</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_school.php"><i class="fa fa-angle-right"></i> Add School</a></li>
            <li><a href="school_record.php"><i class="fa fa-angle-right"></i> School Record</a></li>
          </ul>
        </li> </a>
          
        </li>
		
		 <li class="treeview"> <a href="#"> <i class="fa fa-building"></i> <span>Manage Class </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_class.php"><i class="fa fa-angle-right"></i>Add Class</a></li>
			  <li><a href="class_record.php"><i class="fa fa-angle-right"></i>Class record</a></li>
          </ul>
        </li>



        <li class="treeview"> <a href="#"> <i class="fa fa-edit"></i> <span>Manage Exam </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="add_exam.php"><i class="fa fa-angle-right"></i>Add Exam</a></li>
			  <li><a href="exam_record.php"><i class="fa fa-angle-right"></i>Exam record</a></li>
          </ul>
        </li>


        <li> 
	    <a href="student_record.php"> <i class="fa fa-graduation-cap"></i> <span>Manage Student</span>  </a>
         
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-map"></i><span>Manage Scratch Card</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="index_scratchcard.php"><i class="fa fa-angle-right"></i> Generate Scratch Card</a></li>
            <li><a href="scratchcard_record.php"><i class="fa fa-angle-right"></i>Scratch Card Record</a></li>

          </ul>
        </li> 
        <li class="treeview"> <a href="#"> <i class="fa fa-map-pin"></i><span>Manage Scratch Card</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="index_scratchcard.php"><i class="fa fa-angle-right"></i> Generate Scratch Card</a></li>
            <li><a href="scratchcard_record.php"><i class="fa fa-angle-right"></i>Scratch Card Record</a></li>

          </ul>
        </li> 
        <li> 
	    <a href="result_record.php"> <i class="fa fa-edit"></i> <span>Manage Result</span>  </a>
         
      </li>
       <li> 
	    <a href="website.php"> <i class="fa fa-desktop"></i> <span>Manage Websiste</span>  </a>
         
      </li>

	  	<li> 
		<a href="db_backup.php"> <i class="fa fa-database"></i> <span>Database Backup</span>  </a>
          </li>

          <li> 
	        <a href="../index.php"> <i class="fa fa-exchange"></i> <span>Switch To Landing Page</span>  </a>
         
        </li>
        <li> <a href="logout.php"> <i class="fa fa-sign-out"></i> <span>Logout</span>  </a>
      </ul>
    </div>
    <!-- /.sidebar -->

  </aside>