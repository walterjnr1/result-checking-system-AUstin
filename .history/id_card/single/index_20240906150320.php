<?php
include('../inc/controller.php');
if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: ../../login.php"); 
   }



   //fetch student data
$data = $dbh->query("SELECT student.*, school.* FROM studentadmissiontbl student LEFT JOIN schoolregistrationtbl school ON student.SchRegCode  = school.SchRegCode  where student.StuAdmNo ='$index'")->fetchAll();   
$row_student = $data->fetch();
$website_email=$row_student['email'] ;
$website_name=$row_student['website_name'] ;
$phone1=$row_student['phone1'] ;
$phone2=$row_student['phone2'] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Design</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <p style="text-align: center; font-size: 18px; font-weight: bold;">Back</p>
        <p style="text-align: center; font-size: 18px; font-weight: bold;">&nbsp;</p>
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
                <span>School ID: 1345</span>
                <img src="images/logo.png" alt="">            </div>
            <div>
                <img style="width: 307px;" src="images/back.svg" alt="">            </div>
            <div class="photo-section">
                <img src="images/download.jpg" alt="Profile Picture">            </div>
            <div class="details-section">
                <h3>Abigail Alison</h3>
                <p>Student</p>
            </div>
            <div class="more-details">
                <div>
                    <p>ID No:</p>
                    <p>Department:</p>
                    <p>Email:</p>
                </div>
                <div>
                    <p>240001</p>
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