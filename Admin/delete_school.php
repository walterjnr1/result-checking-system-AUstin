<?php 
include('../inc/controller.php');
$id= $_GET['id'];        


$sql = "DELETE FROM schoolregistrationtbl WHERE SchRegCode =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

//save activity log details
$task= $fullname.' '.'Deleted school record'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);

$_SESSION['success_msg'] = 'School Deleted successfully!';
header("Location: school_record.php"); 
 ?>