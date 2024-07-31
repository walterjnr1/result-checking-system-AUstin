<?php 
include('../inc/controller.php');
if(isset($_POST['btnlogin']))
{
if($_POST['txtemail'] != "" || $_POST['txtpassword'] != ""){

$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
$password = mysqli_real_escape_string($conn,$_POST['txtpassword']);

$sql = "SELECT * FROM `users` WHERE `email`=? AND `password`=? ";
			$query = $dbh->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
			$_SESSION['login_email'] = $fetch['email'];
			$_SESSION['login_fullname'] = $fetch['fullname'];
		$_SESSION['login_pic'] = $fetch['photo'];
		$_SESSION['login_groupname'] = $fetch['groupname'];
		
//save activity log details
$fullname=$fetch['fullname'];
$task= $fullname.' '.'Logged In'.' '. 'On' . ' '.$current_date;

$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

header("Location: index.php");

} else{
$error='Invalid Email/Password';
}
}else{
$error='Must Fill-in All Fields ';

}
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:44 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> Login |<?php echo $website_name;   ?> </title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?> ">
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
    <h3 class="login-box-msg style1"><strong>Sign In</strong></h3>
    <p class="login-box-msg"><img src="../<?php echo $logo;   ?>" width="109" height="100"></p>
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
      <div class="form-group has-feedback">
        <input type="password" name="txtpassword" class="form-control sty1" placeholder="Password">
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">
              Remember Me </label>
            <a href="forgot-password.php" class="pull-right"><i class="fa fa-lock"></i> Forgot password?</a> </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" name="btnlogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p>&nbsp;</p>
    </div>
    <!-- /.social-auth-links -->
    
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