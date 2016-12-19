<?php
ob_start();
include "header.php";
$id=$_GET['uid'];
$sql=$db->query("select * from templates where id=$id") or die(mysql_error());
if($sql->rowCount()==1)
{
$res=$sql->fetch(PDO::FETCH_ASSOC);
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
Edit  Template
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="manage_templates.php"><i class="fa fa-tree text-aqua"></i>Manage Templates</a></li>
<li class="active">Edit  Template</li>
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
<form name="submenus" action="save_edit_template.php" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
    <input type="hidden" name="sid" id="pid_v" value="<?php echo $res['id']; ?>" />
     <input type="hidden" name="old_img1" id="pid_v" value="<?php echo $res['image1']; ?>" />
<div class="box-body">
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Industry Name</label>
<div class="col-sm-9">
<select name="i_name" id="Industry" value="" class="form-control" required="required" >
    <option value="">Select Template</option>
<?php 
$sql=$db->query("select * from industry order by name asc");
if ($sql->rowCount() > 0){
while($row_dom = $sql->fetch(PDO::FETCH_ASSOC)){
    //echo $row_dom['domain_name']; ?>

<option  value="<?php echo $row_dom['id']; ?>" 
         <?php if($row_dom['id']==$res["iid"]) { echo "selected"; }?> 
         ><?php echo $row_dom['name']; ?></option>
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
     <?php
//    echo $user_info['Industry']."abc";
$sql_dom = "SELECT * FROM domains where iid='$res[iid]'";
    $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

    if ($stmt_dom->rowCount() > 0) {
        while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
         //   echo $row_dom['domain_name'];
            ?>
     <option  value="<?php echo $row_dom['id']; ?>" <?php if ($res["did"] == $row_dom['id']) {
        echo "selected";
    } ?>><?php echo $row_dom['name']; ?></option>
     <?php
}
}
?>
</select>
</div>         
 </div>      
    
        
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Template Name</label>
<div class="col-sm-9">
<input type="text" name="c_name" id="" value="<?php echo $res['name']; ?>" class="form-control" required="required" />
</div>
</div>

 <div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Template Image<span class="m_imp">*</span></label>
<div class="col-sm-5">
<input type="file" name="image1" id=""  class="form-control" />
</div>
<div class="col-sm-4">
<img src="../images/templates/<?php echo $res['image1']; ?>" alt="" width="100px"/>
</div>
</div>       
<div class="form-group" id="imagead">
<label for="inputPassword3" class="col-sm-3 control-label">Template<span class="m_imp">*</span></label>
<div class="col-sm-9">
<textarea name="template" class="form-control" rows="13" id="summernote" ><?php echo $res['template']; ?></textarea>	
</div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
<button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
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
}
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

