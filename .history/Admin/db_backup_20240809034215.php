<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
include('../inc/controller.php');

if(isset($_POST["btnbackup"]))
{

// Backup the database
$backup_file = 'resulk_checker_backup.sql';
$fp = fopen($backup_file, 'w');

// Get all tables in the database
$tables = array();
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array()) {
    $tables[] = $row[0];
}

// Backup each table
foreach ($tables as $table) {
    $result = $conn->query("SELECT * FROM $table");
    $num_fields = $result->field_count;
    $rows = array();
    while ($row = $result->fetch_array()) {
        $rows[] = $row;
    }

    // Create the SQL for the table
    $sql = "CREATE TABLE $table (";
    for ($i = 0; $i < $num_fields; $i++) {
        $sql .= "`" . $result->fetch_field_direct($i)->name . "` " . $result->fetch_field_direct($i)->type;
        if ($i < $num_fields - 1) {
            $sql .= ", ";
        }
    }
    $sql .= ");\n";

    // Insert the data into the table
    foreach ($rows as $row) {
        $sql .= "INSERT INTO $table VALUES (";
        for ($i = 0; $i < $num_fields; $i++) {
            $sql .= "'" . $row[$i] . "'";
            if ($i < $num_fields - 1) {
                $sql .= ", ";
            }
        }
        $sql .= ");\n";
    }

    // Write the SQL to the file
    fwrite($fp, $sql);
}

// Close the file
fclose($fp);

// Download the backup file to your local computer (C: drive)
$local_backup_file = 'C:/resulk_checker_backup.sql';
copy($backup_file, $local_backup_file);

// Send the backup file to email using PHPMailer
$mail = new PHPMailer(true);
try{
// Server settings
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = $email_host;                     // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = $email_username;                     // SMTP username
$mail->Password   = $email_password;                               // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
$mail->Port       = $email_port;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

// Recipients
$mail->setFrom('backup@mysql.com', $website_name);
$mail->addAddress($website_email, 'Mysql');     // Add a recipient

// Attach the backup file
$mail->addAttachment($backup_file, 'resulk_checker_backup.sql');

// Email body
$message = "
<html>
<head>
  <title>Database Backup  | $website_name</title>
  <style>
    body {
      background-color: #f7f7f7; /* light green background */
      padding: 20px;
    }
   .email-body {
      background-color: #C6F7D0; /* light green background */
      padding: 20px;
      border: 5px solid #34C759; /* thick green border with reduced width */
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
  </style>
</head>
<body>
  <table width='80%' cellpadding='0' cellspacing='0' border='0'>
    <tr>
      
    </tr>
    <tr>
    <img height='90' src=\"https://www.allschoolchecks.online/uploadImage/logo/logo.jpg\" width='108'>

      <td class='email-body'>
        
        <p style='text-align: justify;'>Please find the database backup attached</p>
        
        <p style='text-align: justify;'>Regards,</p>
        <p style='text-align: justify;'>". $website_name. " Team</p>
      </td>
    </tr>
  </table>
</body>
</html>
";

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = "Database Backup  | $website_name ";
$mail->Body    = $message;

$success = "Database backup was successful.  Attachement sent to Email...";
} catch (Exception $e) {
  $error = "Problem backing up Database Mailer Error: {$mail->ErrorInfo}";
}

// Delete the backup file
unlink($backup_file);
   
}
   ?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:22 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Backup Database|<?php echo $website_name;   ?></title>
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
      <h1>Backup Database</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Backup Database</li>
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
        <div class="col-lg-12">
          <div class="card card-outline">
            <div class="card-header bg-blue">
              <h5 class="text-white m-b-0">Backup Database</h5>
            </div>
            <div class="card-body">
                                <form role="form" action="" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Server Name</label>
<input type="text" name="txtservername" class="form-control" value="<?php echo $servername;   ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">UserName</label>
                                    <input type="text" name="txtusername" class="form-control" value="<?php echo $username;   ?>" readonly>
              </div>
               <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="txtpassword" class="form-control" value="<?php echo $password;   ?>" readonly>
              </div>
			   <div class="form-group">
                <label for="exampleInputPassword1">Database Name</label>
                                    <input type="text" name="txtdbname" class="form-control" value="<?php echo $dbname;   ?>" readonly>
              </div>
			  
              <button type="submit" name="btnbackup" class="btn btn-success">Backup</button>
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
