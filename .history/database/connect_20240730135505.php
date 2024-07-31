<?php
/* Local Database*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "result_checker_austin";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

///////////////////////////////////////////
define('DB_HOST',$servername);
define('DB_USER',$username);
define('DB_PASS',$password);
define('DB_NAME',$dbname);

try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

//set time
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');




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
$logo='uploadImage/logo.png' ;
$email_password=$row_website['mail_password'] ;
$email_username=$row_website['mail_username'] ;
$email_port=$row_website['mail_port'] ;
$email_host=$row_website['mail_host'] ;
?> 