<?php
include('UserSessionAdmin.php');
if(isset($_POST["submit"])=="Add Contract")

{

// Define Variable
$ServerName				= 	$_POST[ServerName];   		//ServerName
$a1					= 	$_POST[a1];   					//Hi Memeory Utilization
$a2					= 	$_POST[a2];   					//Avg Memeory Utilization
$a3					= 	$_POST[a3];   					//Hi CPU Utilization
$a4					= 	$_POST[a4];   					//Avg CPU Utilization
$a5					= 	$_POST[a5];   					//Hi I/O Utilization
$a6					= 	$_POST[a6];   					//Avg I/O Utilization
$a7					= 	$_POST[a7];   					//Hi Disk Usage
$a8					= 	$_POST[a8];   					//Avg Disk Usage

// We Will prepare SQL Query
    $STM = $dbh->prepare("INSERT INTO statstracker(ServerName, HiMemUti,AvgMemUti,HiCpuUti,AvgCpuUti,HiIOPerSec,AvgIOPerSec,HiDiskUsage,AvgDsikUsage,EntryBy,EntryDate) VALUES (:ServerName,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:user,CURRENT_DATE())");
	$STM2 = $dbh->prepare("UPDATE ServerName SET EntryDate=CURRENT_DATE() WHERE ServerName=:ServerName2");
// bind paramenters, Named paramenters alaways start with colon(:)
    $STM->bindParam(':ServerName', $ServerName);
	$STM2->bindParam(':ServerName2', $ServerName);
	$STM->bindParam(':a1', $a1);
	$STM->bindParam(':a2', $a2);
	$STM->bindParam(':a3', $a3);
	$STM->bindParam(':a4', $a4);
	$STM->bindParam(':a5', $a5);
	$STM->bindParam(':a6', $a6);
	$STM->bindParam(':a7', $a7);
	$STM->bindParam(':a8', $a8);
	$STM->bindParam(':user', $_SESSION[myusername]);
// For Executing prepared statement we will use below function
    $STM->execute();
	$STM2->execute();							
header( "location:AdminIndex.php?ServerStatsAdded=77083368");       			   
}
?> 