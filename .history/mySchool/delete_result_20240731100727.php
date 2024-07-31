<?php 
include('../inc/controller.php');

if (empty($_SESSION['login_SchRegCode'])) {
    header("Location: login");
}

$id= $_GET['id'];        

$sql = "DELETE FROM examsresultstbl WHERE ResultID =?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

//save activity log details
$task= $SchoolName.' '.'Deleted student Result'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':task' => $task
]);

header("Location: result_record"); 
 ?>