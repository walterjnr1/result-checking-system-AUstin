<?php
include('inc/controller_frontend.php');
if (empty($_SESSION['session_ID'])) {
    header("Location: index.php");
    exit;
}

//fetch result data
$id = $_SESSION["session_ID"];
$stmt = $dbh->prepare("SELECT student.*,class.classname, exam.exam_name, result.*, school.* 
                       FROM examsresultstbl result 
                       INNER JOIN tblclass class ON result.class = class.id 
                       INNER JOIN tblexamtype exam ON result.ExamsType = exam.id 
                       INNER JOIN schoolregistrationtbl school ON result.SchRegCode = school.SchRegCode 
                       INNER JOIN studentadmissiontbl student ON result.StuAdmNo  = student.StuAdmNo  
                       WHERE result.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row_result = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row_result['FirstName'] ;   ?>'s Result </title>
    <link rel="stylesheet" href="css/result_styles.css">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" />
    <style>
        /* styles for print layout */
        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }
            body {
                font-size: 10pt;
                margin: 0;
        padding: 0;
            }
            
            table {
                border-collapse: collapse;
                width: 90%;
                border: 1px solid black;
            }
            .p-4 {
                padding: 0;
            }
            .bg-white {
                background-color: transparent;
            }
            .text-black {
                color: black;
            }
            .w-2_4 {
                width: 90%;
            }
            .fn-lg {
                font-size: 9pt;
            }
            .text-left {
                text-align: left;
            }
            .text-center {
                text-align: center;
            }
            .font-bold {
                font-weight: bold;
            }
            .underline {
                text-decoration: underline;
            }
            #report_card a[href="index.php"] {
    display: none;
  }
  
  #report_card {
    width: 100%;
        height: 100vh;
        overflow: hidden;
        page-break-inside: avoid;
    }
 
        }


    .style1 {font-size: 16px}
    </style>
</head>

<body>
<div class="p-4 bg-white text-black" id="report_card">
        <p align="center"><a href="index"></a>  <a href="index">&lt;&lt; Home</a> <img src="<?php echo $row_result['logo'] ;   ?>" alt="logo" width="85" height="71"></p>

        <div class="student_img" align="right"> <img src="<?php echo $row_result['photo'] ;   ?>" alt="" width="66" height="72"> </div>
        <table width="787" align="center" class="w-2_4 border-collapse border border-zinc-300">

            <thead>
                <tr class="border border-zinc-300">
                    <td width="93" class="border border-zinc-300 p-2">School ID</td>
                    <td width="157" class="font-bold p-2 fn-lg"><strong><?php echo $row_result['SchRegCode'] ;   ?></strong></td>
                </tr>
                <tr class="border border-zinc-300">
                    <td class="border border-zinc-300 p-2">School Name</td>
                    <td class="font-bold p-2 fn-lg"><strong><?php echo $row_result['SchoolName'] ;   ?></strong></td>
                </tr>
                <tr class="border border-zinc-300">
                    <td class="border border-zinc-300 p-2">Exams Type</td>
                    <td class="font-bold p-2 fn-lg"><strong><?php echo $row_result['exam_name'] ;   ?></strong></td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border border-zinc-300 p-2">StudentID</td>
                    <td class="p-2 border-zinc-300 border"><strong><?php echo $row_result['StuAdmNo'] ;   ?></strong></td>
                    <td width="131" class="p-2 border-zinc-300 border"><strong>Subjects</strong></td>
                    <td width="165" class="p-2 border-zinc-300 border"><strong>Grade</strong></td>
                    <td width="213" class="p-2 border-zinc-300 border"><strong>Remark</strong></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2">Student Name</td>
                    <td class="p-2 border-zinc-300 border"><strong><?php echo $row_result['StudentName'] ;   ?></strong></td>
                    <td class="border border-zinc-300 p-2">English/ Lang. & Lit</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['english'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['englishRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2">Class</td>
                    <td class="border border-zinc-300 p-2 font-bold"><?php echo $row_result['classname'] ;   ?></td>
                    <td class="border border-zinc-300 p-2">Literacy (Fante/Twi/Dagbani)</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['fante'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['englishRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"><p>Term</p>
                    <p>&nbsp;</p></td>
                    <td class="border border-zinc-300 p-2 font-bold"><?php echo $row_result['Term'] ;   ?></td>
                    <td class="border border-zinc-300 p-2">Numeracy Skills/ Maths</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['maths'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['mathsRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2">Year</td>
                    <td class="p-2 border-zinc-300 border"><strong><?php echo $row_result['ExamsYear'] ;   ?></strong></td>
                    <td class="border border-zinc-300 p-2">Science/Natural Science</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['science'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['scienceRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2">History/Social Studies</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['history'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['historyRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2">French/Arabic</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['french'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['frenchRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2">Religious Moral Education</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['religious'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['religiousRemark'] ;   ?></td>
                </tr>

                <tr>
                    <td class="border border-zinc-300 p-2">ParentContact</td>
                    <td class="p-2 border-zinc-300 border"><strong><?php echo $row_result['phoneNumber'] ;   ?></strong></td>
                    <td class="border border-zinc-300 p-2">Career Technology</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['careerTechnology'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['careerTechnologyRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2">ParentName</td>
                    <td class="p-2 border-zinc-300 border"><strong><?php echo $row_result['ParentName'] ;   ?></strong></td>
                    <td class="border border-zinc-300 p-2">ICT/Computing</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['IT'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['ITRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2">Physical Education</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['pe'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['peRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2">ParentContact</td>
                    <td class="p-2 border-zinc-300 border"><strong><?php echo $row_result['parentNumber'] ;   ?></strong></td>
                    <td class="border border-zinc-300 p-2">BDT/Creative ARt</td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['creativeArt'] ;   ?></td>
                    <td class="border border-zinc-300 p-2"><?php echo $row_result['creativeArtRemark'] ;   ?></td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2 font-bold">Total Expected Marks</td>
                    <td class="border border-zinc-300 p-2 font-bold text-center" colspan="2"><?php echo $row_result['TExpecSc'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2 font-bold">Marks Obtained</td>
                    <td class="border border-zinc-300 p-2 font-bold text-center" colspan="2"><?php echo $row_result['totalScore'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2"></td>
                    <td class="border border-zinc-300 p-2 font-bold">Average %</td>
                    <td class="border border-zinc-300 p-2 font-bold text-center" colspan="2"><?php echo $row_result['AVGSc'] ;   ?></td>
                </tr>
                <tr>
                    <td class="style1 text-left p-2 border-zinc-300 border" colspan="2"><strong>Class Teacher's Remark : </strong><?php echo $row_result['TeachRmk'] ;   ?>.</td>
                    <td class="border border-zinc-300 p-2" colspan="1"></td>
                    <td class="border border-zinc-300 p-2" colspan="0"></td>
                    <td class="border border-zinc-300 p-2" colspan="2"><p class="pricipal"><img src="<?php echo $row_result['signature'] ;   ?>" width="85" height="55"></p>
                    <p class="pricipal"><strong>Principal</strong></p></td>
                    <!-- <td class="border border-zinc-300 p-2" colspan="1"></td> -->
                </tr>
            </tfoot>
      </table>


        <div align="center"><a href="#" onClick="printDocument()">Print</a>
          

            <div class="bottom">
              <div class="signature"></div>
            </div>
        


                <script>
        function printDocument() {
            window.print();
        }


        
          </script>
  </div>
</div>
</body>

</html>