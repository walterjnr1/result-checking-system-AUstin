<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <link rel="stylesheet" href="dist/css/styles_singleIDcard.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">
    <style>
        /* Add this CSS rule to hide the print and back text when printing */
        @media print {
            .back-btn, .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <p><a href="student_record.php" class="back-btn">< back</a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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