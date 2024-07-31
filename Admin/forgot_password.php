<?php 
include 'header2.php'; 

if(isset($_POST['btn_forgot']))
{
$otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);

$text_email=$_POST['txtemail'];

$sql = "SELECT * FROM users where email ='".$text_email."' " ;
$ans = $conn->query($sql);
$res=mysqli_fetch_array($ans);
   $realemail=$res['email'];
  $fullname=$res['fullname'];  
  $username = $res['username'];


if($text_email == $realemail){
$sql2 = "UPDATE users SET password ='$otp' WHERE email='$text_email'";
$ans1 = $conn->query($sql2);
 if ($ans1){

 
//send New Password  via email 
			$to = $realemail;
			$subject = " Forgot Password|".$row_website['website_name']."";
			$message = "
				<html>
				<head>
				<title> Forgot Password|".$row_website['website_name']."</title>
				</head>
				<body>
				
 				 <img src=\"https://isupport.com.ng/assets/images/banner.png\">
				<p>Hello ".$fullname." ,</p>
                            <p>Your New Password is : ".$otp_pass." </p>
									
						   <p>Regards,</p>                 
						 <p>".$row_website['website_name']."</p>     
				</body>
				</html>
				";
			 //dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: ".$row_website['email']."". "\r\n" ;
		mail($to,$subject,$message,$headers);
		
		    header("Location: login.php"); 

		}else{
$errror='Problem Retrieving Password';

		}
		}
		}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:44 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Forgot Password|<?php echo $row_website['website_name'];   ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $row_website['logo'];   ?> ">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg style1">Forgot Password </h3>
    <p class="login-box-msg">&nbsp;</p>
    <p class="login-box-msg"> 
	<div class="" >
				<?php if($success){?>
          <div class="alert alert-success" role="alert" align="center">  <?php echo ($success); ?></div>
		  <?php } 
					else if($error){?>
           <div class="alert alert-danger" role="alert">  <?php echo ($error); ?></div>
 <?php } ?>
					
							
            <p>&nbsp;</p>
    </div></p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="txtemail" class="form-control sty1" placeholder="Email Address">
      </div>
            <div>
       
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">            <button type="submit" name="btn_forgot" class="btn btn-primary btn-block">Request New Password</button>
</div>
<div class="col-xs-4 m-t-1">     
       <a href="index.php">Back</a></div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p>&nbsp;</p>
    </div>
    <!-- /.social-auth-links -->
    
    <div class="m-t-2"></div>
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.html"></script>
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:45 GMT -->
</html>