<?php
include('../inc/controller.php');

if (isset($_POST['btnlogin'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $status = '1';

    // Validate user input
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Please enter both email and password';
        //header("Location: login.php");
        
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM schoolregistrationtbl WHERE email=? AND SchPassword=? AND status=?");
    $stmt->bind_param("sss", $email, $password, $status);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $AccExpiryDate = $row['AccExpiryDate'];

        // Check if account has expired
        $currentDate = date('Y-m-d');
        if ($AccExpiryDate < $currentDate) {
            $_SESSION['error'] = 'Your account has expired. Please contact the administrator to renew your account.';
           // header("Location: login.php");
            //exit;
        } else {
            $_SESSION["login_SchRegCode"] = $row['SchRegCode'];
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = 'Wrong Email Address and School Password';
        //header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>login Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;?>">
 <style type="text/css">
<!--
.style3 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
}
.style4 {color: #FF0000}
-->

</style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><a href="index.php"><img src="../uploadImage/logo/logo.jpg" alt="Logo" width="133" height="100" border="0"></a></h1>
            </div>
            <h3 class="style4">Login Form </h3>
            <form class="m-t" role="form" method= "POST" action="">
                <div class="form-group">
                    <input type="text" name="txtemail" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="txtpassword" class="form-control" placeholder="Password" required="">
                </div>

                <button type="submit" name="btnlogin" class="btn btn-primary block full-width m-b">Login</button>




                <a href="forgot_password.php"><small>Forgot password?</small></a>
			
				
                <p class="text-muted text-center">&nbsp;</p>
          </form>
            <p class="m-t"></p>
			
        </div>
    </div>
	
    <?php include('../inc/footer.php');  ?>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
