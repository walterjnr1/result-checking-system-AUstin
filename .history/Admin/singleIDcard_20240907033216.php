<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <link rel="stylesheet" href="dist/css/styles_idcard.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">
    <style>
        /* Add a print media query to hide unnecessary elements */
        @media print {
            .container * {
                visibility: hidden;
            }
            .container .id-card, .container .id-card * {
                visibility: visible;
            }
            .container .id-card {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                margin: 0 auto;
                width: 85.60mm; /* Set the width to 85.60mm */
                height: 53.98mm; /* Set the height to 53.98mm */
                box-sizing: border-box;
                padding: 0;
                border: none;
            }
        }
    </style>
</head>

<body>

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
        <p align="center"><button onclick="printIDCard()">Print</button></p>
        <p>&nbsp;</p>


        <div align="center"></div>
        <div align="center"></div>
</div>
<script>
    function printIDCard() {
        window.print();
    }
</script>
</body>
</html>