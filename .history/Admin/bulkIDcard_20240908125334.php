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
    
    </div>
</body>
</html>