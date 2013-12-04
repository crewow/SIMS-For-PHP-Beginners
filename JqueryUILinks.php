<!--For JqueryUI Things in Input-->
    <script src="assets/ui/jquery.ui.core.js"></script>
	<script src="assets/ui/jquery.ui.widget.js"></script>
	<script src="assets/ui/jquery.ui.datepicker.js"></script>
	<script src="assets/ui/jquery.ui.position.js"></script>
	<script src="assets/ui/jquery.ui.menu.js"></script>
	<script src="assets/ui/jquery.ui.autocomplete.js"></script>
    
    
    <!--For Raty     <script type="text/javascript" src="assets/js/jquery.raty.min.js"></script>-->
    
   
    <script type="text/javascript">
$(document).ready(function()
{
	
	$( "#StartDate" ).datepicker({dateFormat: 'yy-mm-dd'});
	$( "#EndDate" ).datepicker({dateFormat: 'yy-mm-dd'});
	
	
          $.ajax({
               url: 'Get_Auto1.php',
               dataType: 'json',
               success: function(data){
                     $('#searchg').autocomplete(
                     {
                           source: data,
                           minLength: 1   
 
                     });
               }
          });
		  

		  

		  
});
</script>

