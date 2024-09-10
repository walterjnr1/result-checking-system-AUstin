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
    <style>
        /* Add this CSS rule to hide the print and back text when printing */
        @media print {
            .back-btn, .print-btn {
                display: none;
            }
    
    body {
        margin: 0.5cm; /* adjust the margin as needed */
    }
    .container {
        margin: 0 auto; /* center the container */
        width: 100%; /* set the width to 100% */
    }
    .id-card {
        margin: 1cm; /* add margin to the id-card */
    }
}
    </style>
</head>
<body>
    <a href="#" class="back-btn">< back</a>
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
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
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
                    <p>Phone:</p>
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
    
    </div>

    <button class="print-btn" onClick="printIDCard()">Print</button>
    <script>
    function printIDCard() {
        window.print();
    }
</script>
</body>
</html>