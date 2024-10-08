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
<title>Scratch card Record|<?php echo $website_name;   ?> </title>
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
<script type="text/javascript">
		function deldata(batchID){
if(confirm("ARE YOU SURE YOU WISH TO DELETE ALL SCRATCH CARD WITH BATCH ID:" + " " + batchID + " " + " FROM THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>


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
      <h1>Scratch card Record </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Scratch card Record </li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="card m-t-3">
      <div class="card-body">
      <h4 class="text-black"> 
        <a href="add_class.php"><button type="submit" name="btnsubmit" class="btn btn-primary">Add Class</button> </a>
 </h4>
      <p>&nbsp;</p>
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
			        <th>#</th>
              <th>Batch ID</th>
              <th>PIN</th>
              <th>Serial No</th>
              <th>Status</th>
              <th>Count</th>
              <th>Date Generated</th>
              <th>Student ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
		  <?php 
$data = $dbh->query("SELECT *  FROM tblscratchcard order by id DESC")->fetchAll();
$cnt=1;
foreach ($data as $row) {
?>
            <tr>
               <td><?php echo $cnt;  ?></td>
               <td><?php echo $row['batchID'];  ?></td>
               <td><?php echo $row['pin'];  ?></td>
               <td><?php echo $row['serial_no'];  ?></td>
               <td>    
			      <?php if($row['status']=="0"){ ?>
			     <span class="badge badge-success">Unused</span>
			   <?php } elseif($row['status']=="1") {?>
			    <span class="badge badge-warning">Used</span>
          <?php } else {?>
			    <span class="badge badge-danger">Expired</span><?php } ?>
			    </td>                    
          <td><?php echo $row['count'];  ?></td>
           <td><?php echo $row['date_generated'];  ?></td>
          <td><?php echo $row['studentID'];  ?></td>

          <td>
              <a href="delete_scratchcard.php?batchID=<?php echo $row['batchID'];?>" onClick="return deldata('<?php echo $row['batchID']; ?>');"><i class="fa fa-trash" title="Delete Scratch Card with batch ID :<?php echo $row['batchID'];  ?>"></i> </a>


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
  <div class="pull-left hidden-xs"><?php include('../inc/footer.php');  ?>.
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
