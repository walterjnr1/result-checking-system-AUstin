<?php
include('../inc/controller.php');
if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: ../login.php"); 
   }

   $indexno=$_GET['id'];
   $data = $dbh->query("SELECT student.*,school.* FROM studentadmissiontbl student LEFT JOIN schoolregistrationtbl school ON student.SchRegCode  = school.SchRegCode where student.StuAdmNo ='$indexno'")->fetchAll();   
   $row_student= $data->fetch();
   $SchoolName=$row_student['SchoolName'];  
   $sch_logo =$row_student['logo'];
   $photo =$row_student['photo'];
   $SchRegCode  =$row_student['SchRegCode '];
   $parentEmail =$row_student['email'];
   $phone =$row_student['parentPhone'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Design</title>
    <link rel="stylesheet" href="dist/css/styles_idcard.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">

</head>
<body>
    <div class="container">
        <p style="text-align: center; font-size: 18px; font-weight: bold;">Back</p>
        <p style="text-align: center; font-size: 18px; font-weight: bold;">&nbsp;</p>
        <div class="id-card">
            <div class="top-section">
                <p><?php echo $SchoolName; ?></p>
                <span>School ID: 1345</span>
                <img src="<?php echo $SchoolName; ?>" alt="">            </div>
            <div>
                <img style="width: 307px;" src="images/back.svg" alt="">            </div>
            <div class="photo-section">
                <img src="<?php echo $SchoolName; ?>" alt="Profile Picture">            </div>
            <div class="details-section">
                <h3><?php echo $SchoolName; ?></h3>
                <p>Student</p>
            </div>
            <div class="more-details">
                <div>
                    <p>ID No:</p>
                    <p>Department:</p>
                    <p>Email:</p>
                </div>
                <div>
                    <p><?php echo $SchoolName; ?></p>
                    <p>Admin</p>
                    <p>abigail@email.com</p>
                </div>
            </div>
            <div class="qr-section">
                <img src="images/qr code.png" alt="QR Code">            </div>
        </div>
        <p style="text-align: center; font-size: 18px; font-weight: bold;">&nbsp;</p>
        <p style="text-align: center; font-size: 18px; font-weight: bold;">Print</p>
    </div>
</body>
</html>