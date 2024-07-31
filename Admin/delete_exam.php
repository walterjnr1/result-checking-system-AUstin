<?php 
include('../inc/controller.php');
$id= $_GET['id'];        


$sql = "DELETE FROM tblexamtype WHERE id =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

//save activity log details
$task= $fullname.' '.'Deleted Exam record'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);

$_SESSION['success_msg'] = 'Exam Deleted successfully!';
header("Location: exam_record.php"); 
 ?>