<?php
include('../inc/controller.php');
if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login");
}

$id=$_GET['id'];

$stmt = $dbh->query("SELECT * FROM studentadmissiontbl where StuAdmNo='$id'");
$row_sch= $stmt->fetch();

if (isset($_POST["btnedit"])) {
    $sql = " update studentadmissiontbl set Surname='".$_POST['txtsurname']."',FirstName='".$_POST['txtfirstname']."',OtherName='".$_POST['txtothername']."',sex='".$_POST['cmdsex']."',DOB='".$_POST['txtdob']."',
    address='".$_POST['txtaddress']."',PlaceOB='".$_POST['txtpob']."',ClassAT='".$_POST['cmdclassAdmitted']."',CurClass='".$_POST['cmdcurrentClass']."', YOA='".$_POST['txtyoa']."',Term='".$_POST['cmdterm']."',
    parentName='".$_POST['txtparentName']."',parentPhone='".$_POST['txtparentPhone']."',parentEmail='".$_POST['txtparentEmail']."' where StuAdmNo ='$id'";
    if (mysqli_query($conn, $sql)) {
        
        $_SESSION['success_msg'] = 'Student Updated successfully!';

    header("Location: student_record");
    } else {
    $_SESSION['error'] = 'Editing Was Not Successful';
    }
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student Profile| <?php echo $website_name; ?></title>
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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li class="active">
                            <strong>Edit Student Profile</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5></h5>
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
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <h3 class="m-t-none m-b">Edit Student Profile</h3>
                                        <form action="" method="POST">
                                            <div class="form-group"><strong>
                                                    <label>SurName</label></strong>
                                                <input type="text" size="77" name="txtsurname" value="<?php echo $row_sch['Surname'];   ?>" class="form-control">
                                            </div>
                                
                                            <div class="form-group">
                                                <label>Firstname</label> 
                                                <input type="text" size="77" name="txtfirstname" value="<?php echo $row_sch['FirstName'];   ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Othername</label> 
                                                <input type="text" size="77" name="txtothername" value="<?php echo $row_sch['OtherName'];   ?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Sex</label> 
                                                <select class="form-control" name="cmdsex" id="cmdsex" style="color: black;" required>
  							          <option value="<?php echo $row_sch['sex']; ?>"><?php echo $row_sch['sex']; ?></option>
 							            <option value="Female">Female</option>
  							          <option value="Male">Male</option>
							            </select>
                                            </div>
                                              <div class="form-group">
                                                <label>Date of Birth</label> 
                                                <input type="date" size="77" name="txtdob" value="<?php echo $row_sch['DOB'];?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label> 
                                                <input type="text" size="77" name="txtaddress" value="<?php echo $row_sch['address'];   ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Place of Birth</label> 
                                                <input type="text" size="77" name="txtpob" value="<?php echo $row_sch['PlaceOB'];   ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Class Admitted</label> 
                                                <?php
			        $sql = "select * from tblclass";
             $qclass = $dbh->query($sql);                       
             $qclass->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdclassAdmitted"  id="cmdclassAdmitted" class="form-control" >';
             while ( $row = $qclass->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
             }

             echo '</select>';
			     ?>
                 </div>
                  <div class="form-group">
                   <label>Current Class</label> 
                    <?php
			        $sql = "select * from tblclass";
             $qclass = $dbh->query($sql);                       
             $qclass->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdcurrentClass"  id="cmdcurrentClass" class="form-control" >';
             while ( $row = $qclass->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
             }

             echo '</select>';
			     ?>         
                      </div>
                                            <div class="form-group">
                                                <label>Year of Admission</label> 
                                                <input type="text" size="77" name="txtyoa" value="<?php echo $row_sch['YOA'];   ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Term</label> 
                                                <select class="form-control" name="cmdterm" id="cmdterm" style="color: black;" >
  							          <option value="">Select Term</option>
 							            <option value="Term 1">Term 1</option>
  							          <option value="Term 2">Term 2</option>
                                        <option value="Term 3">Term 3</option>

							            </select>                     
                                           </div>
                                            <div class="form-group">
                                                <label>Parent Name</label> 
                                                <input type="text" size="77" name="txtparentName" value="<?php echo $row_sch['parentName'];   ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Parent Phone</label> 
                                                <input type="text" size="77" name="txtparentPhone" value="<?php echo $row_sch['parentPhone'];   ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Parent Email</label> 
                                                <input type="email" size="77" name="txtparentEmail" value="<?php echo $row_sch['parentEmail'];   ?>" class="form-control">
                                            </div>
                                            

                                            <div>

                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnedit">
                                                    <div align="centre"><strong><i class="fa fa-edit"></i> Save Changes</strong></div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5"></div>
                </div>
                <div class="row"></div>
            </div>
            <div class="footer">
                <div class="pull-right"></div>
                <div><?php include('../inc/footer.php');  ?></div>
            </div>

        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <link rel="stylesheet" href="../css/popup_style.css">
    <?php if (!empty($_SESSION['success'])) {  ?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    <strong>Success</strong>
                    </h1>
                    <p><?php echo $_SESSION['success']; ?></p>
                    <p>
                        <button class="button button--success" data-for="js_success-popup">Close</button>
                    </p>
            </div>
        </div>
    <?php unset($_SESSION["success"]);
    } ?>
    <?php if (!empty($_SESSION['error'])) {  ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    <strong>Error</strong>
                    </h1>
                    <p><?php echo $_SESSION['error']; ?></p>
                    <p>
                        <button class="button button--error" data-for="js_error-popup">Close</button>
                    </p>
            </div>
        </div>
    <?php unset($_SESSION["error"]);
    } ?>
    <script>
        var addButtonTrigger = function addButtonTrigger(el) {
            el.addEventListener('click', function() {
                var popupEl = document.querySelector('.' + el.dataset.for);
                popupEl.classList.toggle('popup--visible');
            });
        };

        Array.from(document.querySelectorAll('button[data-for]')).
        forEach(addButtonTrigger);
    </script>
</body>

</html>