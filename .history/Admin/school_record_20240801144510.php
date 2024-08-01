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
<title>School Record|<?php echo $website_name;   ?> </title>
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
		function deldata(SchoolName){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + SchoolName + " " + " FROM THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>

<script type="text/javascript">
		function Extend(SchoolName){
if(confirm("ARE YOU SURE YOU WISH TO EXTEND ACCOUNT EXPIRY DATE FOR " + " " + SchoolName + " " + " ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Activate(SchoolName){
if(confirm("ARE YOU SURE YOU WISH TO Activate " + " " + SchoolName + " " + " ON THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Deactivate(SchoolName){
if(confirm("ARE YOU SURE YOU WISH TO Deactivate " + " " + SchoolName + " " + " ON THE LIST?"))
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
      <h1>Student Record </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Student Record </li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="card m-t-3">
      <div class="card-body">
      <h4 class="text-black"> 
        <a href="add_school.php"><button type="submit" name="btnsubmit" class="btn btn-primary">Add School</button> </a>
 </h4>
      <p>&nbsp;</p>
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
			        <th>#</th>
              <th>Logo</th>
              <th>School Reg Code</th>
			        <th>School Name</th>
              <th>School Email</th>
              <th>School Password</th>
              <th>School Short Code </th>
              <th>Location </th>
              <th>GPS Address</th>
			        <th>Date of Registration</th>
              <th>District </th>
              <th>Region</th>
			        <th>Zone</th>
              <th>IT Name</th>
              <th>Account Password</th>
			        <th>Account Expiry Date</th>
              <th>Phone 1</th>
              <th>Phone 2</th>
              <th>year Founded</th>
			         <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
		  <?php 
          $data = $dbh->query("SELECT schooltable.*,zonetable.* ,regiontable.* FROM studentadmissiontbl sat LEFT JOIN schoolregistrationtbl srt ON sat.SchRegCode  = srt.SchRegCode ORDER BY sat.FirstName DESC ")->fetchAll();   
          $cnt=1;
foreach ($data as $row) {
?>
            <tr>
               <td><?php echo $cnt;  ?></td>
               <td><div align="center"><span class="controls"><img src="../<?php echo $row['logo'];?>"  width="50" height="43" border="2"/></span></div></td>
               <td><?php echo $row['SchRegCode'];  ?></td>
               <td><?php echo $row['SchoolName'];  ?></td>
               <td><?php echo $row['email'];  ?></td>
               <td><?php echo $row['SchPassword'];  ?></td>
               <td><?php echo $row['SchShortCode'];  ?></td>
						   <td><?php echo $row['Location'];  ?> </td>
               <td><?php echo $row['GPSAddress'];  ?></td>
               <td><?php echo $row['datereg'];  ?></td>
               <td><?php echo $row['District'];  ?></td>
               <td><?php echo $row['Region'];  ?></td>
               <td><?php echo $row['Zone'];  ?></td>
               <td><?php echo $row['ITName'];  ?></td>
               <td><?php echo $row['AccountsPass'];  ?></td>
               <td><?php echo $row['AccExpiryDate'];  ?></td>
               <td><?php echo $row['SchPhone1'];  ?></td>
               <td><?php echo $row['SchPhone2'];  ?></td>
               <td><?php echo $row['schoolcreationDate'];  ?></td>
               <td>    
			      <?php if($row['status']=="0")
{ ?>
			   <span class="badge badge-danger">Inactive</span>
			   <?php } else {?>
			    <span class="badge badge-success">Active</span><?php } ?>
			   </td>
			   <td><div align="center">
      <?php if($row['status']=="0")
{ ?>
<a href="Deactivate_activate_school.php?id=<?php echo $row['SchRegCode'];?>" onClick="return Activate('<?php echo $row['SchoolName']; ?>');"><i class="fa fa-check" title="Activate School Account"></i> </a><?php } else {?>
 <a href="Deactivate_activate_school.php?did=<?php echo $row['SchRegCode'];?>" onClick="return Deactivate('<?php echo $row['SchoolName']; ?>');"><i class="fa fa-times" title="Deactivate School Account"></i> </a><?php } ?>
 <a href="delete_school.php?id=<?php echo $row['SchRegCode'];?>" onClick="return deldata('<?php echo $row['SchoolName']; ?>');"><i class="fa fa-trash" title="Delete School Account"></i> </a>
 <a href="edit_school.php?id=<?php echo $row['SchRegCode'];?>"><i class="fa fa-edit" title="Update School Details"></i> </a>
 <a href="#" onClick="return Extend('<?php echo $row['SchoolName']; ?>');"><i class="fa fa-dollar" title="Extend Expiry Date for <?php echo $row['SchoolName']; ?>"></i> </a>


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
