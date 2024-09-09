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
<title>Student Record|<?php echo $website_name;   ?> </title>
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
		function deldata(){
if(confirm("ARE YOU SURE YOU WISH TO DELETE THIS STUDENT FROM THE DATABASE ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>


<script type="text/javascript">
function Activate(){
if(confirm("ARE YOU SURE YOU WISH TO ACTIVATE THIS STUDENT ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Deactivate(){
if(confirm("ARE YOU SURE YOU WISH TO DEACTIVATE THIS STUDENT ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>

<script type="text/javascript">
function printIDcard(){
if(confirm("ARE YOU SURE YOU WISH TO GENERATE ID CARD FOR THIS STUDENT ?"))
{
return  true;
}
else {return false;
}
}
</script>
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
      <button type="submit" id="btngenerate" class="btn btn-primary" data-toggle="modal" data-target="#generateidcard">Generate Bulk ID card</button>

 </h4>
      <p>&nbsp;</p>
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
			        <th>#</th>
              <th>Photo</th>
              <th>FullName</th>
              <th>Admission No.</th>
              <th>School Name</th>
              <th>Date of birth</th>
              <th>Sex</th>
              <th>Address</th>
              <th>Place of birth</th>
              <th>Term</th>
              <th>ClassAT</th>
              <th>Current class</th>
              <th>Year of Admission</th>
              <th>Parent Name</th>
              <th>Parent Phone</th>
              <th>Parent Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
		    <?php 
          $data = $dbh->query("SELECT sat.*,sat.status as student_status, srt.* FROM studentadmissiontbl sat LEFT JOIN schoolregistrationtbl srt ON sat.SchRegCode  = srt.SchRegCode ORDER BY sat.FirstName DESC ")->fetchAll();   
        $cnt=1;

          foreach ($data as $row) {
          ?>
            <tr>
               <td><?php echo $cnt;  ?></td>
               <td><div align="center"><span class="controls"><img src="../<?php echo $row['photo'];?>"  width="50" height="43" border="2"/></span></div></td>
               <td><?php echo $row['FirstName'];  ?> <?php echo $row['OtherName'];  ?> <?php echo $row['Surname'];  ?></td>
               <td><?php echo $row['StuAdmNo'];  ?></td>
               <td><?php echo $row['SchoolName'];  ?></td>
				 <td><?php echo $row['DOB'];  ?></td>
               <td><?php echo $row['sex'];  ?></td>
               <td><?php echo $row['address'];  ?></td>
               <td><?php echo $row['PlaceOB'];  ?></td>
               <td><?php echo $row['Term'];  ?></td>
               <td><?php echo $row['ClassAT'];  ?></td>
               <td><?php echo $row['CurClass'];  ?></td>
               <td><?php echo $row['YOA'];  ?></td>
         		<td><?php echo $row['ParentName'];  ?></td>
         		<td><?php echo $row['ParentPhone'];  ?></td>
         		<td><?php echo $row['ParentEmail'];  ?></td>
             <td>    
			      <?php if($row['student_status']=="0"){ ?>
			     <span class="badge badge-danger">Inactive</span>
			   <?php } elseif($row['student_status']=="1") {?>
			    <span class="badge badge-success">Active</span>
          <?php } else {?>
			    <span class="badge badge-primary">Transfered</span><?php } ?>
			    </td>     
			   <td><div align="center">
      <?php if($row['student_status']=="0")
{ ?>
<a href="Deactivate_activate_student.php?id=<?php echo $row['StuAdmNo'];?>" onClick="return Activate();"><i class="fa fa-check" title="Activate Student Account"></i> </a><?php } else {?>
 <a href="Deactivate_activate_student.php?did=<?php echo $row['StuAdmNo'];?>" onClick="return Deactivate();"><i class="fa fa-times" title="Deactivate Student Account"></i> </a><?php } ?>
 <a href="singleIDcard.php?id=<?php echo $row['StuAdmNo'];?>" onClick="return printIDcard('<?php echo $row['FirstName']; ?>');"><i class="fa fa-print" title="Print ID Card"></i> </a>
 <a href="delete_student.php?id=<?php echo $row['StuAdmNo'];?>" onClick="return deldata('<?php echo $row['FirstName']; ?>');"><i class="fa fa-trash" title="Delete Student Account"></i> </a>


						</div></td>
            
			              </tr>
			      <?php $cnt=$cnt+1;} ?>

          </tfoot>
        </table>
      </div>
      </div></div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="generateidcard" tabindex="-1" role="dialog" aria-labelledby="generateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="generateModalLabel">Generate Bulk ID Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="class-list">Select Class</label>
            <select class="form-control" name="cmdclass" id="class-list">
              <option value="">Select Class</option>
              <?php 
              // Assuming you have a table named 'classes' with columns 'id' and 'class_name'
              $classes = $dbh->query("SELECT * FROM tblclass")->fetchAll();
              foreach ($classes as $class) {
              ?>
              <option value="<?php echo $class['id']; ?>"><?php echo $class['classname']; ?></option>
              <?php } ?>
            </select>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="generate-btn">Generate</button>
      </div>
    </div>
  </div>
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
