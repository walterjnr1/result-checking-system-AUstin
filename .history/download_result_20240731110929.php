<?php
// Set the file path and name
$file_path = 'download/RESULT_CALCULATOR.xlsx';
$filename = 'RESULT_CALCULATOR.xlsx';

$basename = basename($filename);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$basename.'"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
// header('Content-Length: '.$size);
ob_clean();
flush();
readfile("../admin/upload_article/".$filename);
exit;
		
?>