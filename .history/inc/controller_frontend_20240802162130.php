<?php 
session_start();
error_reporting(1);
include('database/connect.php'); 
include('database/connect2.php'); 

//set time
date_default_timezone_set('Africa/Accra');
$current_date = date('Y-m-d H:i:s');

//website data
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
$logo='uploadImage/logo.png' ;
$email_password=$row_website['mail_password'] ;
$email_username=$row_website['mail_username'] ;
$email_port=$row_website['mail_port'] ;
$email_host=$row_website['mail_host'] ;
$accountName=$row_website['account_name'] ;
$accountNo=$row_website['accountNo'] ;
$bank=$row_website['bank'] ;

?>