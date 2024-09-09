<?php
include('../inc/controller.php');
include('phpqrcode/qrlib.php');

if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: ../login.php"); 
   }
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
    <?php 
 $classid=$_GET['classid'];
 $query = "SELECT school.*, student.* FROM studentadmissiontbl student 
 LEFT JOIN schoolregistrationtbl school ON student.SchRegCode = school.SchRegCode 
 WHERE student.CurClass = '$classid'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0) {
   while($row_student = mysqli_fetch_assoc($result)) {
    $surname = $row_student['surname'];
    $firstname = $row_student['firstname'];
    $othername = $row_student['othername'];
    $SchoolName=$row_student['SchoolName'];  
    $sch_logo =$row_student['logo'];
    $photo =$row_student['photo'];
    $SchRegCode  =$row_student['SchRegCode'];
    $parentEmail =$row_student['email'];
    $parentEmail =$row_student['parentPhone'];
    $sex =$row_student['sex'];
    $StuAdmNo  =$row_student['StuAdmNo'];


    //generate qr image
// Define the data to be encoded in the QR code
$qrdata = $SchRegCode . ' - ' . $SchoolName. ' - ' .$StuAdmNo;
QRcode::png($qrdata, '../uploadImage/QrImage/'.$StuAdmNo.'.png', QR_ECLEVEL_L, 4);
$file = '../uploadImage/QrImage/'.$StuAdmNo.'.png';

?>
            <div class="id-card">
            <div class="top-section">
                <p><?php echo $SchoolName;?></p>
            <span>School ID: <?php echo $SchRegCode;?></span>
            <img src="../<?php echo $sch_logo;?>" alt="">
            </div>
            <div>
        <img class="bg-img" src="images/back.svg" alt="">
            </div>
            <div class="photo-section">
                <img src="../<?php echo $photo;?>" alt="Profile Picture">
            </div>
            <div class="details-section">
                <h3><?php echo $Surname; ?>, <?php echo $FirstName; ?> <?php echo $OtherName; ?></h3>
                <p>Student</p>
            </div>
            <div class="more-details">
                <div>
                    <p>Sex: </p>
                    <p>Admission No: </p>
                    <p>Email:</p>
                </div>
                <div>
                    <p><?php echo $sex;?></p>
                    <p><?php echo $StuAdmNo;?></p>
                    <p><?php echo $parentEmail;?></p>
                </div>
                
            </div>
            <div class="qr-section">
                <img src="<?php echo $file; ?>" alt="QR Code">
            </div>
        </div>
        <?php
 }
} else {
  echo "No results found";
}

?>
    
    </div>
</body>
</html>