<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include('inc/controller_frontend.php');

//validate result
if(isset($_POST["btncheckresult"]))
{

    $StudentAdmNo= $_POST['txtstudentID'];
    $SchRegCode= $_POST['txtschoolID'];
    $term= $_POST['cmdterm'];
    $class= $_POST['cmdclass'];
    $examyear= $_POST['txtyear'];
    $examtype= $_POST['cmdexamtype'];
    $pin= $_POST['txtpin'];
    $serialno= $_POST['txtserialno'];


	
		 // check if the scratch card has been used by another student
		 $query = "SELECT * FROM tblscratchcard WHERE serial_no = '$serialno' and studentID != '0' and studentID != '$StudentAdmNo' ";
		 $result = mysqli_query($conn, $query);
 		 if (mysqli_num_rows($result) > 0) {
			 $_SESSION['error'] = "Scratch card has Already been used by another student.";
			 header("Location: index");
			 //exit;
		 } else {
			 // check if the scratch card is correct
			 $query = "SELECT * FROM tblscratchcard WHERE serial_no = '$serialno' and pin = '$pin' ";
			 $result = mysqli_query($conn, $query);
			  if (mysqli_num_rows($result) == 0) {
				 $_SESSION['error'] = "Invalid Scratch card .";
				 header("Location: index.php");
				// exit;
			 } else {
				 // check if the scratch card is used more than 3 times
				 $stmt = $dbh->query("SELECT * FROM tblscratchcard WHERE serial_no = '$serialno'");
				$row_card = $stmt->fetch();
				$count=$row_card['count'] ;
				 if ($count > 3) {
					$_SESSION['error'] = "Scratch card has been used more than 3 times. Purchase new Card";
				 
				 } else {

			 // scratch card has not been used before, proceed with result checking

			 $sql = "SELECT * FROM tblscratchcard WHERE serial_no='$serialno'";
			 $res = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($res) > 0) {
			 $fetch = mysqli_fetch_assoc($res);
			 $count1 = $fetch['count'];
			 $count1 = $count1 + 1;
			 

	$sql = "SELECT * FROM `examsresultstbl` WHERE `StuAdmNo`=? AND `SchRegCode`=? AND `Term`=? AND `class`=? AND `ExamsYear`=? AND `ExamsType`=?";
	$query = $dbh->prepare($sql);
	$query->execute(array($StudentAdmNo,$SchRegCode,$term,$class,$examyear,$examtype));
	$row = $query->rowCount();
	$fetch = $query->fetch();
	if($row > 0) {
	$_SESSION['session_ID'] = $fetch['id'];
	$_SESSION['session_StudentName'] = $fetch['StudentName'];
	$studentID= $fetch['StuAdmNo'];

	
		//update card status
		$sql1 = " update tblscratchcard set status='1',count='$count1',studentID='$studentID' where serial_no ='$serialno'";
		mysqli_query($conn, $sql1);

	header("Location: result.php");
} else {
	 $_SESSION['error'] = "Wrong Student Details";
				 
}			 
}
}
}
}
}	
	if(isset($_POST["btnsend"])){

	$msg= $_POST['txtmessage'];
    $subject= $_POST['txtsubject'];
    $email= $_POST['txtemail'];

     //send compliant via email
     $mail = new PHPMailer(true);
     
         //Server settings
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = $email_host;                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = $email_username;                     //SMTP username
         $mail->Password   = $app_password;                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = $email_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     
        //Recipients
        $mail->setFrom($email, ' Contact us');
        $mail->addAddress('newleas','Result Checker System');     //Add a recipient
     
		$message = "
		<html>
		<head>
		  <title>Contact Us</title>
		  <style>
			------------------------------------- */
			* {
			  margin: 0;
			  padding: 0;
			  font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			  box-sizing: border-box;
			  font-size: 14px;
			}
		
			img {
			  max-width: 100%;
			}
		
			body {
			  -webkit-font-smoothing: antialiased;
			  -webkit-text-size-adjust: none;
			  width: 100%!important;
			  height: 100%;
			  line-height: 1.6;
			}
		
			/* Let's make sure all tables have defaults */
			table td {
			  vertical-align: top;
			}
		
			/* ------------------------------------- */
			BODY & CONTAINER
			------------------------------------- */
			body {
			  background-color: #f6f6f6;
			}
		
		   .body-wrap {
			  background-color: #f6f6f6;
			  width: 100%;
			}
		
		   .container {
			  display: block!important;
			  max-width: 600px!important;
			  margin: 0 auto!important;
			  /* makes it centered */
			  clear: both!important;
			}
		
		   .content {
			  max-width: 600px;
			  margin: 0 auto;
			  display: block;
			  padding: 20px;
			}
		
			/* ------------------------------------- */
			HEADER, FOOTER, MAIN
			------------------------------------- */
		   .main {
			  background: #fff;
			  border: 1px solid #e9e9e9;
			  border-radius: 3px;
			}
		
		   .content-wrap {
			  padding: 20px;
			}
		
		   .content-block {
			  padding: 0 0 20px;
			}
		
		   .header {
			  width: 100%;
			  margin-bottom: 20px;
			}
		
		   .footer {
			  width: 100%;
			  clear: both;
			  color: #999;
			  padding: 20px;
			}
		
		   .footer a {
			  color: #999;
			}
		
		   .footer p,.footer a,.footer unsubscribe,.footer td {
			  font-size: 12px;
			}
		
			/* ------------------------------------- */
			TYPOGRAPHY
			------------------------------------- */
			h1, h2, h3 {
			  font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
			  color: #000;
			  margin: 40px 0 0;
			  line-height: 1.2;
			  font-weight: 400;
			}
		
			h1 {
			  font-size: 32px;
			  font-weight: 500;
			}
		
			h2 {
			  font-size: 24px;
			}
		
			h3 {
			  font-size: 18px;
			}
		
			h4 {
			  font-size: 14px;
			  font-weight: 600;
			}
		
			p, ul, ol {
			  margin-bottom: 10px;
			  font-weight: normal;
			}
		
			p li, ul li, ol li {
			  margin-left: 5px;
			  list-style-position: inside;
			}
		
			/* ------------------------------------- */
			LINKS & BUTTONS
			------------------------------------- */
			a {
			  color: #1ab394;
			  text-decoration: underline;
			}
		
		   .btn-primary {
			  text-decoration: none;
			  color: #FFF;
			  background-color: #1ab394;
			  border: solid #1ab394;
			  border-width: 5px 10px;
			  line-height: 2;
			  font-weight: bold;
			  text-align: center;
			  cursor: pointer;
			  display: inline-block;
			  border-radius: 5px;
			  text-transform: capitalize;
			}
		
			/* ------------------------------------- */
			OTHER STYLES THAT MIGHT BE USEFUL
			------------------------------------- */
		   .last {
			  margin-bottom: 0;
			}
		
		   .first {
			  margin-top: 0;
			}
		
		   .aligncenter {
			  text-align: center;
			}
		
		   .alignright {
			  text-align: right;
			}
		
		   .alignleft {
			  text-align: left;
			}
		
		   .clear {
			  clear: both;
			}
		
			/* ------------------------------------- */
			ALERTS
			Change the class depending on warning email, good email or bad email
			------------------------------------- */
		   .alert {
			  font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}


  	</style>

	</head>
	<body>
  <table class='body-wrap'>
    <tr>
      <td></td>
      <td class='container' width='600'>
        <div class='content'>
          <table class='main' width='100%' cellpadding='0' cellspacing='0'>
            <tr>
              <td class='content-wrap'>
                <table cellpadding='0' cellspacing='0'>
                  <tr>
                    <td>
					  <img class='img-responsive' height='90' src=\"https://allschoolchecks.org/images/logo.jpg\" width='108'>

                    </td>
                  </tr>
                  
                  <tr>
                    <td class='content-block'>
					  <p><h4>Title : </h4> ".$subject."</p>
					  
       				<p><h4>Message : </h4> ".$msg."</p>  
					  </td>
                  </tr>
                  
                </table>
              </td>
            </tr>
          </table>
          <div class='footer'>
            <table width='100%'>
              <tr>
                <td class='aligncenter content-block'>Follow <a href='#'>@Company</a> on Twitter.</td>
              </tr>
            </table>
       	   </div>
     		   </div>
     		 </td>
    	  <td></td>
  			  </tr>
  			</table>
			</body>
			</html>
			";

         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = ''.$subject.'  |Result Checker System';
         $mail->Body    = $message;
     
         $mail->send();
     if(!$mail) {   
        $_SESSION['error'] = "There Was problem Sending Message...";
    
    }else { 
        
        $_SESSION['success'] = "Your Message has been Recieved Successfully";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Result checking System</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>


    <style type="text/css">
<!--
.style1 {font-size: 16px}
a:link {
	color: #FFFF00;
}
a:visited {
	color: #FFFF00;
}
a:hover {
	color: #000066;
}
a:active {
	color: #FFFF00;
}
-->
    </style>
    </head>
<body class="host_version"> 



    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index">Home</a></li>
					  <li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
					  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Download </a>
							 <div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="download_result.php">Result Calculator Template </a>
								<a class="dropdown-item" href="#">User Guide</a>
							</div>
						</li>
					  </ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#result"><span>Check Result</span></a></li>
						
                    </ul>

					
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	

	<!-- Modal result-->
	<div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><B>Check your result Seamlessly</B></h3>

			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<img src="images/logo.jpg" alt="" height="100" width="100"/>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						
					<?php
			include('validateresult_form.php');
					?>

					</div>
					</div>
			</div>
		</div>
	  </div>
	</div>
	<!-- End Modal result -->

	<!-- Modal contact us form-->
	<div class="modal fade" id="contact_us" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><B>Contact Us</B></h3>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<img src="images/logo.jpg" alt="" height="100" width="100"/>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="contact_us">
						
					<?php
			include('contactus_form.php');
					?>

					</div>
					</div>
			</div>
		</div>
	  </div>
	</div>
	<!-- End Modal contactus -->

	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-pause="hover" data-interval="3000" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slider-01.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>Result checking System </strong></h2>
										<p class="lead">Online Result checking System. </p>
											<a href="#" data-toggle="modal" data-target="#contact_us" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-02.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>Result checking System </strong></h2>
										<p class="lead">Society for Environmental Humanities is an international multidisciplinary association. </p>
										<a href="#" data-toggle="modal" data-target="#contact_us" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slider-03.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>Result checking System </strong></h2>
										<p class="lead">Society for Environmental Humanities is an international multidisciplinary association. </p>
										<a href="#" data-toggle="modal" data-target="#contact_us" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div>
				
				<!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
          <!-- end title -->
<div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>Society for Environmental Humanities (SEH)</h4>
                        <h2>Welcome to Society for Environmental Humanities</h2>
                        <p align="justify" class="style1">Society for Environmental Humanities is an international multidisciplinary association that aggregates scholars of environmental humanities to promote interdisciplinary / multidisciplinary researches on environmental humanities, and to offer a platform for sharing of ideas on environmental humanities.  It addresses global environmental problems through humanistic perspectives. It exists to raise environmental consciousness, and advocate for a sustainable environment through publications, conferences, seminars, symposia, public outreach, and so on. It partners with societies, groups, institutions, and individuals that promote environmental sustainability. It publishes <a href="about.html">Journal of Environmental Humanities (JEH).</a></p>

                      <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/inner.jpeg" height="350" width="60"> 
                    </div><!-- end media -->
                </div><!-- end col -->
		  </div>
			
				
            </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end section -->

   
						

<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                      <p> Society for Environmental Humanities is an international multidisciplinary association that aggregates scholars of environmental humanities to promote interdisciplinary / multidisciplinary researches on environmental humanities, and to offer a platform for sharing of ideas on environmental humanities.</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                  <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
							<li><a href="#">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                  <ul class="footer-links">
                            <li><a href="mailto:#">support@result_checker.com</a></li>
                            
                            <li>+2348037825257</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name"><?php include('inc/footer.php') ?></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>

	<link rel="stylesheet" href="popup_style.css">
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