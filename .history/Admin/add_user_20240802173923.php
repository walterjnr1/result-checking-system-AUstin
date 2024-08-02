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

if(isset($_POST["btnsubmit"]))
{

$fullname = $_POST['txtfullname'];
$email = $_POST['txtemail'];
$length = 5;
$password = substr(str_shuffle("1234567abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP"), 0, $length);
$groupname = $_POST['cmdtype'];
$last_ip="Not Available";
$lastaccess="Not Available";
$status="1";
			
///check if email already exist
$stmt = $dbh->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]); 
$user = $stmt->fetch();

if ($user) {
$error='Email Already Exist in our Database ';
} else {

  $file_type = $_FILES['avatar']['type']; //returns the mimetype
  $allowed = array("image/jpeg", "image/gif","image/jpeg", "image/webp","image/png");
  // ...

if(!in_array($file_type, $allowed)) {
  $error = 'Only jpeg, Webp, gif, and png files are allowed.';
  // exit();
} else {
  $image = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
  $image_name = addslashes($_FILES['avatar']['name']);
  $image_size = getimagesize($_FILES['avatar']['tmp_name']);
  
  // Check if file already exists and unlink it
  $target_file = "../uploadImage/" . $_FILES["avatar"]["name"];
  if (file_exists($target_file)) {
      unlink($target_file);
  }
  
  move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
  $location = "uploadImage/" . $_FILES["avatar"]["name"];


 //Add User details
$sql = 'INSERT INTO users(email,password,fullname,lastaccess,last_ip,groupname,status,photo) VALUES(:email,:password,:fullname,:lastaccess,:last_ip,:groupname,:status,:photo)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':email' => $email,
	':password' => $password,
	':fullname' => $fullname,
	':lastaccess' => $lastaccess,
	':last_ip' => $last_ip,
		':groupname' => $groupname,
		':status' => $status,
		':photo' => $location

]);
if ($statement){

//send Password to user via email 
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
  <title>$fullname - User Registration | $website_name</title>
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
    }
    .logo {
      display: block;
      margin: 0 auto; /* center the logo */
      width: 180px; /* set logo width */
      height: 180px; /* set logo height */
    }
    .access-code {
      font-size: 24px; /* make the access code bigger */
      font-weight: bold; /* make the access code bold */
      color: #000; /* make the access code green */
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
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Hello $fullname,</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Your Registration as a User was successful.</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Your Email: <b> $email</b> and password: <b>$password</b> .</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Thank You for choosing $website_name APP,</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'><b>N/B: You can change your password anytime.Also, DO NOT disclose your Password, or OTP to anyone<b></p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>You can reach out to us via Phone Numbers: $phone1,$phone2 and email:$website_email </p>

        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Regards,</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>". $website_name. " Team</p>
      </td>
    </tr>
  </table>
</body>
</html>
";
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = "User Account  | $website_name ";
$mail->Body    = $message;

$mail->send();


//save activity log details
$task= $fullname.' '.'Created New User Account'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

$success = "User Added successfully...";
} catch (Exception $e) {
$error = "Problem adding User. Mailer Error: {$mail->ErrorInfo}";
}
}
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
<title>Add New User| <?php echo $website_name; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">

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

    <?php include 'header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>&nbsp;</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>New User</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row" align="center" >
	   <p align="center">	
	   			<?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?>
</p>
        
      </div>
      <div class="row m-t-3">
       
        <div class="col-lg-8">
          <div class="card ">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Create User </h5>
            </div>
            <div class="card-body">
              
             <form  action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                
				
	 <div class="col-md-10">
                  <div class="form-group has-feedback">
                    <label class="control-label">Fullname</label>
                    <input class="form-control" name="txtfullname" value="<?php if (isset($_POST['txtfullname']))?><?php echo $_POST['txtfullname']; ?>" type="text">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>                 
                <div class="col-md-10">
                  <div class="form-group has-feedback">
                    <label class="control-label">Email</label>
                    <input class="form-control" name="txtemail" value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" type="email">
                    <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>
				    </div>
                </div>
                
				 <div class="col-md-10">
                  <div class="form-group has-feedback">
                    <label class="control-label">User Type</label>
					<?php
			$sql = "select * from tblgroup";
             $group = $dbh->query($sql);                       
             $group->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdtype"  id="cmdtype" class="form-control" >';
			 			     echo '<option value="">Select Group Name</option>';
             while ( $row = $group->fetch() ) 
             {
                echo '<option value="'.$row['groupname'].'">'.$row['groupname'].'</option>';
             }

             echo '</select>';
			 ?>  
					</div>
                </div>
                               
                <div class="col-md-10">
                                <p class="text-center">
                        <input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                                </p>
								  
                                <p class="text-center">
                                    <img src="dist/img/default.jpg" alt="isupport" width="134" height="123" id="logo-img">				    </p>
				  </div>
								
                <div class="col-md-10">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                </div>
                </div>
              </form>
           
            </div>
          </div>
        </div>
      </div>
     
    </div>
        </div>
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <div class="pull-left hidden-xs"><?php include('../inc/footer.php');  ?>.</footer>
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
    function display_img(input){
        if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
    }
	</script>
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
  	 <script>
    function display_img(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
   
</script>
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:22 GMT -->
</html>