<?php 
include('../inc/controller.php');

if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login");
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Record | <?php echo $website_name ;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $sch_logo;?>">
    <script type="text/javascript">
		function deldata(){
if(confirm("ARE YOU SURE YOU WISH TO DELETE THIS STUDENT FROM YOUR RECORD ?"))
{
return  true;
}
else {return false;
}

}
</script>
<script type="text/javascript">
function Activate(){
if(confirm("ARE YOU SURE YOU WISH TO ACTIVATE FROM ON THE DATABASE ?"))
{
return  true;
}
else {return false;
}
	 
}

</script>
<script type="text/javascript">
function Deactivate(){
if(confirm("ARE YOU SURE YOU WISH TO DEACTIVATE FROM THE DATABASE ?"))
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
    <style type="text/css">
<!--
.style1 {color: #000000}
-->
.button-container {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.button-container a {
    margin-right: 10px; /* add some space between buttons */
}
    </style>
</head>

<body>

  <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="../<?php echo $sch_logo;  ?>" alt="image" width="100" height="100" class="img-circle" />
                             </span>
  
   
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['email'];  ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>	
			   <?php
			   include('sidebar.php');
			   
			   ?>
			        </ul>

        </div>
    </nav>

         <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>

                <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo $SchoolName; ?>,<?php echo $Location; ?>,<?php echo $District; ?></span>
                </li>
                <li class="dropdown">
                   
                    


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li class="active">
                            <strong>Student Record</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="button-container">
    <a class="btn btn-danger btn-rounded" href="add_student">Add Student</a>
    <a class="btn btn-success btn-rounded" href="bulkIDcard.p">Generate Bulk ID Card</a>
</div>                        <div class="table-responsive">

						
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                    <th>#</th>
              <th>Photo</th>
              <th>FullName</th>
              <th>Admission No.</th>
              <th>Date of birth</th>
              <th>Sex</th>
              <th>Address</th>
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
          $data = $dbh->query("SELECT tblclass.*, studentadmissiontbl.* FROM studentadmissiontbl LEFT JOIN tblclass ON studentadmissiontbl.ClassAT  = tblclass.id where studentadmissiontbl.SchRegCode='$SchRegCode' ORDER BY studentadmissiontbl.FirstName DESC ")->fetchAll();   
        $cnt=1;

          foreach ($data as $row) {
          ?>
            <tr>
               <td><?php echo $cnt;  ?></div></td>
               <td><span class="controls"><img src="../<?php echo $row['photo'];?>"  width="50" height="43" border="2"/></span></div></td>
               <td><?php echo $row['FirstName'];  ?> <?php echo $row['OtherName'];  ?> <?php echo $row['Surname'];  ?></div></td>
               <td><?php echo $row['StuAdmNo'];  ?></div></td>
				 <td><div align="center"><?php echo $row['DOB'];  ?></div></td>
               <td><div align="center"><?php echo $row['sex'];  ?></div></td>
               <td><div align="center"><?php echo $row['address'];  ?></div></td>
               <td><div align="center"><?php echo $row['Term'];  ?></div></td>
               <td><div align="center"><?php echo $row['ClassAT'];  ?></div></td>
               <td><div align="center"><?php echo $row['CurClass'];  ?></div></td>
               <td><div align="center"><?php echo $row['YOA'];  ?></div></td>
         		<td><div align="center"><?php echo $row['parentName'];  ?></div></td>
         		<td><div align="center"><?php echo $row['parentPhone'];  ?></div></td>
         		<td><div align="center"><?php echo $row['parentEmail'];  ?></div></td>
             <td>    
			      
			            <?php if($row['status']=="0"){ ?>
			            <span class="badge badge-danger">Inactive</span>
			            <?php } elseif($row['status']=="1") {?>
			            <span class="badge badge-success">Active</span>
		                <?php } else {?>
			            <span class="badge badge-primary">Transfered</span>
		                <?php } ?>
	                  </td>     
			   <td>
                        <?php if($row['status']=="0")
{ ?>
                        <a href="Deactivate_activate_student.php?id=<?php echo $row['StuAdmNo'];?>" onClick="return Activate();"><i class="fa fa-check" title="Activate Student Account"></i> </a>
                        <?php } else {?>
	                         <a href="Deactivate_activate_student.php?did=<?php echo $row['StuAdmNo'];?>" onClick="return Deactivate();"><i class="fa fa-times" title="Deactivate Student Account"></i> </a>
                        <?php } ?>
	                      <a href="delete_student.php?id=<?php echo $row['StuAdmNo'];?>" onClick="return deldata('<?php echo $row['FirstName']; ?>');"><i class="fa fa-trash" title="Delete Student Account"></i> </a>		
                           <a href="edit_student.php?id=<?php echo $row['StuAdmNo'];?>" ><i class="fa fa-edit" title="Edit Student Account"></i> </a> 
                           <a href="edit_photo.php?StuAdmNo=<?php echo $row['StuAdmNo'];?>" ><i class="fa fa-upload" title="Edit Student Photo"></i> </a> 
                           <a href="singleIDcard.php?id=<?php echo $row['StuAdmNo'];?>" onClick="return printIDcard();"><i class="fa fa-print" title="Print ID Card"></i> </a>

			  </td></tr>


			      <?php $cnt=$cnt+1;} ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                    </table>
                  </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
		
		
		 <div class="wrapper wrapper-content animated fadeInRight">
           <div class="row"></div>
        </div>
       
        <div class="footer">
            <div class="pull-right">
            </div>
            <div>
                <strong></strong><?php include('../inc/footer.php');  ?></strong> 
            </div>
        </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>

</body>

</html>
