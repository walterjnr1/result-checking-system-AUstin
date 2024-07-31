<?php 
include('../inc/controller.php');
if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: login.php"); 
   }
?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:25 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Subscription Record|<?php echo $website_name;   ?> </title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $logo;   ?>">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">

<!-- DataTables -->
<link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css">
<script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title>Access Code report</title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
<script type="text/javascript">
function Generate(slipID_transactionID){
if(confirm("ARE YOU SURE YOU WISH TO GENERATE ACCESS CODE TO THIS HOST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
		function deldata(slipID_transactionID){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + slipID_transactionID+ " " + " FROM THE PAYMENT LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Activate(){
if(confirm("ARE YOU SURE YOU WISH TO CONFIRM THIS PAYMENT?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Deactivate(){
if(confirm("ARE YOU SURE YOU WISH TO MAKE THIS PAYMENT PENDING?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
  <style type="text/css">


.zoom {
  padding: 10px;
  transition: transform .2s; /* Animation */
  width: 210px;
  height: 210px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

  </style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">

    <p>
      <?php include 'header.php'; ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'sidebar.php'; ?>
      
      <!-- Content Wrapper. Contains page content -->
       </p>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Subscription Record</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Subscription Record </li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="card m-t-3">
      <div class="card-body">
      <?php
if(isset($_SESSION['success_msg'])) {
    echo '<div class="alert alert-success">'.$_SESSION['success_msg'].'</div>';
    unset($_SESSION['success_msg']);
}
?>
      <h4 class="text-black"><div><p><button id="print" onClick="printdiv('reportdiv');" class="btn btn-sm btn-primary pull-left m-t-n-xs" ><i class="fa fa-print"></i> Print</button></p> </div></h4>
      <p>&nbsp;</p>
      <div id="reportdiv" class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
			     <th>#</th>
              <th>Screenshot</th>
              <th>Reference Code/Bank Slip ID</th>
			        <th>Bank Name</th>
              <th>Payment Mode</th>
              <th>Email</th>
              <th>Phone</th>
			        <th>Amount</th>
              <th>Date</th>
              <th>Unit</th>
              <th>Status</th>
			        <th>Action</th>

            </tr>
          </thead>
          <tbody>
		  <?php 
$data = $dbh->query("SELECT * FROM confirm_payment order by payment_date DESC")->fetchAll();
$cnt=1;
foreach ($data as $row) {
?>
            <tr>
               <td><?php echo $cnt;  ?></td>
									 
      <?php if($row['screenshot']=="assets/upload/"){ ?> 
 <td><div class="zoom" align="center"><img src="../assets/upload/No_image_available.svg.png"  width="202" height="163" border="2"/></div></td>	
 		   <?php } else {?>
 <td><div class="zoom" align="center"><img src="../<?php echo $row['screenshot']; ?>"  width="202" height="163" border="2"/></div></td>			 
 		   <?php }?>

					 
                        <td><?php echo $row['slipID_referencecode'];  ?></td>
                        <td class="center"><?php echo $row['bank_name'];  ?></td>
						<td><?php echo $row['payment_mode'];  ?> </td>
                        <td><?php echo $row['email'];  ?></td>
						  <td class="center"><?php echo $row['phone'];  ?></td>
						<td>NGN<?php echo number_format((float) $row['amt'] ,2); ?></td>
                        <td><?php echo $row['payment_date'];  ?></td>
						 <td class="center"><?php echo $row['unit'];  ?></td>
					 <td>    
			      <?php if($row['status']=="0")
{ ?>
			   <span class="badge badge-warning">Pending</span>
			   <?php } else {?>
			    <span class="badge badge-success">Confirmed</span><?php } ?>
			   </td>
			   <td><div align="center">
                                      
 <a href="delete_payment.php?id=<?php echo $row['ID'];?>" onClick="return deldata('<?php echo $row['slipID_referencecode']; ?>');"><i class="fa fa-trash" title="Delete Subscription Record"></i> </a>
  <a href="code_generator2.php?Acode=<?php echo $row['ID'];?>&ph=<?php echo $row['phone'];?>&u=<?php echo $row['unit'];?>" onClick="return Generate();"><button type="submit" name="btnaccesscode" class="btn btn-primary"> Send Access Code</button></a>

						</div></td>
			              </tr>
			                      <?php $cnt=$cnt+1;} ?>

          </tfoot>
        </table>
      </div>
      </div></div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <div class="pull-left hidden-xs"><?php include('../inc/footer.php');  ?>
  </footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script>
 
<script src="dist/plugins/popper/popper.min.js"></script>

<!-- v4.0.0-alpha.6 -->
<script src="dist/bootstrap/js/bootstrap.min.js"></script>

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- DataTable --> 
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script src="dist/plugins/table-expo/filesaver.min.js"></script>
<script src="dist/plugins/table-expo/xls.core.min.js"></script>
<script src="dist/plugins/table-expo/tableexport.js"></script>
<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>
</body>

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:27 GMT -->
</html>
