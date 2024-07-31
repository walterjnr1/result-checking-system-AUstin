<?php
// Include PhpSpreadsheet library autoloader
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


include('../inc/controller.php');
if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login.php");
}

 if(isset($_POST["btnupload"])){

 $resultID = date("Y").substr(str_shuffle("1234567890"), 0, 6);
 $term = mysqli_real_escape_string($conn,$_POST['cmdterm']);
 $examyear = mysqli_real_escape_string($conn,$_POST['txtyear']);
 $examtype = mysqli_real_escape_string($conn,$_POST['cmdexamtype']);
 $class = mysqli_real_escape_string($conn,$_POST['cmdclass']);

//check if result already published
$sql = "SELECT * FROM tblresultsummary where ResultID ='$resultID' or class='$class' and ExamsYear='$examyear' and Term='$term' and ExamsType='$examtype' and SchRegCode='$SchRegCode'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$_SESSION['error']=' Result already Published ';

}else{

 // Allowed mime types
 $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

 // Validate whether selected file is a Excel file
 if(!empty($_FILES['examcalculator']['name']) && in_array($_FILES['examcalculator']['type'], $excelMimes)){

     // If the file is uploaded
     if(is_uploaded_file($_FILES['examcalculator']['tmp_name'])){
         $reader = new Xlsx();
         $spreadsheet = $reader->load($_FILES['examcalculator']['tmp_name']);
         $worksheet = $spreadsheet->getActiveSheet();
         $worksheet_arr = $worksheet->toArray();

         // Remove header row
         unset($worksheet_arr[0]);

         foreach($worksheet_arr as $row){
             $StuAdmNo = $row[0];
             $english = $row[1];
             $english_remark = $row[2];
             $fante = $row[3];
             $fante_remark = $row[4];
             $history = $row[5];
             $history_remark = $row[6];
             $maths = $row[7];
             $maths_remark = $row[8];
             $science = $row[9];
             $science_remark = $row[10];
             $french = $row[11];
             $french_remark = $row[12];
             $religious = $row[13];
             $religious_remark = $row[14];
             $IT = $row[15];
             $IT_remark = $row[16];
             $career = $row[17];
             $career_remark = $row[18];
             $pe = $row[19];
             $pe_remark = $row[20];
             $creativeart = $row[21];
             $creativeart_remark = $row[22];
             $no_subject = $row[23];
             $totalEpectedMark = $row[24];
             $totalScore = $row[25];
             $avg = $row[26];
             $teacherRemark = $row[27];
             

$qry = "INSERT INTO `examsresultstbl`(`resultID`,`StuAdmNo`, `Term`,`SchRegCode`,`ExamsYear`,`ExamsType`,`class`,`english`,`fante`, `history`, 
`french`,`maths`, `religious`,`careerTechnology`, `pe`,`science`, `IT`,`creativeArt`,`englishRemark`, `fanteRemark`,`historyRemark`, 
`frenchRemark`,`mathsRemark`, `religiousRemark`,`careerTechnologyRemark`, `peRemark`,`scienceRemark`, `ITRemark`,`creativeArtRemark`, 
`totalScore`,`TExpecSc`, `AVGSc`,`TeachRmk`) 
VALUES ('$resultID','$StuAdmNo','$term','$SchRegCode','$examyear','$examtype','$class','$english','$fante','$history',
'$french','$maths','$religious','$career','$pe','$science','$IT','$creativeart','$english_remark','$fante_remark','$history_remark',
'$french_remark','$maths_remark','$religious_remark','$career_remark','$pe_remark','$science_remark','$IT_remark','$creativeart_remark',
'$totalScore','$totalEpectedMark','$avg','$teacherRemark')";
$res = mysqli_query($conn,$qry);

if ($res){

//fetch class name and exam name for email
$query = "SELECT c.classname,e.exam_name,er.* FROM tblclass c INNER JOIN tblresultsummary er ON c.id = er.class INNER JOIN tblexamtype e ON er.ExamsType = e.id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) ;
$row = mysqli_fetch_assoc($result);
$classname = $row['classname'];
$exam_name = $row['exam_name'];



}
}
//insert into result summary
$query = "INSERT into `tblresultsummary` (SchRegCode,ResultID,class,Term,ExamsYear,ExamsType)
VALUES ('$SchRegCode','$resultID','$class','$term','$examyear','$examtype')";
$result = mysqli_query($conn,$query);
if($result){

//save activity log details
$task= $SchoolName.' '.'uploaded student Result'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);


$_SESSION['success']='Your Result has been Uploaded Successfully';
}else{

$_SESSION['error']='Problem Uploading Result';

}
}
}
}
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Upload Result| <?php echo $website_name ;?></title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Morris -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
 <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

 <link href="css/animate.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <link rel="icon" type="image/png" sizes="16x16" href="../<?php echo $sch_logo;?>">
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
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $SchoolName;  ?> <b class="caret"></b></span> </span> </a>
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
                            <a href="index.php">Home</a>
                        </li>
                       
                        <li class="active"><strong>Upload Result</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
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
                        <div class="row">
                          <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Exam Year</label>
                                <div class="col-sm-10">
                                <input type="number" size="77" name="txtyear" value="" class="form-control">
                                </div>

                       </div>
                       <div class="form-group">
                                <label class="col-sm-2 control-label">Term</label>
                                <div class="col-sm-10">
                       <select name="cmdterm" id="select" class="form-control" required="">
                       <option value = "">---Select Term---</option>
                       <option value = "Term 1">Term 1</option>
                       <option value = "Term 2">Term 2</option>
                       <option value = "Term 3">Term 3</option>

                     </select>
                       </div>
                       </div>

                         <div class="form-group">
                                <label class="col-sm-2 control-label">Exam Type</label>
                                <div class="col-sm-10">
                                <select name="cmdexamtype" id="select" class="form-control" required="">
                      <option value = "">--- Select Exam Type ---</option>
                    <?php
                    $queryclass = "SELECT * FROM `tblexamtype` order by exam_name ASC";
                    $db = mysqli_query($conn,$queryclass);
                    while ( $d=mysqli_fetch_assoc($db)) {
                    echo "<option value='".$d['id']."'>".$d['exam_name']."</option>";
                    }?>
                  </select>
                       </div>
                              </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-10">
                                <select name="cmdclass" id="select" class="form-control" required="">
    <option value = "">---Select Class---</option>
    <?php
    $queryclass = "SELECT * FROM `tblclass` order by classname ASC";
    $db = mysqli_query($conn,$queryclass);
    while ( $d=mysqli_fetch_assoc($db)) {
       echo "<option value='".$d['id']."'>".$d['classname']."</option>";

    }
    ?>
      </select>
                                    </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Browse(Ms Excel File only)</label>
                                <div class="col-sm-10">
                                <input name="examcalculator" type="file" class="form-control"  accept=".xls,.xlsx"/>
                                </div>
                              </div>
                                                      
                              <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                  <button class="btn btn-primary" type="submit" name="btnupload">Upload </button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="col-sm-6">
                                
                          </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-5"></div>
            </div>
            <div class="row"></div>
        </div>
        <div class="footer">
            <div class="pull-right"></div>
            <div><?php include('../inc/footer.php');  ?></div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="../popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>

</html>
