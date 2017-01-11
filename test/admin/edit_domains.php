<?php
$page = 'Edit Domain';
ob_start();
include "header.php";
$id=$_GET['uid'];
$sql=$db->query("select * from domains where id=$id") or die(mysql_error());
if($sql->rowCount()==1)
{
$res=$sql->fetch(PDO::FETCH_ASSOC);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<h1>
Edit  Domain
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="manage_domains.php"><i class="fa fa-tree text-aqua"></i>Manage Domains</a></li>
<li class="active">Edit  Domain</li>
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
<form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
    <input type="hidden" name="sid" id="pid_v" value="<?php echo $res['id']; ?>" />
<div class="box-body">
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Industry Name</label>
<div class="col-sm-9">
<select name="i_name" id="" value="" class="form-control" required="required" >
    <option value="">Select Industry</option>
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
<label for="inputPassword3" class="col-sm-3 control-label">Industry Name</label>
<div class="col-sm-9">
<input type="text" name="c_name" id="" value="<?php echo $res['name']; ?>" class="form-control" required="required" />
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
?>
<?php
ob_start();
if(isset($_POST['submit']))
{
$cid=ucfirst(($_POST['sid']));
$c_name=ucfirst(($_POST['c_name']));
$i_name=ucfirst(($_POST['i_name']));
$check=$db->query("select name from domains where name='$c_name' and id!='$cid'");
if($check->rowCount()==0) {
$rs=$db->query("update domains set name='$c_name',iid='$i_name' where id='$cid'");
//exit();
if($rs)
{
    header('Location:manage_domains.php?msg=updated');
}
 else {
    header('Location:manage_domains.php?msg=non');
 }
}
else {
    header('Location:manage_domains.php?msg=nopl');
 }
}
ob_end_flush();
?>

<?php
}
else 
{
header("location:home.php");
}
?>

		

		