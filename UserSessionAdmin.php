<?php
session_start();
if($_SESSION[type]!='ACTAdmin'){
header("location:index.php");
exit();
}
include("configPDO.php");
?>