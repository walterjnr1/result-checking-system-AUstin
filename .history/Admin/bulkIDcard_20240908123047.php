<?php
include('../inc/controller.php');
include('phpqrcode/qrlib.php');

if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: ../login.php"); 
   }

   $classid=$_GET['classid'];
    $query = "SELECT school.*, student.* 
               FROM studentadmissiontbl student 
               LEFT JOIN schoolregistrationtbl school ON student.SchRegCode = school.SchRegCode 
               WHERE student.CurClass = :class_id";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':class_id', $class_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    foreach($result as $row_student){
     $fullname = $row_student['Surname']. ", " . $row['FirstName']. " " . $row['OtherName'];
     $SchoolName=$row_student['SchoolName'];  
     $sch_logo =$row_student['logo'];
     $photo =$row_student['photo'];
     $SchRegCode  =$row_student['SchRegCode'];
     $parentEmail =$row_student['email'];
     $phone =$row_student['parentPhone'];
     $sex =$row_student['sex'];
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
    <title>Bulk ID card</title>
    <link rel="stylesheet" href="dist/css/style_bulkIDcard.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">

</head>
<body>
    <div class="container">
            <div class="id-card">
            <div class="top-section">
                <p><?php echo $sc;?></p>
            <span>School ID: 1345</span>
            <img src="images/logo.png" alt="">
            </div>
            <div>
        <img class="bg-img" src="images/back.svg" alt="">
            </div>
            <div class="photo-section">
                <img src="images/download.jpg" alt="Profile Picture">
            </div>
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
                <img src="images/qr code.png" alt="QR Code">
            </div>
        </div>
        
    
    </div>
</body>
</html>