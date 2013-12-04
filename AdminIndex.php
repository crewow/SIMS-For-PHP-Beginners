<?php  include('UserSessionAdmin.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMS | Server Information Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/ui/themes/ui-darkness/jquery.ui.all.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">

  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">


            <?php  include('NavButtons.php'); ?>


<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>Welcome to SIMS</h1>
    <p class="lead">You can view all Stats about hardware and databases here.</p>
  </div>
</header>


 <div class="container">

    <!-- Docs nav
    ================================================== -->
  
   <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="#c1"><i class="icon-chevron-right"></i> Today Stats</a></li>
          <li><a href="#c2"><i class="icon-chevron-right"></i> Yesterday Stats</a></li>
          <li><a href="#c3"><i class="icon-chevron-right"></i> Last 7 Days Stats</a></li>
          <li><a href="#c4"><i class="icon-chevron-right"></i> Last 30 Days Stats</a></li>
          <li><a href="#Options"><i class="icon-chevron-right"></i> Options</a></li>
        </ul>
      </div>
      
      
      <div class="span9">



        <!-- Today Stats
        ================================================== -->
        <section id="c1">
          <div class="page-header">
            <h1>Today Stats</h1>
          </div>
          
<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Server</th>
                  <th>Hi Memory Utilization</th>
                  <th>Avg Memory Utilization</th>
                  <th>Hi CPU Utilization</th>
                  <th>Avg CPU Utilization</th>
                  <th>Hi I/O Utilization</th>
                  <th>Avg I/O Utilization</th>
                  <th>Hi Disk Usage</th>
                  <th>Avg Disk Usage</th>
                  <th>By</th>
                </tr>
              </thead>
              <tbody>


            
            <?php
			    if($_GET["ServerStatsAdded"]==77083368)  
			   {
			   echo "<div class='alert alert-success'>"; 
			   echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>"; 
			   echo "Server Stats added in Server Information Management System."; 
			   echo "</div>";
			   }
			   			    if($_GET["AdminChangePassword"]==77083368)  
			   {
			   echo "<div class='alert alert-success'>"; 
			   echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>"; 
			   echo "Your password successfully changed."; 
			   echo "</div>"; 
			   }
			   if($_GET["AdminChangePassword"]==37767)  
			   {
			   echo "<div class='alert alert-block'>"; 
			   echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
			   echo "<h4>Warning!</h4>"; 
			   echo "You provide wrong Current Password."; 
			   echo "</div>"; 
			   } 
			

// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT`SrNo`, `ServerName`, FORMAT(`HiMemUti`,2), FORMAT(`AvgMemUti`,2), FORMAT(`HiCpuUti`,2), FORMAT(`AvgCpuUti`,2), FORMAT(`HiIOPerSec`,2), FORMAT(`AvgIOPerSec`,2), FORMAT(`HiDiskUsage`,2),FORMAT( `AvgDsikUsage`,2), `EntryBy`, `EntryDate` FROM StatsTracker WHERE EntryDate = CURRENT_DATE()");
// For Executing prepared statement we will use below function
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
			

		 echo"<tr>";
		 echo"<td>".$row[1]."</td>";
		if($row[2]>=96)	{echo "<td><span class='label label-important'>".$row[2]."</span></td>"; } else if($row[2]>=90 && $row[2]<=95) { echo "<td><span class='label label-warning'>".$row[2]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[2]."</span></td>"; }
		if($row[3]>=96)	{echo "<td><span class='label label-important'>".$row[3]."</span></td>"; } else if($row[3]>=90 && $row[3]<=95) { echo "<td><span class='label label-warning'>".$row[3]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[3]."</span></td>"; }
		if($row[4]>=96)	{echo "<td><span class='label label-important'>".$row[4]."</span></td>"; } else if($row[4]>=90 && $row[4]<=95) { echo "<td><span class='label label-warning'>".$row[4]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[4]."</span></td>"; }
		if($row[5]>=96)	{echo "<td><span class='label label-important'>".$row[5]."</span></td>"; } else if($row[5]>=90 && $row[5]<=95) { echo "<td><span class='label label-warning'>".$row[5]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[5]."</span></td>"; }
		if($row[6]>=96)	{echo "<td><span class='label label-important'>".$row[6]."</span></td>"; } else if($row[6]>=90 && $row[6]<=95) { echo "<td><span class='label label-warning'>".$row[6]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[6]."</span></td>"; }
		if($row[7]>=96)	{echo "<td><span class='label label-important'>".$row[7]."</span></td>"; } else if($row[7]>=90 && $row[7]<=95) { echo "<td><span class='label label-warning'>".$row[7]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[7]."</span></td>"; }
		if($row[8]>=96)	{echo "<td><span class='label label-important'>".$row[8]."</span></td>"; } else if($row[8]>=90 && $row[8]<=95) { echo "<td><span class='label label-warning'>".$row[8]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[8]."</span></td>"; }
		if($row[9]>=96)	{echo "<td><span class='label label-important'>".$row[9]."</span></td>"; } else if($row[9]>=90 && $row[9]<=95) { echo "<td><span class='label label-warning'>".$row[9]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[9]."</span></td>"; }

		echo"<td>".$row[10]."</td>";
         echo"</tr>";

		
        }
		

			
			?>

              </tbody>
            </table>
          
          
        </section>



        <!-- Yesteday Stats
        ================================================== -->
        <section id="c2">
          <div class="page-header">
            <h1>Yesteday Stats</h1>
          </div>
         
         <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Server</th>
                  <th>Hi Memory Utilization</th>
                  <th>Avg Memory Utilization</th>
                  <th>Hi CPU Utilization</th>
                  <th>Avg CPU Utilization</th>
                  <th>Hi I/O Utilization</th>
                  <th>Avg I/O Utilization</th>
                  <th>Hi Disk Usage</th>
                  <th>Avg Disk Usage</th>
                  <th>By</th>
                </tr>
              </thead>
              <tbody>


            
            <?php
				

// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT `SrNo`, `ServerName`, FORMAT(`HiMemUti`,2), FORMAT(`AvgMemUti`,2), FORMAT(`HiCpuUti`,2), FORMAT(`AvgCpuUti`,2), FORMAT(`HiIOPerSec`,2), FORMAT(`AvgIOPerSec`,2), FORMAT(`HiDiskUsage`,2),FORMAT( `AvgDsikUsage`,2), `EntryBy`, `EntryDate` FROM StatsTracker WHERE EntryDate = SUBDATE(CURDATE(),1)");
// For Executing prepared statement we will use below function
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
			

		 echo"<tr>";
		 echo"<td>".$row[1]."</td>";
		if($row[2]>=96)	{echo "<td><span class='label label-important'>".$row[2]."</span></td>"; } else if($row[2]>=90 && $row[2]<=95) { echo "<td><span class='label label-warning'>".$row[2]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[2]."</span></td>"; }
		if($row[3]>=96)	{echo "<td><span class='label label-important'>".$row[3]."</span></td>"; } else if($row[3]>=90 && $row[3]<=95) { echo "<td><span class='label label-warning'>".$row[3]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[3]."</span></td>"; }
		if($row[4]>=96)	{echo "<td><span class='label label-important'>".$row[4]."</span></td>"; } else if($row[4]>=90 && $row[4]<=95) { echo "<td><span class='label label-warning'>".$row[4]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[4]."</span></td>"; }
		if($row[5]>=96)	{echo "<td><span class='label label-important'>".$row[5]."</span></td>"; } else if($row[5]>=90 && $row[5]<=95) { echo "<td><span class='label label-warning'>".$row[5]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[5]."</span></td>"; }
		if($row[6]>=96)	{echo "<td><span class='label label-important'>".$row[6]."</span></td>"; } else if($row[6]>=90 && $row[6]<=95) { echo "<td><span class='label label-warning'>".$row[6]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[6]."</span></td>"; }
		if($row[7]>=96)	{echo "<td><span class='label label-important'>".$row[7]."</span></td>"; } else if($row[7]>=90 && $row[7]<=95) { echo "<td><span class='label label-warning'>".$row[7]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[7]."</span></td>"; }
		if($row[8]>=96)	{echo "<td><span class='label label-important'>".$row[8]."</span></td>"; } else if($row[8]>=90 && $row[8]<=95) { echo "<td><span class='label label-warning'>".$row[8]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[8]."</span></td>"; }
		if($row[9]>=96)	{echo "<td><span class='label label-important'>".$row[9]."</span></td>"; } else if($row[9]>=90 && $row[9]<=95) { echo "<td><span class='label label-warning'>".$row[9]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[9]."</span></td>"; }

		echo"<td>".$row[10]."</td>";
         echo"</tr>";

		
        }
	
			
			
			?>

              </tbody>
            </table>
         
         
        </section>



        <!-- Last 7 Days
        ================================================== -->
        <section id="c3">
          <div class="page-header">
            <h1>Last 7 Days Stats</h1>
          </div>
          <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Server</th>
                  <th>Hi Memory Utilization</th>
                  <th>Avg Memory Utilization</th>
                  <th>Hi CPU Utilization</th>
                  <th>Avg CPU Utilization</th>
                  <th>Hi I/O Utilization</th>
                  <th>Avg I/O Utilization</th>
                  <th>Hi Disk Usage</th>
                  <th>Avg Disk Usage</th>
                </tr>
              </thead>
              <tbody>


            
            <?php
				

// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT  `ServerName`, FORMAT(AVG(`HiMemUti`),2), FORMAT(AVG(`AvgMemUti`),2), FORMAT(AVG(`HiCpuUti`),2), FORMAT(AVG(`AvgCpuUti`),2), FORMAT(AVG(`HiIOPerSec`),2), FORMAT(AVG(`AvgIOPerSec`),2), FORMAT(AVG(`HiDiskUsage`),2), FORMAT(AVG(`AvgDsikUsage`),2)  FROM StatsTracker WHERE EntryDate >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) GROUP BY ServerName");
// For Executing prepared statement we will use below function
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
			

		 echo"<tr>";
		 echo"<td>".$row[0]."</td>";
		if($row[1]>=96)	{echo "<td><span class='label label-important'>".$row[1]."</span></td>"; } else if($row[1]>=90 && $row[1]<=95) { echo "<td><span class='label label-warning'>".$row[1]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[1]."</span></td>"; }
		if($row[2]>=96)	{echo "<td><span class='label label-important'>".$row[2]."</span></td>"; } else if($row[2]>=90 && $row[2]<=95) { echo "<td><span class='label label-warning'>".$row[2]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[2]."</span></td>"; }
		if($row[3]>=96)	{echo "<td><span class='label label-important'>".$row[3]."</span></td>"; } else if($row[3]>=90 && $row[3]<=95) { echo "<td><span class='label label-warning'>".$row[3]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[3]."</span></td>"; }
		if($row[4]>=96)	{echo "<td><span class='label label-important'>".$row[4]."</span></td>"; } else if($row[4]>=90 && $row[4]<=95) { echo "<td><span class='label label-warning'>".$row[4]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[4]."</span></td>"; }
		if($row[5]>=96)	{echo "<td><span class='label label-important'>".$row[5]."</span></td>"; } else if($row[5]>=90 && $row[5]<=95) { echo "<td><span class='label label-warning'>".$row[5]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[5]."</span></td>"; }
		if($row[6]>=96)	{echo "<td><span class='label label-important'>".$row[6]."</span></td>"; } else if($row[6]>=90 && $row[6]<=95) { echo "<td><span class='label label-warning'>".$row[6]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[6]."</span></td>"; }
		if($row[7]>=96)	{echo "<td><span class='label label-important'>".$row[7]."</span></td>"; } else if($row[7]>=90 && $row[7]<=95) { echo "<td><span class='label label-warning'>".$row[7]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[7]."</span></td>"; }
		if($row[8]>=96)	{echo "<td><span class='label label-important'>".$row[8]."</span></td>"; } else if($row[8]>=90 && $row[8]<=95) { echo "<td><span class='label label-warning'>".$row[8]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[8]."</span></td>"; }

         echo"</tr>";

		
        }
	

			?>

              </tbody>
            </table>
        </section>



        <!-- Last 30 days  Stats
        ================================================== -->
        <section id="c4">
          <div class="page-header">
            <h1>Last 30 Days Stats</h1>
          </div>
          <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Server</th>
                  <th>Hi Memory Utilization</th>
                  <th>Avg Memory Utilization</th>
                  <th>Hi CPU Utilization</th>
                  <th>Avg CPU Utilization</th>
                  <th>Hi I/O Utilization</th>
                  <th>Avg I/O Utilization</th>
                  <th>Hi Disk Usage</th>
                  <th>Avg Disk Usage</th>
                </tr>
              </thead>
              <tbody>


            
            <?php
				

// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT  `ServerName`, FORMAT(AVG(`HiMemUti`),2), FORMAT(AVG(`AvgMemUti`),2), FORMAT(AVG(`HiCpuUti`),2), FORMAT(AVG(`AvgCpuUti`),2), FORMAT(AVG(`HiIOPerSec`),2), FORMAT(AVG(`AvgIOPerSec`),2), FORMAT(AVG(`HiDiskUsage`),2), FORMAT(AVG(`AvgDsikUsage`),2) FROM StatsTracker WHERE EntryDate >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) GROUP BY ServerName");
// For Executing prepared statement we will use below function
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
			

		 echo"<tr>";
		 echo"<td>".$row[0]."</td>";
		if($row[1]>=96)	{echo "<td><span class='label label-important'>".$row[1]."</span></td>"; } else if($row[1]>=90 && $row[1]<=95) { echo "<td><span class='label label-warning'>".$row[1]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[1]."</span></td>"; }
		if($row[2]>=96)	{echo "<td><span class='label label-important'>".$row[2]."</span></td>"; } else if($row[2]>=90 && $row[2]<=95) { echo "<td><span class='label label-warning'>".$row[2]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[2]."</span></td>"; }
		if($row[3]>=96)	{echo "<td><span class='label label-important'>".$row[3]."</span></td>"; } else if($row[3]>=90 && $row[3]<=95) { echo "<td><span class='label label-warning'>".$row[3]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[3]."</span></td>"; }
		if($row[4]>=96)	{echo "<td><span class='label label-important'>".$row[4]."</span></td>"; } else if($row[4]>=90 && $row[4]<=95) { echo "<td><span class='label label-warning'>".$row[4]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[4]."</span></td>"; }
		if($row[5]>=96)	{echo "<td><span class='label label-important'>".$row[5]."</span></td>"; } else if($row[5]>=90 && $row[5]<=95) { echo "<td><span class='label label-warning'>".$row[5]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[5]."</span></td>"; }
		if($row[6]>=96)	{echo "<td><span class='label label-important'>".$row[6]."</span></td>"; } else if($row[6]>=90 && $row[6]<=95) { echo "<td><span class='label label-warning'>".$row[6]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[6]."</span></td>"; }
		if($row[7]>=96)	{echo "<td><span class='label label-important'>".$row[7]."</span></td>"; } else if($row[7]>=90 && $row[7]<=95) { echo "<td><span class='label label-warning'>".$row[7]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[7]."</span></td>"; }
		if($row[8]>=96)	{echo "<td><span class='label label-important'>".$row[8]."</span></td>"; } else if($row[8]>=90 && $row[8]<=95) { echo "<td><span class='label label-warning'>".$row[8]."</span></td>"; } else { echo "<td><span class='label label-success'>".$row[8]."</span></td>"; }

         echo"</tr>";

		
        }
	

			?>

              </tbody>
            </table>
        </section>



        <!-- Options
        ================================================== -->
        <section id="Options">
          <div class="page-header">
            <h1>Options</h1>
          </div>
          <div class="btn-group" style="margin: 9px 0 5px;">
          	<a  href="#addin" data-toggle="modal" class="btn">Addition</a>
            <a  href="#changepassword" data-toggle="modal" class="btn">Change Password</a>
              
            </div>
        </section>




      </div>
    </div>

  </div>



    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <?php  include('footer.php'); ?>
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>

	<script src="assets/js/jqBootstrapValidation.js"></script>     
             <script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>

    <!--For JqueryUI Things in Input-->
    <?php  include('JqueryUILinks.php'); ?>


  </body>
</html>
