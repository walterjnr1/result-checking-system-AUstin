<?php
include('../inc/controller.php');

if(strlen($_SESSION['login_email'])=="" && strlen($_SESSION['batchID'])=="")

{   
 header("Location: index_scratchcard.php"); 
 }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Scratch Card</title>
    <style type="text/css">
<!--
.course-item {border: 1px solid #000;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Add this line to separate each row of cards */
}
.course-item {margin: 10px;
}
.style1 {font-size: 9px}
#card {display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
-->
    </style>
</head>
<body>
	
<p>&nbsp;</p>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1>Scratch card</h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><i class="fa fa-angle-right"></i>Scratch card</li>
    </ol>
  </div>
  <p align="center">
    <?php if($success){?>
  <div class="alert alert-success" role="alert" align="center"> <?php echo ($success); ?></div>
  <?php } 
					else if($error){?>
  <div class="alert alert-danger" role="alert"> <?php echo ($error); ?></div>
  <?php } ?>
  </p>
  <!-- Main content -->
  <div class="content">
    <div class="row">
      <button onClick="window.print();">Print</button>
      <div class="row" id='card'>
        <?php 
 // Fetch the last inserted data
 $batchID=$_SESSION['batchID'];
 //$batchID = $_GET['batchID'];
 $query = "SELECT * FROM tblscratchcard WHERE batchID = '$batchID'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0) {
   while($row_card = mysqli_fetch_assoc($result)) {
?>
        <div class="col-lg-3 col-md-6 col-12">
          <div class="course-item">
            <div class="image-blog"></div>
            <div class="course-br">
              <div class="card-border">
                <!-- Add the new class here -->
                <div class="course-desc">
                  <p><strong>PIN: </strong><?php echo $row_card['pin']; ?> </p>
                  <p><strong>Serial No: </strong><?php echo $row_card['serial_no']; ?></p>
                </div>
              </div>
            </div>
            <p class="style1"><strong>Batch ID: <?php echo $row_card['batchID']; ?> </strong></p>
          </div>
        </div>
        <br>
        <!-- Add a line break between each card -->
        <?php
 }
} else {
  echo "No results found";
}

?>
        <!-- ... -->
        <p align="center"> </p>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<p>&nbsp;</p>
</body>
</html>