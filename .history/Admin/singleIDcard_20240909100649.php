<?php
include('../inc/controller.php');
include('phpqrcode/qrlib.php');

if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: ../login.php"); 
   }

   $indexno=$_GET['id'];
   $data = $dbh->query("SELECT student.*,school.* FROM studentadmissiontbl student LEFT JOIN schoolregistrationtbl school ON student.SchRegCode  = school.SchRegCode where student.StuAdmNo ='$indexno'")->fetchAll();   
   foreach ($data as $row) {
    $row_student = $row;
    $Surname =$row_student['Surname'];
    $FirstName =$row_student['FirstName'];
    $OtherName =$row_student['OtherName'];
    $SchoolName=$row_student['SchoolName'];  
    $sch_logo =$row_student['logo'];
    $photo =$row_student['photo'];
    $SchRegCode  =$row_student['SchRegCode'];
    $phone =$row_student['parentPhone'];
    $sex =$row_student['sex'];
     break; // exit the loop after the first iteration
}
   

//generate qr image
// Define the data to be encoded in the QR code
$qrdata = $SchRegCode . ' - ' . $SchoolName. ' - ' .$indexno;
QRcode::png($qrdata, '../uploadImage/QrImage/'.$indexno.'.png', QR_ECLEVEL_L, 4);
$file = '../uploadImage/QrImage/'.$indexno.'.png';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <link rel="stylesheet" href="dist/css/styles_singleIDcard.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">
</head>
<body>
    <a href="student_record.php" class="back-btn">< back</a>
    <div class="id-card">
        <div class="top-section">
            <p><?php echo $SchoolName; ?>L</p>
            <span>School ID: <?php echo $SchRegCode; ?></span>
            <img src="../<?php echo $sch_logo; ?>" alt="">
        </div>
        <div>
        <img style="width: 307px;" src="dist/img/back.svg" alt="">        </div>
        <div class="photo-section">
            <img src="../<?php echo $photo; ?>" alt="Profile Picture">
        </div>
        <div class="details-section">
            <h3>../<?php echo $sch_logo; ?></h3>
<h3><?php echo $Surname; ?>, <?php echo $FirstName; ?> <?php echo $OtherName; ?></h3>        </div>
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
            <img src="images/qr code.png" alt="QR Code">
        </div>
    </div>
   
    <a href="#" class="print-btn">
        Print
    </a>
</body>
</html>