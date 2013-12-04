<?php
session_start();
// Database Connection
include("configPDO.php");
// Query to get the usable sugeestions
	$likeString = '%' . $_GET['term'] . '%';

// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT DISTINCT  ServerName FROM StatsTracker WHERE ServerName LIKE :likeString");
// bind paramenters, Named paramenters alaways start with colon(:)
    $STM->bindParam(':likeString', $likeString);
// For Executing prepared statement we will use below function
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
	$Product_array = array();
    foreach($STMrecords as $row)
        {
		   $result = $row[0];
	array_push($Product_array, $result);	
		}
		
		 $json = json_encode($Product_array);
    echo $json;          
?>