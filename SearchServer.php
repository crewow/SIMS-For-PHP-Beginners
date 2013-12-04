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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
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
      <div class="span12">



        <!-- Search Results
        ================================================== -->
        <section id="Searc-Results">
          <div class="page-header">
          </div>
 
<?php

if($_POST[searchg]=='')

{

echo"<div class='alert alert-error'>";
echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
echo"<p>Please write Server Name in Search box and Click Search!</p>";
echo"</div>";

}

else
{
	
echo"<div class='alert alert-info'>";
echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
echo"<p>You search for <strong>$_POST[searchg]</strong></p>";
echo"</div>";

}

?>
 
          
<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Date</th>
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
			// Define Variable
	$searchg = '%' . $_POST['searchg'] . '%';
// We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT `SrNo`, `ServerName`, `HiMemUti`, `AvgMemUti`, `HiCpuUti`, `AvgCpuUti`, `HiIOPerSec`, `AvgIOPerSec`, `HiDiskUsage`, `AvgDsikUsage`, `EntryBy`, `EntryDate` FROM StatsTracker WHERE ServerName LIKE :searchg");
// bind paramenters, Named paramenters alaways start with colon(:)                      
    $STM->bindParam(':searchg', $searchg);
// For Executing prepared statement we will use below function
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
			

		 echo"<tr>";
		 if($row['EntryDate']!='0000-00-00')
			{   echo "<td>" . date("j-M-Y",strtotime($row['EntryDate'])) ."</td>"; } else { echo "<td>NA</td>"; }
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

		
        }
		

			
			?>

              </tbody>
            </table>
          
          
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
