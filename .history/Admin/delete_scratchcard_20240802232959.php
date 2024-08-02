<?php 
include('../inc/controller.php');
$batchID= $_GET['batchID'];        


$sql = "DELETE FROM tblscratchcard WHERE batchID =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$batchID]);

//save activity log details
$task= $fullname.' '.'Deleted Scratchcard record'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);

$_SESSION['success_msg'] = 'Scratchcard Deleted successfully!';
header("Location: zone_record.php"); 
 ?>