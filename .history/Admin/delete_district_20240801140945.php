<?php 
include('../inc/controller.php');
$id= $_GET['id'];        


$sql = "DELETE FROM tbldistrict WHERE id =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

//save activity log details
$task= $fullname.' '.'Deleted district record'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);

$_SESSION['success_msg'] = 'District Deleted successfully!';
header("Location: zone_record.php"); 
 ?>