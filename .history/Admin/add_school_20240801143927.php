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

if(isset($_POST["btnadd"]))
{

$schoolname = $_POST['txtschoolname'];
$email = $_POST['txtemail'];
$SchPhone1 = $_POST['txtphone1'];
$SchPhone2 = $_POST['txtphone2'];
$location = $_POST['txtlocation'];
$gpsaddress = $_POST['txtgpsaddress'];
$schoolcreationDate = $_POST['txtschoolcreationDate'];
$district = $_POST['txtdistrict'];
$region = $_POST['txtregion'];
$zone = $_POST['txtzone'];
$ITname = $_POST['txtITname'];


$length = 12;
$password = substr(str_shuffle("1234567abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP"), 0, $length);
$schShortCode = substr(str_shuffle("1234567890"), 0, $length);
$accountpassword = substr(str_shuffle("1234567abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP"), 0, 5);
$schRegCode = substr(str_shuffle("1234567890"), 0, $length);
$expiry_date = date('Y-m-d', strtotime('+12 months', strtotime($current_date)));

///check if school name and location already exist 
$stmt = $dbh->prepare("SELECT * FROM schoolregistrationtbl WHERE SchoolName=? and Location=? and District=?");
$stmt->execute([$schoolname,$location,$district]); 
$sch = $stmt->fetch();

if ($sch) {
$error='This School Already Exist in our Database ';
} else {

  
 //Add school details
$sql = 'INSERT INTO schoolregistrationtbl(SchRegCode ,SchoolName,SchShortCode,Location,GPSAddress,datereg,District,Region,Zone,ITName,SchPassword,AccountsPass,AccExpiryDate,SchPhone1,SchPhone2,schoolcreationDate,status,logo,signature,email) VALUES(:SchRegCode ,:SchoolName,:SchShortCode,:Location,:GPSAddress,:datereg,:District,:Region,:Zone,:ITName,:SchPassword,:AccountsPass,:AccExpiryDate,:SchPhone1,:SchPhone2,:schoolcreationDate,:status,:logo,:signature,:email)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':SchRegCode' => $schRegCode,
	':SchoolName' => $schoolname,
	':SchShortCode' => $schShortCode,
	':Location' => $location,
	':GPSAddress' => $gpsaddress,
		':datereg' => $current_date,
		':District' => $district,
    ':Region' => $region,
	  ':Zone' => $zone,
	  ':ITName' => $ITname,
		':SchPassword' => $password,
		':AccountsPass' => $accountpassword,
    ':AccExpiryDate' => $expiry_date,
	  ':SchPhone1' => $SchPhone1,
	  ':SchPhone2' => $SchPhone2,
	  ':schoolcreationDate' => $schoolcreationDate,
	  ':status' => '1',
		':logo' => 'uploadImage/logo/no-logo.png',
		':signature' => 'uploadImage/schools/no-signature.png',
    ':email' => $email

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
$mail->addAddress($email,$schoolname);     //Add a recipient

$message = "
<html>
<head>
  <title>$schoolname - School Registration | $website_name</title>
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
        <img src='https://www.allschoolchecks.org/uploadImage/logo/logo.jpg' class='logo' alt='logo'>
      </td>
    </tr>
    <tr>
      <td class='email-body'>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Congratulations $schoolname,</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Your School Registration was successful.</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>School registration Code: <b> $schRegCode</b> .</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>School password: <b>$password</b> .</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Account Expiry Date: <b> $expiry_date</b> .</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>School Shortcode: <b>$schShortCode</b> .</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>GPS Address: <b>$gpsaddress</b> .</p>

        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>You can login to your school dashboard here https://allschoolchecks.org/school using details provided in the Email.</p>

        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'>Thank You for choosing $website_name APP,</p>
        <p style='text-align: justify; font-size: 17px; font-family: Arial, sans-serif;'><strong>N/B: You can change your password anytime.Also, DO NOT disclose your Password, or Short Code and School Registration Code to anyone</strong></p>
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
$mail->Subject = "School Registration  | $website_name ";
$mail->Body    = $message;

$mail->send();


//save activity log details
$task= $fullname.' '.'Created New School Account'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

$success = "School Added successfully...";
} catch (Exception $e) {
$error = "Problem adding School. Mailer Error: {$mail->ErrorInfo}";
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
<title>Add School|<?php echo $website_name;   ?></title>
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
      <h1>Add School</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Add School</li>
      </ol>
    </div>
     <p align="center">	
	   			<?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?>
</p>
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Add New School</h5>
            </div>
            <div class="card-body">
            <form  action="" method="POST" >
              <div class="form-group">
                <label for="exampleInputEmail1">Name of school</label>
                <input class="form-control" name="txtschoolname" value="<?php if (isset($_POST['txtschool']))?><?php echo $_POST['txtschool']; ?>" type="text" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" name="txtemail" value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" type="email" required>
              </div>
               <div class="form-group">
                <label for="exampleInputPassword1">Location</label>
                <input class="form-control" name="txtlocation" value="<?php if (isset($_POST['txtlocation']))?><?php echo $_POST['txtlocation']; ?>" type="text" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">GPS Address</label>
                <input class="form-control" name="txtgpsaddress" value="<?php if (isset($_POST['txtgpsaddress']))?><?php echo $_POST['txtgpsaddress']; ?>" type="text" required>
            </div><div class="form-group">
                <label for="exampleInputPassword1">Year School Founded</label>
                <input class="form-control" name="txtschoolcreationDate" value="<?php if (isset($_POST['txtytxtschoolcreationDateoe']))?><?php echo $_POST['txtschoolcreationDate']; ?>" type="text" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">District</label>
                <?php
			$sql = "select * from tbldistrict";
             $group = $dbh->query($sql);                       
             $group->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmddistrict"  id="cmddistrict" class="form-control" >';
			 			     echo '<option value="">Select District Name</option>';
             while ( $row = $group->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['DistrictName'].'</option>';
             }

             echo '</select>';
			 ?>    
                 </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Region</label>
                <?php
			$sql = "select * from tblregion";
             $region = $dbh->query($sql);                       
             $region->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdregion"  id="cmdregion" class="form-control" >';
			 			     echo '<option value="">Select Region Name</option>';
             while ( $row = $region->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
             }

             echo '</select>';
			 ?>               
       </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Zone</label>
                <?php
		      	$sql = "select * from tblzone";
             $zone = $dbh->query($sql);                       
             $zone->setFetchMode(PDO::FETCH_ASSOC);
             echo '<select name="cmdzone"  id="cmdzone" class="form-control" >';
			 			     echo '<option value="">Select Zone Name</option>';
             while ( $row = $zone->fetch() ) 
             {
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
             }

             echo '</select>';
			 ?>             </div>
            <div class="form-group">
                <label for="exampleInputPassword1">IT Name</label>
                <input class="form-control" name="txtITname" value="<?php if (isset($_POST['txtITname']))?><?php echo $_POST['txtITname']; ?>" type="text" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Phone 1</label>
                <input class="form-control" name="txtphone1" value="<?php if (isset($_POST['txtphone1']))?><?php echo $_POST['txtphone1']; ?>" type="telephone" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone 2</label>
                <input class="form-control" name="txtphone2" value="<?php if (isset($_POST['txtphone2']))?><?php echo $_POST['txtphone2']; ?>" type="telephone" required>
            </div>
            
            
              <button type="submit" name="btnadd" class="btn btn-success">Save</button>
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
