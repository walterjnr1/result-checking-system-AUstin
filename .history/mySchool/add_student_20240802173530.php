<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

include('../inc/controller.php');
if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login.php");
}

 if(isset($_POST["btnadd"])){
 $studentAdmNo = date("Y").substr(str_shuffle("12345670"), 0, 3);

 $file_type = $_FILES['photo']['type']; //returns the mimetype
 $allowed = array("image/jpeg", "image/gif","image/jpeg", "image/webp","image/png");
 if(!in_array($file_type, $allowed)) {
 $error = 'Only jpeg,Webp, gif, and png files are allowed.';
  // exit();
 
 }else{
 $image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
 $image_name= addslashes($_FILES['photo']['name']);
 $image_size= getimagesize($_FILES['photo']['tmp_name']);
 move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploadImage/student/" . $_FILES["photo"]["name"]);			
 $img_location="uploadImage/student/" . $_FILES["photo"]["name"];
       
 //add data
    $sql = 'INSERT INTO studentadmissiontbl(StuAdmNo ,Surname,FirstName,OtherName,sex,DOB,address,PlaceOB,SchRegCode,ClassAT,CurClass,YOA,Term,parentName,parentPhone,parentEmail,photo,status) VALUES(:StuAdmNo ,:Surname,:FirstName,:OtherName,:sex,:DOB,:address,:PlaceOB,:SchRegCode,:ClassAT,:CurClass,:YOA,:Term,:parentName,:parentPhone,:parentEmail,:photo,:status)';
    $statement = $dbh->prepare($sql);
    $statement->execute([
	':StuAdmNo' => $studentAdmNo,
	':Surname' =>$_POST['txtsurname'],
	':FirstName' => $_POST['txtfirstname'],
  ':OtherName' => $_POST['txtothername'],
	':sex' => $_POST['cmdsex'],
  ':DOB' => $_POST['txtdob'],
	':address' => $_POST['txtaddress'],
	':PlaceOB' => $_POST['txtpob'],
  ':SchRegCode' => $SchRegCode,
	':ClassAT' => $_POST['cmdclassAdmitted'],
  ':CurClass' => $_POST['cmdcurrentClass'],
	':YOA' => $_POST['txtyoa'],
	':Term' => $_POST['cmdterm'],
    ':parentName' => $_POST['txtparentName'],
	':parentPhone' => $_POST['txtparentPhone'],
  ':parentEmail' => $_POST['txtparentEmail'] ,
	':photo' => $img_location,
  ':status' => '1'

    ]);
    if ($statement){


      //send notification  via email 
$mail = new PHPMailer(true);
    
try{
//Server settings
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = $email_host;                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = $email_username;                     //SMTP username
$mail->Password   = $email_password;                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
 $mail->Port       = $email_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom($website_email, $website_name);
$mail->addAddress($email,$_POST['txtfirstname']);     //Add a recipient

$message = "
<html>
<head>
  <title>$SchoolName - Student Registration| $website_name</title>
  <style>
    body {
      padding: 20px;
    }
    .email-body {
        padding: 20px;
        border: 5px solid #34C759; /* thick green border with reduced width */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* add a shade to the background */
        text-align: center; /* center the text */
        position: relative; /* add this to make the watermark work */
        font-size: 14px; /* add font size */
        font-family: Arial, sans-serif; /* add font family */
        font-style: Tahoma; /* add font style */
        font-weight: 400; /* add font weight */
      }
  .logo {
      display: block;
      margin: 0 auto; /* center the logo */
      width: 30px; /* set logo width */
      height: 30px; /* set logo height */
    }
  
  </style>
</head>
<body>
  <table width='80%' cellpadding='0' cellspacing='0' border='0'>
    <tr>
      <td>
      <img height='90' src=\"https://www.allschoolchecks.org/uploadImage/logo/logo.jpg\" width='108'>
      </td>
    </tr>
    <tr>
      <td class='email-body'>
        <p style='text-align: justify;'>Congratulation ". $_POST['txtfirstname']. ",</p>
        <p style='text-align: justify;'>Your registration into $SchoolName,$Location,$District was Successful.</p>
        <p style='text-align: justify;'>School registration Code : <b>". $SchRegCode. "</b></p>
        <p style='text-align: justify;'>School Admission No : <b>". $studentAdmNo. "</b></p>
        <p style='text-align: justify;'>School Short Code: <b>". $SchShortCode. "</b></p>

        <p style='text-align: justify;'>Regards,</p>
        <p style='text-align: justify;'>". $website_name. " Team</p>

        <p style='text-align: justify;'><b>Alway know that the school has full right to terminate your admission when need arise.</b>   </p>

        <p style='text-align: justify;'><b>you can always reach out to us via Phone Numbers: $phone1,$phone2 and email:$website_email</b>   </p>

      </td>
    </tr>
  </table>
</body>
</html>
";
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = "Student Registration  | $website_name ";
$mail->Body    = $message;
$mail->send();

        $_SESSION['success']="Student Admission No: {$studentAdmNo} Student registration Was successful . Student Details Sent to parent Email and Phone.';
      } catch (Exception $e) {
        $_SESSION['error'] = 'Problem Sending Registration Details. Mailer Error: {$mail->ErrorInfo}';
        }
      }else{
        $_SESSION['error'] = 'Problem adding Student.';

      }
    }
  }
 
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Student| <?php echo $website_name ;?></title>
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
                       
                        <li class="active"><strong>Add Student </strong></li>
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
                          <div class="ibox-content">

                          <form  action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtfirstname" value="<?php if (isset($_POST['txtfirstname']))?><?php echo $_POST['txtfirstname']; ?>" class="form-control" required="">
                                </div>
                            </div>
                              <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Othername</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtothername" value="<?php if (isset($_POST['txtothername']))?><?php echo $_POST['txtothername']; ?>" class="form-control" required="">
                                </div>
                            </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtsurname" value="<?php if (isset($_POST['txtsurname']))?><?php echo $_POST['txtsurname']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Sex</label>
                                <div class="col-sm-10">

                          <select class="form-control" name="cmdsex" id="cmdsex" style="color: black;" required>
  							          <option value="">Select Sex</option>
 							            <option value="Female">Female</option>
  							          <option value="Male">Male</option>
					              </select>	
                          </div>
                          </div>
                          <div class="hr-line-dashed"></div>
                          <div class="form-group">
                                <label class="col-sm-2 control-label">Date of Birth</label>
                                <div class="col-sm-10">
                                <input type="date" name="txtdob" value="<?php if (isset($_POST['txtdob']))?><?php echo $_POST['txtdob']; ?>" class="form-control" required="">
                                </div>
                            </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtaddress" value="<?php if (isset($_POST['txtaddress']))?><?php echo $_POST['txtaddress']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Place of Birth</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtpob" value="<?php if (isset($_POST['txtpob']))?><?php echo $_POST['txtpob']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Class Admitted To</label>
                                <div class="col-sm-10">
                                <?php
			        $sql = "select * from tblclass";
             $qclass = $dbh->query($sql);                       
             $qclass->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdclassAdmitted"  id="cmdclassAdmitted" class="form-control" >';
			 			     echo '<option value="">Select Class</option>';
             while ( $row = $qclass->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
             }

             echo '</select>';
			     ?>                       
                  </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Current Class</label>
                                <div class="col-sm-10">
                                <?php
			        $sql = "select * from tblclass";
             $qclass = $dbh->query($sql);                       
             $qclass->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdcurrentClass"  id="cmdcurrentClass" class="form-control" >';
			 			     echo '<option value="">Select Current Class</option>';
             while ( $row = $qclass->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
             }

             echo '</select>';
			     ?>                       
                  </div>
                              </div>
                              <div class="hr-line-dashed"></div>                              <div class="form-group">
                                <label class="col-sm-2 control-label">Year of Admission</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtyoa" value="<?php if (isset($_POST['txtyoa']))?><?php echo $_POST['txtyoa']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Term</label>
                                <div class="col-sm-10">

                                <select class="form-control" name="cmdterm" id="cmdterm" style="color: black;" required>
  							<option value="">Select Term</option>
 							 <option value="Term 1">Term 1</option>
  							<option value="Term 2">Term 2</option>
  							<option value="Term 3">Term 3</option>
							</select>	
                              </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Parent Name</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtparentName" value="<?php if (isset($_POST['txtparentName']))?><?php echo $_POST['txtparentName']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Parent Phone</label>
                                <div class="col-sm-10">
                                <input type="text" name="txtparentPhone" value="<?php if (isset($_POST['txtparentPhone']))?><?php echo $_POST['txtparentPhone']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Parent Email</label>
                                <div class="col-sm-10">
                                <input type="email" name="txtparentEmail" value="<?php if (isset($_POST['txtparentEmail']))?><?php echo $_POST['txtparentEmail']; ?>" class="form-control" required="">
                                </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                              <input name="photo" type="file" class="inputFile" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)" />
                             <img src="../uploadImage/student/no_image.jpg" alt="student image" width="80" height="69" id="logo-img" style="display: none;">
                              </div>
                              </div>
                             
                              <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                  <button class="btn btn-primary" type="submit" name="btnadd">Save</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="col-sm-6">
                                
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
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="../popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
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
<?php if(!empty($_SESSION['error'])) {  ?>
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
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>

<script>
    function display_img(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#logo-img').attr('src', e.target.result);
            $('#logo-img').show(); // Show the image
        };
        reader.readAsDataURL(input.files[0]);
    }
}
   
</script>
</body>

</html>
