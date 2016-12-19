<?php
ob_start();
include "header.php";
$sql=mysql_query("select * from history where id=1") or die(mysql_error());
if(mysql_num_rows($sql)==1)
{
$res=mysql_fetch_assoc($sql);
?>
<script>
$(document).ready(function() {
$('#summernote').summernote({
height: 200
});
}); 
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<h1>
History
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
 <li class="active">History</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='updated')
{
//echo "<p class='msg'></p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> History has been Updated</h4>

</div>
<?php   
}
}
?>
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
<form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
<div class="box-body">

<div class="form-group" id="imagead">
<label for="inputPassword3" class="col-sm-3 control-label">History<span class="m_imp">*</span></label>
<div class="col-sm-9">
<textarea name="news" id="summernote" ><?php echo $res["history"];?></textarea>	
</div>
</div>
    
     
    
</div><!-- /.box-body -->
<div class="box-footer">
<input type="submit" name="submit" class="btn btn-info pull-right" value='Submit'>
</div><!-- /.box-footer -->             
</form>
</div><!-- /.box -->

</div>
</div>
</div><!-- /.box-header -->
</section><!-- /.content -->
<!-- content pages -->	
<?php
include "footer.php";
?>	
<?php
ob_start();
if(isset($_POST['submit']))
{
$news=mysql_real_escape_string($_POST['news']);
$rs=mysql_query("update history set history='$news' where id=1") or die(mysql_error());
if($rs==1)
{
    header('Location:history.php?msg=updated');
}
 else {
    header('Location:history.php?msg=non');
 }
}
ob_end_flush();
?>  
<script>
$(document).ready(function() {
    $('#fileForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            avatar: {
                validators: {
                    file: {
                        extension: 'jpeg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2097152,   // 2048 * 1024
                        message: 'The selected file is not valid'
                    }
                }
            }
        }
    });
});
</script>
<?php
}
else 
{
header("location:home.php");
}
?>
			