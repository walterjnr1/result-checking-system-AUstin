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

?> 