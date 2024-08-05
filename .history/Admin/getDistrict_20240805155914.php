<?php
include('../inc/controller.php');
if(strlen($_SESSION['login_email'])=="")
  {   
   header("Location: login.php"); 
   }

   if (isset($_GET['region_id'])) {
    $regionId = $_GET['region_id'];
    $sql = "SELECT * FROM tbldistrict WHERE RegionFound = $regionId order by ";
    $districts = $dbh->query($sql);
    $districts->setFetchMode(PDO::FETCH_ASSOC);

    //echo '<option value="">Select District Name</option>';
    while ($row = $districts->fetch()) {
        echo '<option value="'. $row['id']. '">'. $row['DistrictName']. '</option>';
    }
}
?>