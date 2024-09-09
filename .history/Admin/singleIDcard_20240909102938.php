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
    <p><a href="student_record.php" class="back-btn">< back</a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;    </p>
    <div class="id-card">
        <div class="top-section">
            <p><?php echo $SchoolName; ?></p>
            <span>School ID: <?php echo $SchRegCode; ?></span>
            <img src="../<?php echo $sch_logo; ?>" alt="">
        </div>
        <div>
    <img style="width: 100%;" src="dist/img/back.svg" alt="">
        </div>
        <div class="photo-section">
            <img src="../<?php echo $photo; ?>" alt="Profile Picture">
        </div>
        <div class="details-section">
        <h3><?php echo $Surname; ?>, <?php echo $FirstName; ?> <?php echo $OtherName; ?></h3>
            <p>Student</p>
        </div>
        <div class="more-details">
            <div>
            <p>Sex:</p>
            <p>Admission No:</p>
            <p>Phone:</p>
            </div>
            <div>
            <p><?php echo $sex; ?></p>
            <p><?php echo $indexno; ?></p>
            <p><?php echo $phone; ?></p>
            </div>
            
        </div>
        <div class="qr-section">
            <img src="<?php echo $file; ?>" alt="QR Code">
        </div>
    </div>
   
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <p align="center"><button class="print-btn" onclick="printIDCard()">Print</button></p>
    <script>
    function printIDCard() {
        window.print();
    }
</script>
</body>
</html>