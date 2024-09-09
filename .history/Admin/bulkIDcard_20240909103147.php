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
    <a href="#" class="back-btn">
        < back
    </a>
    <div class="container">
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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
        <div class="id-card">
            <div class="top-section">
                <p>HOLY FAMILY SCHOOL</p>
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

    <a href="#" class="print-btn">
        Print
    </a>
</body>
</html>