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
    $address =$row_student['address'];
    $PlaceOB =$row_student['PlaceOB'];
    $photo =$row_student['photo'];
    $SchRegCode  =$row_student['SchRegCode'];
    $parentEmail =$row_student['email'];
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
    <link rel="stylesheet" href="dist/css/styles_idcard.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#id_card").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>ID CARD</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(document.body);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</head>
<style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>
<body>
<script>
  
    </script>
<div class="container">
        <p style="text-align: center; font-size: 18px; font-weight: bold;"><a href="student_record.php">Back</a></p>
        <p style="text-align: center; font-size: 18px; font-weight: bold;">&nbsp;</p>
        <div class="id-card" id="id_card">
            <div class="top-section">
                <p><?php echo $SchoolName; ?></p>

                <span>School ID: <?php echo $SchRegCode; ?></span>
                <img src="../<?php echo $sch_logo; ?>" alt="">            </div>
            <div>
    <img style="width: 307px;" src="dist/img/back.svg" alt="">
          </div>
            <div class="photo-section">
                <img src="../<?php echo $photo; ?>" alt="Profile Picture">            </div>
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
                <img src="<?php echo $file; ?>" alt="QR Code">            </div>
        </div>
        <p>&nbsp;</p>
        <button id=onClick="printIDCard()">Print ID Card</button>
        <div align="center"></div>
        <div align="center"></div>
    </div>

</body>
</html>