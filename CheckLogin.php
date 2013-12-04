<?php
session_start();
	include("configPDO.php");

// Define $myusername and $mypassword 
$UserName=$_POST['inputName']; 
$Password=$_POST['inputPassword']; 

// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT Type,Region FROM members WHERE UserName = :UserName AND Password = :Password");
// bind paramenters, Named paramenters alaways start with colon(:)
    $STM->bindParam(':UserName', $UserName);
    $STM->bindParam(':Password', $Password);
// For Executing prepared statement we will use below function
    $STM->execute();
// Count no. of records	
$count = $STM->rowCount();
//just fetch. only gets one row. So no foreach loop needed :D
$row  = $STM -> fetch();
// User Redirect Conditions will go here
	if($count==1)
	
	{
		$_SESSION[type]=$row[0];
		$_SESSION[Region]=$row[1];
		$_SESSION[myusername]=$UserName;
		

						if($row[0] == 'ACTAdmin')	 { header( "location:http://localhost/SIMS-For-PHP-Beginners/AdminIndex.php"); 	}
					    else    { header( "location:http://localhost/PHPPDOSignin/index.php");  }

	}
	else 
	{
	header("location:http://localhost/SIMS-For-PHP-Beginners/index.php");
	}


// Closing MySQL database connection   
    $dbh = null;	
?>

