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
    body {
        height: auto;
        overflow: visible;
        page-break-after: auto;
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
    #report_card a[href="#"] {
        display: none;
    }
    table {
        page-break-inside: avoid;
    }
    tr {
        page-break-inside: avoid;
    }
    td {
        page-break-inside: avoid;
    }
}
  #report_card a[href="#"] {
    display: none;
  }

 
        


    .style1 {font-size: 16px}
.style3 {font-size: 14px}
    </style>
</head>

<body>
<div class="p-4 bg-white text-black" id="report_card">
        <p align="center"><a href="index"></a>  <a href="index">&lt;&lt; Home</a> <img src="<?php echo $row_result['logo'] ;   ?>" alt="logo" width="85" height="71"></p>

        <div class="student_img" align="right"> <img src="<?php echo $row_result['photo'] ;   ?>" alt="" width="57" height="55"> </div>
        <table width="612" align="center" class="w-2_4 border-collapse border border-zinc-300">

            <thead>
                <tr class="border border-zinc-300">
                    <td class="border border-zinc-300 p-2 style3">School ID</td>
                    <td class="font-bold p-2 fn-lg"><span class="style3"><strong><?php echo $row_result['SchRegCode'] ;   ?></strong></span></td>
                </tr>
                <tr class="border border-zinc-300">
                    <td class="border border-zinc-300 p-2 style3">School Name</td>
                    <td class="font-bold p-2 fn-lg"><span class="style3"><strong><?php echo $row_result['SchoolName'] ;   ?></strong></span></td>
                </tr>
                <tr class="border border-zinc-300">
                    <td class="border border-zinc-300 p-2 style3">Exams Type</td>
                    <td class="font-bold p-2 fn-lg"><span class="style3"><strong><?php echo $row_result['exam_name'] ;   ?></strong></span></td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border border-zinc-300 p-2 style3">StudentID</td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong><?php echo $row_result['StuAdmNo'] ;   ?></strong></span></td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong>Subjects</strong></span></td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong>Grade</strong></span></td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong>Remark</strong></span></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3">Student Name</td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong><?php echo $row_result['StudentName'] ;   ?></strong></span></td>
                    <td class="border border-zinc-300 p-2 style3">English/ Lang. & Lit</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['english'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['englishRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3">Class</td>
                    <td class="border border-zinc-300 p-2 font-bold style3"><?php echo $row_result['classname'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3">Literacy (Fante/Twi/Dagbani)</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['fante'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['englishRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"><p>Term</p>
                    <p>&nbsp;</p></td>
                    <td class="border border-zinc-300 p-2 font-bold style3"><?php echo $row_result['Term'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3">Numeracy Skills/ Maths</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['maths'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['mathsRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3">Year</td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong><?php echo $row_result['ExamsYear'] ;   ?></strong></span></td>
                    <td class="border border-zinc-300 p-2 style3">Science/Natural Science</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['science'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['scienceRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3">History/Social Studies</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['history'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['historyRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3">French/Arabic</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['french'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['frenchRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3">Religious Moral Education</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['religious'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['religiousRemark'] ;   ?></td>
                </tr>

                <tr>
                    <td class="border border-zinc-300 p-2 style3">ParentContact</td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong><?php echo $row_result['phoneNumber'] ;   ?></strong></span></td>
                    <td class="border border-zinc-300 p-2 style3">Career Technology</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['careerTechnology'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['careerTechnologyRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3">ParentName</td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong><?php echo $row_result['ParentName'] ;   ?></strong></span></td>
                    <td class="border border-zinc-300 p-2 style3">ICT/Computing</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['IT'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['ITRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3">Physical Education</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['pe'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['peRemark'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3">ParentContact</td>
                    <td class="p-2 border-zinc-300 border"><span class="style3"><strong><?php echo $row_result['parentNumber'] ;   ?></strong></span></td>
                    <td class="border border-zinc-300 p-2 style3">BDT/Creative ARt</td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['creativeArt'] ;   ?></td>
                    <td class="border border-zinc-300 p-2 style3"><?php echo $row_result['creativeArtRemark'] ;   ?></td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 font-bold style3">Total Expected Marks</td>
                    <td colspan="2" class="border border-zinc-300 p-2 font-bold text-center style3"><?php echo $row_result['TExpecSc'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 font-bold style3">Marks Obtained</td>
                    <td colspan="2" class="border border-zinc-300 p-2 font-bold text-center style3"><?php echo $row_result['totalScore'] ;   ?></td>
                </tr>
                <tr>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 style3"></td>
                    <td class="border border-zinc-300 p-2 font-bold style3">Average %</td>
                    <td colspan="2" class="border border-zinc-300 p-2 font-bold text-center style3"><?php echo $row_result['AVGSc'] ;   ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-left p-2 border-zinc-300 border style3"><strong>Class Teacher's Remark : </strong><?php echo $row_result['TeachRmk'] ;   ?>.</td>
                    <td colspan="1" class="border border-zinc-300 p-2 style3"></td>
                    <td colspan="0" class="border border-zinc-300 p-2 style3"></td>
                    <td colspan="2" class="border border-zinc-300 p-2 style3"><p class="pricipal"><img src="<?php echo $row_result['signature'] ;   ?>" width="85" height="56"></p>
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