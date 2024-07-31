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
<title>Result Record|<?php echo $website_name;   ?> </title>
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
		function deldata(ResultID){
if(confirm("ARE YOU SURE YOU WISH TO DELETE ALL RESULT WHERE RESULT ID = " + " " + ResultID + " " + " ?"))

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
      <h1>Result Record </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Result Record </li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="card m-t-3">
      <div class="card-body">
      <h4 class="text-black"> 
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
              <th>Result ID</th>
              <th>Class</th>
              <th>Term</th>
              <th>Exam Year</th>
              <th>Exam Type</th>
              <th>English</th>
              <th>Fante/Twi/Dagbani</th>
              <th>History/Social Studies</th>
              <th>French/Arabic</th>
              <th>Mathematics</th>
              <th>Religious Moral Education</th>
              <th>Carrier Technology</th>
              <th>Physical Education</th>
              <th>Science/Natural Science</th>
              <th>ICT/Computing</th>
              <th>BDT/Creative ART</th>
              <th>TS</th>
              <th>Total Expected Score</th>
              <th>Average Score</th>
              <th>Teacher Remark</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
		    <?php 
$data = $dbh->query("SELECT studtable.*, resulttable.*, schooltable.*, examtable.* , classtable.* FROM studentadmissiontbl studtable INNER JOIN examsresultstbl resulttable ON studtable.StuAdmNo = resulttable.StuAdmNo INNER JOIN schoolregistrationtbl schooltable ON resulttable.SchRegCode = schooltable.SchRegCode INNER JOIN tblexamtype examtable ON examtable.id = resulttable.ExamsType INNER JOIN tblclass classtable ON resulttable.class = classtable.id ORDER BY studtable.FirstName DESC ")->fetchAll();
$cnt=1;

          foreach ($data as $row) {
          ?>
            <tr>
               <td><?php echo $cnt;  ?></td>
               <td><div align="center"><span class="controls"><img src="../<?php echo $row['photo'];?>"  width="50" height="43" border="2"/></span></div></td>
               <td><?php echo $row['FirstName'];  ?> <?php echo $row['OtherName'];  ?> <?php echo $row['Surname'];  ?></td>
               <td><?php echo $row['StuAdmNo'];  ?></td>
               <td><?php echo $row['SchoolName'];  ?></td>
			      	 <td><?php echo $row['ResultID'];  ?></td>
               <td><?php echo $row['classname'];  ?></td>
               <td><?php echo $row['Term'];  ?></td>
               <td><?php echo $row['ExamsYear'];  ?></td>
               <td><?php echo $row['exam_name'];  ?></td>
               <td><?php echo $row['english'];  ?></td>
               <td><?php echo $row['fante'];  ?></td>
               <td><?php echo $row['history'];  ?></td>
               <td><?php echo $row['french'];  ?></td>
               <td><?php echo $row['maths'];  ?></td>
         	  	<td><?php echo $row['religious'];  ?></td>
         	  	<td><?php echo $row['careerTechnology'];  ?></td>
         	  	<td><?php echo $row['pe'];  ?></td>
              <td><?php echo $row['science'];  ?></td>
          		<td><?php echo $row['IT'];  ?></td>
         	  	<td><?php echo $row['creativeArt'];  ?></td>
          		<td><?php echo $row['totalScore'];  ?></td>
         	  	<td><?php echo $row['TExpecSc'];  ?></td>
         		  <td><?php echo $row['AVGSc'];  ?></td>
         		  <td><?php echo $row['TeachRmk'];  ?></td> 
               <td><div align="center">
                <a href="delete_result.php?id=<?php echo $row['ResultID'];?>" onClick="return deldata('<?php echo $row['ResultID']; ?>');"><i class="fa fa-trash" title="Delete All Result where Result ID =<?php echo $row['ResultID'];?>"></i> </a>
			            </div>
                </td>        
		
            
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
