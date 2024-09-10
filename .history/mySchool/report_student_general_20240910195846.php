<?php 
include('../inc/controller.php');

if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login");
}
 $query=$_POST['txtsearch'];

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Report | <?php echo $website_name ;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $sch_logo;?>">
    <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js"> </script>

<script type="text/javascript">
  function PrintElem(elem) {
    var printWindow = window.open('', 'Student Report', 'height=400,width=1100');
    printWindow.document.write('<html><head><title>Student Report</title></head><body>');
    printWindow.document.write(document.querySelector(elem).innerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.onload = function() {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    };
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
    .style12 {font-size: 14;
	color: #000000;
}
.style16 {font-size: 14px; color: #000000; }
.style8 {color: #0000FF;
	font-weight: bold;
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
                            <strong>Student Report</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
            <table width="1049" border="0" align="center">
              <tr>
                <td width="1343" height="214">
				<div class="card" id="card" >
                    <div class="card-header">
                      <p align="center" class="style8">Student Report <a href="general_report.php"><span class="style12">&lt;&lt; Back</span> </a></p>
                    </div>
                  <!-- /.card-header -->
                    <div class="card-body">
                      <table width="97%" align="center" class="table" id="example1">
                        <thead>
                        <th width="4%"><span class="style16">photo</span></th>
                            <th width="5%"><span class="style16">Admission No</span></th>
                          <th width="6%"><span class="style16">Fullname</span></th>
                          <th width="3%"><span class="style16">Sex</span></th>
                          <th width="8%"><span class="style16">DOB</span></th>
                          <th width="4%"><span class="style16">Address</span></th>
                          <th width="8%"><span class="style16">Place of Birth</span></th>
                          <th width="7%"><span class="style16">Class</span></th>
                          <th width="5%"><span class="style16">Parent Name</span></th>
                          <th width="8%"><span class="style16">Parent Email</span></th>
                          <th width="7%"><span class="style16">Parent Phone</span></th>
                        </tr>
                        </thead>
                        
                        <div align="center"></div>
                        <tbody>
                        <?php 
      //  $query = '%' . $query . '%'; // add wildcard characters to the query
        $data = $dbh->query("SELECT student.*, school.*, class.* FROM studentadmissiontbl student 
                             LEFT JOIN schoolregistrationtbl school ON student.SchRegCode = school.SchRegCode
                             LEFT JOIN tblclass class ON student.CurClass = class.id WHERE student.FirstName = '$query' or student.Surname = '$query' or student.otherName LIKE '$query' or student.sex LIKE '$query' or student.StuAdmNo LIKE '$query' or student.parentName LIKE '$query' or student.parentPhone LIKE '$query' or student.parentEmail LIKE '$query' and school.SchRegCode='$SchRegCode' ORDER BY student.FirstName DESC")->fetchAll();
        $cnt=1;
        foreach ($data as $row) {
        ?>
                          <tr class="gradeX">
                            <td height="35" class="center"><div align="center"><img src="../<?php echo $row['photo'];?>"  width="37" height="32" border="2"/></div></td>
                            <td><div align="center"><?php echo $row['StuAdmNo'];?> </div></td>
                            <td><div align="center"><?php echo $row['Surname'];?>, <?php echo $row['FirstName'];?> <?php echo $row['OtherName'];?> </div></td>
                            <td class="center"><div align="center"><?php echo $row['sex'];  ?></div></td>
                            <td class="center"><div align="center"><?php echo $row['DOB'];?></div></td>
                            <td class="center"><div align="center"><?php echo $row['address'];?></div></td>
                            <td><div align="center"><?php echo $row['PlaceOB'];?> </div></td>
                            <td><div align="center"><?php echo $row['classname'];?> </div></td>
                            <td class="center"><div align="center"><?php echo $row['parentName'];  ?></div></td>
                            <td class="center"><div align="center"><?php echo $row['parentEmail'];?></div></td>
                            <td class="center"><div align="center"><?php echo $row['parentPhone'];?></div></td>
                            <?php $cnt=$cnt+1;} ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                      </table>
                    </div>
                  <!-- /.card-body -->
                  </div>
                    <table width="392" border="0" align="right">
                      <tr>
                        <td width="386"></td>
                      </tr>
                    </table>
                  <p align="left">&nbsp; </p>
                  <p align="left">
                      <input name="button" type="button" onClick="PrintElem('#card')" value="Print Report" />
                  </p></td>
              </tr>
            </table>
          </div>
        </div>
    </div>
</div>
            </div>
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
      <form action="" method="post">
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
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="generate-btn" name="generate-btn">Generate</button>
      </div>
    </div>
  </div>
  </form>
</div>

 <!-- Modal -->

		
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
