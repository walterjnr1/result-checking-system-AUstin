<?php
include('../inc/controller.php');
if(empty($_SESSION['login_email']))
    {   
      header("Location: login.php"); 
    }
    else{
    $email = $_SESSION["login_email"];

//save activity log details
$task= 'Activated/Deacivated School'.' '. 'On' . ' '.$current_date;
$sql = 'INSERT INTO activity_log(task) VALUES(:task)';
$statement = $dbh->prepare($sql);
$statement->execute([
':task' => $task
]);


// for activate school   	
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

$sql = "UPDATE schoolregistrationtbl SET status=? where SchRegCode=?";
$stmt= $dbh->prepare($sql);
$stmt->execute(["1", $id]);
header("location: school_record.php");
}

// for Deactivate school
if(isset($_GET['did']))
{
$did=intval($_GET['did']);

$sql = "UPDATE schoolregistrationtbl SET status=? where SchRegCode=?";
$stmt= $dbh->prepare($sql);
$stmt->execute(["0", $did]);
header("location: school_record.php");

}
}
?>