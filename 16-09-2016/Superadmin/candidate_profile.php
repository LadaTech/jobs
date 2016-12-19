<?php
include_once '../db.php';

include_once 'header.php';
?>
<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="" style="">

 	<section class="forms-basic">
        <div class="page-header">
              <h1><i class="md md-input"></i>Candidate Profile</h1>
        </div>
        
        <div class="well white">
            <form method='post' enctype="multipart/form-data" class="form-floating">
                <fieldset>
                    <div class="row">
                        <div class="col-md-4"><div class="form-group">
                            <label class="control-label">Name/ Domain </label>
                            <input type="text" data-error="This field is user Name " name='text1' required class="form-control" value="">
                            <div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Date</label>
                                <input type="text" class="form-control datepicker"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-search"></span> Search	</button>  
        <button type="submit" class="btn btn-info" name="">
    		 Cancel	</button> 
              </div>
            
                        </div>
                    </div>
          
                </fieldset>
            </form>
    
            <table class="table">
                <thead>
                    <tr>
                        <th>sno</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Domain</th>
                        <th>Fresher/Experence</th>
                        <th>View Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>11/11/2015</td>
                        <td>mani</td>
                        <td>testing</td>
                        <td>2years</td>
                        <td><a href="#"><span class="glyphicon glyphicon-edit"></span></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>11/11/2015</td>
                        <td>mani</td>
                        <td>testing</td>
                        <td>2years</td>
                        <td><a href="#"><span class="glyphicon glyphicon-edit"></span></a></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        
    </section>
</div>