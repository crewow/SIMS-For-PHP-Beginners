<?php
include('UserSessionAdmin.php');
if(isset($_POST["submit"])=="Change Password")

{

						$CurrentPassword		= 	$_POST[CurrentPassword];   //CurrentPassword
						$ConfirmPassword		= 	$_POST[ConfirmPassword];   	//ConfirmPassword
						
// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT Password FROM members WHERE UserName = :user");
// bind paramenters, Named paramenters alaways start with colon(:)
	$STM->bindParam(':user', $_SESSION[myusername]);
// For Executing prepared statement we will use below function
    $STM->execute();
// Count no. of records	
$count = $STM->rowCount();
//just fetch. only gets one row. So no foreach loop needed :D
$row  = $STM -> fetch();

		$cuurentpassworddb=$row[0];

		
	if($cuurentpassworddb==$CurrentPassword)
	{	
// We Will prepare SQL Query
$STM2 = $dbh->prepare("UPDATE members SET Password=:ConfirmPassword WHERE UserName=:user");
// bind paramenters, Named paramenters alaways start with colon(:)
	$STM2->bindParam(':user', $_SESSION[myusername]);
	$STM2->bindParam(':ConfirmPassword', $ConfirmPassword);
// For Executing prepared statement we will use below function
    $STM2->execute();
header( "location:AdminIndex.php?AdminChangePassword=77083368");

	}
	else
	{
	header( "location:AdminIndex.php?AdminChangePassword=37767");	
	}
         			   
}
?> 