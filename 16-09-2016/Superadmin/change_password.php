<?php
include_once '../db.php';

include_once 'header.php';
?>
<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="" style="">

 	<section class="forms-basic">
        <div class="page-header">
              <h1><i class="md md-input"></i>Change Password</h1>
        </div>
        
        <div class="well white">
            <form method='post' enctype="multipart/form-data" class="form-floating">
                <fieldset>
                    <div class="form-group">
                            <label class="control-label">Old Password </label>
                            <input type="password" data-error="This field is user Name " name='text1' required class="form-control" value="">
                            <div class="help-block with-errors"></div>
                        </div>
                          <div class="form-group">
                            <label class="control-label">New Password </label>
                            <input type="password" data-error="This field is user Name " name='text1' required class="form-control" value="">
                            <div class="help-block with-errors"></div>
                        </div>
                    <div class="form-group">
                            <label class="control-label">Confirm Password </label>
                            <input type="password" data-error="This field is user Name " name='text1' required class="form-control" value="">
                            <div class="help-block with-errors"></div>
                        </div>
                        
                            <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-floppy-disk"></span> save	</button>  
        <button type="submit" class="btn btn-info" name="">
    		 Cancel	</button> 
              </div>
                </fieldset>
            </form>
    
      
        </div>
        
    </section>
</div>