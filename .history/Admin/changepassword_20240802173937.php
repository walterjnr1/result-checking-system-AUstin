<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

include('../inc/controller.php');
if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: login.php"); 
   }

  
  if(isset($_POST["btnchange"])){
    $old = mysqli_real_escape_string($conn,$_POST['txtold_password']);
    $pass_new = mysqli_real_escape_string($conn,$_POST['txtnew_password']);
    $confirm_new = mysqli_real_escape_string($conn,$_POST['txtconfirm_password']);

    if($password_admin<>$old){ 
        $error='Old Password not matched ';
    } 
    else if(strlen($pass_new) < '8'){
        $error='New Password Can\'t be less Than 8 characters';
    }else if($pass_new<>$confirm_new){
          $error='NEW Password and CONFIRM password not Matched';
    } else {
    //$pass = md5($_POST['password']);
   $sql = "update  users set `password`='$confirm_new' where email= '$email'";
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
  <title>Change Password| $website_name</title>
  <style>
    body {
      background-color: #f7f7f7; /* light green background */
      padding: 20px;
    }
  .email-body {
      background-color: #C6F7D0; /* light green background */
      padding: 20px;
      border: 15px solid #34C759; /* thick green border with reduced width */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* add a shade to the background */
      text-align: center; /* center the text */
      position: relative; /* add this to make the watermark work */
    }
  .logo {
      display: block;
      margin: 0 auto; /* center the logo */
      width: 30px; /* set logo width */
      height: 30px; /* set logo height */
    }
  .watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.5;
      z-index: -1;
      width: 200px; /* set watermark width */
      height: 200px; /* set watermark height */
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
        <p style='text-align: justify;'>Hello ". $fullname. ",</p>
        <p style='text-align: justify;'>Your Password Has been Changed Successfully.</p>
        <p style='text-align: justify;'>Your New Password is : ". $pass_new. "</p>
        <p style='text-align: justify;'>Regards,</p>
        <p style='text-align: justify;'>". $website_name. " Team</p>
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
$task= $fullname.' '.'Changed Password'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

header( "refresh:2;url= changepassword.php" ); 
$success = "Password Changed successfully...";
} catch (Exception $e) {
$error = "Problem changing password  Mailer Error: {$mail->ErrorInfo}";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:22 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Change Password|<?php echo $website_name;   ?> </title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?> ">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">

<!-- form wizard -->
<link rel="stylesheet" href="dist/plugins/formwizard/jquery-steps.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">

    <p>
      <?php include 'header.php'; ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'sidebar.php'; ?>
      
      <!-- Content Wrapper. Contains page content -->
       </p>
    <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
	
    <div class="content-header sty-one">
      <h1>Change Password</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Change Password</li>
      </ol>
    </div>
    			<?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?>
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Change Password</h5>
            </div>
            <div class="card-body">
                                <form role="form" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Old Password</label>
<input type="password" name="txtold_password" value="<?php if (isset($_POST['txtold_password']))?><?php echo $_POST['txtold_password']; ?>" placeholder="Enter Old Password" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                                    <input type="password" name="txtnew_password" value="<?php if (isset($_POST['txtnew_password']))?><?php echo $_POST['txtnew_password']; ?>" placeholder="Enter New Password" class="form-control" required="">
              </div>
               <div class="form-group">
                <label for="exampleInputPassword1">Confirm New Password</label>
                                    <input type="password" name="txtconfirm_password" value="<?php if (isset($_POST['txtconfirm_password']))?><?php echo $_POST['txtconfirm_password']; ?>" placeholder="Confirm New Password" class="form-control" required="">
              </div>
             
              <button type="submit" name="btnchange" class="btn btn-success">Change</button>
            </form>
            </div>
          </div>
        </div>
     
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="pull-left hidden-xs"><?php include'footer.php';  ?>.</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- form wizard --> 
<script src="dist/plugins/formwizard/jquery-steps.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
    var frmRes = $('#frmRes');
    var frmResValidator = frmRes.validate();
	
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo1').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        console.log('onChange', currentIndex, newIndex, stepDirection);
        // tab1
        if (currentIndex === 0) {
          if (stepDirection === 'forward') {
            var valid = frmRes.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmResValidator.resetForm();
          }
        }
		
		// tab2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            var valid = frmInfo.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }

        // tab3
        if (currentIndex === 2) {
          if (stepDirection === 'forward') {
            var valid = frmLogin.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }

        // tab4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            var valid = frmMobile.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }

        return true;

      },
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script> 
<script>
    $('#demo').steps({
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script>
</body>
</html>
