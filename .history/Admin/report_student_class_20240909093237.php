<?php
include('../inc/controller.php');
if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: login.php"); 
   }

   $query=$_POST['cmdsearch'];
   
   $data = $dbh->query("SELECT * FROM tblclass where id='$query"");
   $row_website = $data->fetch();
   $website_email=$row_website['email'] ;
   $website_name=$row_website['website_name'] ;
   ?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:22 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Student Report|<?php echo $website_name;   ?></title>
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
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js"> </script>

<script type="text/javascript">
  function PrintElem(elem) {
    var printWindow = window.open('', 'Student Report by class', 'height=400,width=1100');
    printWindow.document.write('<html><head><title>Student Report by class</title></head><body>');
    printWindow.document.write(document.querySelector(elem).innerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.onload = function() {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    };
}

    </script>


<style type="text/css">
<!--
.style12 {	font-size: 14;
	color: #000000;
}
.style8 {	color: #0000FF;
	font-weight: bold;
}
.style16 {font-size: 14px; color: #000000; }
-->
</style>
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
      <h1>Student Report</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Student Report</li>
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
        <table width="1049" border="0" align="center">
          <tr>
            <td width="1343" height="214">
            <div class="card" id="card" >
                <div class="card-header">
                  <p align="center" class="style8">Student Report by class <a href="class_report.php"><span class="style12">&lt;&lt; Back</span> </a></p>
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table width="97%" align="center" class="table" id="example1">
                    <thead>
                    <th width="4%"><span class="style16">photo</span></th>
                        <th width="5%"><span class="style16">Admission No</span></th>
                      <th width="6%"><span class="style16">Fullname</span></th>
                      <th width="3%"><span class="style16">Sex</span></th>
                      <th width="8%"><span class="style16">DOB</span></th>
                      <th width="4%"><span class="style16">Address</span></th>
                      <th width="8%"><span class="style16">Place of Birth</span></th>
                      <th width="7%"><span class="style16">Class</span></th>
                      <th width="5%"><span class="style16">Parent Name</span></th>
                      <th width="8%"><span class="style16">Parent Email</span></th>
                      <th width="7%"><span class="style16">Parent Phone</span></th>
                    </tr>
                    </thead>
                    
                    <div align="center"></div>
                    <tbody>
                    <?php 
        $data = $dbh->query("SELECT student.*,school.*, class.* FROM studentadmissiontbl student LEFT JOIN schoolregistrationtbl school ON student.SchRegCode = school.SchRegCode
        LEFT JOIN tblclass class ON student.CurClass = class.id where student.CurClass = '$query' ORDER BY student.FirstName DESC")->fetchAll();       
        $cnt=1;
        foreach ($data as $row) {
        ?>
                      <tr class="gradeX">
                        <td height="35" class="center"><div align="center"><img src="../<?php echo $row['photo'];?>"  width="37" height="32" border="2"/></div></td>
                        <td><div align="center"><?php echo $row['StuAdmNo'];?> </div></td>
                        <td><div align="center"><?php echo $row['Surname'];?>, <?php echo $row['FirstName'];?> <?php echo $row['OtherName'];?> </div></td>
                        <td class="center"><div align="center"><?php echo $row['sex'];  ?></div></td>
                        <td class="center"><div align="center"><?php echo $row['DOB'];?></div></td>
                        <td class="center"><div align="center"><?php echo $row['address'];?></div></td>
                        <td><div align="center"><?php echo $row['PlaceOB'];?> </div></td>
                        <td><div align="center"><?php echo $row['classname'];?> </div></td>
                        <td class="center"><div align="center"><?php echo $row['parentName'];  ?></div></td>
                        <td class="center"><div align="center"><?php echo $row['parentEmail'];?></div></td>
                        <td class="center"><div align="center"><?php echo $row['parentPhone'];?></div></td>
                      <?php $cnt=$cnt+1;} ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              <!-- /.card-body -->
              </div>
                <table width="392" border="0" align="right">
                  <tr>
                    <td width="386"></td>
                  </tr>
                </table>
              <p align="left">&nbsp; </p>
              <p align="left">
                  <input name="button" type="button" onClick="PrintElem('#card')" value="Print Report" />
              </p></td>
          </tr>
        </table>
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
