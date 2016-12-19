<?php
include_once '../db.php';



include_once 'admin_model.php';

$admin = new admin($db);

if(isset($_POST['btn-save']))
{
	$ADMIN_USERNAME = $_POST['ADMIN_USERNAME'];
	$ADMIN_EMAIL_ID = $_POST['ADMIN_EMAIL_ID'];
	$ADMIN_PSW = $_POST['ADMIN_PSW'];
	$ADMIN_CPSW = $_POST['ADMIN_CPSW'];
	$ADMIN_GENDER = $_POST['ADMIN_GENDER'];
	$ADMIN_STATUS = $_POST['ADMIN_STATUS'];
	
	if($admin->create($ADMIN_USERNAME,$ADMIN_PSW,$ADMIN_CPSW,$ADMIN_EMAIL_ID,$ADMIN_GENDER,$ADMIN_STATUS))
	{
		header("Location: admin_master.php?inserted");
	}
	else
	{
		header("Location: admin_master.php?failure");
	}
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="" style="">

 	<section class="forms-basic">
        <div class="page-header">
              <h1>      <i class="md md-input"></i>      Create Admin    </h1>
            </div>
        <div class="well white">
	 <form method='post' class="form-floating">
   <fieldset>
       <div class="row">
           <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">User Name </label>
                    <input type='text' name='ADMIN_USERNAME' class='form-control' value="" required>
                    <div class="help-block with-errors"></div>
                  </div>
           </div>
           <div class="col-md-6">
       <div class="form-group">
                    <label class="control-label">E-mail ID </label>
                    <input type='email' name='ADMIN_EMAIL_ID' class='form-control' value="" required>
                    <div class="help-block with-errors"></div>
                  </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
       <div class="form-group">
                    <label class="control-label">Password </label>
                    <input type='text' name='ADMIN_PSW' class='form-control' value="" required>
                    <div class="help-block with-errors"></div>
                  </div>
               </div>
           <div class="col-md-6">
       <div class="form-group">
                    <label class="control-label">Confirm Password </label>
                    <input type='password' name='ADMIN_CPSW' class='form-control' value="" required>
                    <div class="help-block with-errors"></div>
                  </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                         <label>Gender</label>
                    <div class="radio">
                        <div class="col-md-6">
                          <label>
                            <input type='radio' name='ADMIN_GENDER' class='' value="M" required>Male </label>
                        </div>
                        <div class="col-md-6">
                          <label>
                            <input type='radio' name='ADMIN_GENDER' class='' value="F" required>Female </label>
                        </div>
                   </div>
                    </div>
           </div>           
           <div class="col-md-6">
               <div class="form-group">
                         <label>Status</label>
                    <div class="radio">
                         <div class="col-md-6">
                          <label>
                            <input type='radio' name='ADMIN_STATUS' class='' value="1" required>Active </label>
                        </div>
                         <div class="col-md-6">
                          <label>
                            <input type='radio' name='ADMIN_STATUS' class='' value="2" required>Inactive </label>
                        </div>
                   </div>
                    </div>
           </div>
       </div>
       <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Submit	</button>  
            <a href="admin_master.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back</a>
            
              </div>
       
         </fieldset>
   
</form>
            </div>
    </section>
     
</div>

