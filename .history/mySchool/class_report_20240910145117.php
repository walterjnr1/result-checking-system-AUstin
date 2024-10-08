<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
include('../inc/controller.php');

if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login");
}
  $q = "select * from schoolregistrationtbl where SchRegCode = '$SchRegCode'";
  $q1 = $conn->query($q);
  while($row = mysqli_fetch_array($q1)){
    extract($row);
    $db_pass = $row['SchPassword'];
	$SchoolName = $row['SchoolName'];
  }

 if(isset($_POST["btnchange"])){
$old = mysqli_real_escape_string($conn,$_POST['txtold_password']);
$pass_new = mysqli_real_escape_string($conn,$_POST['txtnew_password']);
$confirm_new = mysqli_real_escape_string($conn,$_POST['txtconfirm_password']);
 
  if($db_pass!=$old){  
     $_SESSION['error']='Old Password not matched';

   } else if(strlen($pass_new) < 8){ 
     $_SESSION['error']='Password should be at least 8 characters in length';

  } else if($pass_new!=$confirm_new){ 
    $_SESSION['error']='NEW Password and CONFIRM password not Matched';
 
  } else {
    
   $sql = "update schoolregistrationtbl set `SchPassword`='$confirm_new' where SchRegCode= '$SchRegCode'";
  $res = $conn->query($sql);	


//send New Password  via email 
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
$mail->addAddress($email,$fullname);     //Add a recipient

$message = "
<html>
<head>
  <title>$SchoolName - Change Password| $website_name</title>
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
        font-style: normal; /* add font style */
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
      <img height='90' src=\"https://www.allschoolchecks.online/uploadImage/logo/logo.jpg\" width='108'>
      </td>
    </tr>
    <tr>
      <td class='email-body'>
        <p style='text-align: justify;'>Hello ". $SchoolName. ",</p>
        <p style='text-align: justify;'>Your Password Has been Changed Successfully.</p>
        <p style='text-align: justify;'>Your New Password is : ". $pass_new. "</p>

        <p style='text-align: justify;'>Regards,</p>
        <p style='text-align: justify;'>". $website_name. " Team</p>


        <p style='text-align: justify;'><b>If you did not initiate this change of password reach out to us via Phone Numbers: $phone1,$phone2 and email:$website_email</b>   </p>

      </td>
    </tr>
  </table>
</body>
</html>
";
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = "Change Password  | $website_name ";
$mail->Body    = $message;
$mail->send();

//save activity log details
$task= $SchoolName.' '.'Changed Password'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

header( "refresh:2;url= logout" ); 
   $_SESSION['success']='Password changed Successfully...';
  } catch (Exception $e) {
    $_SESSION['error'] = 'Problem Changing Password. Mailer Error: {$mail->ErrorInfo}';
    }
}
 }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Report (Class)| <?php echo $website_name ;?></title>
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
                            
                            <li><a href="logout">Logout</a></li>
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
                    <a href="logout">
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
                       
                        <li class="active"><strong>Student Report(Class)</strong></li>
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
                              <h3 class="m-t-none m-b"> Search Student using Class </h3>
                   <form role="form" method="POST">
                                    
									 <div class="form-group"><strong>
                   <label>Select Class</label></strong>
                   <?php
			      $sql = "select * from tblclass order by classname asc";
             $class = $dbh->query($sql);                       
             $class->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdsearch"  id="cmdsearch" class="form-control"  required>';
             echo '<option value="">Select Class</option>';

             while ( $row = $class->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
             }
             echo '</select>';
			        ?>            
            </div>
									
               <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnchange"><strong>Submit</strong></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                
                                <p class="text-center">&nbsp;</p>
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
</body>

</html>
