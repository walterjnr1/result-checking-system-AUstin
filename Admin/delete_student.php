<?php 
include('../inc/controller.php');
$id= $_GET['id'];        


$sql = "DELETE FROM studentadmissiontbl WHERE StuAdmNo =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

//save activity log details
$task= $fullname.' '.'Deleted student record'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);

$_SESSION['success_msg'] = 'Student Deleted successfully!';
header("Location: student_record.php"); 
 ?>