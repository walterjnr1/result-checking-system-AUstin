<?php
// Set the file path and name
$file_path = 'download/RESULT_CALCULATOR.xlsx';
$file_name = 'RESULT_CALCULATOR.xlsx';

// Set the content type and disposition
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $file_name . '"; download="' . $file_name . '"');

// Read the file and output it to the browser
readfile($file_path);

// Exit the script to prevent further output
exit;
?>