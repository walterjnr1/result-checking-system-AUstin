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
    <style>
        @media print {
            #print-button, .back-text {
                display: none;
            }
        }
    </style>
</head>

<body>
<script>
  
    </script>
<div class="container">
        <p class="back-text" style="text-align: center; font-size: 18px; font-weight: bold;"><a href="student_record.php">Back</a></p>
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
        <button style="display: none;" onClick="printIDCard()">Print ID Card</button>
        <div align="center"><a id="print-button" onClick="window.print();return false;">Print </a></div>
        <div align="center"></div>
    </div>

</body>
</html>