<?php
ob_start();
include "header.php";
?>
<script>
//$(document).ready(function() {
//$('#summernote').summernote({
//height: 200
//});
//}); 
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
<section class="content-header">
  
<h1>
Add Template
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>

 <li class="active">Add Template</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->

<div class="row">
    <div class="col-md-1"></div>
            <!-- left column -->
            <div class="col-md-9">
              <!-- Horizontal Form -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Please fill the following details</h3>
                </div><!-- /.box-header -->
                
<!--vb_classifieds  forms values stores here-->

<div class="box-body load-procss">
    <form name="submenus" action="save_add_template.php" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Industry Name<span class="m_imp">*</span></label>
<div class="col-sm-9">
<select name="i_name" id="Industry" value="" class="form-control" required="required" >
    <option value="">Select Industry</option>
<?php 
$sql=$db->query("select * from industry order by name asc");
if ($sql->rowCount() > 0){
while($row_dom = $sql->fetch(PDO::FETCH_ASSOC)){
    //echo $row_dom['domain_name']; ?>

<option  value="<?php echo $row_dom['id']; ?>"><?php echo $row_dom['name']; ?></option>
<?php
    }
}

?>
    
</select>
</div>
</div>  
        
        
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Domain<span class="m_imp">*</span></label>
<div class="col-sm-9">
<select class="form-control" id="Domain" name="Domain" required>
    <option value="">Select Domain</option>
</select>
</div>         
 </div>       
        
        <div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Template Name<span class="m_imp">*</span></label>
<div class="col-sm-9">
<input type="text" name="c_name" id="" value="" class="form-control" required="required" />
</div>
</div>
 <div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Template Image<span class="m_imp">*</span></label>
<div class="col-sm-5">
<input type="file" name="image1" id=""  class="form-control" required/>
</div>
<div class="col-sm-4">

</div>
</div>       
<div class="form-group" id="imagead">
<label for="inputPassword3" class="col-sm-3 control-label">Template<span class="m_imp">*</span></label>
<div class="col-sm-9">
<textarea name="template" class="form-control" rows="13" id="summernote" ></textarea>	
</div>
</div>

<div class="box-footer">
<input type="submit" name="submit" class="btn btn-info pull-right submit-click" value='Submit'>
</div><!-- /.box-footer -->             
</form>
</div><!-- /.box -->
</div><!-- /.box-body -->
</div>
</div>
</div><!-- /.box-header -->
</section><!-- /.content -->
<!-- content pages -->	
<?php
include "footer.php";
?>

<script>

$("#Industry").on('change', function(){
$("#Domain").empty().append("<image src='<?php echo $my_path; ?>/images/spinner.gif' />");
var id=$(this).val();
//  alert("ff");
$.ajax({
type:"get",
url:"<?php echo $my_path; ?>/get_domains.php",
data:{"q":id},
success:function(data){
//  alert(data);
$("#Domain").empty().append(data);
}
});
});    
    
</script>

