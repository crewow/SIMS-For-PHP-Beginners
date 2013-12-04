        <p>Designed and built By Furqan Aziz</p>
 
 <!-- Sign In modal content -->
          <div id="signin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Sign In Form</h3>
            </div>
            <div class="modal-body">
<form class="form-horizontal" method="post" action="CheckLogin.php">
            <div class="control-group">
              <label class="control-label" for="inputName">User Name</label>
              <div class="controls">
                <input type="text" name="inputName"  id="inputName" placeholder="User Name" required="required">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" name="inputPassword" id="inputPassword" placeholder="Password" maxlength="15" minlength="6"  required="required">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn">Sign in</button>
              </div>
            </div>
          </form>

            </div>
          </div>
          
          
  <!-- Change Password Options-->
          <div id="changepassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Change Password</h3>
            </div>
            <div class="modal-body">
 <form class="form-horizontal" action="AdminChangePasswordmy.php" method="post">
               <div class="control-group">
    <label class="control-label" for="CurrentPassword">Current Password</label>
    <div class="controls">
      <input type="password" name="CurrentPassword" id="CurrentPassword" placeholder="Current Password" maxlength="15" minlength="6" required>
    </div>
  </div>
                 <div class="control-group">
    <label class="control-label" for="NewPassword">New Password</label>
    <div class="controls">
      <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" maxlength="15" minlength="6" required>
    </div>
  </div>
                 <div class="control-group">
    <label class="control-label" for="ConfirmPassword">Confirm Password</label>
    <div class="controls">
      <input type="password" name="ConfirmPassword" id="ConfirmPassword" data-validation-match-match="NewPassword" placeholder="Confirm Password" maxlength="15" minlength="6" required>
    </div>
  </div>

 
  <div class="control-group">
    <div class="controls">
      <input type="submit" name="submit" id="submit" class="btn" value="Change Password">
    </div>
  </div>
</form>

            </div>
          </div>
          
<!-- Add new Server Stats Details  modal content -->
          <div id="addin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Add Today Server Stats</h3>
            </div>
            <div class="modal-body">
<form class="form-horizontal" method="post" action="ServerMy.php">

                        <div class="control-group">
              <label class="control-label" for="ServerName">Server Name</label>
              <div class="controls">
              <select name="ServerName" id="ServerName"  required="required">
              <option value="">Server Name</option>
		<?php
		include("configPDO.php");
      // We Will prepare SQL Query
    $STM = $dbh->prepare("SELECT DISTINCT  ServerName FROM ServerName WHERE EntryDate!= CURRENT_DATE() ");
// bind paramenters, Named paramenters alaways start with colon(:)
    $STM->execute();
// we will fetch records like this and use foreach loop to show multiple Results
    $STMrecords = $STM->fetchAll();
    foreach($STMrecords as $row)
        {
		   echo"<option value='$row[0]'>$row[0]</option>";	
		}        
		?>     
            </select>
            
              </div>
            </div>
                        <div class="control-group">
              <label class="control-label" for="Hi Memeory Utilization">Hi Memeory Utilization</label>
              <div class="controls">
                <input type="text" name="a1"  id="a1" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Hi Memeory Utilization" required="required">
              </div>
            </div>
           <div class="control-group">
              <label class="control-label" for="Avg Memeory Utilization">Avg Memeory Utilization</label>
              <div class="controls">
                <input type="text" name="a2"  id="a2" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Avg Memeory Utilization" required="required">
              </div>
            </div>


                        <div class="control-group">
              <label class="control-label" for="Hi CPU Utilization">Hi CPU Utilization</label>
              <div class="controls">
                <input type="text" name="a3"  id="a3" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Hi CPU Utilization" required="required">
              </div>
            </div>
           <div class="control-group">
              <label class="control-label" for="Avg CPU Utilization">Avg CPU Utilization</label>
              <div class="controls">
                <input type="text" name="a4"  id="a4" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Avg CPU Utilization" required="required">
              </div>
            </div>
            
            
        
                         <div class="control-group">
              <label class="control-label" for="Hi I/O Utilization">Hi I/O Utilization</label>
              <div class="controls">
                <input type="text" name="a5"  id="a5" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Hi I/O Utilization" required="required">
              </div>
            </div>
           <div class="control-group">
              <label class="control-label" for="Avg I/O Utilization">Avg I/O Utilization</label>
              <div class="controls">
                <input type="text" name="a6"  id="a6" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Avg I/O Utilization" required="required">
              </div>
            </div>
            
            
                         <div class="control-group">
              <label class="control-label" for="HiDisk Usage">Hi Disk Usage</label>
              <div class="controls">
                <input type="text" name="a7"  id="a7" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Hi Disk Usage" required="required">
              </div>
            </div>
           <div class="control-group">
              <label class="control-label" for="Avg Disk Usage">Avg Disk Usage</label>
              <div class="controls">
                <input type="text" name="a8"  id="a8" pattern="^\d{0,2}(\.\d{0,2}){0,1}$" data-validation-pattern-message="Must be a Double Number'"   placeholder="Avg Disk Usage" required="required">
              </div>
            </div>



            <div class="control-group">
              <div class="controls">
                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Add Stats">
              </div>
            </div>
          </form>

            </div>
          </div>  
  
  
    