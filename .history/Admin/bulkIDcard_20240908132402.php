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
<style>
    .back-link {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 18px;
    text-decoration: none;
    color: #333;
}
.print-button {
    text-align: center;
    margin-top: 20px;
}

.print-button button {
    background-color: #4CAF50;
    color: #fff;
    padding: 190px 290px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.print-button button:hover {
    background-color: #3e8e41;
}
</style>
<body>
<a href="student_record.php" class="back-link">Back</a>
    <div class="container">
    <?php 
 $classid=$_GET['classid'];
 $query = "SELECT school.*, student.* FROM studentadmissiontbl student 
 LEFT JOIN schoolregistrationtbl school ON student.SchRegCode = school.SchRegCode 
 WHERE student.CurClass = '$classid'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0) {
   while($row_student = mysqli_fetch_assoc($result)) {
    $surname = $row_student['Surname'];
    $firstname = $row_student['FirstName'];
    $othername = $row_student['OtherName'];
    $SchoolName=$row_student['SchoolName'];  
    $sch_logo =$row_student['logo'];
    $photo =$row_student['photo'];
    $SchRegCode  =$row_student['SchRegCode'];
    $phone =$row_student['parentPhone'];
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
            <img class="bg-img" src="dist/img/back.svg" alt="">

        </div>
            <div class="photo-section">
                <img src="../<?php echo $photo;?>" alt="Profile Picture">
            </div>
            <div class="details-section">
                <h3><?php echo $surname; ?>, <?php echo $firstname; ?> <?php echo $othername; ?></h3>
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
                    <p><?php echo $phone;?></p>
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
    <div class="print-button">
        <button onclick="window.print()">Print</button>
    </div>
    </div>
</body>
</html>