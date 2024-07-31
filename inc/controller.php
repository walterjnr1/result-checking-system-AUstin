<?php 
session_start();
error_reporting(1);
include('../database/connect.php'); 
include('../database/connect2.php'); 

//set time
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


//fetch admin data
$email = $_SESSION["login_email"];

//fetch website admin data
$stmt = $dbh->query("SELECT * FROM users where email='$email'");
$row_user= $stmt->fetch();
$fullname_admin=$row_user['fullname'];  
$photo_admin =$row_user['photo'];
$email_admin=$row_user['email'];
$password_admin=$row_user['password'];
$lastaccess=$row_user['lastaccess'];
$last_ip=$row_user['last_ip'];
$groupname=$row_user['groupname'];

//fetch school data
$SchRegCode = $_SESSION["login_SchRegCode"];
$stmt = $dbh->query("SELECT * FROM schoolregistrationtbl where SchRegCode='$SchRegCode'");
$row_sch= $stmt->fetch();
$SchoolName=$row_sch['SchoolName'];  
$sch_logo =$row_sch['logo'];
$sch_signature =$row_sch['signature'];
$SchRegCode =$row_sch['SchRegCode'];
$Location =$row_sch['Location'];
$District =$row_sch['District'];
$schoolemail =$row_sch['email'];
$SchShortCode =$row_sch['SchShortCode'];

//fetch website data
$stmt = $dbh->query("SELECT * FROM websiteinfo");
$row_website = $stmt->fetch();
$website_email=$row_website['email'] ;
$website_name=$row_website['website_name'] ;
$phone1=$row_website['phone1'] ;
$phone2=$row_website['phone2'] ;
$address1=$row_website['address1'] ;
$address2=$row_website['address2'] ;
$secretkey=$row_website['payment_secretkey'] ;
$SMS_username=$row_website['SMS_username'] ;
$SMS_password=$row_website['SMS_password'] ;
$logo='uploadImage/logo/logo.jpg' ;
$email_password=$row_website['mail_password'] ;
$email_username=$row_website['mail_username'] ;
$email_port=$row_website['mail_port'] ;
$email_host=$row_website['mail_host'] ;

//counter
$stmt = $dbh->prepare("SELECT count(*) FROM users");
$stmt->execute([]);
$count_user = $stmt->fetchColumn(); 

$stmt = $dbh->prepare("SELECT count(*) FROM schoolregistrationtbl");
$stmt->execute([]);
$count_school = $stmt->fetchColumn(); 

$stmt = $dbh->prepare("SELECT count(*) FROM studentadmissiontbl");
$stmt->execute([]);
$count_student = $stmt->fetchColumn(); 

$stmt = $dbh->prepare("SELECT count(*) FROM tblexamtype");
$stmt->execute([]);
$count_exams = $stmt->fetchColumn(); 

$stmt = $dbh->prepare("SELECT count(*) FROM tblstaff");
$stmt->execute([]);
$count_staff = $stmt->fetchColumn(); 

$stmt = $dbh->prepare("SELECT count(*) FROM studentadmissiontbl where SchRegCode='$SchRegCode'");
$stmt->execute([]);
$count_myStudent = $stmt->fetchColumn();

$stmt = $dbh->prepare("SELECT count(*) FROM tblstaff where SchRegCode='$SchRegCode'");
$stmt->execute([]);
$count_myStaff = $stmt->fetchColumn();

$stmt = $dbh->prepare("SELECT * FROM schoolregistrationtbl where SchRegCode='$SchRegCode'");
$stmt->execute([]);
$Row_sch= $stmt->fetch();
$myExpiryDate = $Row_sch['AccExpiryDate'];

$stmt = $dbh->prepare("SELECT count(*) FROM examsresultstbl where SchRegCode='$SchRegCode'");
$stmt->execute([]);
$count_myresult = $stmt->fetchColumn();
?>