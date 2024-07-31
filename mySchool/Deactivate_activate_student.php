<?php
include('../inc/controller.php');
if(empty($_SESSION['login_SchRegCode']))
    {   
      header("Location: login.php"); 
    }
    else{

//save activity log details
$task= 'Activated/Deacivated Student'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);


// for activate school   	
if(isset($_GET['id']))
{
$id=$_GET['id'];

$sql = "UPDATE studentadmissiontbl SET status=? where StuAdmNo=?";
$stmt= $dbh->prepare($sql);
$stmt->execute(["1", $id]);
header("location: student_record.php");
}

// for Deactivate school
if(isset($_GET['did']))
{
$did=$_GET['did'];

$sql = "UPDATE studentadmissiontbl SET status=? where StuAdmNo=?";
$stmt= $dbh->prepare($sql);
$stmt->execute(["0", $did]);
header("location: student_record.php");

}
}
?>