<?php
include('../inc/controller.php');
if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $SchoolName; ?>'s Profile | <?php echo $website_name ;?></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $sch_logo;?>">

</head>

<body>
   <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="../<?php echo $sch_logo;  ?>" alt="image" width="100" height="100" class="img-circle" />
                             </span>
  
   
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $SchoolName;  ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>	
			   <?php
			   include('sidebar.php');
			   
			   ?>
			   
	       </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>

                <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $SchoolName; ?>,<?php echo $Location; ?>,<?php echo $District; ?></span>
                </li>
                <li class="dropdown">
                   
                    


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>School Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img src="../<?php echo $sch_logo ;?>" alt="image" width="120" height="120" >                            </div>
                          <div class="ibox-content profile-content">
                                <h4><strong><?php echo $SchoolName ;?></strong></h4>
                                 <h4><strong>School ID</strong>: <?php echo $SchRegCode ;?></h4>
                                 <h4><strong>Email</strong>: <?php echo $email ;?></h4>

                                 <span class="ibox-content no-padding border-left-right"><img src="../<?php echo $sch_signature ;?>" alt="image" width="120" height="120" ></span></div>
                        </div>
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>School Information</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>SchoolName :</strong>                    <?php echo $row_sch['SchoolName'];   ?> <br>
                                      </div>
                                    </div>



									<div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>School Password :</strong>                    <?php echo $row_sch['SchPassword'];   ?>  <br>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Short Code :</strong>                    <?php echo $row_sch['SchShortCode'];   ?>  <br>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Location :</strong>                    <?php echo $row_sch['Location'];   ?>  <br>
                                        </div>
                                    </div>
									<div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>District:</strong>                    <?php echo $row_sch['District'];   ?>  <br>
                                        </div>
                                    </div>
									<div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Region :</strong>                    <?php echo $row_sch['Region'];   ?>  <br>
                                        </div>
                                    </div><div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Zone :</strong>                    <?php echo $row_sch['Zone'];   ?>  <br>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>IT Staff :</strong>                    <?php echo $row_sch['ITName'];   ?>  <br>
                                        </div>
                                    </div>
									<div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>GPS Address :</strong>                    <?php echo $row_sch['GPSAddress'];   ?>  <br>
                                        </div>
                                    </div>
                                  <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Date Founded :</strong>                    <?php echo $row_sch['schoolcreationDate'];   ?>  <br>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Phone 1 :</strong>                    <?php echo $row_sch['SchPhone1'];   ?>  <br>
                                        </div>
                                    </div>
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy"></small>
                                            <strong>Phone 2 :</strong>                   <?php echo $row_sch['SchPhone2']; ?>  <br>
                                        </div>
                                    </div>
                                    
									
                                </div>
								<form method="post" action="edit_profile.php">

                                <button class="btn btn-primary btn-block m"><i class="fa fa-edit"></i> Edit Profile</button>

</form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
            <?php include('../inc/footer.php');  ?>
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity -->
    <script src="js/demo/peity-demo.js"></script>

</body>

</html>
