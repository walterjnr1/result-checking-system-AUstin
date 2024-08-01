<?php 
include('../inc/controller.php');
$id= $_GET['id'];        


$sql = "DELETE FROM tblregion WHERE id =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

//save activity log details
$task= $fullname.' '.'Deleted Region record'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);

$_SESSION['success_msg'] = 'Region Deleted successfully!';
header("Location: region_record.php"); 
 ?>